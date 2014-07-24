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

            $table->float('lat', 10,6)->nullable();
            $table->float('lng', 10,6)->nullable();
            
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

            $pure = array('Y', 'N');
            $table->enum('purebred', $pure);
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
	
        $dbc = DB::connection()->getPdo();

        $dbc->exec("CREATE FUNCTION calculate_distance(measurement varchar(2), base_lat double precision, base_lon double precision, lat double precision, lon double precision) RETURNS double precision
        BEGIN
           DECLARE earth_radius double precision;
           IF measurement = 'km' THEN
              SET earth_radius = 6371.0;
           ELSEIF measurement = 'mi' THEN
              SET earth_radius = 3959.0;
           END IF;
           RETURN earth_radius * ACOS(SIN(base_lat / 57.2958) * SIN(lat / 57.2958) + COS(base_lat / 57.2958) * COS(lat / 57.2958) * COS((lon / 57.2958) - (base_lon / 57.2958)));
        END");


        $dbc->exec("CREATE PROCEDURE zip_proximity(zipcode varchar(5), radius double precision, measurement varchar(2))
        BEGIN
        DECLARE base_lat double precision;
        DECLARE base_lon double precision;
        SELECT lat, lon INTO base_lat, base_lon FROM zipcodes WHERE zip = zipcode;
        SELECT zip, lat, lon, city, state, state_abbrev, calculate_distance(measurement, base_lat, base_lon, lat, lon) AS distance FROM zipcodes
           WHERE calculate_distance(measurement, base_lat, base_lon, lat, lon) < radius ORDER BY distance;
        END");
    } //end function up()


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        $dbc = DB::connection()->getPdo();
        $dbc->exec("DROP PROCEDURE IF EXISTS zip_proximity");
        $dbc->exec("DROP FUNCTION IF EXISTS calculate_distance");

		Schema::drop('dog_images');
        Schema::drop('dogs');
        Schema::drop('breeds');
        Schema::drop('users');

	}

}
