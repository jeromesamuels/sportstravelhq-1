<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('group_id')->nullable();
			$table->string('username', 100);
			$table->string('password', 64);
			$table->string('email', 100)->index('tb_users_email_unique');
			$table->string('phone_number', 20);
			$table->string('first_name', 50)->nullable();
			$table->string('last_name', 50)->nullable();
			$table->string('avatar', 100)->nullable();
			$table->boolean('active')->nullable();
			$table->boolean('login_attempt')->nullable()->default(0);
			$table->dateTime('last_login')->nullable();
			$table->timestamps();
			$table->string('reminder', 64)->nullable();
			$table->string('activation', 50)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->integer('last_activity')->nullable();
			$table->text('config', 65535)->nullable();
			$table->integer('hotel_id');
			$table->integer('entry_by');
			$table->string('user_type', 555);
			$table->string('hotel_type');
			$table->string('hotel_code');
			$table->string('hotel_address');
			$table->integer('service_type');
			$table->string('o_name');
			$table->integer('vcode')->default(0);
			$table->string('address', 555);
			$table->string('state');
			$table->string('city');
			$table->string('zip');
			$table->integer('manager_access')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_users');
	}

}
