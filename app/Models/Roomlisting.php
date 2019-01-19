<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomlisting extends Model
{
    public function travelCordinator(){
    	return $this->belongsTo(Core\Users::class,'cordinator_id');
    }
}
