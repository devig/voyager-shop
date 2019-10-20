<?php

namespace Tjventurini\VoyagerShop\Models;

use Illuminate\Database\Eloquent\Model;
use Tjventurini\VoyagerTags\Models\Tag as BaseModel;
use Tjventurini\VoyagerShop\Traits\GetRelationshipKey;
use Tjventurini\VoyagerShop\Traits\Relationships\BelongsToProject;

class Tag extends BaseModel
{
    use GetRelationshipKey, BelongsToProject;
}
