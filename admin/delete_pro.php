<?php
include("includes/db.php");
if(isset($_GET['delete_pro'])){
	$del_id=$_GET['delete_pro'];
	$del_pro="delete from products where product_id='$del_id'";
	$run_del=mysqli_query($con,$del_pro);
	if($run_del){
	echo "<script>alert('One product deleted')</script>";
	echo"<script>window.open('index.php?view_products','_self')</script>";
		}
	
	
	
	
	}




?>