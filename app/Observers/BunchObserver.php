<?php

namespace App\Observers;

use App\models\bunch\Bunch;
use Illuminate\Support\Facades\Auth;

class BunchObserver
{
    /**
     * before save into DB
     *
     * @param Bunch $bunch
     * @return void
     */
    public function creating(Bunch $bunch)
    {
        /** @var Bunch $bunch */
        $bunch->user_id = Auth::user()->id;
    }
}