<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();


		
		$this->call('PollingstationsTableSeeder');

		$this->call('BodiesTableSeeder');
		$this->call('DistrictsTableSeeder');


		
		$this->call('PostcodesTableSeeder');
		$this->call('CandidatesTableSeeder');
		$this->call('PartiesTableSeeder');
		$this->call('ElectionsTableSeeder');
		$this->call('CandidaciesTableSeeder');
		$this->call('CampaignsTableSeeder');	             
		$this->call('PollsTableSeeder');
		

	}

}