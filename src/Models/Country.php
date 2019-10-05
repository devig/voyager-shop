<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Models\BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyTaxes;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyAddresses;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyCurrencies;

class Country extends BaseModel
{
    use BelongsToProject, HasManyAddresses, HasManyTaxes, HasManyCurrencies;
    
    protected $guarded = ['id'];
}
