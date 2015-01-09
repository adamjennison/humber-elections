<?php
class Campaign extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campaigns';


	public function election(){
		return $this->belongsTo('Election');
	}


	public function party(){
		return $this->belongsTo('Party');
	}


}