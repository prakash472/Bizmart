<?php
include("includes/db.php");
session_start();
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    



if(isset($_GET['delete_pro'])){
	$del_id=$_GET['delete_pro'];
	$del_pro="delete from retailer_products where product_id='$del_id' and retailer_id='$retailer_id'";
	$run_del=mysqli_query($con,$del_pro);
	if($run_del){
	echo "<script>alert('One product deleted')</script>";
	echo"<script>window.open('index.php?view_products','_self')</script>";
		}
	
	
	
	
	}




?>