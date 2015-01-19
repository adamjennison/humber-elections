<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('postcodes', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->string('postcode');
			$t->integer('positional_quality_indicator');
			$t->integer('easting');
			$t->integer('northing');
            $t->string('gridref');
			$t->string('country_code');
			$t->string('nhs_regional_ha_code');
			$t->string('admin_county_code');
			$t->string('admin_district_code');
			$t->string('admin_ward_code');
			$t->string('nha_ha_code');
            $t->string('ward_name');
            $t->date('introduced');
            $t->date('terminated');
            
			$t->decimal('lat',18,12);
			$t->decimal('lng',18,12);
			$t->integer('seats');

			$t->integer('pollingstation_id')->unsigned()->index('postcodes_pollingstations_id_foreign');
			$t->integer('district_id')->unsigned()->index('postcodes_districts_id_foreign');

			//created_at, updated_at DATETIME
			$t->timestamps();
			$t->primary('postcode');

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
		Schema::drop('postcodes');
	}

}
