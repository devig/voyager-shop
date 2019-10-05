<?php

namespace Tjventurini\VoyagerShop\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Tjventurini\VoyagerShop\Models\Card;
use Tjventurini\VoyagerShop\Models\Project;
use Tjventurini\VoyagerProjects\Services\ProjectService;

class CardService
{
    /**
     * Method to save cards to the given user.
     *
     * @param string $string_id
     * @param string $brand
     * @param string $last_four
     * @param ?string $name
     *
     * @return \Tjventurini\VoyagerShop\Models\Card
     */
    public function saveCard(string $stripe_id, string $brand, string $last_four, $name = null): Card
    {
        $User = Auth::user();

        // get current project
        $ProjectService = new ProjectService();
        $Project = $ProjectService->getCurrentProject();

        if (!$name) {
            $name = $User->name . ' ' . $brand;
        }

        return $User->cards()->updateOrCreate([
            'stripe_id' => $stripe_id
        ], [
            'name' => $name,
            'brand' => $brand,
            'last_four' => $last_four,
            'project_id' => $Project->id,
        ]);
    }

    /**
     * Method to get all cards of the given user.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getUserCards(): Collection
    {
        return Auth::user()->cards;
    }

    /**
     * Remove the given payment method.
     *
     * @param  string    $stripe_id
     *
     * @return \Illuminate\Support\Collection
     */
    public function removePaymentMethod(string $stripe_id): Collection
    {
        $User = Auth::user();

        $User->cards()
            ->where('stripe_id', $stripe_id)
            ->firstOrFail()
            ->delete();

        return $User->cards;
    }
}
