<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_agreements', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('user_trip_id')->nullable();
            $table->unsignedBigInteger('travel_coordinator_id')->nullable();
            $table->unsignedBigInteger('hotel_manager_id')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();

            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('phone', 32);
            $table->string('address', 100);
            $table->string('address2', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('zipcode', 100);
            $table->string('signature', 255);
            $table->date('signature_date')->nullable();
            $table->integer('signature_type');

            $table->boolean('is_authorized');
            $table->boolean('is_billing_authorized');

            $table->string('hotel_signature', 100);
            $table->date('hotel_signature_date')->nullable();
            $table->integer('hotel_signature_type');
            $table->string('hotel_first_name', 255);
            $table->string('hotel_last_name', 255);
            $table->string('hotel_title', 100);
            $table->string('rewards_number', 100);
            $table->string('rewards_provider', 100);

            $table->timestamps();

            //-- Lookup indexes
            $table->index([
                'first_name', 'last_name', 'email', 'phone'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_agreements');
    }
}
