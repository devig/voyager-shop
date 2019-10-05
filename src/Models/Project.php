<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerShop\Traits\Relationships\HasProducts;
use Tjventurini\VoyagerProjects\Models\Project as BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyAddresses;

class Project extends BaseModel
{
    use HasProducts, HasManyAddresses;
}
