<?php

namespace App\models\template;

use App\Scopes\OwnedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Selectable;

class Template extends Model
{
    use SoftDeletes;
    use Selectable;

    protected $fillable = ['name', 'content'];

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
