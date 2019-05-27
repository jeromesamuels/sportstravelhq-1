<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelAgreementTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_agreement_trackings', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('hotel_agreement_id')->nullable();
            $table->unsignedBigInteger('user_trip_id')->nullable();

            $table->boolean('authorizor');
            $table->boolean('hotel_director');
            $table->boolean('corp_hotel_director');
            $table->enum('action_type', ['email', 'sms']);
            $table->string('address', 255);
            $table->string('user_agent', 255);
            $table->string('ip_address', 255);

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
        Schema::dropIfExists('hotel_agreement_trackings');
    }
}
