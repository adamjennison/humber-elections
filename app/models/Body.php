<?php
class Body extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bodies';

	public function elections(){
		return $this->hasMany('Election');
	}

	public function districts(){
		return $this->hasMany('District');
	}
	
	public function electionsForThisBody(){
		
	}
}
