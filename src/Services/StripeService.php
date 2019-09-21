<?php

namespace Tjventurini\VoyagerShop\Services;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Tjventurini\VoyagerShop\Models\Card;
use Tjventurini\VoyagerShop\Services\CardService;

class StripeService
{
    private $key;
    private $secret;
    private $user;

    public function __construct()
    {
        $this->key = config('services.stripe.key');
        $this->secret = config('services.stripe.secret');
        $this->user = Auth::user();
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
        // save the card to database
        $CardService = new CardService();
        $Card = $CardService->saveCard($stripe_id, $brand, $last_four, $name);

        // create user as stripe user
        $this->user->createOrGetStripeCustomer();

        // save payment method to stripe
        $this->user->updateDefaultPaymentMethod($stripe_id);

        // return card
        return $Card;
    }

    /**
     * Remove given payment method from user.
     *
     * @param  string    $stripe_id
     *
     * @return \Illuminate\Support\Collection
     */
    public function removePaymentMethod(string $stripe_id): Collection
    {
        $CardService = new CardService();
        $Cards = $CardService->removePaymentMethod($stripe_id);

        // delete payment method from stripe
        $this->user->removePaymentMethod($stripe_id);

        // return cards
        return $Cards;
    }
}
