<?php
	
	namespace jennisonadam\tools;
	
	//copied from http://stackoverflow.com/questions/1534127/pluralize-in-php
	
	
	Class String
	{

		/**
		 * Pluralizes a word if quantity is not one.
		 *
		 * @param int $quantity Number of items
		 * @param string $singular Singular form of word
		 * @param string $plural Plural form of word; function will attempt to deduce plural form from singular if not provided
		 * @return string Pluralized word if quantity is not one, otherwise singular
		 */
		public static function pluralize($quantity, $singular, $plural=null) {
		    if($quantity==1 || empty($singular)) return $singular;
		    if($plural!==null) return $plural;

		    $last_letter = strtolower($singular[strlen($singular)-1]);
		    switch($last_letter) {
		        case 'y':
		            return substr($singular,0,-1).'ies';
		        case 's':
		            return $singular.'es';
		        default:
		            return $singular.'s';
		    }
		}

	}