<?php

class DistrictsTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create();

		foreach(range(1,20) as $index)
		{

			// code goes here
			District::create(array(

				'name' 					=> $faker->company,
				'slug'					=> $faker->slug,
				'seats'					=> $faker->randomNumber($nbDigits = NULL),
				'ons_district_code'		=> $faker->slug,
				'body_id'				=> $faker->numberBetween($min = 1, $max = 20)

				

			));
		}
	}
}		