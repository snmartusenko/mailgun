<?php

namespace App\Policies;

use App\models\user\User;
use App\models\campaign\Campaign;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampaignPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the campaign.
     *
     * @param  User  $user
     * @param  Campaign  $campaign
     * @return mixed
     */
    public function view(User $user, Campaign $campaign)
    {
        return $user->id === $campaign->user_id;
    }

    /**
     * Determine whether the user can create campaigns.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the campaign.
     *
     * @param  User  $user
     * @param  Campaign  $campaign
     * @return mixed
     */
    public function update(User $user, Campaign $campaign)
    {
        return $user->id === $campaign->user_id;
    }

    /**
     * Determine whether the user can delete the campaign.
     *
     * @param  User  $user
     * @param  Campaign  $campaign
     * @return mixed
     */
    public function delete(User $user, Campaign $campaign)
    {
        return $user->id === $campaign->user_id;
    }
}
