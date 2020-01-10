<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

	?>
<?php
include("includes/db.php");
if(isset($_GET['delete_order'])){
	$del_order_id=$_GET['delete_order'];
	$del_pro="delete from pending_order where order_id='$del_order_id'";
	$run_del=mysqli_query($con,$del_pro);
	if($run_del){
	echo "<script>alert('One Order deleted')</script>";
	echo"<script>window.open('index.php?view_orders','_self')</script>";
		}
	
	
	
	
	}

?>
<?php
}
?>