<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Traits\HasProducts;
use Tjventurini\VoyagerShop\Traits\HasManyAddresses;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Tjventurini\VoyagerProjects\Models\Project as BaseModel;

class Project extends BaseModel
{
    use HasProducts, HasManyAddresses;
}
