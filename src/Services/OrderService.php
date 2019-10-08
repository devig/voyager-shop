<?php

namespace Tjventurini\VoyagerShop\Services;

use App\User;
use Stripe\PaymentIntent;
use Illuminate\Support\Collection;
use Tjventurini\VoyagerShop\Models\Order;
use Tjventurini\VoyagerShop\Events\AddToCart;
use Tjventurini\VoyagerShop\Events\OrderCart;
use Tjventurini\VoyagerShop\Models\OrderItem;
use Tjventurini\VoyagerShop\Events\CreateCart;
use Tjventurini\VoyagerShop\Events\UpdateCart;
use Tjventurini\VoyagerShop\Events\RemoveFromCart;
use Tjventurini\VoyagerShop\Models\ProductVariant;
use Tjventurini\VoyagerShop\Services\StripeService;
use Tjventurini\VoyagerShop\Services\AddressService;

class OrderService
{
    /**
     * Method to create an empty order with the state of cart.
     *
     * @return \Tjventurini\VoyagerShop\Models\Order
     */
    public function createCart(): Order
    {
        // create an order
        $Order = Order::create();

        // fire event
        event(new CreateCart($Order));

        // return the order
        return $Order;
    }

    /**
     * Method to add a product variant (item) to the order.
     *
     * @param \Tjventurini\VoyagerShop\Models\Order          $Order
     * @param \Tjventurini\VoyagerShop\Models\ProductVariant $ProductVariant
     *
     * @return  \Tjventurini\VoyagerShop\Models\Order
     */
    public function addToCart(Order $Order, ProductVariant $ProductVariant): Order
    {
        // get order item if available
        $OrderItem = $Order->orderItems()
            ->where(config('voyager-shop.foreign_keys.productVariant'), $ProductVariant->id)
            ->first();

        // if order item is available update it
        if (!is_null($OrderItem)) {
            $quantity = $OrderItem->quantity;
            $OrderItem->update([
                'quantity' => $quantity + 1
            ]);

            // fire event
            event(new AddToCart($Order, $OrderItem));
            
            // return the current order
            return $Order;
        }

        // create order item if product variant is not already in cart
        $OrderItem = $Order->orderItems()->create([
            config('voyager-shop.foreign_keys.productVariant') => $ProductVariant->id
        ]);

        // fire event
        event(new AddToCart($Order, $OrderItem));
            
        // return the current order
        return $Order;
    }

    /**
     * Method to remove a product variant (item) from the cart.
     *
     * @param  \Tjventurini\VoyagerShop\Models\Order          $Order
     * @param  \Tjventurini\VoyagerShop\Models\ProductVariant $ProductVariant
     *
     * @return \Tjventurini\VoyagerShop\Models\Order
     */
    public function removeFromCart(Order $Order, ProductVariant $ProductVariant): Order
    {
        // get the order item
        $OrderItem = $Order->orderItems()
            ->where(config('voyager-shop.foreign_keys.productVariant'), $ProductVariant->id)
            ->firstOrFail();

        // fire event
        event(new RemoveFromCart($Order, $OrderItem));

        // delete the order item
        $OrderItem->delete();

        // return the updated order
        return $Order;
    }

    /**
     * Get orders of a given user.
     *
     * @return Collection
     */
    public function getUserOrders(): Collection
    {
        return Auth::user()->orders;
    }

    /**
     * Update item in cart.
     *
     * @param  \Tjventurini\VoyagerShop\Models\Order          $Order
     * @param  \Tjventurini\VoyagerShop\Models\ProductVariant $ProductVariant
     * @param  array          $data
     *
     * @return \Tjventurini\VoyagerShop\Models\Order
     */
    public function updateCart(Order $Order, ProductVariant $ProductVariant, array $data): Order
    {
        // get order item
        $OrderItem = $Order->orderItems()
            ->where(config('voyager-shop.foreign_keys.productVariant'), $ProductVariant->id)
            ->firstOrFail();

        // fire event
        event(new UpdateCart($Order, $OrderItem, $data));

        // update order item with given data
        $OrderItem->update($data);

        // return updated order
        return $Order;
    }

    /**
     * Get the order by a given token.
     *
     * @param  string $token
     *
     * @return \Tjventurini\VoyagerShop\Models\Order
     */
    public function getOrderByToken(string $token): Order
    {
        return Order::where('token', $token)->firstOrFail();
    }

