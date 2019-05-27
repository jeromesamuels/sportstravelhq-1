<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHAmenityPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('h_amenity_pivot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_id');
			$table->integer('amenity_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('h_amenity_pivot');
	}

}
