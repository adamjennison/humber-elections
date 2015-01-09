<?php
class Candidacy extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidacies';


	public function election(){
		return $this->belongsTo('Election');
	}

	public function candidate(){
		return $this->belongsTo('Candidate');
	}

	public function party(){
		return $this->belongsTo('Party');
	}

	public function district(){
		return $this->belongsTo('District');
	}


}