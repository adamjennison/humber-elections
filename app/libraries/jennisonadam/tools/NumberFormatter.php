<?php
	
	namespace JennisonAdam\tools;
	
	//emulates (PHP 5 >= 5.3.0, PECL intl >= 1.0.0) NumberFormatter class
	// for servers that don't have PECL intl >= 1.0.0 installed
	// copied from http://stackoverflow.com/questions/3109978/php-display-number-with-ordinal-suffix
	
	
	Class NumberFormatter
	{

		 public static function addOrdinalNumberSuffix($num) {
		    if (!in_array(($num % 100),array(11,12,13))){
		      switch ($num % 10) {
		        // Handle 1st, 2nd, 3rd
		        case 1:  return $num.'st';
		        case 2:  return $num.'nd';
		        case 3:  return $num.'rd';
		      }
		    }
		    return $num.'th';
		  }

	}
