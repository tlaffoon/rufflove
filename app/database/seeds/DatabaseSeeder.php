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
		// $this->call('UserTableSeeder');
	}
}
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        
        
        $user->save();

        for ($i=1; $i <= 10; $i++) 
        { 
	        $user = new User();
	        $user->first_name = "John" . $i;
	        $user->last_name = "Doe" . $i;
	        $user->address =  $i . "Acacia Avenue.";
	        $user->city = "San Antonio";
	        $user->state = "TX";
	        $user->zip = "78213";
	        $user->username = "doglover" . $i;
	        $user->password = "password";
	        $user->email = $_ENV['ADMIN_USER'];
	        $user->image_path = "/img-upload/dog_picture.jpg";
	        $user->save();
        }
		
    }
}


