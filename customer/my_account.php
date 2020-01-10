<?php
include("includes/db.php");
session_start();
if(!isset($_SESSION['email'])){
	echo"<script>alert('You need to log in')</script>";
	echo"<script>window.open('../customer_main_login.php','_self')</script>";
	}
else
{
?>

<?php
include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bizmart</title>
<link rel="stylesheet" href="../styles/style.css" media="all"/>
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
<div id="iefix1">
<ul class="nav1">
    <li>
        <a href="../index.php">Home</a>
    <ul>
    <li><a href="../index.php">Homepage</a></li>
    </ul>
    </li>

     
    <li><a href="customer/my_account.php?">My Account</a>
    <ul>
    <?php
$user_session=$_SESSION['email'];
$get_customer_image="select * from users where email='$user_session'";
$run_customer_image=mysqli_query($con,$get_customer_image);
$row_customer=mysqli_fetch_array($run_customer_image);
$customer_pic=$row_customer['profile_pic'];
$user_id=$row_customer['id'];
?>

<!--<img src="images/<?php echo $customer_pic; ?>" width='150' height='150'></li>-->
<?php
$check_message="select * from messages where status='Not Read'";
$run_message=mysqli_query($con,$check_message);
$count=mysqli_num_rows($run_message);
?>
<li><a href="my_account.php?my_orders">My Order</a></li>

<?php
$get_orders="select * from retailer_customer_order where customer_id='$user_id' AND order_status='Pending'";
								$run_orders=mysqli_query($db,$get_orders);
								$count_orders=mysqli_num_rows($run_orders);
								if($count_orders>0){
								echo"<li><a href='my_account.php?my_orders_retailer'>My Orders-Retailer($count_orders)</a></li>";
								}
else{
	echo"<li><a href='my_account.php?my_orders_retailer'>My Orders-Retailer($count_orders)</a></li>";
	}
?>

<li><a href="my_account.php?edit_account">Edit Account</a></li>
<li><a href="my_account.php?change_pass">Change Password</a></li>
<li><a href="my_account.php?delete_account=<?php echo $user_id; ?>">Delete Account</a></li>
<?php
if($count>0){
	echo "<li><a href='my_account.php?view_messages'>View Messages($count)</a></li>";
}
else{
	echo"<li><a href='my_account.php?view_messages'>View Messages</a></li>";
	}
?>
    </ul>
    </li>
    <!--
    /*
    <li>
        <a href="../">Retailers</a>
        <ul>
       <li>   
                <?php
				/*
			getRetailer();
			*/
			?>
       </li>
        
        </ul>
    </li>
   -->
    <li><a href="../about.php">About us</a></li>
    
<?php
if(!isset($_SESSION['email'])){
?>

<li  class="session1"> <b>Welcome Guest!</b></li>
<?php

}
else {
?>
<li class="session1"><b>Welcome:<span style='color:skyblue'><?php echo $_SESSION['email']; ?></li>
<?php } ?> </b>
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
<a href="../cart.php" >Cart</a></p>
</li>
<li>
<ul>
<li>
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</li>
</ul>
</li>
<style>
.session{
	
    display: block;
    padding: 5px;
    color: #fff;
   	background-color:#000;
    text-decoration: none;
	}
.nav {
    background-color:#000;
    height :50px;
    color :none;
	list-style:none;
	font-size:15px;
    /* Bring the nav above everything else--uncomment if needed.
    position: relative;
    z-index: 5;
    */
}
.nav li {
    float: left;
    margin-right: 10px;
    position:relative;
    text:inline;
}
.nav a {
    display: block;
    padding: 5px;
    color: #fff;
   	background-color:#000;
    text-decoration: none;
}
.navbar ul li:hover{
    background-color :#797979;
    cursor :pointer
}
.nav a:hover {
    color: #fff;
    background-color: #6b0c36;
    text-decoration: none;
}

/*--- DROPDOWN ---*/
.nav ul {
    background-color: #fff; /* Adding a background makes the dropdown work properly in IE7+. Make this as close to your page's background as possible (i.e. white page == white background). */
    background: rgba(255,255,255,0); /* But! Let's make the background fully transparent where we can, we don't actually want to see it if we can help it... */
    list-style: none;
    /*position: absolute;*/
    left: -9999px; /* Hide off-screen when not needed (this is more accessible than display: none;) */
}
.nav ul li {
    padding-top: 1px; /* Introducing a padding between the li and the a give the illusion spaced items */
    float: none;
	list-style:none;
	
}
.nav ul a {
    white-space: nowrap; /* Stop text wrapping and creating multi-line dropdown items */
}
.nav li:hover ul { /* Display the dropdown on hover */
    left: 0; /* Bring back on-screen when needed */
}
.nav li:hover a { /* These create persistent hover states, meaning the top-most link stays 'hovered' even when your cursor has moved down the list. */
    background-color: #797979;
    text-decoration: underline;
}
.nav li:hover ul a { /* The persistent hover state does however create a global style for links even before they're hovered. Here we undo these effects. */
    text-decoration: none;
}
.nav li:hover ul li a:hover { /* Here we define the most explicit hover states--what happens when you hover each individual link. */
    background-color: #333;
}
#iefix {
position:relative;
z-index:1000;
}

</style>

</div>

<!-- Navigation Bar starts-->
</div>
<div class="content_wrapper">

<div id="right_content">
<?php
cart();
?>

<div>
<?php
getDefault();
?>
<?php
if(isset($_GET['my_orders'])){
	include("my_orders.php");
	}
if(isset($_GET['edit_account'])){
	include("edit_account.php");
	}
if(isset($_GET['delete_account'])){
	include("delete_account.php");
	
	}
if(isset($_GET['view_messages'])){
	include("view_messages.php");
	}
if(isset($_GET['my_orders_retailer'])){
	include("my_orders_retailer.php");
	}
if(isset($_GET['change_pass'])){
	include("change_password.php");
	}
?>
</div>
</div>
</a>
 
</body>
<footer class="footer1" />
  <div>
  	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
  </div>
</html>
<?php
}
?>