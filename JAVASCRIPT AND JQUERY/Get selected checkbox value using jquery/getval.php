https://www.tutorialrepublic.com/faq/how-to-get-the-values-of-selected-checkboxes-in-a-group-using-jquery.php
<input type="checkbox" value="<?php echo $something;?>" name="cat_ids">

<a href="#" id="multiple_delete" type="button" class="btn btn-block btn-primary">delete</a>

<script>
 $(document).on("click","#multiple_delete",function(){   
		var catID = [];
		$.each($("input[name='cat_ids']:checked"), function(){
			catID.push($(this).val());
		});
		alert(catID);//selected ids 
 }); 
</script>