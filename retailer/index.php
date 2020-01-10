<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
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
<h5>BIZMART</h5>
</div>



<!-- Navigation Bar starts-->
<?php
if(isset($_GET['retailer'])){
	$get_retailer_id=$_GET['retailer'];
	$get_reteiler_name="select * from retailer where retailer_id='$get_retailer_id'";
	$run_retailer_name=mysqli_query($con,$get_reteiler_name);
	$row_retailer_name=mysqli_fetch_array($run_retailer_name);
	$retailer_name=$row_retailer_name['retailer_title'];

	}
?>

<h2 align="center"; style="color:#00695C;">Welcome to: <?php echo $retailer_name; ?></h2>
<br>
<div id="iefix">
<ul class="nav">
    <li>
        <a href="../index.php">Home</a>
    <ul>
    <li><a href="../index.php">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="all_products.php?retailer=<?php echo $retailer_id?> ">All Products</a>
         </li>
    <li><a href="../customer/my_account.php?">My Account</a></li>
    <li>
        <a href="#">Categories</a>
        <ul>
       <li>   
                <?php
			getCat();
			?>
       </li>
        </ul>
    </li>
    <li>
        <a href="#">Brands</a>
        <ul>
       <li>   
                <?php
			getBrands();
			?>
       </li>
        </ul>
    </li>
    

        <li><a href="../about.php">About us</a></li>
    <li><a href="../customer_main_signup.php">Sign up</a></li>

<?php
if(!isset($_SESSION['email'])){
?>

<li  class="session"> <b>Welcome Guest!</b></li>
<?php

}
else {
?>
<li class="session"><b>Welcome:<span style='color:skyblue'><?php echo $_SESSION['email']; ?></span></li></b>
<?php } ?>
<li>
<?php
if(!isset($_SESSION['email'])){
echo"<a style='text-align:right' href='../customer_main_login.php' style='color:#00F;'>Login</a>";
}
else{
echo"<a style='text-align:right' href='logout.php' style='color:#00F;'>Logout</a>";
}
?>
</li>
<li>
<a href="cart.php?retailer=<?php echo $get_retailer_id?>" >Cart</a></p>
</li>

<li>
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</li>
</div>
<div align="center">
<?php
include("testemail.php");
?>
<!-- Navigation Bar starts-->
</div>
<div class="content_wrapper">

<?php
include("testemail.php");
?>

<div id="right_content">
<?php
cart();
?>
<div id="products_box">

<?php
getProducts();
getCatPro();
getBrandPro();
?>
</div>
</div>
</div>
	</div>
	
<div class="footer" >
	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
</div>
	</div>
</body>
</html>
