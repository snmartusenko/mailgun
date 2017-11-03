<?php

namespace App\Providers;

use App\models\template\Template;
use App\models\bunch\Bunch;
use App\models\subscriber\Subscriber;
use App\models\campaign\Campaign;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Policies\TemplatePolicy;
use App\Policies\BunchPolicy;
use App\Policies\SubscriberPolicy;
use App\Policies\CampaignPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
//    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
//    ];

    protected $policies = [
        Template::class => TemplatePolicy::class,
        Bunch::class => BunchPolicy::class,
        Subscriber::class => SubscriberPolicy::class,
        Campaign::class => CampaignPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
