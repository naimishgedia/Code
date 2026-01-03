<?php
	include("includes/connection.php");
	include("includes/functions.php");
	////////////////////last 3 lines are important,apart from that everything is simple code
	
   $pdf_num= date("YmdHis");
	 
	$order_id=$_GET['order_id']; 
	
	$sql = mysqli_query($con,"select * from checkout where order_id='".$order_id."'" );   
	$res = mysqli_fetch_assoc($sql);
	$date=$res['created_date'];
	$newDate = date("d-m-Y", strtotime($date));
	
	$sql2 = mysqli_query($con,"select * from register where id='".$res['user_id']."'" );   
	$res2 = mysqli_fetch_assoc($sql2);
	
	$sql3 = mysqli_query($con,"select * from checkout_order where order_id='".$res['order_id']."'" );   
	
	 
$output='<table border="1px solid black;"> 
<tbody>  
<tr> 
<td colspan="5"><b>Dealer Details</b></td>
</tr>
<tr>
<tr>
<th>Order Id </th>
<th>Dealer Unique Number</th>
<th>Dealer Name</th>
<th>Dealer Email </th>
</tr>
<tr>
<td>'.$res['order_id'].'</td>
<td>'.$res2['uniq_key'].'</td>
<td>'.$res2['username'].'</td>
<td>'.$res2['email'].'</td>
</tr>
</tbody>
</table><br><br>';		
 


$output.=' <table style="width:100%" border="1px solid black;">
  <tr>
    <th>Product Name</th>
    <th>Price</th> 
    <th>Quantity</th> 
    <th>Date</th>
    <th>Total</th>
  </tr>';
  
  
  while($res3 = mysqli_fetch_assoc($sql3)){
	  $sql4 = mysqli_query($con,"select * from product where product_id='".$res3['product_id']."'");
	  $res4 = mysqli_fetch_assoc($sql4);
	  
	  if($res2['user_type']=="dealer"){
				$price=$res4['dealer_price'];
		}else{
			 
			$price=$res4['user_price']; 
		} 
	  
	   
 $output.='<tr>
		<td>'.$res4['product_name'].'</td>';
		
		 
$output.='<td>&#x20b9;'.$price.'</td>';
		 
$output.='<td>'.$res3['product_qty'].'</td>
	    <td>'.$newDate.'</td>'; 
	   
	   
		$total=	  $price*$res3['product_qty'];
$output.='<td>&#x20b9;'.$total.'</td></tr>';
 }
 
 $qry5 = mysqli_query($con,"select sum(final_amount) as grand_total from  checkout_order where order_id = ".$res['order_id'].""); 
 $row5=mysqli_fetch_assoc($qry5); 
 
 $gst = $row5['grand_total']*0.18;
 $finalTotal=$row5['grand_total']+$gst;

$output.='<tr>
		<td>Total : &#x20b9;'.$row5['grand_total'].'</td>
		<td>18% GST  : &#x20b9;'.$gst.'</td>
		<td>Grand Total :&#x20b9;'.$finalTotal.'</td>
	</tr>'; 
   
   
  
$output.='</table>';
	 
header("Content-Type:application/xls");
header("Content-Disposition:attachment;filename=download.xls");
echo $output;
 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>