    /**
     * Method to order cart items or single product.
     *
     * @param  string|null $token
     * @param  int|null    $product_variant_id
     * @param  string|null $stripe_id
     * @param  string|null $currency
     *
     * @return \Stripe\PaymentIntent
     */
    public function order(string $token = null, int $product_variant_id = null, string $stripe_id = null, string $currency = null): PaymentIntent
    {
        if ($token) {
            return $this->orderCart($token, $stripe_id, $currency);
        }

        if ($product_variant_id) {
            return $this->orderProduct($product_variant_id, $stripe_id, $currency);
        }

        throw new \Exception("You need to specify a cart or a product to buy.", 1);
    }

    /**
     * Method to order all items of the current cart by token.
     *
     * @param  string $token
     * @param  string $stripe_id
     * @param  string $currency
     *
     * @return \Stripe\PaymentIntent
     */
    private function orderCart(string $token, string $stripe_id = null, string $currency = null): PaymentIntent
    {
        // get the order by token
        $Order = $this->getOrderByToken($token);

        // check the state of the order
        if ($Order->state != config('voyager-shop.order_states.cart')) {
            throw new \Exception("The given order has the wrong state.", 1);
        }

        // get all items from the order
        $OrderItems = $Order->orderItems;

        // check if there is at least one item in the cart
        if (!count($OrderItems)) {
            throw new \Exception("The given order does not contain any items.", 1);
        }

        // get the full price of the order
        $price = $Order->priceRaw;

        // get description
        $description = trans('shop::orders.buy-cart-description', ['id' => $Order->id]);

        // fire event
        event(new OrderCart($Order, $OrderItems, $price, $description));

        // make the charge
        $StripeService = new StripeService();
        $PaymentIntent = $StripeService->charge($description, $price, $stripe_id, $currency);

        // update the order state
        $Order->update(['state' => config('voyager-shop.order_states.billed')]);

        // return the payment intent
        return $PaymentIntent;
    }

    /**
     * Method to order a single product.
     *
     * @param  int         $product_variant_id
     * @param  string|null $stripe_id
     * @param  string      $currency
     *
     * @return \Stripe\PaymentIntent
     */
    private function orderProduct(int $product_variant_id, string $stripe_id = null, string $currency = null): PaymentIntent
    {
        // get the product variant by id
        $ProductVariant = ProductVariant::findOrFail($product_variant_id);

        // get the price from the product variant
        $price = $ProductVariant->priceRaw;

        // create charge description
        $description = trans('shop::orders.service.buy-product-description', ['product' => $ProductVariant->name]);

        // fire event
        event(new OrderProduct($Order, $OrderItems, $price, $description));

        // make the charge
        $StripeService = new StripeService();
        $PaymentIntent = $StripeService->charge($description, $price, $stripe_id, $currency);

        // update the order state
        $Order->update(['state' => config('voyager-shop.order_states.billed')]);

        // return the payment intent
        return $PaymentIntent;
    }

    /**
     * Set Billing Address on Order.
     *
     * @param \Tjventurini\VoyagerShop\Models\Order $Order
     * @param array $billing_address
     */
    public function setBillingAddress(Order $Order, array $billing_address): Order
    {
        // fire event
        event(new SetBillingAddress($billing_address));
        
        // get address service
        $AddressService = new AddressService();

        // update or create the billing address
        $BillingAddress = $AddressService->updateOrCreate($billing_address);

        // set the billing address on the order
        $Order->update([
            config('voyager-shop.foreign_keys.billingAddress') => $BillingAddress->id
        ]);

        // return the updated order
        return $Order->load(['billingAddress']);
    }

    /**
     * Set Shipping Address on Order.
     *
     * @param \Tjventurini\VoyagerShop\Models\Order $Order
     * @param array $shipping_address
     */
    public function setShippingAddress(Order $Order, array $shipping_address): Order
    {
        // fire event
        event(new SetShippingAddress($shipping_address));

        // get address service
        $AddressService = new AddressService();

        // update or create the shipping address
        $ShippingAddress = $AddressService->updateOrCreate($shipping_address);

        // set the shipping address on the order
        $Order->update([config('voyager-shop.foreign_keys.shippingAddress') => $ShippingAddress->id]);

        // return the updated order
        return $Order->load(['shippingAddress']);
    }
}
