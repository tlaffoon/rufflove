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

		$this->call('UserTableSeeder');
		$this->call('DogTableSeeder');
	}
}
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        for ($i=1; $i <= 10; $i++) 
        { 
	        $user = new User();
	        $user->first_name = "John" . $i;
	        $user->last_name = "Doe" . $i;
	        $user->address =  $i . " Acacia Avenue.";
	        $user->city = "San Antonio";
	        $user->state = "TX";
	        $user->zip = "78213";
	        $user->username = "doglover" . $i;
	        $user->password = "password";
	        $user->email = "doglover@rufflove.dev";
	        $dog->image_path = $imgDir . "/owners/picture.jpg";
	        $user->save();
        } // end for loop
	} //end method run()
}  //end class
 
		
class DogTableSeeder extends Seeder {

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
	        $dog->image_path = $imgDir . "/dogs/picture.jpg";	       
	       	$dog->save();
        } // end for loop
	} //end run()
} // end class DogTableSeeder


