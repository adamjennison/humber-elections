<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollingstationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	// Reference	Area_code	GSS_Code	Districts	One Line Address	Latitude	Longitude	Easting	Northing	Address 1	Address 2	Address 3	City	County	Postcode

	public function up()
	{
		//
		Schema::create('pollingstations', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->increments('id');

			$t->string('area_code');
			$t->string('gss_code');
			$t->string('name');
			$t->string('address');
			$t->string('postcode_id');
			$t->integer('easting');
			$t->integer('northing');
			$t->float('lat');
			$t->float('lng');

			//created_at, updated_at DATETIME
			$t->timestamps();

		});		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('pollingstations');
	}

}
