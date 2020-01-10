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
if(isset($_GET['view_products'])){
?>	
<table class="rwd-table" style="margin-left:300px;">
<tbody>
<th>Product No</th>
<th>Title</th>
<th>Image</th>
<th>Price</th>
<th>Total Sold</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
include("includes/db.php");
$get_pro="Select * from products";
$run_pro=mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
$pro_id=$row_pro['product_id'];
$pro_title=$row_pro['product_title'];
$pro_image=$row_pro['product_img1'];
$pro_price=$row_pro['product_price'];
$status=$row_pro['status'];
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $pro_title;?></td>
<td><img src="product_images/<?php echo $pro_image?>" width="50" height="50"> </td>
<td><?php echo $pro_price;?></td>
<td align="center">
<?php
$get_sold="select * from pending_order where product_id='$pro_id'";
$run_sold=mysqli_query($con,$get_sold);
$count=mysqli_num_rows($run_sold);
echo $count;
?>
</td>
<td align="center">
<?php
echo $status;
?>
</td>
<td><a href="index.php?edit_pro=<?php echo $pro_id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize" >Edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize" >Delete</a></td>
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