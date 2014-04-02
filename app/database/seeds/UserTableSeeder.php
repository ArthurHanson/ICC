<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Ralph Pierce',
			'username' => 'rpierce',
			'email'    => 'ralph@insidecarconnection.com',
			'password' => Hash::make('Porsche911'),
		));
		User::create(array(
			'name'     => 'Art Hanson',
			'username' => 'ahanson',
			'email'    => 'arthurhanson@gmail.com',
			'password' => Hash::make('Porsche911'),
		));
	}

}