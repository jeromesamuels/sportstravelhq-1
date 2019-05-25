<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Roomlisting extends Model
{
    public function travelCordinator(){
    	return $this->belongsTo(User::class,'cordinator_id');
    }
}
