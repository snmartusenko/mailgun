<?php

namespace App\models\campaign;

use App\Mail\SendCampaign;
use App\models\bunch\Bunch;
use App\models\template\Template;
use App\Scopes\OwnedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

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

    public function template()
    {
        return $this->belongsTo('App\models\template\Template');
    }

    public function send()
    {
        $receivers = $this->bunch->subscribers;

        foreach ($receivers as $receiver)
        {
            Mail::send('email.campaign', ['campaign' => $this], function ($m) use ($receiver)
            {
                $m->to($receiver->email, $receiver->name)
                    ->subject($this->name . ' (' . $this->description . ')');
            });

//            Mail::to($receiver->email)
////                ->subject($this->name . ' (' . $this->description . ')')
//                ->send(new SendCampaign($this));
        }

        return true;
    }
}
