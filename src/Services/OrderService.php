<?php

namespace Tjventurini\VoyagerShop\Services;

use App\User;
use Stripe\PaymentIntent;
use Illuminate\Support\Collection;
use Tjventurini\VoyagerShop\Models\Order;
use Tjventurini\VoyagerShop\Models\OrderItem;
use Tjventurini\VoyagerShop\Models\ProductVariant;

class OrderService
{
    /**
     * Method to create an empty order with the state of cart.
     *
     * @return \Tjventurini\VoyagerShop\Models\Order
     */
    public function createCart(): Order
    {
        return Order::create();
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
        // check if product variant is already in cart
        $OrderItem = $Order->orderItems()
            ->where(config('voyager-shop.foreign_keys.productVariant'), $ProductVariant->id)
            ->first();
        if (!is_null($OrderItem)) {
            $quantity = $OrderItem->quantity;
            $OrderItem->update([
                'quantity' => $quantity + 1
            ]);
            return $Order;
        }

        // create order item if product variant is not already in cart
        $Order->orderItems()->create([
            config('voyager-shop.foreign_keys.productVariant') => $ProductVariant->id
        ]);

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
        $Order->orderItems()
            ->where(config('voyager-shop.foreign_keys.productVariant'), $ProductVariant->id)
            ->delete();

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
        $OrderItem = $Order->orderItems()
            ->where(config('voyager-shop.foreign_keys.productVariant'), $ProductVariant->id)
            ->firstOrFail();

        $OrderItem->update($data);

        return $Order;
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
}
