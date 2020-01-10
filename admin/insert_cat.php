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
<form action="" method="post" style="margin-left:550px; margin-top:200px; background:rgba(0,0,0,.1); "  >
<b> Insert New Category</b>
<input type="text" name="cat_title"/>
<input type="submit" name="insert_cat" value="Insert Category" />
</form>
<?php
include("includes/db.php");
if(isset($_POST['insert_cat'])){
	$cat_title=$_POST['cat_title'];
	$insert_cat="insert into categories(cat_title) values('$cat_title')";
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