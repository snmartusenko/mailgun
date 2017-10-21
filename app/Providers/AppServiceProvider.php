<?php

namespace App\Providers;

use App\models\template\Template;
use App\models\bunch\Bunch;
use App\models\campaign\Campaign;
use App\Observers\TemplateObserver;
use App\Observers\BunchObserver;
use App\Observers\CampaignObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //register observers
        Template::observe(TemplateObserver::class);
        Bunch::observe(BunchObserver::class);
        Campaign::observe(CampaignObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
