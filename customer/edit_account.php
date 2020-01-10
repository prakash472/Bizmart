<?php
include("includes/db.php");
if(isset($_GET['edit_account'])){
	$c=$_SESSION['email'];
	$get_c="select * from users where email='$c'";
	$run_c=mysqli_query($db,$get_c);
	$row_c=mysqli_fetch_array($run_c);
	$customer_id=$row_c['id']; 
	$customer_fname=$row_c['first_name'];
	$customer_lname=$row_c['last_name'];
	$customer_password=$row_c['password'];
	$customer_email=$row_c['email'];
	$customer_contact=$row_c['contact_num'];
	$customer_address=$row_c['address'];
	$customer_profile_pic=$row_c['profile_pic'];
	}
?>
<html>
<head>
<title>
</title>
<body>
<form action="" method="post" enctype="multipart/form-data">
          <table width="700" align="center">
          <tr>
           	<td align="right"><b>First Name</b></td>
           	<td><input type ="text" name="first_name" value="<?php echo $customer_fname;?>"required/> </td>
           </tr>
            <tr>
           	<td align="right"><b>Last Name</b></td>
           	<td><input type ="text" name="last_name" value="<?php echo $customer_lname;?>" required/> </td>
           </tr>
            <tr>
           	<td align="right"><b>Email</b></td>
           	<td><input type ="email" name="email" value="<?php echo $customer_email;?>" required/> </td>
           </tr> 
            
           <tr>
           	<td align="right"><b>Contact Number</b></td>
           	<td><input type ="text" name="contact_num" value="<?php echo $customer_contact;?>"required/> </td>
           </tr> 
           <tr>
           	<td align="right"><b>Address</b></td>
           	<td><input type ="text" name="address" value="<?php echo $customer_address;?>" required/> </td>
           </tr> 
           <tr>
           	<td align="right"><b>Profile Picture</b></td>
            <td><input type="file" name="profile_pic" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td align="center" >
           	<td><img src="images/<?php echo $customer_profile_pic;?>" width="90" height="90"></td>
           </tr>
           <tr></tr>
           <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
           <tr align="center">
          <td colspan="2"><input type="submit" name="update" value="Update Account"/></td>
           </tr>
          </form>
</table>



<?php
if(isset($_POST['update'])){
	$update_id=$customer_id;
	$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$contact_num=$_POST['contact_num'];
$address=$_POST['address'];
$profile_pic=$_FILES['profile_pic']['name'];
$temp_name1=$_FILES['profile_pic']['tmp_name'];
$customer_ip=getIpAddress();
move_uploaded_file($temp_name1,"images/$profile_pic");
$get_update="update users set first_name='$first_name' ,last_name='$last_name',email='$email',contact_num='$contact_num',address='$address',profile_pic='$profile_pic',customer_ip='$customer_ip' where id='$update_id'";
	$run_update=mysqli_query($con,$get_update);
	if($run_update){
		echo"<script>alert('Account Updated Successful')</script>";
		echo"<script>window.open('my_account.php','_self')</script>";
		
		}
	
	}


?>
</body>
</html>