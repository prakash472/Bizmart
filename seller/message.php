<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
if(isset($_GET['add_cart'])){
	$get_product_id=$_GET['add_cart'];
	
}
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
    
    <li><a href="index.php">Sell</a><li>
    <li><a href="#">About us</a></li>


<?php
if(!isset($_SESSION['email'])){
?>

<li  class="session"> <b>Welcome Guest!</b></li>
    <li><a href="customer_main_signup.php">Sign up</a></li>
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

<div class="content_wrapper">


</div>
</div>

<div id="right_content">
<?php
cart();
?>

<div id="products_box1">
<?php
getCatPro();
getBrandPro();
?>
<?php
$get_user="select * from seller_product where product_id='$get_product_id'";
	$run_user=mysqli_query($con,$get_user);
	$row_user=mysqli_fetch_array($run_user);
	$customer_id1=$row_user['customer_id'];
$get_seller_email="select * from users where id ='$customer_id1'";
$run_seller_email=mysqli_query($con,$get_seller_email);
$row_seller_email=mysqli_fetch_array($run_seller_email);
$user_email=$row_seller_email['email'];


?>
<form method="post" action="" enctype="multipart/form-data">
<h3>From:</h3><input type="text" name="buyer"   />
<h3>To:</h3><input type="text" name="seller" value="<?php echo $user_email;?>" />
<h3>Message:</h3><textarea rows="6" cols="25" name="message"></textarea><br />
<input type="submit" name="submit" value="Send Message" />
</form>
<?php
if(isset($_POST['submit'])){
	$product_id=$_GET['add_cart'];
    $buyer1=$_POST['buyer'];
    $message1=$_POST['message'];
	$status='Not Read';
	$get_message="insert into messages(buyer_id,seller_id,messages,product_id,status,date) values('$buyer1','$customer_id1','$message1','$product_id','$status',NOW())";
	$run_message=mysqli_query($con,$get_message);
	if($run_message){
	echo"<script>alert('Message is sent')</script>";
	echo"<script>window.open('index.php','_self')</script>";
	}
	}



?>
</div>
</div>
</div>
<div class="footer">Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.</div>
</div>
</body>
</html>
