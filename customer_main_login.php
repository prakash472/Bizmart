<?php
session_start();
include("includes/db.php");
@session_start();
include("includes/db.php");
function getIpAddress1(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Customer Login</title>
  
  <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="signupstyles.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Customer Login</h1>
    <form class="form" action="customer_main_login.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" required />
      <input type="submit" value="Login" name="login" class="btn btn-block btn-primary" />
      
      
    </form>
    <a href="customer_main_signup.php"><input type="submit" value="Register" name="signup" class="btn btn-block btn-primary" /></a>	
    </div>
</div>
 
 <script src="js/index.js"></script>

</body>
</html>
<?php
if(isset($_POST['login'])){
	$customer_email=$_POST['email'];
	$customer_password=$_POST['password'];
	$pass=md5($customer_password);
	$sel_customer="select * from users where email='$customer_email' AND password='$pass'";
	$run_customer=mysqli_query($con,$sel_customer);
	$check_customer=mysqli_num_rows($run_customer);
	$get_ip=getIpAddress1();
	$sel_cart="select * from cart where id_address= '$get_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_customer==1){
	$_SESSION['email']=$customer_email;
echo"<script>alert('Successfully Logged In')</script>";	

echo"<script>window.open('index.php?logged_in=Successfully Logged In','_self')</script>"; 	
}
else{
echo"<script>alert('Incorrect Email Or Password')</script>";	
	
	}	

}
	?> 

		
