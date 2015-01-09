<?php

class CandidatesTableSeeder extends Seeder {

	public function run(){

		//Eloquent::unguard();

		$faker = Faker\Factory::create();

		foreach(range(1,20) as $index)
		{

			Candidate::create(array(

				'forenames'	=>	$faker->firstName($gender='male'),
				'surname'	=>	$faker->lastName,
				'sex'		=>	'male'

			));
		}	

		foreach(range(1,20) as $index)
		{

			Candidate::create(array(

				'forenames'	=>	$faker->firstName($gender='female'),
				'surname'	=>	$faker->lastName,
				'sex'		=>	'female'

			));
		}
	}
}