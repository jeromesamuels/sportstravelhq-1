<?php

namespace App\Policies;

use App\User;
use App\Models\HotelAgreementDefault;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelAgreementDefaultPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the hotel agreement default.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HotelAgreementDefault  $hotelAgreementDefault
     * @return mixed
     */
    public function view(User $user, HotelAgreementDefault $hotelAgreementDefault)
    {
        //
    }

    /**
     * Determine whether the user can create hotel agreement defaults.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the hotel agreement default.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HotelAgreementDefault  $hotelAgreementDefault
     * @return mixed
     */
    public function update(User $user, HotelAgreementDefault $hotelAgreementDefault)
    {
        //
    }

    /**
     * Determine whether the user can delete the hotel agreement default.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HotelAgreementDefault  $hotelAgreementDefault
     * @return mixed
     */
    public function delete(User $user, HotelAgreementDefault $hotelAgreementDefault)
    {
        //
    }

    /**
     * Determine whether the user can restore the hotel agreement default.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HotelAgreementDefault  $hotelAgreementDefault
     * @return mixed
     */
    public function restore(User $user, HotelAgreementDefault $hotelAgreementDefault)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the hotel agreement default.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HotelAgreementDefault  $hotelAgreementDefault
     * @return mixed
     */
    public function forceDelete(User $user, HotelAgreementDefault $hotelAgreementDefault)
    {
        //
    }
}
