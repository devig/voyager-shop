<?php

/*
|--------------------------------------------------------------------------
| Voyager Shop Configuration
|--------------------------------------------------------------------------
|
| In this configuration file you will find all options for this package.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all options regarding the relationshps of
    | this package.
    |
    */
    
    'tables' => [],

    'models' => [
        'user' => \App\User::class,
        'project' => \Tjventurini\VoyagerProjects\Models\Project::class,
        'country' => \Tjventurini\VoyagerShop\Models\Country::class,
        'tax' => \Tjventurini\VoyagerShop\Models\Tax::class,
    ],

    'foreign_keys' => [
        'user' => 'user_id',
        'project' => 'project_id',
        'country' => 'country_id',
        'tax' => 'tax_id',
    ],

];
