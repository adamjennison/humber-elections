<?php
class Postcode extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'postcodes';


	public function polingstation(){
		return $this->belongsTo('Pollingstation');
	}

	public function district(){
		return $this->belongsTo('District');
	}

}