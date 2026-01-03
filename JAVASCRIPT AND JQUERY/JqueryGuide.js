=========================================SWEETALERT CONDITION===========================================================================================
Swal.fire( 
	'Task Assigned!', 
	'', 
	'success'
).then((value) => { 
		window.location.href =APPLICATION_URL+'Task/taskList';
		location.reload();
});


Swal.fire({
	  title: 'Are you sure?',
	  text: "",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6', 
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes'
}).then((result) => {
		if (result.isConfirmed) {
			alert('Yes');
		}else{
			alert('No');
		}
});


============================================DATALIST====================================================================================================
//display data as drop down//like facebook search
<label for="browser">Choose your browser from the list:</label>
<input list="browsers" name="browser" id="browser">

<datalist id="browsers">
  <option value="Edge">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>

///datalist change event
$("#browser").on('change', function () {
	 var product=$("#product").val();
}); 
$('input[name=product]').focus();
$('input[name=product]').val('');


========================================================================================================================================================
//Autometically cick button
<input type="button" value="Print"  id="click" onclick="window.print()" />
setTimeout(function(){
	$('#click').trigger('click');
}, 10);

========================================================================================================================================================
//min and max attribute using jquery in date
$("#student_exam_date").attr({  
	"min" : exam_date,  
	"max" : end_date  
});


function limitText(field, maxChar){
    $(field).attr('maxlength',maxChar);
}
<input type="text" class="form-control" name="grade_or_pointer" id="grade_or_pointer" placeholder="Grade / Pointer System"   maxlength="2"/>  


