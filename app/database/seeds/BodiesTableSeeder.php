<?php

class BodiesTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create('en_GB');

		foreach(range(1,20) as $index)
		{

			// code goes here
			Body::create(array(

				'name' 					=> $faker->company,
				'district_name'						=> $faker->realText($maxNbChars = 200, $indexSize = 2),
				'districts_name'				=> $faker->realText($maxNbChars = 200, $indexSize = 2),
				'slug'					=> $faker->slug

			));
		}
	}
}		