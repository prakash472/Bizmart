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
    




if(isset($_GET['delete_cat'])){
	$del_id=$_GET['delete_cat'];
	$del_pro="delete from retailer_categories where cat_id='$del_id' and retailer_id='$retailer_id'";
	$run_del=mysqli_query($con,$del_pro);
	if($run_del){
	echo "<script>alert('One Category deleted')</script>";
	echo"<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>
<?php
}
?>