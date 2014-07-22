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
            
            $table->string('username', 30)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('fullAddress')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state', 2)->nullable();
            $table->integer('zip')->nullable();
            $table->string('country')->nullable();

            $table->string('img_path')->nullable();

            $table->float('latitude', 10,6)->nullable();
            $table->float('longitude', 10,6)->nullable();
            
            $table->string('remember_token', 100)->nullable;

            $table->timestamps();  
            
        });

		Schema::create('breeds', function($table)
        {
            $table->increments('id');
            
            $table->string('name');
            $table->text('info');
            
            $table->nullableTimestamps();             
        });

        Schema::create('dogs', function($table)
        {
            $table->increments('id');           
            
            $table->integer('user_id')->unsigned();
            $table->integer('breed_id')->unsigned();
            
            $table->string('name');
            $table->boolean('purebred');
            $table->integer('age');
            $table->integer('weight');
            $sex = array('M', 'F');
            $table->enum('sex', $sex);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('breed_id')->references('id')->on('breeds');
        });

        Schema::create('dog_images', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('dog_id')->unsigned();
            $table->string('path');          
            $table->timestamps();
            $table->foreign('dog_id')->references('id')->on('dogs');
        });
	} //end function up()

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dog_images');
        Schema::drop('dogs');
        Schema::drop('breeds');
        Schema::drop('users');
	}

}
