<?php

class PollsTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create();

		foreach(range(1,20) as $index)
		{

			Poll::create(array(

				'electorate'			=> $faker->numberBetween($min=2000,$max=4000),
				'ballot_papers_issued'	=> $faker->numberBetween($min=1000,$max=2000),
				'seats'					=> 3,
				'election_id'			=> $faker->numberBetween($min=1,$max=20),
				'district_id'			=> $faker->numberBetween($min=1,$max=20)


			));
		}
	}
}		