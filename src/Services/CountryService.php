<?php

/*
|--------------------------------------------------------------------------
| Country Service
|--------------------------------------------------------------------------
|
| Service to handle operations regarding the countries.
|
*/

namespace Tjventurini\VoyagerShop\Services;

use Tjventurini\VoyagerShop\Models\Country;

class CountryService
{
    /**
     * Method to get a country by it's country code.
     *
     * @param  string $code
     *
     * @return \Tjventurini\VoyagerShop\Models\Country
     */
    public function getCountryByCode(string $code): Country
    {
        return Country::where('code', $code)->firstOrFail();
    }
}
