<?php
include("includes/db.php");
if(isset($_GET['delete_message'])){
	$message_id=$_GET['delete_message'];
	$delete_message="delete from messages where message_id='$message_id'";
	$run_delete=mysqli_query($con,$delete_message);
	if($run_delete){
	echo"<script>alert('message deleted')</script>";
	echo"<script>window.open('my_account.php?view_messages','_self')</script>";
	}
	}





?>