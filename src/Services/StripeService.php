<?php

namespace Tjventurini\VoyagerShop\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Tjventurini\VoyagerShop\Models\Card;
use Tjventurini\VoyagerShop\Services\CardService;

class StripeService
{
    private $key;
    private $secret;

    public function __construct()
    {
        $this->key = config('services.stripe.key');
        $this->secret = config('services.stripe.secret');
    }

    /**
     * Method to save a payment method to the current user.
     *
     * @param  string $stripe_id
     * @param  string $brand
     * @param  string $last_four
     *
     * @return \Tjventurini\VoyagerShop\Models\Card
     */
    public function savePaymentMethod(string $stripe_id, string $brand, string $last_four, $name = null): Card
    {
        $CardService = new CardService();
        return $CardService->saveCard($stripe_id, $brand, $last_four, $name);
    }

    /**
     * Remove given payment method from user.
     *
     * @param  int    $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function removePaymentMethod(int $id): Collection
    {
        $CardService = new CardService();
        return $CardService->removePaymentMethod($id);
    }
}
