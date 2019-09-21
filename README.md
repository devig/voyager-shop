# Voyager Shop

This package provides a graphql shop that can be managed through the [voyager admin panel](https://laravelvoyager.com/).

# Installation

Just run the following command.

```bash
php artisan voyager-shop:install
```

Update the used traits on the `User` Model.

```php
<?php

namespace App;

use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Tjventurini\VoyagerShop\Traits\HasOrders;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, Notifiable, HasOrders, Billable;

    ...
```

Add stripe keys to the `.env` file.

```
STRIPE_KEY=your-public-key
STRIPE_SECRET=your-secret-key
```

If you don't use USD as your default currency you should add set the your default currency in the `.env` file.

```
CASHIER_CURRENCY=eur
```

For more information about the Payment Implementation check out the [Laravel Cashier Documentation](https://laravel.com/docs/billing).

