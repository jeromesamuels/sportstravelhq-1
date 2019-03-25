<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // Many To Many Relation With Amenities
	public function team(){
		return $this->belongsToMany(team::class,'team_name','age_group','gender');
	}
}
