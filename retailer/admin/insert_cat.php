<?php

if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{


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
<b> Insert New Category</b>
<input type="text" name="cat_title"  required/>
<input type="submit" name="insert_cat" value="Insert Category" />
</form>
<?php
include("includes/db.php");
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

if(isset($_POST['insert_cat'])){
	$cat_title=$_POST['cat_title'];
	$insert_cat="insert into retailer_categories(cat_title,retailer_id) values('$cat_title','$retailer_id')";
	$run_cat=mysqli_query($con,$insert_cat);
	if($run_cat){
		echo"<script>alert('New Categorie has been added')</script>";
		echo"<script>window.open('index.php?view_cats','_self')</script>";
		}
	
	}
?>
</body>
</html>
<?php
}
?>