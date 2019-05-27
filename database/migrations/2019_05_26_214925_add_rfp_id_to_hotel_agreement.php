<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRfpIdToHotelAgreement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_agreements', function (Blueprint $table) {
            $table->bigInteger('rfp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_agreements', function (Blueprint $table) {
            $table->dropColumn('rfp_id');
        });
    }
}
