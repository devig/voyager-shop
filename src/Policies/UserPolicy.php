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
