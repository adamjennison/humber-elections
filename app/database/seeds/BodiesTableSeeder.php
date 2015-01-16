<?php

class BodiesTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create('en_GB');

		Body::create(array(
			'name'				=>  'Hull City Council',
			'district_name'		=>	'Ward',
			'districts_name'	=>	'Wards',
			'slug'				=>	'hull-city-council'
			));
		Body::create(array(
			'name'				=>  'East Riding of Yorkshire Council',
			'district_name'		=>	'Ward',
			'districts_name'	=>	'Wards',
			'slug'				=>	'east-riding-of-yorkshire-council'
			));
		Body::create(array(
			'name'				=>  'North East Lincs Council',
			'district_name'		=>	'Ward',
			'districts_name'	=>	'Wards',
			'slug'				=>	'north-east-lincs-council'
			));
		Body::create(array(
			'name'				=>  'North Lincs Council',
			'district_name'		=>	'Ward',
			'districts_name'	=>	'Wards',
			'slug'				=>	'north-lincs-council'
			));
		Body::create(array(
			'name'				=>  'UK Parliament',
			'district_name'		=>	'Constituency',
			'districts_name'	=>	'Constituencies',
			'slug'				=>	'uk-parliament'
			));
		

/*
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

		*/
	}
}		
