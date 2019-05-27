<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invitations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 256)->index('email_invitations');
			$table->integer('group_id')->unsigned();
			$table->timestamp('sent')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('status')->default(0)->comment('0:Not Registered, 1:Registered ');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invitations');
	}

}
