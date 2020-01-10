<?php
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

?>
<?php
include("includes/db.php");
if(isset($_GET['edit_order_status'])){
	$edit_order_status_id=$_GET['edit_order_status'];
	 $edit_status="select * from pending_order where order_id='$edit_order_status_id'";
	 $run_edit=mysqli_query($con,$edit_status);
	 $row_edit=mysqli_fetch_array($run_edit);
	 $order_status=$row_edit['order_status'];
	 	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Bizmart Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin">
<form action="" method="post" style="margin-left:550px; margin-top:200px; background:rgba(0,0,0,.1); " ><b> Edit the Status</b>
<input type="text" name="order_status1" value="<?php echo $order_status; ?>"/>
<input type="submit" name="update_status" value="Update Status" />
</form>

<?php
if(isset($_POST['update_status'])){
	$status_title2=$_POST['order_status1'] ;
	$update_brand="update pending_order set order_status='$status_title2' where order_id='$edit_order_status_id'";
	$run_update=mysqli_query($con,$update_brand);
	if($run_update){
	echo"<script>alert('Status has been Updated')</script>";
		echo"<script>window.open('index.php?view_orders','_self')</script>";

	}
}
?>
</body>
</html>
<?php
}
?>