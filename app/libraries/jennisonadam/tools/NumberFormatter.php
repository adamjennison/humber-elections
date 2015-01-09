<?php

	namespace JennisonAdam\tools;

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