<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForImageUploads extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function($table)
		{
		$table->increments('id')->unsigned();
		$table->integer('user_id')->unsigned();
		$table->foreign('user_id')->references('id')->on('users');
		$table->integer('dog_id')->unsigned();
		$table->foreign('dog_id')->references('id')->on('dogs');
		$table->string('img_path');
		$table->timestamps();

		
		});
	}


	/**
	 * Reverse the migrations.
	 *crashed
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function($table)
		{
		    $table->dropForeign('images_user_id_foreign');
		    $table->dropColumn('id');
		    $table->dropForeign('images_dog_id_foreign');
		    $table->dropColumn('user_id');
		    $table->dropColumn('img_path');
		});
	}

}
