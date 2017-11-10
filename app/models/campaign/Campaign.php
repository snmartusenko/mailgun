<?php

namespace App\models\campaign;

use App\Scopes\OwnedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

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

    public function send()
    {
        Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
        {
            $message->subject($this->name.' ('. $this->description .')');
            $message->to('snmartusenko@gmail.com');
        });
    }
}
