<?php

namespace App\models\bunch;

use App\models\subscriber\Subscriber;
use App\models\subscriber\SubscriberBunch;
use App\Scopes\OwnedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Selectable;

class Bunch extends Model
{
    use SoftDeletes;
    use Selectable;

    protected $fillable = ['name', 'description'];

    /**
     * "Загружающий" метод модели.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OwnedScope());
    }

    public function subscribers(){
        return $this->belongsToMany('App\models\subscriber\Subscriber', 'subscriber_bunches');
    }

    /**
     * @param Subscriber $subscriber
     * @return bool
     */
    public function addSubscriber(Subscriber $subscriber)
    {
        /** @var SubscriberBunch $model */
        $model = SubscriberBunch::where('bunch_id', '=', $this->id, 'and')
            ->where('subscriber_id', $subscriber->id)
            ->first();

        if(!$model){
            $model = new SubscriberBunch();
        }

        $model->bunch_id = $this->id;
        $model->subscriber_id = $subscriber->id;

        return ($model->save()) ? true: false;
    }
}
