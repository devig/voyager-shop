<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Models\BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToUser;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Card extends BaseModel
{
    use BelongsToProject, BelongsToUser;

    protected $guarded = ['id'];
}
