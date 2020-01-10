<?php
include("includes/db.php");
if(isset($_GET['delete_account'])){
	$delete_account_id=$_GET['delete_account'];
?>	

<form method="post" action="" enctype="multipart/form-data">
<input type="submit" name="delete_user" value="Yes Delete the Account">
<input type="submit" name="no_delete" value="Back to my account">
</form>
<?php
if(isset($_POST['delete_user'])){ 

	$get_account="delete from users where id='$delete_account_id'";
	$run_account=mysqli_query($con,$get_account);
	if($run_account){
		session_destroy();
		echo"<script>alert('Your account has been deleted')</script>";
		echo"<script>window.open('../index.php','_self')</script>";
		$del_order="";
		}
}
	    if(isset($_POST['no_delete'])){
		echo"<script>alert('Page redirected to my account')</script>";
		echo"<script>window.open('my_account.php','_self')</script>";
		
		}
	

}
?>