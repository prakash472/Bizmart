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
    <meta charset="utf-8">
    <title>Retailer Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
    <link rel="stylesheet" href="../table.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin">
<style type="text/css">
#acctable{

background-color:#666;
color:#FFF;
}
#h2
{
	background-color:purple;
	color:white;
	font-size:18px;
}
</style>
</head>
<body>
<table class="rwd-table" style="margin-left:300px;" width="800px;">
<tbody>
<th>Category ID</th>
<th>Category Title</th>
<th>Edit</th>
<th>Delete</th>
</tr>
 <?php
 include("includes/db.php");
     $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

 $get_cats="select * from retailer_categories where retailer_id='$retailer_id'";
 $run_cats=mysqli_query($con,$get_cats);
 while($row_cats=mysqli_fetch_array($run_cats)){
 $cat_id=$row_cats['cat_id'];
 $cat_title=$row_cats['cat_title'];
 
 ?>
 <tr align="center">
 <td style="font-size:20px; text-align:center; padding-bottom:5px;"><?php echo $cat_id;?></td>
 <td style="font-size:20px; text-align:center; padding-bottom:5px;"><?php echo $cat_title;?></td>
 <td><a href="index.php?edit_cat=<?php echo $cat_id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize;">Edit</a></td>
 <td><a href="index.php?delete_cat=<?php echo $cat_id;?>" style="color:#00F; text-decoration:underline; font-size:medium; font-weight:bold; text-transform:capitalize;">Delete</a></td>
  </tr>
 <?php
 }
 ?>
</tbody> 
 </table>
</body>
</html>
<?php
}
?>