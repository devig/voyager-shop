<?php

namespace Tjventurini\VoyagerShop\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Tjventurini\VoyagerShop\Models\Order;
use Tjventurini\VoyagerShop\Models\ProductVariant;
use Tjventurini\VoyagerShop\Services\OrderService;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AddToCart
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $Order = Order::where('token', $args['token'])->firstOrFail();

        $ProductVariant = ProductVariant::findOrFail($args['item']);

        $OrderService = new OrderService();
        return $OrderService->addToCart($Order, $ProductVariant, $args['quantity'] ?? 1);
    }
}
