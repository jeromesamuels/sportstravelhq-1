<?php

namespace App\Models;

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
 *
 * @package App\Models
 */
class HotelAgreement extends Model
{
    //
}
