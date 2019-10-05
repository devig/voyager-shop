<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tjventurini\VoyagerShop\Traits\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\BelongsToCountry;
use Tjventurini\VoyagerShop\Traits\BelongsToProject;

class Address extends Model
{
    use SoftDeletes, BelongsToProject, BelongsToUser, BelongsToCountry;
    
    protected $guarded = ['id'];
}
