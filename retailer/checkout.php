<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
$retailer_id=$_GET['retailer'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bizmart</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--Main content Starts-->
<div class="main_wrapper">
  
<!--header1 starts-->
<div class="header1_wrapper">
<h5>Bizmart</h5>
</div>
<!--header2 ends-->
<!-- Header2 starts-->
<div class="header2_wrapper"></div>
</div>
<!-- Header2 ends-->
<!-- Navigation Bar starts-->
<div id="navbar">
<ul id="menu">
    <li><a href="../index.php">Home</a></li>
    <li><a href="#">All Products</a></li>
    <li><a href="../customer/my_account.php">My Account</a></li>
    <li><a href="../customer_main_signup.php">Sign up</a></li>
    <li><a href="#">About us</a></li>
</ul>
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</div>

<!-- Navigation Bar ends-->
<div class="content_wrapper">
<div id="left_sidebar1">
<div id="sidebar_title">Retailer</div>
<ul id="cats">
<?php
if(isset($_GET['retailer'])){
	$get_retailer_id=$_GET['retailer'];
	$get_reteiler_name="select * from retailer where retailer_id='$get_retailer_id'";
	$run_retailer_name=mysqli_query($con,$get_reteiler_name);
	$row_retailer_name=mysqli_fetch_array($run_retailer_name);
	$retailer_name=$row_retailer_name['retailer_title'];
	echo"<h2 style='color:white'>Welcome to $retailer_name</h2>";
	}
?>

</div>
<div id="right_content">
<?php
cart();
?>
<div id="headline">
<div id="headline_content">
<?php
if(!isset($_SESSION['email'])){
echo"<b>Welcome Guest!</b>"."<b>Shopping Cart</b>";
}
else
echo"<b>Welcome:"."<span style='color:skyblue'>".$_SESSION['email']."</b>"."<b> My Shopping Cart</b>";
?>
<p>Items Bought:&nbsp; <?php items(); ?></p>
<p>Price <?php total_price();?></p>
<p><a href="cart.php?retailer=<?php echo $retailer_id;?>" style="color:#00F; ">Go to Cart</a></p>
<?php
if(!isset($_SESSION['email'])){
echo"<a href='checkout.php?retailer=$retailer_id' style='color:#00F;'>Login</a>";
}
else{
echo"<a href='logout.php' style='color:#00F;'>Logout</a>";
}
?>
</div>
</div>
<div id="products_box">
<?php
if(!isset($_SESSION['email'])){
		echo"<script>window.open('../customer_main_login.php','_self')</script>";
	}
	else{
		
	echo"<script>window.open('payment_options.php?retailer=$retailer_id','_self')</script>";
	
    }
?>
</div>
</div>
</div>
<div class="footer">Footer Area</div>
</body>
</html>