<div class="card card-primary">
              <div class="card-header"> 
                <h3 class="card-title">Add Family Members Here</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Add Family Member</label>
						<form role="form" id="family_form">
							<div id="dynamic_field">
								<div style="padding: 10px;" id="subelement"> 
									<input type="text" class="form-control"  name="family_members[]"  placeholder="Add Member">
								</div>
							</div> 
						</form>
                  </div> 
                </div> 
                <div class="card-footer row">
					<div class="col-md-10 row">
						<div class="col-md-2"> 
							<button type="button" id="insertBtn" class="btn btn-block btn-primary">Submit</button>
					    </div>
						<div class="col-md-2">
							<button type="button" class="btn btn-block btn-success" id="addBtn">Add Member</button>
					    </div>
						<div class="col-md-2">
								<button type="button" class="btn btn-block btn-danger" id="removeBtn">Remove</button>
					    </div>
					</div>
					<div class="col-md-2">
					</div>
				</div> 
			</div>
			
<script>
$(document).on("click","#addBtn",function(){
	$('<div style="padding: 10px;" id="subelement"><input type="text" class="form-control" name="family_members[]"  placeholder="Add New Member"><div>').appendTo("#dynamic_field");
});  
 
$(document).on("click","#removeBtn",function(){
	$("#subelement").remove();  
});       




 
$(document).on("click","#insertBtn",function(){   
var family_members = $("input[name='family_members[]']").map(function(){return $(this).val();}).get();
	
	$.ajax({   
				url:APPLICATION_URL+'Dashboard/insertFamilymembers',      
				method: 'POST',    
				data: {
					'family_members' : family_members,  	    
				},   
				success:function(result)   
				{      
					if(result==1){
						alert('inserted');
					} else{
							alert('not inserted');
					} 
				}   
			});

}); 
</script>