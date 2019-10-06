<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyTaxes;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyAddresses;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyCurrencies;

class Country extends Model
{
    use BelongsToProject, HasManyAddresses, HasManyTaxes, HasManyCurrencies;
    
    protected $guarded = ['id'];
}
