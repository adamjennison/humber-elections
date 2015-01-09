<?php

class CampaignsTableSeeder extends Seeder {

	public function run(){


		$faker = Faker\Factory::create();

		foreach(range(1,20) as $index)
		{

			// code goes here

			Campaign::create(array(
				'party_url'				=>	$faker->url,
				'manifesto_html_url'	=>	$faker->url,
				'manifesto_pdf_url'		=>	$faker->url,
				'election_id'			=>	$index,
				'party_id'				=>	$index

			));

		}
	}
}		