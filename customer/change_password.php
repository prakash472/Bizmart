<?php
include("includes/db.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<h2 style="margin-top:80px; margin-left:350px;"> Change your Password</h2>
<?php
if(isset($_GET['change_pass'])){
	?>
    <style>
    form{
	      margin:8%;	
		}
    </style>
<form method="post" action="" enctype="multipart/form-data" style="margin-left:290px; margin-top:80px;">
 <input type="password" placeholder="Password" name="password_1" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="password_2" autocomplete="new-password" required />
<input type="submit" name="submit" value="Change Password" />
  <?php
 $errors =array();
  if(isset($_POST['submit'])){
  $password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
  if ($password_1 != $password_2) {
     echo"<script>alert('Password doesn't match')</script>";
	 echo"<script>window.open('my_account.php?change_pass','_self')</script>";
   }
 if(count($errors) == 0){
$password_1=md5($password_1);
$update="update users set password='$password_1'";
$run=mysqli_query($con,$update);
		echo "<script>alert('Password Changed Successfully')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
 }
 else {
         array_push($errors,"Change Password failed!");
    }
  }
	?>      
<?php    
	}
?>
<body>
</body>
</html>