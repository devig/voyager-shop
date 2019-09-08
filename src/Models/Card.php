<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\BelongsToProject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use BelongsToProject, BelongsToUser;

    protected $guarded = ['id'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all relationships of this model.
    |
    */
}
