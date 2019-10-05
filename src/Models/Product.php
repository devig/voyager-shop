<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToTax;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyProductVariants;

class Product extends Model
{
    use BelongsToProject, BelongsToTax, HasManyProductVariants;
    
    protected $guarded = ['id'];
}
