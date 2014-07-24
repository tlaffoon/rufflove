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
		
		$this->call('BreedsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('DogsTableSeeder');		
		$this->call('DogImagesTableSeeder');
        $this->call('ZipsTableSeeder');
        		
	} //function run()
} //class DatabaseSeeder


class ZipsTableSeeder extends Seeder 
{

    public function run()
    {
        // clean out the zips table
        $this->command->info('Deleting existing Zipcodes table ...');
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
        $this->command->info('Deleting existing Breeds table ...');
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

        $faker = Faker\Factory::create();

       
        $this->command->info('Deleting existing Users table ...');
        DB::table('users')->delete();

        $user = new User();        
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->email = "doglover@rufflove.com";
        $user->address =  "123 maple st.";
        $user->city = "Beverly Hills";
        $user->state = "CA";
        $user->zip = "90120";
        $user->username = "doglover";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "34.068835";
        $user->lng = "-118.39385900000002";

        $user->save();

        $user = new User();        
        $user->first_name = "Gustavo";
        $user->last_name = "Fring";
        $user->email = "dogloverGF@rufflove.com";
        $user->address =  "5206 Gemsbuck Chase";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78251";
        $user->username = "dogloverGF";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.485576999999964";
        $user->lng = "-98.71428673565674";
        $user->save();

        $user = new User();      
        $user->first_name = "Walter";
        $user->last_name = "White";
        $user->email = "dogloverWW@rufflove.com";
        $user->address =  "9703 Lauren Mist";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78251";
        $user->username = "dogloverWW";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.480323";
        $user->lng = "98.67758900000001";
        $user->save();

        $user = new User();      
        $user->first_name = "Jesse";
        $user->last_name = "Pinkman";
        $user->email = "dogloverJP@rufflove.com";
        $user->address =  "7935 Oak Pointe";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78254";
        $user->username = "dogloverJP";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.514455";
        $user->lng = "98.72717699999998";
        $user->save();

        $user = new User();      
        $user->first_name = "Saul";
        $user->last_name = "Goodman";
        $user->email = "dogloverSG@rufflove.com";
        $user->address =  "512 W Euclid Ave";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78212";
        $user->username = "dogloverSG";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.4361206";
        $user->lng = "98.497569";
        $user->save();

        $user = new User();      
        $user->first_name = "Hank";
        $user->last_name = "Schrader";
        $user->email = "dogloverHS@rufflove.com";
        $user->address =  "133 Thelma Dr";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78212";
        $user->username = "dogloverHS";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.468286";
        $user->lng = "-98.484193";
        $user->save();

        $user = new User();      
        $user->first_name = "Todd";
        $user->last_name = "Alquist";
        $user->email = "dogloverTA@rufflove.com";
        $user->address =  "502 E Locust St";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78212";
        $user->username = "dogloverTA";
        $user->password = 'password';
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.445551";
        $user->lng = "98.48888399999998";
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
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
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
        $user->img_path = "/includes/img/placeholder-user.png";
        $user->role = "admin";
        $user->fullAddress = $user->address . ' ' . $user->city . ', ' . $user->state . ' ' . $user->zip;
        $user->lat = "29.555311";
        $user->lng = "-98.433682";
        $user->save();

        for ($i=1; $i <= 200; $i++) 
        { 
            $user = new User();
                $user->first_name = $faker->unique()->firstName;
                $user->last_name = $faker->lastName;
                $user->address =  $faker->streetAddress;
                $user->city = $faker->city;
                $user->state = $faker->stateAbbr;
                $user->zip = $faker->postcode;
                $user->username = $faker->unique()->userName;
                $user->password = "password";
                $user->email = $faker->safeEmail;
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
        $this->command->info('Deleting existing Dogs table ...');
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
            $dog->breed_id = rand(1, 1499);
	        $dog->user_id = rand(2,199);

	       	$dog->save();
        } // end for loop
        
    } //end run()
    
} // end class DogTableSeeder


class DogImagesTableSeeder extends Seeder 
{

    public function run()
    {
        $this->command->info('Deleting existing Dog images table ...');
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






