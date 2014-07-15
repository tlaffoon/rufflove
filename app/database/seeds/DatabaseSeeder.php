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
		$this->call('DogsTableSeeder');
		$this->call('BreedsTableSeeder');
	}
} //close class DatabaseSeeder


class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->email = "doglover@rufflove.com";
        $user->address =  "Original Acacia Avenue";
        $user->city = "San Antonio";
        $user->state = "TX";
        $user->zip = "78213";
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
	        $user->zip = "78213";
	        $user->username = "doglover" . $i;
	        $user->password = "password";
	        $user->email = "$i@rufflove.com";
	        $user->img_path = "/img/placeholder-user.png";
	        $user->role = "Dummy role";

	        $user->save();
        } // end for loop
	} //end method run()
}  //end class
 
		
class DogsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('dogs')->delete();

        for ($i=1; $i <= 10; $i++) 
        { 
	        $dog = new Dog();

	        $dog->name = "Fido " . $i;
	        $dog->breed = "Doberman Pincher";
	        $dog->purebreed = "TRUE";
	        $dog->age = $i;
	        $dog->weight = "80";
	        $dog->sex = "M";
	        $dog->img_path = "/img/placeholder-dog.png";
	        $dog->user_id = "$i";

	       	$dog->save();
        } // end for loop
	} //end run()
} // end class DogTableSeeder

class BreedsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('breeds')->delete();

        for ($i=1; $i <= 10; $i++) 
        { 
	        $breeds = new Breeds();

	        
	        $breeds->breed_name = "Doberman Pincher";
	        

	       	$breeds->save();
        } // end for loop
	} //end run()
} // end class DogTableSeeder

