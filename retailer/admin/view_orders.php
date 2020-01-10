<?php
if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Retailer Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
    <link rel="stylesheet" href="../table.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin">
<?php
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

if(isset($_GET['view_orders'])){
?>	
<table class="rwd-table" style="margin-left:300px;" width="800px;">
<tbody>
<td>Order.No.</td>
<td>Customer</td>
<td>Invoice.No.</td>
<td>Product Id</td>
<td>Quantity</td>
<td>Status</td>
<td>Delete</td>
</tr>
<?php
include("includes/db.php");
$get_orders="Select * from retailer_pending_order where retailer_id='$retailer_id'";
$run_orders=mysqli_query($con,$get_orders);
$i=0;
while($row_order=mysqli_fetch_array($run_orders)){
$id=$row_order['order_id'];	
$customer_id=$row_order['customer_id'];
$invoice_no=$row_order['invoice_no'];
$product_id=$row_order['product_id'];
$qty=$row_order['qty'];
$order_status=$row_order['order_status'];
$i++;
?>
<tr align="center" style="text-align:center">
<td><?php echo $i;?></td>
<td>
<?php
$get_customer="select * from users where id='$customer_id'";
$run_customer=mysqli_query($con,$get_customer);
$row_customer=mysqli_fetch_array($run_customer);
$customer_email=$row_customer['email'];
echo $customer_email;
?>
</td>
<td><?php echo $invoice_no; ?> </td>
<td><?php echo $product_id; ?> </td>
<td><?php echo $qty;?></td>
<td><?php echo $order_status;?>&nbsp;&nbsp;<a href="index.php?edit_order_status=<?php echo $id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize;">Edit</a></td>
<td><a href="delete_order.php?delete_order=<?php echo $id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize" >Delete Order</a></td>
</tr>

<?php
}
?>
</table>
<?php } ?>
</body>
</html>
<?php
}
?>