<?php
//GET IMAGE/PDF FILE SIZE IN MB,This will work in PDF,IMAGE,VIDEO
$uploadedFile = $request->file('doc_name');
$filename = $uploadedFile->getClientOriginalName();
$fileInfo = pathinfo($filename);
$extension = $fileInfo['extension'];  // This will give you file extension
$sizeInBytes = $uploadedFile->getSize();
$sizeInMB = $sizeInBytes / (1024 * 1024); // Convert to megabytes,This will give you filesize in MB

//This is another way but this won't work with PDF
$size = getimagesize($main1['doc_name']);
$ext = $size['mime'];
$mbsize=number_format(filesize($main1['doc_name']) / 1048576, 2);


=====================================IMAGE EASYWAYS================================================================================
- $directory = storage_path('app/qfiles/'); ? // to get all images from path
- rename($directory . $oldname , $directory . $newname);// rename all images
- $p="uploads/".$res['category_image']."";  unlink($p); // unlink images
 
//COPY FILES FROM ONE DIR TO ANOTHER
- $sourcepath = "uploads/category/$oldCategory/".$oldcategoryImage."";   
- $destinationpath = "uploads/category/$category_name/".$oldcategoryImage."";		
- copy($sourcepath, $destinationpath); 

//REMOVE AND CRERATE DIR
- rmdir("uploads/category/$oldCategory/"); 
- mkdir("uploads/category/".$category_name);
- is_dir //to check directory is exist or not 

//GET ALL IMAGES FROM DIRECTORY
$filelist = scandir('screenshot/'.$examStudent->exam_id.'/'.$folder_name,1); // path
foreach($filelist as $key=>$file){
	if (strpos($file, 'StudentHandWritting') !== false) {   // find images containing word 'StudentHandWritting' 
		print_r($file);
	}
}

//UNLINK IMAGE FROM FOLDER
unlink(public_path('images/'.$qry->category_image.'')); //unlink images



====================================IMAGE UPLOAD USING LARAVEL=================================================================================
//UPLOAD IMAGE
create folder in root directory 'upload'
<input type="file" name="certificate_image">
if ($request->hasFile('certificate_image')){
	$input['certificate_image'] = ImageUpload::upload('/upload/certificate',$request->file('certificate_image')); // use App\ImageUpload;
}  

//UPLOAD IMAGE
create folder inside public,public/images 
$category_image = time().'.'.request()->category_image->getClientOriginalExtension();
request()->category_image->move(public_path('images'), $category_image); //public ni andar image nu folder bnavu pde
  

//DISPLAY IMAGE
<img src="/images/<?php echo $path?>" height="30px" width="30px" />
<img src="{{asset('/images/' . $newcategory->category_image)}}" width="100" height="100" /> 
 
 
====================================CORE PHP=================================================================================
      
//For single image
if(isset($_FILES['category_image'])){
	$name=$_FILES['category_image']['name'];
	$type=$_FILES['category_image']['type'];
	$tmpName=$_FILES['category_image']['tmp_name'];
	$size=$_FILES['category_image']['size'];
	$ext = strtolower(end(explode(".",$name)));
	//$ext = pathinfo($name, PATHINFO_EXTENSION); //codeignator
 	$newName=date("YmdHis").".".$ext;
 //	md5(rand(10,100));
	move_uploaded_file($tmpName,"uploads/".$newName);
}


//For Multiple images 
<input type="file" name="product_image[]" id="product_image" class="form-control-file form-control height-auto" multiple>
$images_name="";
foreach ($_FILES["product_image"]["tmp_name"] as $key => $tmp_name) {   
		if ($tmp_name == UPLOAD_ERR_OK) {  
				$tmp_name = $_FILES["product_image"]["tmp_names"][$key];
				$name = $_FILES["product_image"]["name"][$key];  
				$ext = strtolower(end(explode('.',$name))); 
				$array_count= count($_FILES["product_image"]["tmp_name"]);
				for($i=1;$i<=$array_count;$i++){        
						$activation_code = getRandom(20); 
						//md5(rand(10,100));      
						$name_new=$activation_code.".".$ext;  
			 		}         
			 move_uploaded_file($tmp_name, "../uploads/product/".$name_new);
			 $images_name =$images_name."".$name_new.",";   
		}       
	}




========================================== ONCHANGE IMAGE UPLOAD USING JQUERY/JAVASCRIPT ================================================

