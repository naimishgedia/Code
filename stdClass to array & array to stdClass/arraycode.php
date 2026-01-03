<?php
 function arrayToObject($d) {
        if (is_array($d)) {
            return (object) array_map(__FUNCTION__, $d);
        }
        else {
            return $d;
        }
    }


   function objectToArray($d) {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }
		
        if (is_array($d)) { 
            return array_map(__FUNCTION__, $d);
        }
        else {
            return $d;
        }
    }



// Convert array to object and then object back to array
	$array = objectToArray($init);
	$object = arrayToObject($array);	
?>