<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgreementFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agreement_forms', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->index('agreement_forms_id');
			$table->integer('sender_id');
			$table->integer('reciever_id');
			$table->integer('reciever_group');
			$table->integer('coordinator_id');
			$table->string('reciever_email');
			$table->string('hotel_name', 191)->nullable();
			$table->string('hotel_details', 191)->nullable();
			$table->string('file')->nullable();
			$table->text('agreement_text', 65535);
			$table->integer('for_rfp');
			$table->boolean('downloaded')->nullable();
			$table->dateTime('agreement_sent')->nullable();
			$table->dateTime('coordinator_sign')->nullable();
			$table->dateTime('hotel_sign')->nullable();
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
		Schema::drop('agreement_forms');
	}

}
