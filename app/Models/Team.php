<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * @package App\Models
 *
 * @property int id
 * @property string team_name
 * @property string age_group
 * @property string gender
 * @property \Carbon\Carbon updated_at
 * @property \Carbon\Carbon created_at
 */
class Team extends Model
{
    // Many To Many Relation With Amenities
	public function team(){
		return $this->belongsToMany(team::class,'team_name','age_group','gender');
	}
}
