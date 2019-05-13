<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rfp extends Model
{
    public function user(){
    	return $this->belongsTo(Models\Core\Users::class);
    }
      public function userInfo(){
    	return $this->belongsTo('App\Models\Core\Users','user_id');
    }
    // One To Many Relation with Trips
    public function trip(){
    	return $this->belongsTo(Models\Rfp::class);
    }

    public function usertripInfo(){
        return $this->belongsTo('App\Models\usertrips','user_trip_id');
    }
}
