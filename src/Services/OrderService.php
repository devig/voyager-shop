<?php

namespace Tjventurini\VoyagerShop\Services;

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
     * Method to add a product variant to the order.
     *
     * @param \Tjventurini\VoyagerShop\Models\Order          $Order
     * @param \Tjventurini\VoyagerShop\Models\ProductVariant $ProductVariant
     */
    public function addToCart(Order $Order, ProductVariant $ProductVariant): Order
    {
        $Order->orderItems()->create([
            'product_variant_id' => $ProductVariant->id
        ]);

        return $Order;
    }
}
