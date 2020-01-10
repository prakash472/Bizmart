<?php
include("includes/db.php");
global $db;
	$retailer_id=$_GET['retailer'];
if(isset($_POST['update'])){	
foreach($_POST['remove'] as $remove_id){
	$delete_products="delete from retailer_cart where p_id='$remove_id' and retailer_id='$retailer_id'";
	$run_products=mysqli_query($db,$delete_products);
    if($run_products){
		echo "<script>window.open('cart.php?retailer=$retailer_id','_self')</script>";
		}
	}	
}
if(isset($_POST['continue'])){
	echo"<script>window.open('index.php?retailer=$retailer_id','_self')</script>'";
	}

?>