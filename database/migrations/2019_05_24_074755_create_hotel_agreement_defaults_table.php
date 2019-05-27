<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelAgreementDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_agreement_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',255)
            $table->string('first_name',255)
            $table->string('last_name',255)
            $table-> string('email',255)
            $table->string('phone',255)
            $table->string('address',255)
            $table->string('address2',255)
            $table->string('city',255)
            $table->string('state',255)
            $table->string('zipcode',255)
            $table->string('title',255)
            $table->string('signature_type',255)
            $table->date('\Carbon\Carbon created_at')
            $table->date('\Carbon\Carbon updated_at')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_agreement_defaults');
    }
}
