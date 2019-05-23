<?php

namespace App;

use App\Models\Core\Groups;
use App\Models\HotelAgreementDefault;
use App\Models\Organization;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int id
 * @property HotelAgreementDefault|null hotelAgreementDefault
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_users';
     
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Fetches the user's hotel agreement defaults
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hotelAgreementDefault()
    {
        return $this->hasOne(HotelAgreementDefault::class);
    }

    /**
     * Support for multiple organizations per user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    /**
     * Support for a single organization for a user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Get the group of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id', 'group_id');
    }

}
