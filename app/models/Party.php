<?php
class Party extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parties';



	// has many of

	public function candidacies(){
		return $this->hasMany('Candidacy');
	}

	public function campaigns(){
		return $this->hasMany('Campaign');
	}

}