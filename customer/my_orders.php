<link rel="stylesheet" href="table.css" media="all" />
<?php
include("includes/db.php");
$c=$_SESSION['email'];
								$get_c="select * from users where email='$c'";
								$run_c=mysqli_query($db,$get_c);
								$row_c=mysqli_fetch_array($run_c);
								$customer_id=$row_c['id']; 
								
?>
<table class="rwd-table">
<tbody>
<tr style="font-size:14px" >
<th>Order</th> 
<th>Due amount</th>
<th>Invoice No</th>
<th>Total Product</th>
<th>Order Date</th>
<th>Paid/Unpaid</th>
<th>Status</th>
<th>Verified/Unverified</th>
</tr>
<?php
$get_order="select * from customer_order where customer_id='$customer_id'";
$run_order=mysqli_query($con,$get_order);
$i=0;
while($row_order=mysqli_fetch_array($run_order)){
$order_id=$row_order['order_id'];
$due_amount=$row_order['due_amount'];
$invoice_no=$row_order['invoice_no'];
$total_product=$row_order['total_products'];
$order_date=$row_order['order_date'];
$order_status=$row_order['order_status'];
$get_status="select * from pending_order where invoice_no='$invoice_no'";
$run_status=mysqli_query($con,$get_status);
$row_status=mysqli_fetch_array($run_status);
$status=$row_status['order_status'];
if($status=='Pending'){
	$order_status_admin='Not verified';
}
else{
	$order_status_admin='Verified';
}

$i++;
if($order_status=='Pending'){
	$order_status='Unpaid';
}
else{
	$order_status='Paid';
}
echo"
<tr align='center'>
<td>$i</td>
<td>$due_amount</td>
<td>$invoice_no</td>
<td>$total_product</td>
<td>$order_date</td>
<td>$order_status</td>
<td ><a href='confirm.php?order_id=$order_id&amount=$due_amount&invoice=$invoice_no'><span style='color:orange;'>Confirm if paid</span></a></td>
<td>$order_status_admin</td>
</tr>
";
}
?>
</tbody>
</table>
<?php
$update_customer
?>