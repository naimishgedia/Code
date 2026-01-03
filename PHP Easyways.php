<?php
============================================PHP EASYWAYS=========================================================================
- substr_count("My name is alex and my father name is roy","name") //find perticular string count (Ex name=2 times)
- $password=md5($_POST['password']);  //encrypted string
- ($data1).($data2) //concat string
- is_numeric($a) //string is numeric or not  
- echo strcasecmp('ABC','abc'); //if string is same,it returns 0
- echo stripslashes($CMS->content);  // Render HTML


=========================================ARRAYS============================================================================
- if (empty($array)) {} // array is empty or not
- is_array($cartdata)//check array or not
- is_countable($myArray) //array is countable or not
- $getlastkey = end($result2); // get last object from PHP array
- min/max($mainArray);	 // get min and max value (2,4) 
 

-$str_arr = explode (",", $string);   // array formet  
-$str_arr = implode (",", $string);   // comma saperated 
-$newgetteacherexams->exam_name = $getexamName->name; //to add key and value to stdClass array	
  
 //ARRAY FUNCTIONS
- array_sum($res);
- array_merge($res,$row1);	
- array_push($final,$new_res);    
- in_array("Glenn", $people) , if(!in_array($newmultiple_ans, array('A','B','C','D','E','F','a','b','c','d','e','f'))) //check multiple values      
- array_diff($a1,$a2); // remove same values
- sizeof($var) 
- array_filter($cartArray) // remove empty key
- array_slice($cartArray,2)// remove first 2 key from array
- array_slice($circular, 0, 5, true); // select first 5 records from array
- array_chunk($ArrayFormet,2); // array values nu groupe padse
- sort($a, SORT_NATURAL | SORT_FLAG_CASE); $a=Array([0] => d,[1] => a,[2] => b) // sort by accending order
- array_flip($a1); // key =>value and value=>key
- array_intersect_key($a1,$a2); //Compare the keys of two arrays, and return the matches:

// NAME ARRAYS
<input type="hidden" name="itm_ids[]" value="<?php echo $newnewAddons->itm_id;?>">
<input type="hidden" name="uom_id[]" value="<?php echo $newnewAddons->uom_id;?>">

and now if you want to assess all name array values then you can use followig code
$mainArray=array();
foreach($itm_weight as $index=>$value){
	$testArray=array();
	$testArray['itm_id']=$itm_ids[$index];
	$testArray['itm_uom_id']=$uom_id[$index];
	array_push($mainArray,$testArray);
}   




 













?>