===========================DOM EVENTS===================================================================================================================
$(document).ready(function() {	 
	alert('Hello');
}); 
$(document).on('click','.add_btn',function(){})      	
$(document).on('change','.add_btn',function(){})      
$('.class').on('change', function(){});  //select onchange
$('#image').on('change', function(){}); //image onchange


=============================================GUIDE======================================================================================================
$("#alertmsg").show().delay(5000).fadeOut(); 
var id=$(this).data('id');  data-id="<?php echo $row['id'];?>"
$("#confirmation_modal").modal('toggle'); 

//INPUT VALUES
- var value= $("#id").val(); //get input value
- var input =$("#input").val().length; // get input length
- var qty=$("#qty").val(); var value= $.isNumeric(qty);  // value nmeric or not  
- var value = $("#encrypt_decrypt").text(); //get div text

//APPEND DATA
- $("#dynamic_body").empty();
- $("#dynamic_body").eppend();
- $(result).appendTo("#dynamic_fields");//append data continue
- $(result).insertAfter("#dynamic_fields"); //append after perticular div
- $("#dynamic_div").remove(); //remove div  

// JQUERY CSS
- $("#dynamic_body").hide();
- $("#dynamic_body").show();
- $("#dynamic_body").css("display", "none");


//ATTRIBUTE
- $('#btnId').attr('data-id' , 'value'); // set data-id  
- $('#userprofile_image').attr("src",profile_image); //set image src 


//ENABLE DISABLE
$(':input[type="submit"]').prop('disabled', false);	
$('#register_btn').attr('disabled',true/false);
$("#input").prop('disabled', true/false); 


=============================================RADIO/SELECT/CHECKBOX======================================================================================
//RADIO
$('input[type=radio][name=radioname]').change(function() {
	   var value=$(this).val();
});

if($("#is_image").prop("checked") == true){ 
	alert('checkbox is checked');
 }else{
	alert('checkbox is not checked'); 
 } 



//SELECT
var category_id = $('#catdrop_down :selected').val(); // get selected option value
var category_id = $('#catdrop_down :selected').text(); // get selected option text


//CHECKBOX
$("#is_priority").prop('checked', false/true);//check uncheck checkbox using jquery
-->change evet
	$('.userid').change(function() {     
		if($(this).prop("checked") == true){ 
			var type="checked";
		} 
		if($(this).prop("checked") == false){ 
			var type="unchecked";
		}  
	 }); 

-->Only one checkbox allowded
	$('input[type="checkbox"]').on('change', function() {
	   $('input[type="checkbox"]').not(this).prop('checked', false);
	});

-->select all checkbox
	$("#select_all").click(function(){
		 $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
	}); 



====================================================================================================================================================
//base64encode encode decode
- var password=$("#password").val();
- var encodedStringBtoA = btoa(password); 

//Form ma Conformation aapva mate   
<form method="POST" action="{{ route('student.exam.suspectchange') }}" onsubmit="return confirm('Do you really want to suspect the student ?');">
  
	
- window.location.href = "dashboard.php";  
- location.reload();

- var count = $('#user_table').children('tr').length;//user_table is tbody id ,count tbody tr tag
- var rowCount = $('#tourlisttable tr').length; //get table length 


$("#teacherconfirmation_form").submit();

==============================================================================================================================
