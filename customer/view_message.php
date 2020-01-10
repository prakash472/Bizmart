<?php
include("includes/db.php");
include("functions/functions.php");
@session_start();
if(isset($_GET['view_mesaage'])){
	$message_id=$_GET['view_mesaage'];
	
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
    <li><a href="../index.php">Home</a></li>
    <li><a href="#">All Products</a></li>
    <li><a href="customer/my_account.php">My Account</a></li>
    <?php
	if(isset($_SESSION['email'])){
	echo"<span style='display:none;'><li><a href='../customer_register.php'>Sign up</a></li></span>";
	}
	else{
    echo"<li><a href='../customer_register.php'>Sign up</a></li>";
	}
	?>
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
<div id="sidebar_title">Manage Account</div>
<ul id="cats">
<?php
$user_session=$_SESSION['email'];
$get_customer_image="select * from users where email='$user_session'";
$run_customer_image=mysqli_query($con,$get_customer_image);
$row_customer=mysqli_fetch_array($run_customer_image);
$customer_pic=$row_customer['profile_pic'];
$user_id=$row_customer['id'];
echo"<img src='images/$customer_pic' width='150' height='150'><br><b><a href='change_pic.php'>Change Photo</a></b>";
?>
<li><a href="my_account.php?my_orders">My Order</a></li>
<li><a href="my_account.php?edit_account">Edit Account</a></li>
<li><a href="my_account.php?change_pass">Change Password</a></li>
<li><a href="my_account.php?delete_account=<?php echo $user_id; ?>">Delete Account</a></li>
<li><a href="my_account.php?view_messages">View Messages</a></li>
<li><a href="logout.php">Logout</a></li>
</div>
<div id="right_content">
<div id="headline">
<div id="headline_content">
<?php
if(isset($_SESSION['email'])){
echo"<b>Welcome:"."<span style='color:skyblue'>".$_SESSION['email']."</b>";
}
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
<div>
<?php
$id=$_GET['view_message'];
$sel_buyer="select * from messages where message_id='$id'";
$run_buyer=mysqli_query($con,$sel_buyer);
$row_buyer=mysqli_fetch_array($run_buyer);
$name=$row_buyer['buyer_id'];
$message=$row_buyer['messages']
?>
<form method="post" action="" enctype="multipart/form-data" style="padding-left:50px;" >
<h3>From:</h3>
<h3><?php echo $name; ?></h3> <br>
<h3>Message:</h3><textarea name="message" rows="6" cols="25" readonly="readonly"><?php echo $message;?></textarea><br /><br />
<input type="submit" name="submit" value="Back" />
<?php
if(isset($_POST['submit'])){
echo"<script>window.open('my_account.php?view_messages','_self')</script>";
}
?>
</form>


</div>
</div>
<div class="footer">Footer Area</div>
</body>
</html>
