<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('hotel_code', 20)->index('hotel_code_hotels');
			$table->string('service_type');
			$table->string('name', 191)->index('hotels_name');
			$table->string('address', 191);
			$table->string('city', 191);
			$table->integer('zip');
			$table->string('state');
			$table->bigInteger('phone');
			$table->string('type', 191);
			$table->string('domain');
			$table->string('logo', 555)->index('hotels_logo');
			$table->string('property');
			$table->integer('rating');
			$table->boolean('active');
			$table->timestamps();
			$table->string('IATA_number')->index('hotels_IATA_number');
			$table->string('blackout_start');
			$table->string('blackout_end');
			$table->string('blackout_reason');
			$table->string('test');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotels');
	}

}
