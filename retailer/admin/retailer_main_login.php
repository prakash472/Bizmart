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
  <title>Retailer Login</title>
  
  <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="signupstyles.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Retailer Login</h1>
    <form class="form" action="retailer_main_login.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" required />
      <input type="submit" value="Login" name="login" class="btn btn-block btn-primary" />
      
      
    </form>
    </div>
</div>
 
 <script src="js/index.js"></script>

</body>
</html>
<?php
if(isset($_POST['login'])){
	$retailer_email=$_POST['email'];
	$retailer_password=$_POST['password'];
	$pass=md5($retailer_password);
	$sel_retailer="select * from retailer where email='$retailer_email' AND password='$pass'";
	$run_retailer=mysqli_query($con,$sel_retailer);
	$check_retailer=mysqli_num_rows($run_retailer);
	if($check_retailer==1){
	$_SESSION['retailer_email']=$retailer_email;
echo"<script>alert('Successfully Logged In')</script>";	

echo"<script>window.open('index.php?logged_in=Successfully Logged In','_self')</script>"; 	
}
else{
echo"<script>alert('Incorrect Email Or Password')</script>";	
	
	}	

}
	?> 

		
