<?php

namespace App\Models;

use App\Models\Core\Users;
use Illuminate\Database\Eloquent\Model;

class Rfp extends Model
{
    /**
     * Constants for RFP status to make it easy to read a status
     */
    const STATUS_PENDING = 1;
    const STATUS_VIEWED = 2;
    const STATUS_BID_SENT = 3;
    const STATUS_REVIEW = 4;
    const STATUS_BID_SELECTED = 5;
    const STATUS_AGREEMENT_CLIENT = 6;
    const STATUS_AGREEMENT_HOTEL = 7;
    const STATUS_ROOMING_LIST = 8;
    const STATUS_BILLING_RECEIPT = 9;

    /**
     * A text friendly version of the RFP statuses
     *
     * @var array
     */
    const STATUSES = [
        'Bids Pending'          => self::STATUS_PENDING,
        'Corporate Viewed'      => self::STATUS_VIEWED,
        'Bids Sent'             => self::STATUS_BID_SENT,
        'Bids Under Review'     => self::STATUS_REVIEW,
        'Bid Selected'          => self::STATUS_BID_SELECTED,
        'Client Agreement'      => self::STATUS_AGREEMENT_CLIENT,
        'Hotel Agreement'       => self::STATUS_AGREEMENT_HOTEL,
        'Hotel Billing Receipt' => self::STATUS_BILLING_RECEIPT,
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
      public function userInfo(){
    	return $this->belongsTo('App\Models\Core\Users','user_id');
    }
    // One To Many Relation with Trips
    public function trip()
    {
        return $this->belongsTo(usertrip::class, 'user_trip_id');
    }

}
