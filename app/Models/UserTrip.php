<?php namespace App\Models;

use App\User;

/**
 * @property int       entry_by
 * @property int       id
 * @property \App\User tripuser
 * @property int       status
 */
class UserTrip extends Sximo
{
  
  
    public $timestamps = false;
    public $table = 'user_trips';
    protected $primaryKey = 'id';
     /**
     * A text friendly version of the RFP statuses
     *
     * @var array
     */
       /**
     * Constants for RFP status to make it easy to read a status
     */
    const STATUS_VIEWED = 6;

    const STATUSES = [
       'Corporate Viewed'      => UserTrip::STATUS_VIEWED,
    ];

    //-- This table does not have created_at and updated_at
    protected $fillable = [
        'entry_by',
        'trip_name',
        'from_address_1',
        'from_city',
        'from_state_id',
        'from_zip',
        'to_address_1',
        'to_city',
        'to_state_id',
        'to_zip',
        'check_in',
        'check_out',
        'budget_from',
        'budget_to',
        'double_queen_qty',
        'double_king_qty',
        'amenity_ids',
        'comment',
        'added',
        'status',
        'invoice_status',
        'service_type',
    ];

    // One To Many Relation With Users Table
    public function tripuser()
    {
        return $this->belongsTo(User::class, "entry_by");
    }


    // Many To Many Relation with Hotal Amenties
    public function amenities()
    {
        return $this->belongsToMany(HotelAmenities::class, 'trip_amenities', 'trip_id', 'amenity_id');
    }

    // One To Many Relation with RFPS
    public function rfps()
    {
        return $this->hasMany(Rfp::class, 'user_trip_id');
    }


    /**
     * Get the trips accepted RFP
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function acceptedRfp()
    {
        return $this->hasOne(Rfp::class, 'user_trip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function status_logs()
    {
        return $this->hasMany(TripstatusLogs::class, 'user_id');
    }

    public static function querySelect()
    {

        return "  SELECT user_trips.* FROM user_trips  ";
    }

    public static function queryWhere()
    {

        return "  WHERE user_trips.id IS NOT NULL ";
    }

    public static function queryGroup()
    {
        return "  ";
    }

    public static function getRFPCounts()
    {
        return \DB::select('SELECT `user_trip_id` id, COUNT(id) total FROM rfps GROUP BY `user_trip_id` ');
    }

}
