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
<div id="iefix" >
<ul class="nav">


    <li>
        <a href="index.php?retailer=<?php echo $retailer_id ?>">Home</a>
    <ul>
    <li><a href="index.php?retailer=<?php echo $retailer_id ?>">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="all_products.php?retailer=<?php echo $retailer_id?>">All Products</a>
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
<a href="cart.php" >Cart</a></p>
</li>
<li>
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</li>
</div>
</div>
<div class="content_wrapper">

<div id="right_content">
<?php
cart();
?>

<div id="products_box">
<?php
	
?>
<?php
if(isset($_GET['product'])){
	$product_id=$_GET['product'];
	$get_products="select * from retailer_products where product_id='$product_id' and retailer_id='$retailer_id'";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_desc=$row_products['product_desc'];
		$pro_price=$row_products['product_price'];
		$pro_image1=$row_products['product_img1'];
		$pro_image2=$row_products['product_img2'];
		$pro_image3=$row_products['product_img3'];
	echo"
	<div id='single_product'>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='admin/product_images/$pro_image1' width='200' height='200' align='middle' id='products_box'/><br><br>
	<img src='admin/product_images/$pro_image2' width='200' height='200' align='middle' id='products_box'/>
		<img src='admin/product_images/$pro_image3' width='200' height='200' align='middle' id='products_box'/>
	
	<p><b>Price: Rs.$pro_price<b></p>
	<p><b>$pro_desc<b></p>
	<a href='index.php?retailer=$retailer_id' style='float:middle;' id='products_title'>Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?retailer=$retailer_id&add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}


?>
</div>
</div>
<div class="footer">
	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
</div>
</body>
</html>