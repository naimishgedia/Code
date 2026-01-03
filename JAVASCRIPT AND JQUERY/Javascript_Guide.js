//Stop form submittion
document.getElementById("dailyExpanseForm").addEventListener("submit", function(event) {
    event.preventDefault();
});

=======================================================================================================================
- Math.round(28.65626)  //this will return 28
- var length=  data.length; //get length of string
- var data 
  typeof(data) //get type of string
  parseInt(data) //convert string to integer

$("#div"+var+"").empty(); //Load Variable in javascript
var birth_date = date.substring(0,4);//get first 5 chars  



===================================Concat html in one variable=======================================================
var dataone="";
var dataone='<label>Select Subcategory</label>'+  
			'<select class="custom-select" name="subcategory_id" id="subcategory_id">'+
			'<option  selected disabled >--select subcategory--</option>';
var dataone=dataone+'<option  value="val">val</option>'; 


=======================================================LOOPS================================================================
/////
$CenterJsonArray = json_encode($center); //Pela json_encode karvano 
var CenterJson = <?php echo $CenterJsonArray; ?>; //store that array into javascript variable
var option=""; 
CenterJson.forEach(function(item) { 
		option= option+'<option value='+item.id+'>'+item.name+'</option>';
});

			 
=======================================ARRAY =====================================================================
var finalamount=[]; //make array 

//to sum all elements 
var array=["1,2,3,4"];   
var finalarray = array.reduce(function(a, b){
										return a + b;
								     }, 0);
//array push
var finalamount=[];  
finalamount.push(var);