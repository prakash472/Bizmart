<?php

if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{

?>
<?php
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

?>

<?php
include("includes/db.php");
if(isset($_GET['edit_brand'])){
	$brand_edit_id=$_GET['edit_brand'];
	 $edit_brand="select * from retailer_brands where brand_id='$brand_edit_id' and retailer_id='$retailer_id'";
	 $run_edit=mysqli_query($con,$edit_brand);
	 $row_edit=mysqli_fetch_array($run_edit);
	 $brand_title=$row_edit['brand_title'];
	 $brand_id=$row_edit['brand_id'];
	}
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
<b> Edit this Brand</b>
<input type="text" name="brand_title1" value="<?php echo $brand_title; ?>"/>
<input type="submit" name="update_brand" value="Update Brand" />
</form>

<?php
if(isset($_POST['update_brand'])){
	$brand_title2=$_POST['brand_title1'] ;
	$update_brand="update retailer_brands set brand_title='$brand_title2' where brand_id='$brand_edit_id' and retailer_id='$retailer_id'" ;
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