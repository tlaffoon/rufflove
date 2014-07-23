<?php

class DatabaseSeeder extends Seeder 
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('ZipsTableSeeder');
        $this->call('UsersTableSeeder');
		$this->call('BreedsTableSeeder');
		$this->call('DogsTableSeeder');
		$this->call('DogImagesTableSeeder');

		
	} //function run()
} //class DatabaseSeeder

class ZipsTableSeeder extends Seeder 
{

    public function run()
    {
        // clean out the breeds table
        DB::table('zipcodes')->delete();

        // load contents of breeds file
        ini_set('auto_detect_line_endings', true);
        $zipFile = storage_path() . '/csv/US.txt';
        $zips = file($zipFile);
        
        
        // loop through and insert into db
        foreach ($zips as $zip)
        {
            $zip = trim($zip);
            $zip = explode(',', $zip);

            $dbZip = new Zip();
            $dbZip->zip = $zip[0];
            $dbZip->lat = $zip[1];
            $dbZip->lon = $zip[2];
            $dbZip->city = $zip[3];
            $dbZip->state = $zip[4];
            $dbZip->state_abbrev = $zip[5];
            $dbZip->save();
        } //end foreach
        
    } //function run()

} //class BreedsTableSeeder


class BreedsTableSeeder extends Seeder 
{

    public function run()
    {
    	// clean out the breeds table
    	DB::table('breeds')->delete();

    	// load contents of breeds file
    	ini_set('auto_detect_line_endings', true);
    	$breedsFile = storage_path() . '/csv/breeds.txt';
    	$breeds = file($breedsFile);

        // loop through and insert into db
	    foreach ($breeds as $breed)
	    {
	    	$breed = trim($breed);

	    	$dbBreed = new Breed();
	    	$dbBreed->name = $breed;
	    	$dbBreed->save();
	    } //end foreach
    	
    } //function run()

} //class BreedsTableSeeder
		
class UsersTableSeeder extends Seeder 
{

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();        
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->email = "doglover@rufflove.com";
        $user->address =  "";
        $user->city = "";
        $user->state = "";
        $user->zip = "";
        $user->username = "doglover";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;

		$user->save();

		$user = new User();        
        $user->first_name = "Gustavo";
        $user->last_name = "Fring";
        $user->email = "dogloverGF@rufflove.com";
        $user->address =  "11815 Alamo Blanco St";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78233";
        $user->username = "dogloverGF";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.549935";
        $user->lng = "-98.40401";
		$user->save();

		$user = new User();      
        $user->first_name = "Walter";
        $user->last_name = "White";
        $user->email = "dogloverWW@rufflove.com";
        $user->address =  "3527 Crestmont Dr";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78217";
        $user->username = "dogloverWW";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.539573";
        $user->lng = "-98.42883";
		$user->save();

		$user = new User();      
        $user->first_name = "Jesse";
        $user->last_name = "Pinkman";
        $user->email = "dogloverJP@rufflove.com";
        $user->address =  "12213 Stoney Xing";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78247";
        $user->username = "dogloverJP";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.560037";
        $user->lng = "-98.435707";
		$user->save();

		$user = new User();      
        $user->first_name = "Saul";
        $user->last_name = "Goodman";
        $user->email = "dogloverSG@rufflove.com";
        $user->address =  "14034 Boulder Oaks";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78247";
        $user->username = "dogloverSG";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.566981";
        $user->lng = "-98.421465";
		$user->save();

		$user = new User();      
        $user->first_name = "Hank";
        $user->last_name = "Schrader";
        $user->email = "dogloverHS@rufflove.com";
        $user->address =  "13903 Cypress Hollow Dr";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78232";
        $user->username = "dogloverHS";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.574577 ";
        $user->lng = "-98.461502";
		$user->save();

		$user = new User();      
        $user->first_name = "Todd";
        $user->last_name = "Alquist";
        $user->email = "dogloverTA@rufflove.com";
        $user->address =  "3119 Morning Trl";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78247";
        $user->username = "dogloverTA";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.578078";
        $user->lng = "-98.437257";
		$user->save();

		$user = new User();      
        $user->first_name = "Mike";
        $user->last_name = "Ehrmantraut";
        $user->email = "dogloverME@rufflove.com";
        $user->address =  "2611 Circle Tree St";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78247";
        $user->username = "dogloverME";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.567215";
        $user->lng = "-98.448589";
		$user->save();

		$user = new User();      
        $user->first_name = "Lydia";
        $user->last_name = "Rodarte-Quayle";
        $user->email = "dogloverLR@rufflove.com";
        $user->address =  "12114 Ridge Summit St";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78247";
        $user->username = "dogloverLR";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";
        $user->lat = "29.555311";
        $user->lng = "-98.433682";
        $user->save();

        // needs to be completed refactored to use php faker to generate "real", random addresses?
        for ($i=1; $i <= 10; $i++) 
        { 
	        $user = new User();
	        $user->first_name = "John" . $i;
	        $user->last_name = "Doe" . $i;
	        $user->address =  $i . " Acacia Avenue";
	        $user->city = "San Antonio";
	        $user->state = "TX";
	        $user->zip = rand(11111,99999);
            $user->country = 'United States';
	        $user->username = "doglover" . $i;
	        $user->password = "password";
	        $user->email = "$user->first_name@rufflove.com";
	        $user->img_path = "/includes/img/placeholder-user.png";
	        $user->role = "user";
            $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;

	        $user->save();
        } // end for loop
	} //end function run()
    
}  //end class UsersTableSeeder

	
class DogsTableSeeder extends Seeder 
{
	public function run()
	{
        DB::table('dogs')->delete();

        $purebred = ['Y','N'];
        $sex = ['M', 'F'];

        for ($i=1; $i <= 5000; $i++) 
        { 
	        $dog = new Dog();

	        $dog->name = "Fido " . $i;	        
	        $dog->purebred = $purebred[array_rand($purebred)];
	        $dog->age = rand(1,20);
	        $dog->weight = rand(1,100);
	        $dog->sex = $sex[array_rand($sex)];
            $dog->breed_id = rand(1, 1500);
	        $dog->user_id = rand(2,11);


	       	$dog->save();
        } // end for loop
	} //end run()
} // end class DogTableSeeder


class DogImagesTableSeeder extends Seeder 
{

    public function run()
    {
       DB::table('dog_images')->delete();

       for ($i=1; $i <= 5000; $i++) 
       {
            $dog_image = new DogImage();

            $dog_image->dog_id = $i;
            $dog_image->path = "/includes/img/placeholder-image.png";

            $dog_image->save();

       } // end for loop
    } //end run()

} //end class DogImagesTableSeeder

