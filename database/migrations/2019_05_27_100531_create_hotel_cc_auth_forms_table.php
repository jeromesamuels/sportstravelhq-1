<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelCcAuthFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_cc_auth_forms', function (Blueprint $table) {
          $table->increments('id');

            $table->unsignedBigInteger('user_trip_id')->nullable();
            $table->unsignedBigInteger('travel_coordinator_id')->nullable();
            $table->unsignedBigInteger('hotel_manager_id')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();


            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('phone', 32);
            $table->string('signature', 255);
            $table->date('signature_date')->nullable();
            $table->integer('signature_type');

            $table->string('name', 100);
            $table->string('position', 100);
            $table->string('company', 100);

            $table->string('card_type', 100);
            $table->string('card_number', 100);
            $table->string('card_name', 100);
            $table->tinyInteger('card_exp_month', false, true);
            $table->tinyInteger('card_exp_year', false, true);
            $table->string('card_cvv', 100);

            $table->string('address', 255);

            $table->string('charges_1_date', 100);
            $table->string('charges_1_amount', 100);
            $table->string('charges_1_guest_name', 100);
            $table->string('charges_2_date', 100);
            $table->string('charges_2_amount', 100);
            $table->string('charges_2_guest_name', 100);
            $table->string('charges_3_date', 100);
            $table->string('charges_3_amount', 100);
            $table->string('charges_3_guest_name', 100);

            $table->string('method_of_payment', 20);
            $table->string('method_of_payment_specific', 255);

            $table->string('user_agent', 255);
            $table->string('ip_address', 255);

            $table->timestamps();

            $table->index(['user_trip_id']);
            $table->index(['first_name', 'last_name', 'email', 'phone']);
            $table->index(['user_trip_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_cc_auth_forms');
    }
}
