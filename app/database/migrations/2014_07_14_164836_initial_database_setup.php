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
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('address', 30);
            $table->string('city', 30);
            $table->string('state', 2);
            $table->integer('zip');
            $table->string('username', 30)->unique();
            $table->string('password', 8);
            $table->string('email', 30)->unique();
            $table->string('img_path', 30);
            $table->string('role', 20);
            $table->timestamps();  
            
        });

		// Schema::create('breeds', function($table)
  //       {
  //           $table->increments('id');
  //           $table->string('breed_name', 99);            
  //       });

        Schema::create('dogs', function($table)
        {
            $table->increments('id');           
            // $table->foreign('owner_id')->references('id')->on('users');
            $table->string('name', 30);
            $table->string('breed', 30);
            // $table->foreign('breed_id')->references('id')->on('dogs');
            $table->boolean('purebreed');
            $table->integer('age');
            $table->integer('weight');
            $table->string('sex', 1);
            $table->string('img_path', 30);
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
		// Schema::drop('breed');
		Schema::drop('dogs');
	}

}
