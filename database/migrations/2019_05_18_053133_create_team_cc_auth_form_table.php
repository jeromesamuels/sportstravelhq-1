<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamCcAuthFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_payment_defaults', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();

            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('phone', 32);

            $table->timestamps();

            //-- Lookup indexes
            $table->index(['user_id', 'team_id']);
            $table->index(['user_id']);
            $table->index(['team_id']);
        });

        Schema::table('hotel_agreement_defaults', function (Blueprint $table) {
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_payment_defaults');
    }
}
