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
if(isset($_GET['delete_customer'])){
	$del_id=$_GET['delete_customer'];
	$del_pro="delete from users where id='$del_id'";
	$run_del=mysqli_query($con,$del_pro);
	if($run_del){
	echo "<script>alert('One Customer deleted')</script>";
	echo"<script>window.open('index.php?view_customers','_self')</script>";
		}
	
	
	
	
	}




?>
<?php
}
?>