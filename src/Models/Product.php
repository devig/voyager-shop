<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Models\BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToTax;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyProductVariants;

class Product extends BaseModel
{
    use BelongsToProject, BelongsToTax, HasManyProductVariants;
    
    protected $guarded = ['id'];
}
