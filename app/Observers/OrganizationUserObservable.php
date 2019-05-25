<?php

namespace App\Observers;

use App\Models\Organization;
use App\Models\OrganizationUser;

class OrganizationUserObservable
{
    /**
     * Handle the organization user "created" event.
     *
     * @param  \App\Models\OrganizationUser  $organizationUser
     * @return void
     */
    public function created(OrganizationUser $organizationUser)
    {
        // Go to user record and cache org id plus name
        $user = $organizationUser->user;
        $organization = $organizationUser->organization;
        $user->organization_id = $organization->id;
        $user->o_name = $organization->name;
        $user->save();
    }

    /**
     * Handle the organization user "updated" event.
     *
     * @param  \App\Models\OrganizationUser  $organizationUser
     * @return void
     */
    public function updated(OrganizationUser $organizationUser)
    {
    }

    /**
     * Handle the organization user "deleted" event.
     *
     * @param  \App\Models\OrganizationUser  $organizationUser
     * @return void
     */
    public function deleted(OrganizationUser $organizationUser)
    {
        //
    }

    /**
     * Handle the organization user "restored" event.
     *
     * @param  \App\Models\OrganizationUser  $organizationUser
     * @return void
     */
    public function restored(OrganizationUser $organizationUser)
    {
        //
    }

    /**
     * Handle the organization user "force deleted" event.
     *
     * @param  \App\Models\OrganizationUser  $organizationUser
     * @return void
     */
    public function forceDeleted(OrganizationUser $organizationUser)
    {
        //
    }
}
