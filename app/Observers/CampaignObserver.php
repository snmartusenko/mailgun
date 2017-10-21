<?php

namespace App\Observers;

use App\models\campaign\Campaign;
use Illuminate\Support\Facades\Auth;

class CampaignObserver
{
    /**
     * before save into DB
     *
     * @param Campaign $model
     * @return void
     */
    public function creating(Campaign $model)
    {
        /** @var Campaign $model */
        $model->user_id = Auth::user()->id;
    }
}