<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_trips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('entry_by')->unsigned()->index('user_trips_entry_by');
			$table->string('trip_name', 256);
			$table->string('from_address_1', 256);
			$table->string('from_city', 100);
			$table->string('from_state_id');
			$table->string('from_zip', 10);
			$table->string('to_address_1', 256);
			$table->string('to_city', 256);
			$table->string('to_state_id');
			$table->string('to_zip', 10);
			$table->string('check_in');
			$table->string('check_out');
			$table->integer('budget_from');
			$table->integer('budget_to');
			$table->boolean('double_queen_qty');
			$table->boolean('double_king_qty');
			$table->string('amenity_ids', 256);
			$table->text('comment', 65535);
			$table->timestamp('added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('status');
			$table->integer('invoice_status');
			$table->string('service_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_trips');
	}

}