<input type="file" name="ans_file" id="ans_file" onchange="ajaxFileUpload(this.id)"> 
function ajaxFileUpload(obj)     
{
        var fd = new FormData();
        var fileanswer = $('#ans_file').prop('files')[0];
        fd.append('ans_file',fileanswer);
        fd.append('_token',token);
        fd.append('exam_student_id',exam_student_id);
		$.ajax({ 
            url: SaveMobileanswerFle, 
            type: 'POST', 
            data: fd,
            async: false,
            contentType: false,
            processData: false,
            success: function(response){ 
                var imagename=response; 
		     }, 
    });
}
public function saveMobileAnswerFile(Request $request){
		$ansfile = $request->file('ans_file');
		$exam_student_id = $request->exam_student_id;
        $file = $ansfile->getClientOriginalName();
        $path = '/upload/questionanswer/'.$exam_student_id;
        if(!is_dir(base_path($path))) {
            mkdir(base_path($path));
        }
        $filename = pathinfo($file, PATHINFO_FILENAME);
		$filename = str_replace(' ', '-', $filename);
        $extension = $ansfile->extension();
        $imageName = $filename.'_'.str_random(3).time().'.'.$extension;
		$ansfile->move(base_path($path),$imageName);
        return response()->json($imageName); 
}




//UPLOAD IMAGE USING AJAX LARAVEL WITH FORM
<form method="post" id="uploadprofile_form" enctype="multipart/form-data">	
	<input type = "hidden" name = "_token" id="csrf" value = "<?php echo csrf_token(); ?>">
	<div class="form-group"> 
		<input type="file" class="form-control" name="profile_image" id="profile_image">
	</div>
	<button type="submit" class="btn btn-primary btn-pill">Upload</button>
</form>
<script> 
$('#uploadprofile_form').on('submit', function(event){
	  event.preventDefault();
	  $.ajax({
	   url:"updateprofileimage",
	   method:"POST",
	   data:new FormData(this),
	   dataType:'JSON',
	   contentType: false,
	   cache: false,
	   processData: false,
	   success:function(result)
	   { 
			
	   }
	})
 });  
</script>
-->in model
	 $profile_image = time().'.'.request()->profile_image->getClientOriginalExtension();
	request()->profile_image->move(public_path('upload/path/profile_pictures'), $profile_image); 


//ONCHANGE OTHER WAY
<input type="file" name="profile_image" id="profile_image">
$(document).on("change","#profile_image",function(){  
		var form_data= new FormData();
		var property= document.getElementById("profile_image").files[0];
		var image_name= property.name;
		var image_extension= image_name.split('.').pop().toLowerCase(); //get the image  extension
		form_data.append("profile_image",property);
		$.ajax({   
				url: '<?php SITE_URL; ?>ajax_operations/labor/laboradd.php',       
				method: 'POST',    
				data: form_data, 
				success:function(result)   
				{       
					alert(result);    
				}   
			});
});
in db file access like $_FILES['profile_image']; 




==============================================================================================================================
//IMAGE PREVIEW WITHOUT SAVE
<input type="file" class="form-control" name="profile_image" id="profile_image">
<img class="card-img-top" id="image_preview" src="assets/img/elements/cc3a.jpg" alt="Card image cap">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile_image").change(function () {
    readURL(this);
});


//IMAGE FILE SIZE AND FORMET VALIDATION
<input type="file" class="form-control" id="doc_name_<?php echo $cval['id']; ?>" name="doc_name[]" onchange="ValidateFileUpload('doc_name_<?php echo $cval['id']; ?>')"> 

function ValidateFileUpload(id){
 	fileName = document.querySelector('#'+id+'').value; 
    extension = fileName.split('.').pop();  

	var file = $('#'+id+'')[0].files[0];
	var totalSize = file.size;
	var totalSizeMb = totalSize  / Math.pow(1024,2);
	
	if(extension=="JPG" || extension=="PNG" || extension=="JPEG" || extension=="jpg" || extension=="png" || extension=="jpeg" || extension=="pdf"){
		if(totalSizeMb>2){
				$(':input[type="submit"]').prop('disabled', true);	
				alert('Please upload a file that is less then 2 MB in size, as the current file is too large');
		}else{
			$(':input[type="submit"]').prop('disabled', false);	
		}
		
	}else{
		alert('Invalid file extension. Please use a supported file format'); 
		$(':input[type="submit"]').prop('disabled', true);	
	}
}


