<?php

namespace Tjventurini\VoyagerShop\Models;

use Tjventurini\VoyagerProjects\Models\Project as BaseModel;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyCards;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyTaxes;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyOrders;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyProducts;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyAddresses;
use Tjventurini\VoyagerShop\Traits\Relationships\HasManyCurrencies;

class Project extends BaseModel
{
    use HasManyProducts, HasManyAddresses, HasManyOrders, HasManyCards, HasManyCurrencies, HasManyTaxes;
}
