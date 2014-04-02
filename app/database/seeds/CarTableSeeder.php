<?php

class CarTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('cars')->delete();
		Car::create(array(
			'car_type'     => 'Porsche 911',
			'color' => 'Black',
			'price'    => '$96,000',
			'description' => '',
			'image' => 'car-placeholder.jpg'
		));
		Car::create(array(
			'car_type'     => 'Porsche 911 Turbo',
			'color' => 'Silver',
			'price'    => '$126,000',
			'description' => 'Beautiful with lots of options',
			'image' => 'car-placeholder.jpg'
		));
	}

}