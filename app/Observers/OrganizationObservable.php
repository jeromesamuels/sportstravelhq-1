<?php

namespace App\Observers;

use App\Models\Organization;
use App\User;

class OrganizationObservable
{
    /**
     * Handle the organization "created" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function created(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "created" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function saved(Organization $organization)
    {
        //
    }
    /**
     * Handle the organization "created" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function saving(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "created" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function creating(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "updated" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function updated(Organization $organization)
    {
        // Update all coordinators cached org name
        $organization->users()->each(
            function (User $user) use ($organization) {
                $user->o_name = $organization->name;
                $user->save();
            }
        );
    }

    /**
     * Handle the organization "deleted" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function deleted(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "restored" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function restored(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "force deleted" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function forceDeleted(Organization $organization)
    {
        //
    }
}
