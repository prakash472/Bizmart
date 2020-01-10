<?php

if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Bizmart Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
      <link rel="stylesheet" href="../customer/table.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin"><?php
if(isset($_GET['view_payments'])){
?>	

<table class="rwd-table" style="margin-left:300px;" width="800px;" >
<tbody>
<th>S.No.</th>
<th>Invoice.No.</th>
<th>Amount</th>
<th>Payment_method</th>
<th>trans_no</th>
<th>Payment_date</th>
</tr>
<?php
include("includes/db.php");
$get_payments="Select * from payments";
$run_payments=mysqli_query($con,$get_payments);
$i=0;
while($row_payment=mysqli_fetch_array($run_payments)){
$id=$row_payment['payment_id'];	
$invoice_no=$row_payment['invoice_no'];
$amount=$row_payment['amount'];
$payment_method=$row_payment['payment_method'];
$trans_no=$row_payment['trans_no'];
$payment_date=$row_payment['payment_date'];
$i++;
?>
<tr align="center" style="text-align:center">
<td><?php echo $i;?></td>
<td>
<?php
echo $invoice_no;
?>
</td>
<td><?php echo $amount ?> </td>
<td><?php echo $payment_method ?> </td>
<td><?php echo $trans_no;?></td>
<td><?php echo $payment_date; ?></td>
</tr>
<?php
}
?>
</table>
<?php } ?>
</body>
</html>
<?php
}
?>