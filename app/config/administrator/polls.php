<?php

/**
 * Polls model config
 */

return array(

	'title' => 'Polls',

	'single' => 'Poll',

	'model' => 'Poll',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
        'electorate',
        'seats',
        'ballot_papers_issued'      =>  array('title'   =>  'Issued'),
        'ballot_papers_rejected'    =>  array('title'   =>  'Rejected'),
        'election' =>  array(
            'title'         =>  'Election',
            'relationship'  =>  'election',
            'select'        =>  "CONCAT((:table).d,' ',(:table).kind)",
        ),        
        'district_name' =>  array(
            'title'         =>  'Ward',
            'relationship'  =>  'district',
            'select'        =>  "(:table).name",
            
        ),     
        
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
        'electorate',
        'seats',
        'ballot_papers_issued'      =>  array('title'   =>  'Issued'),
        'ballot_papers_rejected'    =>  array('title'   =>  'Rejected'),
         'election' =>  array(
            'title'    =>  'Election',
            'type'     =>  'relationship',
            'name_field'    =>  "d",
        ),
        'district' =>  array(
            'title'         =>  'Ward',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            
        ),
                  
        
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'id',
        'electorate',
        'seats',
        'ballot_papers_issued'      =>  array('title'   =>  'Issued'),
        'ballot_papers_rejected'    =>  array('title'   =>  'Rejected'),
        'election' =>  array(
            'title'    =>  'Election',
            'type'     =>  'relationship',
            'name_field'    =>  "d",
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array('d'),            
        ),
        'district' =>  array(
            'title'         =>  'Ward',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array('name'),
            
        ),
        
	),

);
