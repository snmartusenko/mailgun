<?php

namespace App\Observers;

use App\models\subscriber\Subscriber;
use Illuminate\Support\Facades\Auth;

class SubscriberObserver
{
    /**
     * before save into DB
     *
     * @param Subscriber $subscriber
     * @return void
     */
    public function creating(Subscriber $subscriber)
    {
        /** @var Subscriber $subscriber */
        $subscriber->user_id = Auth::user()->id;
    }
}