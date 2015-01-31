<?php

/**
 * Elections model config
 */

return array(

	'title' => 'Elections',

	'single' => 'election',

	'model' => 'Election',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
        'd',
		'reason',
		'kind',
        'body_name' =>  array(
            'title'         =>  'Body',
            'relationship'  =>  'body',
            'select'        =>  "(:table).name",
        ),          
        
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
        'd',
		'reason',
		'kind',
        'body' =>  array(
            'title'         =>  'Body',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            ),
        
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'd'=> array(
                'type' => 'date',
                'title' => 'Date',
                'date_format' => 'yy-mm-dd', //optional, will default to this value
            ),
		'reason',
        'kind',
        'body' =>  array(
            'title'         =>  'Body',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array('name'),
            
        ),        

        
	),
    

);
