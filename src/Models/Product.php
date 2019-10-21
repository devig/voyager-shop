<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToTax;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToManyTags;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyProductVariants;

class Product extends Model
{
    use GetRelationshipKey,
        BelongsToProject,
        BelongsToTax,
        HasManyProductVariants,
        BelongsToManyTags;
    
    protected $guarded = ['id'];

    protected $with = ['productVariants'];
}
