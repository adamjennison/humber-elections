<?php
class Poll extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'polls';


	public function election(){
		return $this->belongsTo('Election');
	}

	public function district(){
		return $this->belongsTo('District');
	}

}