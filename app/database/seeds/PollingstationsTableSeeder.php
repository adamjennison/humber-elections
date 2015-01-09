<?php

class PollingstationsTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create('en_GB');

		foreach(range(1,20) as $index)
		{

			// code goes here
			Pollingstation::create(array(
				'name'	=>	$faker->company,
				'address'	=>	$faker->address,
				'postcode_id'	=>	$faker->postcode,
				'easting'	=>	$faker->randomFloat($nbMaxDecimals=5, $min =-1,$max = 0),
				'northing'	=>	$faker->randomFloat($nbMaxDecimals=5, $min =53,$max = 53.5),
				'lat'	=>	$faker->latitude,
				'lng'	=>	$faker->longitude,

			));

		}
	}
}		