<?php
class Election extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'elections';

	//belongs to
	public function body(){
		return $this->belongsTo('Body');
	}


	// has many of

	public function polls(){
		return $this->hasMany('Poll');
	}

	public function candidacies(){
		return $this->hasMany('Candidacy');
	}

	public function campaigns(){
		return $this->hasMany('Campaign');
	}

    public function districts(){
        return $this->hasManyThrough('District','Candidacy');
    }
}
