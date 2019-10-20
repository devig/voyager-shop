<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Card extends Model
{
    use BelongsToProject, BelongsToUser;

    protected $guarded = ['id'];
}
