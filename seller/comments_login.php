<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
function getIpAddress1(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
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
<div id="navbar">
<ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="#">All Products</a></li>
    <li><a href="customer/my_account.php">My Account</a></li>
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
<div id="left_sidebar">
<div id="sidebar_title">Categories</div>
<ul id="cats">
<?php
getCat();
?>
</ul>
<div id="sidebar_title">Brands</div>
<ul id="cats">
<?php
getBrands();
	?>
    </ul>
    <br>
</div>
<div id="right_content">
<?php
cart();
?>
<div id="headline">
<div id="headline_content">
<?php
if(!isset($_SESSION['email'])){
echo"<b>Welcome Guest!</b>";
}
else
echo"<b>Welcome:"."<span style='color:skyblue'>".$_SESSION['email']."</b>"."<b> My Shopping Cart</b>";
?>
<br>
<?php
if(!isset($_SESSION['email'])){
echo"<a href='checkout.php' style='color:#00F;'>Login</a>";
}
else{
echo"<a href='logout.php' style='color:#00F;'>Logout</a>";
}
?>

</div>
</div>
<div id="products_box">

<div>
          <form action="comments_login.php" method="post" autocomplete="off" style="margin-top:50px;">
          
            <div >
            <label>
              Email Address<span class="req">*</span><br>
            </label>
            <input type="email" required autocomplete="off" name="email1" />
          </div>

          <div class="field-wrap">
            <label>
              Password<span >*</span><br>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>

          <p class="forgot"><a href="forgot.php" style="text-decoration:none; color:#000">Forgot Password?</a></p><br>

          <button  name="c_login" />LogIn</button><br>

          </form>

        
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</div>
</div>
<div>
<br>

<p><a href='customer_registration.php' style="text-decoration:none; color:#000; padding-left:100px;" >New?Register</a></p>
<br>
<div>
<?php
if(isset($_POST['c_login'])){
	$customer_email=$_POST['email1'];
	$customer_password=$_POST['password'];
	$pass=md5($customer_password);
	$sel_customer="select * from users where email='$customer_email' AND password='$pass'";
	$run_customer=mysqli_query($con,$sel_customer);
	$check_customer=mysqli_num_rows($run_customer);
	$get_ip=getIpAddress1();
	$sel_cart="select * from cart where id_address= '$get_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_customer==0){
		echo"<script>alert('incorrect email or password')</script>";
		exit();
		}
		else{
			$_SESSION['email']=$customer_email;
			echo"<script>alert('You can review now')</script>";
			echo"<script>window.open('index.php','_self')</script>";
			}
		
	}
?> 
</div>
</div>
</div>
<div class="footer">Footer Area</div>
</body>
</html>
