<?php

namespace App\Policies;

use App\models\user\User;
use App\models\subscriber\Subscriber;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the subscriber.
     *
     * @param  User  $user
     * @param  Subscriber  $subscriber
     * @return mixed
     */
    public function view(User $user, Subscriber $subscriber)
    {
        //
    }

    /**
     * Determine whether the user can create subscribers.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the subscriber.
     *
     * @param  User  $user
     * @param  Subscriber  $subscriber
     * @return mixed
     */
    public function update(User $user, Subscriber $subscriber)
    {
        //
    }

    /**
     * Determine whether the user can delete the subscriber.
     *
     * @param  User  $user
     * @param  Subscriber  $subscriber
     * @return mixed
     */
    public function delete(User $user, Subscriber $subscriber)
    {
        //
    }
}
