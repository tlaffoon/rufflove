<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person', function($table)
				{
				    $table->increments('id');
				    $table->string('name', 250);
				    $table->string('email');
				    $table->text('description');
				    $table->string('country');
				    $table->string('address');
				    $table->string('postcode');
				    $table->string('telephone');
				    $table->string('code');
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
		Schema::drop('person');
	}

}
