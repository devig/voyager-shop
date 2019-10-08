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

        // create default name
        if (!$name) {
            $name = $User->name . ' ' . $brand;
        }

        // update or create card model
        $Card = $User->cards()->updateOrCreate([
            'stripe_id' => $stripe_id
        ], [
            'name' => $name,
            'brand' => $brand,
            'last_four' => $last_four,
            'project_id' => $Project->id,
        ]);

        // fire event
        event(new SaveCard($Card));

        // return card
        return $Card;
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
     * Remove the delete card by stripe_id.
     *
     * @param  string    $stripe_id
     *
     * @return \Illuminate\Support\Collection
     */
    public function deleteCard(string $stripe_id): Collection
    {
        // get current user
        $User = Auth::user();

        // get ccard
        $Card = $User->cards()
            ->where('stripe_id', $stripe_id)
            ->firstOrFail();

        // fire event
        event(new DeleteCard($Card));

        // delete ccard
        $Card->delete();

        // return list of current cards
        return $User->cards;
    }
}
