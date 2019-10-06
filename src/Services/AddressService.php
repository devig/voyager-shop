<?php

/*
|--------------------------------------------------------------------------
| AddressService
|--------------------------------------------------------------------------
|
| Service to handle all sorts of operations on the address.
|
*/

namespace Tjventurini\VoyagerShop\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tjventurini\VoyagerShop\Models\Address;
use Tjventurini\VoyagerProjects\Services\ProjectService;

class AddressService
{
    /**
     * Validate a given address.
     *
     * @param  array  $address
     *
     * @return bool
     */
    public function validate(array $address): bool
    {
        $validator = Validator::make($address, [
            'id' => 'sometimes|exists:addresses,id',
            'name' => 'required|string|min:3',
            'street' => 'required|string|min:3',
            'zip' => 'required|string|min:4',
            'country' => 'required|string|size:2|exists:countries,code',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * Update or create an address.
     *
     * @param  array  $address
     *
     * @return \Tjventurini\VoyagerShop\Models\Address
     */
    public function updateOrCreate(array $address): Address
    {
        // validate address
        if (!$this->validate($address)) {
            throw new \Exception("Address Validation Orror", 1);
        }

        // get current user
        $User = Auth::user();

        // get current project
        $ProjectService = new ProjectService();
        $Project = $ProjectService->getCurrentProject();

        // get country
        $CountryService = new CountryService();
        $Country = $CountryService->getCountryByCode($address['country']);

        // update address if we have an id
        if (isset($address['id'])) {
            $Address = Address::findOrFail($address['id']);
            $Address->update([
                'name' => $address['name'],
                'street' => $address['street'],
                'zip' => $address['zip'],
                config('voyager-shop.foreign_keys.country') => $Country->id,
                config('voyager-shop.foreign_keys.user') => $User->id,
                config('voyager-shop.foreign_keys.project') => $Project->id,
            ]);
            return $Address;
        }

        // create address
        return Address::create([
            'name' => $address['name'],
            'street' => $address['street'],
            'zip' => $address['zip'],
            config('voyager-shop.foreign_keys.country') => $Country->id,
            config('voyager-shop.foreign_keys.user') => $User->id,
            config('voyager-shop.foreign_keys.project') => $Project->id,
        ]);
    }

    /**
     * Method to delete an address from the user profile.
     * @param  int    $id
     * @return \Illuminate\Support\Collection
     */
    public function deleteAddress(int $id): Collection
    {
        // get the user
        $User = Auth::user();

        // throw error when user is not authenticated
        if (!$User) {
            throw new \Exception("Unauthenticated.", 1);
        }

        // delete address
        $User->addresses()->findOrFail($id)->delete();

        // return the current list of addresses
        return $User->addresses;
    }
}
