<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Traits\HasProducts;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Tjventurini\VoyagerProjects\Models\Project as BaseModel;

class Project extends BaseModel
{
    use HasProducts;
}
