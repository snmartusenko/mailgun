<?php

namespace App\Policies;

use App\models\user\User;
use App\models\template\Template;
use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the template.
     *
     * @param  User  $user
     * @param  Template  $template
     * @return mixed
     */
    public function view(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }

    /**
     * Determine whether the user can create templates.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the template.
     *
     * @param  User  $user
     * @param  Template  $template
     * @return mixed
     */
    public function update(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }

    /**
     * Determine whether the user can delete the template.
     *
     * @param  User  $user
     * @param  Template  $template
     * @return mixed
     */
    public function delete(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }
}
