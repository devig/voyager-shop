<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToOrder;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Payment extends Model
{
    use GetRelationshipKey, BelongsToUser, BelongsToProject, BelongsToOrder;

    protected $guarded = ['id'];
}
