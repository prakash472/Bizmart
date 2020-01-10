<!DOCTYPE html>
<head>
<title>Payment Options</title>
</head>
<body>
<?php
include("includes/db.php");
$c=$_SESSION['email'];
?>
<div>
<h2>Payment in Process</h2>
<?php
$ip=getIpAddress();
$get_customer="select * from users where customer_ip='$ip' AND email='$c'";
$run_customer=mysqli_query($con,$get_customer);
$customer=mysqli_fetch_array($run_customer);
$customer_id=$customer['id']
?>
<a href="order.php?c_id=<?php echo $customer_id?>">Pay Offline</a>
</div>