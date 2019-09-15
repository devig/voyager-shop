<?php

namespace Tjventurini\VoyagerShop\Services;

use App\User;
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
     * @param  \App\User   $User
     *
     * @return Collection
     */
    public function getUserOrders(User $User): Collection
    {
        return $User->orders;
    }
}
