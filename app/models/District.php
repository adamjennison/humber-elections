<?php
class District extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'districts';

	//belongs to
	public function body(){
		return $this->belongsTo('Body');
	}


	// has many of

	public function polls(){
		return $this->hasMany('Poll');
	}

	public function postcodes(){
		return $this->hasMany('Postcode');
	}


    public function elections(){
        return $this->hasManyThrough('Election','Body');
    }

}