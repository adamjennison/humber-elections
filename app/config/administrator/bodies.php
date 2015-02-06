<?php

/**
 * Bodies model config
 */

return array(

	'title' => 'Bodies',

	'single' => 'body',

	'model' => 'Body',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name',
		'district_name',
        'districts_name',
        'slug',
        'wards' => array(
                'title' => '# Wards',
                'relationship' => 'districts', //this is the name of the Eloquent relationship method!
                'select' => "COUNT((:table).id)",
            ),
        'elections' => array(
                'title' => '# Elections',
                'relationship' => 'elections', //this is the name of the Eloquent relationship method!
                'select' => "COUNT((:table).id)",
            ),


            
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name',
		'district_name',
        'districts_name',
        'slug',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name',
		'district_name',
        'districts_name',
        'slug',
        'narrative' => array(
            'type' => 'textarea',
            'title' => 'Name',
            'limit' => 300, //optional, defaults to no limit
            'height' => 130, //optional, defaults to 100
        ),
        'url' => array(
            'type' => 'text', //optional, default is 'text'
            'title' => 'URL please inc http://',            
        ),
        'contact_email' => array(
            'type' => 'text', //optional, default is 'text'
            'title' => 'Email address for election related contact',            
        ),
        'contact_phone' => array(
            'type' => 'text', //optional, default is 'text'
            'title' => 'Phone number inc STD code',            
        ),
	),

);
