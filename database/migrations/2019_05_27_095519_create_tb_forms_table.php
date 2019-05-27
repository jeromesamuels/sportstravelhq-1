<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_forms', function(Blueprint $table)
		{
			$table->integer('formID', true);
			$table->string('name')->nullable();
			$table->enum('method', array('eav','table','email'))->nullable()->default('table');
			$table->string('tablename', 50)->nullable();
			$table->string('email', 225)->nullable();
			$table->text('configuration')->nullable();
			$table->text('success', 65535)->nullable();
			$table->text('failed', 65535)->nullable();
			$table->text('redirect', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_forms');
	}

}
