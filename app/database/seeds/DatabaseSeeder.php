<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('UsersTableSeeder');
		$this->call('BreedsTableSeeder');
		$this->call('DogsTableSeeder');
        // $this->call('DogImagesTableSeeder');
		
	} //function run()
} //close

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->email = "doglover@rufflove.com";
        $user->address =  "112 E. Pecan St";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78205";
        $user->username = "doglover";
        $user->password = 'password';
        $user->img_path = "/img/placeholder-user.png";
        $user->role = "admin";

        $user->save();

        for ($i=1; $i <= 10; $i++) 
        { 
	        $user = new User();
	        $user->first_name = "John" . $i;
	        $user->last_name = "Doe" . $i;
	        $user->address =  $i . " Acacia Avenue";
	        $user->city = "San Antonio";
	        $user->state = "TX";
	        $user->zip = rand(11111,99999);
	        $user->username = "doglover" . $i;
	        $user->password = "password";
	        $user->email = "$user->first_name@rufflove.com";
	        $user->img_path = "/img/placeholder-user.png";
	        $user->role = "user";

	        $user->save();
        } // end for loop
	} //end function run()
}  //end class UsersTableSeeder
 

class BreedsTableSeeder extends Seeder {

    public function run()
    {
        // clean out the breeds table
        DB::table('breeds')->delete();

        // load contents of breeds file
        ini_set('auto_detect_line_endings', true);
        $breedsFile = storage_path() . '/csv/breeds.txt';
        $breeds = file($breedsFile);

        foreach ($breeds as $breed)
        {
            $breed = trim($breed);

            $dbBreed = new Breed();
            $dbBreed->name = $breed;
            $dbBreed->save();
        }
        // loop through and insert into db
    }

}
		
class DogsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('dogs')->delete();

        $purebred = ['Y','N'];
        $sex = ['M','F'];

        for ($i=1; $i <= 500; $i++) 
        { 
	        $dog = new Dog();

	        $dog->name = "Fido " . $i;	        
	        $dog->purebred = array_rand($purebred);
	        $dog->age = rand(1,20);
	        $dog->weight = rand(1,100);
	        $dog->sex = array_rand($sex);
	        $dog->breed_id = rand(1, 10);
	        $dog->user_id = rand(2,11);


	       	$dog->save();
        } // end for loop
	} //end run()
} // end class DogTableSeeder

class DogImagesTableSeeder extends Seeder {

    public function run()
    {
       DB::table('dog_images')->delete();

       for ($i=1; $i <= 10; $i++) 
       { 
            $dog_images = new DogImage();
            
            $dog_images->user_id = rand(1, 10);
            $dog_images->dog_id = rand(1, 10);
            $images->img_path = "/img/placeholder-image.png";

               $images->save();
       } // end for loop
    } //end run()
}