=========================================EMAIL=====================================================
function validateEmailId(input) {
			var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if (emailFormat.test(input)) {
				return true;
			} else {
				return false;
			}
}

//example
var email="xyz";
var email_formt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(email_formt.test(email)){ 
				$("#third_email_validation").css('display','none');
				final_chk3.push(true);
			}else{
				$("#third_email_validation").text("Please Enter Valid Email Address");
				$("#third_email_validation").css('display',''); 
				final_chk3.push(false); 
			}






================================================IMAGE==============================================
var img = $('#id').val().split('.').pop().toLowerCase();
			if($.inArray(imageext, ['png','jpg','jpeg']) == -1) {
					$("#section_id").css('display',''); //display error message
					//final_chk4.push(false);  
		}else{
			$("#section_id").css('display','none');  //display error message
		}




=============================================NUMBERS ONLY===============================================
1. "mobNum.length"  ex: if(mobNum.length==10) used for length of number

 $("#phone").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errorphone").html("Digits Only").show().fadeOut("slow");
					   return false;
			  } 
		   });
 
 2 . <input type="text" maxlength="10" minlength="10">  // allow only 10 digits 




============================================VALIDATE URL==================================================
		
   1.   $url = "wswww3schoolscom"; // Validate url
		if (filter_var($url, FILTER_VALIDATE_URL)) {
		    echo("$url is a valid URL");
		} else {
		    echo("$url is not a valid URL");
		}	

   2.  <input type="url" name="homepage"><br>




		