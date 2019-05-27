<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomlistingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roomlistings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cordinator_id');
			$table->integer('hmanager_id');
			$table->string('file', 191);
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
		Schema::drop('roomlistings');
	}

}
