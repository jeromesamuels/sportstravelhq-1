<?php

namespace App\Providers;

use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\Rfp;
use App\Observers\OrganizationObservable;
use App\Observers\OrganizationUserObservable;
use App\Observers\RfpObservable;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Organization::observe(OrganizationObservable::class);
        OrganizationUser::observe(OrganizationUserObservable::class);
        Rfp::observe(RfpObservable::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
