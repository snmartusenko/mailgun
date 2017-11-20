<?php

namespace App\Mail;

use App\models\campaign\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendCampaign
 * @package App\Mail
 */
class SendCampaign extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('view.name');
    }

    public function execute(Campaign $campaign)
    {
        $receivers = $campaign->bunch->subscribers;
//        var_dump($receivers); die();

        foreach ($receivers as $receiver) {
            Mail::raw('Sending emails with Mailgun and Laravel is easy!', function ($message) use ($campaign, $receiver) {
                $message->subject($campaign->name . ' (' . $campaign->description . ')');
                $message->to($receiver->email);
            });
        }
    }
}
