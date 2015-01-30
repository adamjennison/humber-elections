<?php

class ElectionsTableSeeder extends Seeder {

	public function run(){

		/*
		$faker = Faker\Factory::create('en_GB');

		foreach(range(1,20) as $index)
		{
			Election::create(array(
				'd'						=> $faker->date($format = 'Y-m-d', $max = 'now'),
				'reason'				=> $faker->realText($maxNbChars = 50, $indexSize = 2),
				'kind'					=> 'Full Council',
				'body_id'				=> $faker->numberBetween($min=1,$max=5)
			));

		}

		*/

		Election::create(array(
			'd'			=> 	'2014-05-01',
			'reason'	=>	'Reason for election',
			'kind'		=>	'Full Council Election',
			'body_id'	=>	1

		));
        
		Election::create(array(
			'd'			=> 	'2012-05-03',
			'reason'	=>	'Reason for election',
			'kind'		=>	'Full Council Election',
			'body_id'	=>	1

		));        


	}
}		
