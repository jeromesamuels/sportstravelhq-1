<?php

namespace App\Policies;

use App\User;
use App\Models\UserTrip;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserTripPolicy
{
    use HandlesAuthorization;

    /**
     * Before anything is called check to see if this is an admin
     *
     * @param \App\User $user The authorized user
     *
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->is_super_admin || $user->is_administrator) {
            //-- Admins can do EVERYTHING bypass all
            return true;
        }
    }

    /**
     * Determine whether the user can view the user trip.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserTrip  $userTrip
     * @return mixed
     */
    public function view(User $user, UserTrip $userTrip)
    {
        //
    }

    /**
     * Determine whether the user can create user trips.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_manager || $user->is_subcoordinator;
    }

    /**
     * Determine whether the user can update the user trip.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserTrip  $userTrip
     * @return mixed
     */
    public function update(User $user, UserTrip $userTrip)
    {
        //
    }

    /**
     * Determine whether the user can delete the user trip.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserTrip  $userTrip
     * @return mixed
     */
    public function delete(User $user, UserTrip $userTrip)
    {
        //
    }

    /**
     * Determine whether the user can restore the user trip.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserTrip  $userTrip
     * @return mixed
     */
    public function restore(User $user, UserTrip $userTrip)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the user trip.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserTrip  $userTrip
     * @return mixed
     */
    public function forceDelete(User $user, UserTrip $userTrip)
    {
        //
    }
}
