<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Models\BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToCountry;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Currency extends BaseModel
{
    use BelongsToProject, BelongsToCountry;

    protected $guarded = ['id'];
}
