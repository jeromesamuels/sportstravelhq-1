<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AgreementForm extends Model
{
    public function cordinator(){
    	return $this->belongsTo(User::class,'coordinator_id');
    }

    public function hotelmanager(){
    	return $this->belongsTo(User::class,'reciever_id');
    }
    public function agreementRfp(){
    	return $this->belongsTo(Rfp::class,'for_rfp');
    }
}
