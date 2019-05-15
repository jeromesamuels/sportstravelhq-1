<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgreementForm extends Model
{
    public function cordinator(){
    	return $this->belongsTo(Core\Users::class,'coordinator_id');
    }

    public function hotelmanager(){
    	return $this->belongsTo(Core\Users::class,'reciever_id');
    }
    public function agreementRfp(){
    	return $this->belongsTo('App\Models\Rfp','for_rfp');
    }
}
