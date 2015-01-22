<?php

class PostcodesTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create('en_GB');

		foreach(range(1,200) as $index)
		{

			// code goes here
			Postcode::create(array(
				'postcode' 			=> 	$faker->postcode,
				'pollingstation_id'	=>	$faker->numberBetween($min=1,$max=20),
				'district_id'		=> 	$faker->numberBetween($min=1,$max=20)

			));

		}
	}
}		