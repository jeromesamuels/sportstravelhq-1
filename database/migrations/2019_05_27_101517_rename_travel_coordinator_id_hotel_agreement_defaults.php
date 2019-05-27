<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTravelCoordinatorIdHotelAgreementDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('hotel_agreement_defaults', function (Blueprint $table) {
            $table->renameColumn('travel_coordinator_id', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('hotel_agreement_defaults', function (Blueprint $table) {
            $table->renameColumn('user_id', 'travel_coordinator_id');
        });
    }
}
