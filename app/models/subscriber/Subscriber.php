<?php

namespace App\models\subscriber;

use App\models\bunch\Bunch;
use App\Scopes\OwnedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $fillable = ['firstname', 'lastname', 'email'];

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

}
