<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToCountry;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Address extends Model
{
    use SoftDeletes, BelongsToProject, BelongsToUser, BelongsToCountry;
    
    protected $guarded = ['id'];
}
