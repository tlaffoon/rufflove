<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialDatabaseSetup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('address', 30);
            $table->string('city', 30);
            $table->string('state', 2);
            $table->int('zip', 5)->unsigned();
            $table->string('username', 30);
            $table->string('password', 8);
            $table->string('email', 30);
            $table->string('image_path', 30);
            $table->timestamps();
        });

		Schema::create('breeds', function($table)
        {
            $table->increments('id');
            $table->string('breed_name', 30);            
        });

        Schema::create('dogs', function($table)
        {
            $table->increments('id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->string('owner', 30);
            $table->string('dog_name', 30);
            $table->string('breed', 30);
            $table->foreign('breed_id')->references('id')->on('dogs');
            $table->bool('purebreed', 1);
            $table->int('age', 2)->unsigned();
            $table->int('weight', 3)->unsigned();
            $table->sex('sex', );
            $table->string('image_path', 30);
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
		Schema::drop('users');
		Schema::drop('breeds');
		Schema::drop('dogs');
	}

}
