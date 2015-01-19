<?php
class Poll extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'polls';

	public function turnout_percent(){
	  return floatval($this->ballot_papers_issued) / floatval($this->electorate) * 100;

	 }

	public function election(){
		return $this->belongsTo('Election');
	}

	public function district(){
		return $this->belongsTo('District');
	}



}