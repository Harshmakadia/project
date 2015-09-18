<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

      //  $this->call('UserTableSeeder');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
    	'name'     => 'Rakesh',
        'username' => 'Rakesh',
        'email'    => 'sharmarakesh395@gmail.com',
        'password' => Hash::make('mypass'),
    ));
  }
}
