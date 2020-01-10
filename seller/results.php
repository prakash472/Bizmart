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
<h5>Bizmart</h5>
</div>
<!--header2 ends-->
<!-- Header2 starts-->
<div class="header2_wrapper"></div>
</div>
<!-- Header2 ends-->
<!-- Navigation Bar starts-->
<div id="iefix">
<ul class="nav">
    <li>
        <a href="index.php">Home</a>
    <ul>
    <li><a href="index.php">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="#">All Products</a>
         </li>
    <li><a href="customer/my_account.php?">My Account</a></li>
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
    <li>
        <a href="#">Retailers</a>
        <ul>
       <li>   
                <?php
			getRetailer();
			?>
       </li>
        </ul>
    </li>
    <li><a href="seller/index.php">Sell</a><li>
    <li><a href="about.php">About us</a></li>
    <li><a href="customer_main_signup.php">Sign up</a></li>

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
echo"<a style='text-align:right' href='customer_main_login.php' style='color:#00F;'>Login</a>";
}
else{
echo"<a style='text-align:right' href='logout.php' style='color:#00F;'>Logout</a>";
}
?>
</li>
<li>
<a href="cart.php" >Cart</a></p>
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
<!-- Navigation Bar starts-->
</div>
<div class="content_wrapper">
<div id="right_content">
<?php
cart();
?>
<?php
    if(isset($_GET['search'])){
		$user_keyword=$_GET['user_query'];
	$get_products="select * from seller_product where product_keyword like '%$user_keyword%'";
	$run_products=mysqli_query($con,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_desc=$row_products['product_desc'];
		$pro_price=$row_products['product_price'];
		$pro_image=$row_products['product_img1'];

	echo"
	<div id='single_product' >
	<br>
	<h3>$pro_title</h3>
	<br>
	<img src='product_images/$pro_image' width='200' height='200'/><br><br>
	<a href='details.php?pro_id=$pro_id' style='float:middle;'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
	</div>";
	}
	}
?>
    </div>
    </div>
  <div class="footer">Footer Area</div>
</div>
</body>
</html>