<?php
include("includes/db.php");
if(isset($_GET['message'])){
	$update_id=$_GET['message'];
	$update_status="update messages set status='Read' where message_id='$update_id'";
	$run_status=mysqli_query($con,$update_status);
	echo"<script>alert('status updated')</script>";
	echo"<script>window.open('my_account.php?view_messages','_self')</script>";
	}
?>