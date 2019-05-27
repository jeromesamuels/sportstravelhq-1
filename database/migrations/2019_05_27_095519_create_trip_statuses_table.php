<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_statuses', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('title', 100);
			$table->boolean('step');
			$table->string('color', 10);
			$table->string('description', 256);
			$table->text('mail', 65535);
			$table->string('mail_subject', 512);
			$table->boolean('group_level');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_statuses');
	}

}
