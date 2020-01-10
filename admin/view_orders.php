<?php
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Bizmart Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
    <link rel="stylesheet" href="../customer/table.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin">

<?php
if(isset($_GET['view_orders'])){
?>
<table class="rwd-table" style="margin-left:300px;" >
<tbody>
<th>Order.No.</th>
<th>Customer</th>
<th>Invoice.No.</th>
<th>Product Id</th>
<th>Quantity</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
include("includes/db.php");
$get_orders="Select * from pending_order";
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
<td><?php echo $order_status;?>&nbsp;&nbsp;</td>
<td><a href="index.php?edit_order_status=<?php echo $id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize;">
Edit</a></td>
<td><a href="delete_order.php?delete_order=<?php echo $id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize" >Delete Order</a></td>
</tr>

<?php
}
?>
</tbody>
</table>
<?php } ?>
</body>
</html>
<?php
}
?>