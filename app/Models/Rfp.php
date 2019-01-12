<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rfp extends Model
{
    public function user(){
    	return $this->belongsTo(Models\Core\Users::class);
    }

    // One To Many Relation with Trips
    public function trip(){
    	return $this->belongsTo(Models\Rfp::class);
    }

}
