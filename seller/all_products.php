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
        <a href="../index.php">Home</a>
    <ul>
    <li><a href="../index.php">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="all_products.php">All Products</a>
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
    <li class="session" style="color:skyblue;">Sell<li>
    <li><a href="#">About us</a></li>
    <li><a href="../customer_main_signup.php">Sign up</a></li>

<?php
if(!isset($_SESSION['email'])){
?>

<li  class="session"> <b>Welcome Guest!</b></li>
<?php

}
else {
?>
<li class="session"><b>Welcome:<span style='color:skyblue'><?php echo $_SESSION['email']; ?></li>
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
include("../testemail.php");
?>
<!-- Navigation Bar starts-->
</div>
<div class="content_wrapper">

<?php
include("../testemail.php");
?>
<div id="right_content">
<?php
cart();
?>

<div id="products_box">
<?php
getAllProducts();
getCatPro();
getBrandPro();
?>
</div>
</div>
</div>
<div class="footer">Footer Area</div>

</body>
</html>
