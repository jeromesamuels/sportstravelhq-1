<?php

namespace App;

use App\Models\HotelAgreementDefault;
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

}
