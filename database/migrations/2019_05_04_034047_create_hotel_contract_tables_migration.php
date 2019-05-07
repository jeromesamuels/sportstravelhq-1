<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelContractTablesMigration extends Migration
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
        Schema::dropIfExists('hotel_agreements');
        Schema::dropIfExists('hotel_agreement_trackings');
        Schema::dropIfExists('hotel_cc_auth_forms');
    }
}
