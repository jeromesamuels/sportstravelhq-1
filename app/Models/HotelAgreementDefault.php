<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelAgreementDefault
 * php version 7.1
 *
 * @category App\Models
 * @package  App\Library
 * @author   Joseph Montanez <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 *
 * @property int id
 * @property string user_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string phone
 * @property string address
 * @property string address2
 * @property string city
 * @property string state
 * @property string zipcode
 * @property string title
 * @property string signature_type
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 */
class HotelAgreementDefault extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];


    /**
     * Gets the user that the defaults belong to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
