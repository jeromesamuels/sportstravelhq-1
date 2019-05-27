<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelAgreement
 *
 * @property int id
 * @property int user_trip_id
 * @property int travel_coordinator_id
 * @property int hotel_manager_id
 * @property int hotel_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string phone
 * @property string address
 * @property string address2
 * @property string city
 * @property string state
 * @property string zipcode
 * @property string signature
 * @property string signature_date
 * @property string signature_type
 * @property string is_authorized
 * @property string is_billing_authorized
 * @property string hotel_signature
 * @property string hotel_signature_date
 * @property string hotel_signature_type
 * @property string hotel_first_name
 * @property string hotel_last_name
 * @property string hotel_title
 * @property string rewards_number
 * @property string rewards_provider
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 * @property int rfp_id
 * @property \App\Models\UserTrip trip
 * @property \App\Models\Rfp rfp
 * @property \App\Models\Hotel hotel
 * @property \App\User hotelManager
 * @property \App\User coordinator
 *
 * @package App\Models
 */
class HotelAgreement extends Model
{

    /**
     * Get the trip linked to this agreement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(UserTrip::class);
    }

    /**
     * Get the request for proposal linked to this agreement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rfp()
    {
        return $this->belongsTo(Rfp::class);
    }

    /**
     * Get the hotel linked to this agreement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the hotel manager linked to this agreement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotelManager()
    {
        return $this->belongsTo(User::class, 'hotel_manager_id');
    }

    /**
     * Get the client linked to this agreement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coordinator()
    {
        return $this->belongsTo(User::class, 'travel_coordinator_id');
    }

}
