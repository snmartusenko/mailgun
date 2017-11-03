<?php

namespace App\Policies;

use App\models\user\User;
use App\models\bunch\Bunch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BunchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the bunch.
     *
     * @param  User  $user
     * @param  Bunch  $bunch
     * @return mixed
     */
    public function view(User $user, Bunch $bunch)
    {
        return $user->id === $bunch->user_id;
    }

    /**
     * Determine whether the user can create bunches.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the bunch.
     *
     * @param  User  $user
     * @param  Bunch  $bunch
     * @return mixed
     */
    public function update(User $user, Bunch $bunch)
    {
        return $user->id === $bunch->user_id;
    }

    /**
     * Determine whether the user can delete the bunch.
     *
     * @param  User  $user
     * @param  Bunch  $bunch
     * @return mixed
     */
    public function delete(User $user, Bunch $bunch)
    {
        return $user->id === $bunch->user_id;
    }
}
