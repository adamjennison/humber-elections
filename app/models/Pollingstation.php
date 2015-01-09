<?php
class Pollingstation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pollingstations';


	public function postcodes(){
		return $this->hasMany('Postcode');
	}


}