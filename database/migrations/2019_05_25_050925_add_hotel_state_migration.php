<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHotelStateMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('state');
            $table->string('phone');
        });

        Schema::table('user_trips', function (Blueprint $table) {
            $table->tinyInteger('service_type');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('phone');
        });

        Schema::table('user_trips', function (Blueprint $table) {
            $table->dropColumn('service_type');
        });
    }
}
