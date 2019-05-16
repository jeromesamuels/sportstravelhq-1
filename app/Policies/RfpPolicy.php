<?php

namespace App\Policies;

use App\Models\Rfp;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RfpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rfp.
     *
     * @param \App\User $user
     * @param \App\Models\\Rfp  $rfp
     *
     * @return mixed
     */
    public function view(User $user, Rfp $rfp)
    {
        //
    }

    /**
     * Determine whether the user can create rfps.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the rfp.
     *
     * @param \App\User $user
     * @param \App\Models\\Rfp  $rfp
     *
     * @return mixed
     */
    public function update(User $user, Rfp $rfp)
    {
        //
    }

    /**
     * Determine whether the user can delete the rfp.
     *
     * @param \App\User $user
     * @param \App\Models\\Rfp  $rfp
     *
     * @return mixed
     */
    public function delete(User $user, Rfp $rfp)
    {
        //
    }

    /**
     * Determine whether the user can restore the rfp.
     *
     * @param \App\User $user
     * @param \App\Models\\Rfp  $rfp
     *
     * @return mixed
     */
    public function restore(User $user, Rfp $rfp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the rfp.
     *
     * @param \App\User $user
     * @param \App\Models\\Rfp  $rfp
     *
     * @return mixed
     */
    public function forceDelete(User $user, Rfp $rfp)
    {
        //
    }

    /**
     * Determine of the user can accept this RFP
     *
     * @param \App\User       $user The user to test against
     * @param \App\Models\Rfp $rfp  The request for proposal bid to test
     *
     * @return bool
     */
    public function accept(User $user, Rfp $rfp)
    {
        return $rfp->trip->entry_by === $user->id;
    }
}
