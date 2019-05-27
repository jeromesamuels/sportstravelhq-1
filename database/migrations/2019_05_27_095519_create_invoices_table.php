<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('invoice_id')->index('incoices_invoice_id');
			$table->boolean('trip_status')->comment('1:Confirmed ,2:Completed, 3:Cancelled');
			$table->string('trip_name');
			$table->string('trip_address');
			$table->string('check_in');
			$table->string('check_out');
			$table->integer('rfp_id')->unsigned();
			$table->string('hotel_name', 100);
			$table->string('hotel_add', 256);
			$table->string('hotel_type');
			$table->string('hotel_manager', 100);
			$table->string('email', 100);
			$table->string('phone', 20);
			$table->boolean('total_room');
			$table->smallInteger('room_rate')->unsigned();
			$table->boolean('actualized_room_count');
			$table->boolean('commissoin_rate');
			$table->boolean('payment_status')->default(0)->comment('0:Pending,1:Completed');
			$table->date('due_date');
			$table->smallInteger('est_amt_due');
			$table->smallInteger('amt_paid')->unsigned();
			$table->boolean('payment_mode')->comment('1:check, 2: direct deposit ');
			$table->string('payment_ref_num', 20);
			$table->text('notes', 65535);
			$table->string('invoice_file', 555);
			$table->timestamps();
			$table->integer('entry_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
