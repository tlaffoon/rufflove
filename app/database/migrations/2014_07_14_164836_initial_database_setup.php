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
            $table->string('first_name', 99);
            $table->string('last_name', 99);
            $table->string('address', 99);
            $table->string('city', 99);
            $table->string('state', 2);
            $table->integer('zip');
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('email', 99)->unique();
            $table->string('img_path');
            $table->string('role', 20);
            $table->timestamps();  
            
        });

		Schema::create('breeds', function($table)
        {
            $table->increments('id');
            $table->string('breed_name', 99);
            $table->text('breed_info');
            $table->timestamps();             
        });

        Schema::create('dogs', function($table)
        {
            $table->increments('id');           
            $table->string('name', 99);
            $table->string('breed', 99);
            $table->boolean('purebred');
            $table->integer('age');
            $table->integer('weight');
            $table->string('sex');
            $table->string('img_path');
            $table->timestamps();         
        });
	} //end function up()

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
