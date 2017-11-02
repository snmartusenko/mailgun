<?php

namespace App\models\subscriber;

use Illuminate\Database\Eloquent\Model;

class SubscriberBunch extends Model
{
    public $timestamps = false;

    protected $fillable = ['bunch_id', 'subscriber_id'];
}
