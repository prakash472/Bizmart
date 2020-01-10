<?php
session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="admin_style.css">

  
</head>

<body>
  <div class="container">
  <div class="login">
  	<h4 class="login-heading" align="center"><?php echo @$_GET['logged_out']; ?></h4><br>
    <h1 class="login-heading">
    
      <strong>Admin Panel</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please login.</h1>
      
      <form method="post">
        <input type="text" name="admin_email" placeholder="Username" required="required" class="input-txt" />
          <input type="password" name="password" placeholder="Password" required="required" class="input-txt" />
          <div class="login-footer">
             
            <button type="submit" class="btn btn--right" name="login">Login</button>
    
          </div>
      </form>
  </div>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
<?php
if(isset($_POST['login'])){
$admin_email1=$_POST['admin_email'];
$admin_pass1=$_POST['password'];
$sel_admin="select * from admin where admin_email='$admin_email1' and admin_pass='$admin_pass1'";
$run_admin=mysqli_query($con,$sel_admin);
$count=mysqli_num_rows($run_admin);
if($count==1){
	$_SESSION['admin_email']=$admin_email1;
echo"<script>alert('Successfully Logged In')</script>";	

echo"<script>window.open('index.php?logged_in=Welcome Admin','_self')</script>"; 	
}
else{
echo"<script>alert('Incorrect Email Or Password')</script>";	
	
	}	
	
	}

?>

