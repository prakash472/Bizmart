<?php

if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Bizmart Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin">
<form action="" method="post" style="margin-left:550px; margin-top:200px; background:rgba(0,0,0,.1); " >
<b> Insert New brand</b>
<input type="text" name="brand_title"/>
<input type="submit" name="insert_brand" value="Insert Brand" />
</form>
<?php
include("includes/db.php");
if(isset($_POST['insert_brand'])){
	$brand_title=$_POST['brand_title'];
	$insert_brand="insert into brands(brand_title) values('$brand_title')";
	$run_brand=mysqli_query($con,$insert_brand);
	if($run_brand){
		echo"<script>alert('New Brands has been added')</script>";
		echo"<script>window.open('index.php?view_brands','_self')</script>";
		}
	
	}
?>
</body>
</html>
<?php
}
?>