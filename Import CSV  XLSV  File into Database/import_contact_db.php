<?php
    include('includes/connection.php');
	include('includes/functions.php');
	
	
	
	if(isset($_POST['importSubmit'])){
	 
	
	 
	
	
	
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["importfile"]["name"]);
   
   

   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  
 
   

   $uploadOk = 1;
   if($imageFileType != "csv" ) {
     $uploadOk = 0;
   }

   if ($uploadOk != 0) {
      if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir.'importfile.csv')) {
	   
	 

        // Checking file exists or not
        $target_file = $target_dir . 'importfile.csv';
		 
		
        $fileexists = 0;
		
		
        if (file_exists($target_file)) {  
           $fileexists = 1;
        }
		
        if ($fileexists == 1 ) {  
			
			
			 
           // Reading file
           $file = fopen($target_file,"r");
		   
		     
		   
		   
           $i = 0;

           $importData_arr = array();
		   
		    
                          
			 
           while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
		   
				
             $num = count($data);
		   
 
             for ($c=0; $c < $num; $c++) {
					$importData_arr[$i][] = $data[$c];
					
				}
			 
             $i++;
           }  
		  
		   
					
		   
           fclose($file);

           $skip = 0;
		    
			
			
			 
           // insert import data
           foreach($importData_arr as $data){  
		   
				if($skip != 0){
				
					
					  
					$sql2 = mysql_query("SELECT id  FROM company where company_name='".$data[0]."'");
					$pre_data = mysql_fetch_assoc($sql2);
					 
					
					 
					if($pre_data['id']==""){
						$company_id=0; 
					}else{
					
					$company_id=$pre_data['id']; 
					}
						 
					 
					
					 
					
					
						
			  	  
					 $first_name = $data[1];
					 $last_name = $data[2];
					
					 $phone_no = $data[3];
					 $title = $data[4];
					 $email = $data[5];
					
					 
					
					  
					
					 
            		   
				 $insert_query = mysql_query("insert into contact(company_id,first_name,last_name,phone_no,title,email) values('".$company_id."','".$first_name."','".$last_name."','".$phone_no."','".$title."','".$email."')");
					
				  header('Location:contact_list.php');  
							  		
				 
					}   
				  
				  $skip ++;
			   }
			   exit;
			   
			   $newtargetfile = $target_file;
			   if (file_exists($newtargetfile)) {
				  unlink($newtargetfile);
			   }
			}

		}
	}
}

	?>