<?php

namespace App\Observers;

use App\models\template\Template;
use Illuminate\Support\Facades\Auth;

class TemplateObserver
{
    /**
     * before save into DB
     *
     * @param Template $template
     * @return void
     */
    public function creating(Template $template)
    {
        /** @var Template $template */
        $template->user_id = Auth::user()->id;
    }
}