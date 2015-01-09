<?php

class ElectionsTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create('en_GB');

		foreach(range(1,20) as $index)
		{
			Election::create(array(
				'd'						=> $faker->date($format = 'Y-m-d', $max = 'now'),
				'reason'				=> $faker->realText($maxNbChars = 200, $indexSize = 2),
				'kind'					=> $faker->realText($maxNbChars = 40, $indexSize = 2),
				'body_id'				=> $faker->numberBetween($min=1,$max=20)
			));

		}
	}
}		