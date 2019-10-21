# Laravel Telescope

This package implements [Laravel Telescope](https://laravel.com/docs/telescope). Per default it will overwrite the `TelescopeServiceProvider` of telescope. 

## Authentication

We update the authentication logic so only users with a `role_id` of 1 can see the telescope dashboard. We did so by clearing out the `gate` method on the `TelescopeServiceProvider` and introducing a custom `UserPolicy` that is published under the `App\Policies` namespace. The `UserPolicy` has a method for the `viewTelescope` permission.

```php
<?php

namespace App\Policies;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Access\HandlesAuthorization;
use \TCG\Voyager\Policies\UserPolicy as BasePolicy;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Replaces gate method of TelescopeServiceProvider.
     *
     * @param  \App\User   $user
     *
     * @return bool
     */
    public function viewTelescope(User $User)
    {
        return ($User->role_id == 1);
    }
}
```

If you already have a `UserPolicy` under `app/Policies` in your project, you should add the `viewTelescope` method to your policy and avoid using the `--force` flag on the `voyager-shop:install` command.