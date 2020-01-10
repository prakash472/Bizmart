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
if(isset($_GET['view_customers'])){
?>	
<table class="rwd-table" style="margin-left:300px;" >
<tbody>
<th>S.NO.</th>
<th>Name</th>
<th>Email</th>
<th>Image</th>
<th>Address</th>
<th>Delete</th>
</tr>
<?php
include("includes/db.php");
$get_customers="Select * from users";
$run_customer=mysqli_query($con,$get_customers);
$i=0;
while($row_customer=mysqli_fetch_array($run_customer)){
$id=$row_customer['id'];	
$customer_fname=$row_customer['first_name'];
$customer_lname=$row_customer['last_name'];
$customer_email=$row_customer['email'];
$customer_image=$row_customer['profile_pic'];
$customer_address=$row_customer['address'];
$i++;
?>
<tr align="center" style="text-align:center">
<td><?php echo $i;?></td>
<td style="padding-bottom:20px;"><?php echo $customer_fname;?> <span><?php  echo $customer_lname;?></span></td>
<td><?php echo $customer_email;?></td>
<td><img src="../customer/images/<?php echo $customer_image?>" width="90" height="90"> </td>
<td><?php echo $customer_address;?></td>
<td><a href="delete_customer.php?delete_customer=<?php echo $id;?>" style="color:#00f; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize" >Delete Customers</a></td>
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