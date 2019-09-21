<?php

namespace Tjventurini\VoyagerShop\Services;

class StripeService
{
    private $key;
    private $secret;

    public function __construct(): void
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
     * @return array
     */
    public function savePaymentMethod(string $stripe_id, string $brand, string $last_four, $name = null): array
    {
        $User = Auth::user();

        $project_token = request()->headers->get('project_token', false);
        $Project = Project::where('token', $project_token)->firstOrFail();

        return $User->cards->create([
            'stripe_id' => $stripe_id,
            'name' => $name,
            'brand' => $brand,
            'last_four' => $last_four,
            'project_id' => $Project_id,
        ]);
    }
}
