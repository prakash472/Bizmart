<?php
if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{

?>
<?php
include("includes/db.php");
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

if(isset($_GET['edit_order_status'])){
	$edit_order_status_id=$_GET['edit_order_status'];
	 $edit_status="select * from retailer_pending_order where order_id='$edit_order_status_id' and retailer_id='$retailer_id'";
	 $run_edit=mysqli_query($con,$edit_status);
	 $row_edit=mysqli_fetch_array($run_edit);
	 $order_status=$row_edit['order_status'];
	 	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
form{margin:15%;}
</style>
</head>
<body>

<form action="" method="post" style="margin-left:550px; margin-top:200px; background:rgba(0,0,0,.1); "  >
<b> Edit the Status</b>
<input type="text" name="order_status1" value="<?php echo $order_status; ?>"/>
<input type="submit" name="update_status" value="Update Status" />
</form>

<?php
if(isset($_POST['update_status'])){
	$status_title2=$_POST['order_status1'] ;
	$update_brand="update retailer_pending_order set order_status='$status_title2' where order_id='$edit_order_status_id' and retailer_id='$retailer_id'";
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