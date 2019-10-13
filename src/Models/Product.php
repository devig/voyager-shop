<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToTax;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerTags\Traits\Relationships\BelongsToManyTags;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyProductVariants;

class Product extends Model
{
    use BelongsToProject,
        BelongsToTax,
        HasManyProductVariants,
        BelongsToManyTags;
    
    protected $guarded = ['id'];
}
