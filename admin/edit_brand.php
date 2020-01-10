<?php

if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

?>
<?php
include("includes/db.php");
if(isset($_GET['edit_brand'])){
	$brand_edit_id=$_GET['edit_brand'];
	 $edit_brand="select * from brands where brand_id='$brand_edit_id'";
	 $run_edit=mysqli_query($con,$edit_brand);
	 $row_edit=mysqli_fetch_array($run_edit);
	 $brand_title=$row_edit['brand_title'];
	 $brand_id=$row_edit['brand_id'];
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

<form action="" method="post" style="margin-left:550px; margin-top:200px; background:rgba(0,0,0,.1); ">
<b> Edit this Brand</b>
<input type="text" name="brand_title1" value="<?php echo $brand_title; ?>"/>
<input type="submit" name="update_brand" value="Update Brand" />
</form>

<?php
if(isset($_POST['update_brand'])){
	$brand_title2=$_POST['brand_title1'] ;
	$update_brand="update brands set brand_title='$brand_title2' where brand_id='$brand_edit_id'";
	$run_update=mysqli_query($con,$update_brand);
	if($run_update){
	echo"<script>alert('Brand has been Updated')</script>";
		echo"<script>window.open('index.php?view_brands','_self')</script>";

	}
}
?>
</body>
</html>
<?php
}
?>