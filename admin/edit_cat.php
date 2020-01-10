<?php

if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

?>
<?php
include("includes/db.php");
if(isset($_GET['edit_cat'])){
	$cat_edit_id=$_GET['edit_cat'];
	 $edit_cat="select * from categories where cat_id='$cat_edit_id'";
	 $run_edit=mysqli_query($con,$edit_cat);
	 $row_edit=mysqli_fetch_array($run_edit);
	 $cat_title=$row_edit['cat_title'];
	 $cat_id=$row_edit['cat_id'];
	}
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
<b> Edit this Category</b>
<input type="text" name="cat_title1" value="<?php echo $cat_title; ?>"/>
<input type="submit" name="update_cat" value="Update Category" />
</form>

<?php
if(isset($_POST['update_cat'])){
	$cat_title2=$_POST['cat_title1'] ;
	$update_cat="update categories set cat_title='$cat_title2' where cat_id='$cat_edit_id'";
	$run_update=mysqli_query($con,$update_cat);
	if($run_update){
	echo"<script>alert('Categories has been Updated')</script>";
		echo"<script>window.open('index.php?view_cats','_self')</script>";

	}
}
?>
</body>
</html>
<?php
}

?>