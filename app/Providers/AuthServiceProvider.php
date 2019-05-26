<?php

namespace App\Providers;

use App\Models\Rfp;
use App\Models\UserTrip;
use App\Policies\RfpPolicy;
use App\Policies\UserTripPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Rfp::class => RfpPolicy::class,
        UserTrip::class => UserTripPolicy::class,
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
