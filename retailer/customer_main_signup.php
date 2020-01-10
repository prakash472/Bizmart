<?php
include("includes/db.php");
include("functions/functions.php");

session_start();
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="signupstyles.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="customer_main_signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="First Name" name="first_name" required />
      <input type="text" placeholder="Last Name" name="last_name" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password_1" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="password_2" autocomplete="new-password" required />
      <input type="text" placeholder="Contact Number" name="contact_num" required />
      <input type="text" placeholder="Address" name="address" required />
      <div class="avatar"><label>Select your Profile Pic: </label><input type="file" name="profile_pic" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
      
    </form>
  </div>
</div>
 
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
	  	
		$_SESSION['email']=$email;
		echo "<script>alert('Account Created Successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		
		 
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

