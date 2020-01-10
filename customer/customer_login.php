
<?php
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
<div>
          <form action="checkout.php" method="post" autocomplete="off" style="margin-top:50px;">
          
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

<p><a href="customer_main_signup.php" style="text-decoration:none; color:#000; padding-left:100px;" >New?Register</a></p>
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
		if($check_customer==1 AND $check_cart==0){
			$_SESSION['email']=$customer_email;
			echo"<script>window.open('customer/my_account.php','_self')</script>";
			}
			else{
				$_SESSION['email']=$customer_email;
				echo"<script>alert(You can order now)</script>";
				echo"<script>window.open('checkout.php','_self')</script>";
				}
		
		
	}
?> 
