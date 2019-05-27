<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelAmenitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_amenities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 100)->index('title_hotel_amenities');
			$table->string('slug', 100)->index('slug_hotel_amenities');
			$table->boolean('disabled')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel_amenities');
	}

}
