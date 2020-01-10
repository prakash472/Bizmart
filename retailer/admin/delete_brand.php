<?php
include("includes/db.php");
if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{
?>
<?php
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

?>

<?php
if(isset($_GET['delete_brand'])){
	$del_id=$_GET['delete_brand'];
	$del_pro="delete from retailer_brands where brand_id='$del_id' and retailer_id='$retailer_id'";
	$run_del=mysqli_query($con,$del_pro);
	if($run_del){
	echo "<script>alert('One Brand deleted')</script>";
	echo"<script>window.open('index.php?view_brands','_self')</script>";
		}
	}
?>

<?php
}
?>