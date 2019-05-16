<?php namespace App\Models;

use App\Models\Core\Users;

/**
 * @property int entry_by
 */
class UserTrip extends Sximo
{
    //-- This table does not have created_at and updated_at
    public $timestamps = false;
    public $table = 'user_trips';
    protected $primaryKey = 'id';

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
    ];

    // One To Many Relation With Users Table
    public function tripuser()
    {
        return $this->belongsTo(Users::class, "entry_by");
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
