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
<div align="justify"><!--Main content Starts-->
</div>
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
    <li><a href="#">My Account</a></li>
    <li><a href="customer_registration.php">Sign up</a></li>
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
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<div id="right_content">
<?php
cart();
?>
<div id="headline">
<div id="headline_content">
<b>Welcome Guest!</b>
<b style="color:yellow;">Enjoy Shopping</b>
<p>Items Bought:&nbsp; <?php items(); ?></p>
<p>Price <?php total_price();?></p>
<p><a href="cart.php" style="color:#00F; ">Go to Cart</a></p>
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
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up</title>
  <link rel="stylesheet" type "text/css" href= "style.css">

</head>

<body>
  <div class="form">

    
          <h1 align="center">Sign Up here</h1>

          <form action="customer_registration.php" method="post" enctype="multipart/form-data">
          <table width="700" align="center">
          <tr>
           	<td align="right"><b>First Name</b></td>
           	<td><input type ="text" name="first_name" required/> </td>
           </tr>
            <tr>
           	<td align="right"><b>Last Name</b></td>
           	<td><input type ="text" name="last_name" required/> </td>
           </tr>
            <tr>
           	<td align="right"><b>Email</b></td>
           	<td><input type ="email" name="email" required/> </td>
           </tr> 
           <tr>
           	<td align="right"><b>Choose A Password</b></td>
           	<td><input type ="password" name="password_1" required/> </td>
           </tr> 
           <tr>
           	<td align="right"><b>Confirm Password</b></td>
           	<td><input type ="password" name="password_2" required/> </td>
           </tr> <tr>
           	<td align="right"><b>Contact Number</b></td>
           	<td><input type ="text" name="contact_num" required/> </td>
           </tr> 
           <tr>
           	<td align="right"><b>Address</b></td>
           	<td><input type ="text" name="address" required/> </td>
           </tr> 
           <tr>
           	<td align="right"><b>Profile Picture</b></td>
           	<td><input type ="file" name="profile_pic" required/> </td>
           </tr>
           <tr>
           	<td align="center"><input type="submit" name="register" value="submit"/></td>
           </tr>
          </form>

        </div>

      </div> 

</div>  

</body>
</html>
<?php
 ?>
 
 <?php
  $errors =array();
/*  $_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
*/
  if(isset($_POST['register'])){
$first_name =  $_POST['first_name'];
$last_name =  $_POST['last_name'];
$email =  $_POST['email'];
$contact_num = $_POST['contact_num'];
$address = $_POST['address'];
$profile_pic = $_FILES['profile_pic']['name'];
$pic_temp = $_FILES['profile_pic']['tmp_name'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
$c_ip = getIpAddress();
 
 // Check
  $result = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

  if ($password_1 != $password_2) {
      array_push($errors,"Passwords do not match!");
   }
 if ( $result->num_rows > 0 ) {
  array_push($errors,"User with this email already exists!");

  }
 if(count($errors) == 0){
$password_1=md5($password_1);


    $sql = "INSERT INTO users (first_name, last_name, email, password, contact_num,address,profile_pic,customer_ip)
           VALUES ('$first_name','$last_name','$email','$password_1', '$contact_num','$address','$profile_pic','$c_ip')";
			move_uploaded_file($pic_temp,"customer/images/$profile_pic");

    // Add user to the database
	$run_sql = mysqli_query($con,$sql);
  if ( $run_sql ){

        $_SESSION['active'] = 0;
        $_SESSION['logged_in'] = true;
        echo "<script>alert('Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the mail!')</script>";

                

     /*   $to      = $email;
        $subject = 'Account Verification ( bizmart.com )';
        $message_body = ' Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;

        mail( $to, $subject, $message_body );*/

      // header("location: profile.php");
	  $sel_cart="select * from cart where id_address= '$c_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	
	if($check_cart > 0){
		$_SESSION['email']=$email;
		echo "<script>alert('Account Created Successfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}
		else{
			echo "<script>alert('Account Created Successfully')</script>";
			echo "<script>window.open('index.php','_self')</script>"; }
		 
  }


 else {
         array_push($errors,"Registration failed!");
    }
 }
  }
  
?>


<?php if(count($errors) > 0): ?>
 <div class = "error">
 <?php foreach($errors as $error): ?>
 <p> <?php echo $error; ?> </p>

<?php endforeach; ?>
</div>
<?php endif ?> 

 
 