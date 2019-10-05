<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToCountry;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Address extends BaseModel
{
    use SoftDeletes, BelongsToProject, BelongsToUser, BelongsToCountry;
    
    protected $guarded = ['id'];
}
