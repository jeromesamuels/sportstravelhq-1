<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripStatusLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_status_logs', function(Blueprint $table)
		{
			$table->integer('trip_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('rfp_id')->unsigned()->default(0);
			$table->boolean('trip_status_id');
			$table->string('generated_title', 100);
			$table->string('generated_description', 256);
			$table->text('generated_mail', 65535);
			$table->string('generated_mailsubject', 100);
			$table->string('reason');
			$table->timestamp('added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('ip', 555);
			$table->string('country');
			$table->string('location', 555);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_status_logs');
	}

}
