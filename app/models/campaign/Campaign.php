<?php

namespace App\models\campaign;

use App\Mail\SendCampaign;
use App\models\bunch\Bunch;
use App\Scopes\OwnedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Campaign
 * @package App\models\campaign
 *
 * @property Bunch $bunch
 */
class Campaign extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'template_id', 'bunch_id'];

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

    public function bunch()
    {
        return $this->belongsTo('App\models\bunch\Bunch');
    }

    public function send()
    {
        /** @var SendCampaign $model */
        $model = new SendCampaign();

        $result = $model->execute($this);

        return $result ? $result: false;
    }
}
