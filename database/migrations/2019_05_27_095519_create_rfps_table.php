<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRfpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rfps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_trip_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamp('added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('status');
			$table->string('destination', 512);
			$table->string('hotel_information', 512);
			$table->string('distance_event');
			$table->boolean('offer_rate');
			$table->boolean('cc_authorization');
			$table->date('offer_validity');
			$table->string('check_in');
			$table->string('check_out');
			$table->string('sales_manager', 128);
			$table->boolean('king_beedrooms');
			$table->boolean('queen_beedrooms');
			$table->string('amenitie_ids', 256);
			$table->integer('ramount');
			$table->string('receipt', 555);
			$table->text('hotels_message', 65535);
			$table->integer('decline_reason');
			$table->string('team');
			$table->string('roster', 555);
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
		Schema::drop('rfps');
	}

}
