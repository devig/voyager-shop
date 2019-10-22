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

    /*
    |--------------------------------------------------------------------------
    | Accessors and Mutators
    |--------------------------------------------------------------------------
    |
    | In this section you will find the accessors and mutators of this model.
    | Feel free to overwrite them as needed.
    |
    */
    
    /**
     * Method to to set includes_tax attribute.
     *
     * @param mixed $value
     */
    public function setIncludesTaxAttribute($value): self
    {
        // voyager sends strings "on" and "off" so
        //   we need to handle that
        if (is_string($value)) {
            $this->attributes['includes_tax'] = ($value === 'on');
            return $this;
        }

        // otherwise we will treat the value as boolean
        $this->attributes['includes_tax'] = ($value === true || $value === 1);
        return $this;
    }
}
