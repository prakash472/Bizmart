<?php
session_start();
include("includes/db.php");
if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id'];
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="table.css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
$invoice_no=$_GET['invoice'];
$due_amount=$_GET['amount'];
?>

<body style="background: rgba(0,0,0,.1);">
<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
<table class="rwd-table" style="margin-left:300px;" width="800px;">
<tbody>
<tr>

<th colspan="5"><h2>Please Confirm Your Payment</h2></th>
</tr>
<tr>
<th align="right">Invoice No:</th>
<th><input type="text" name="invoice_no"  readonly="readonly" value="<?php echo $invoice_no?>"/></th></th>
</tr>
<tr>
<th align="right">Amount Sent</th>
<th><input type="text" name="amount" readonly="readonly" value="<?php echo $due_amount?>"/></th></th>
</tr>

<tr>
<th align="right">Select Your Payment Method:</th>
<th>
<select name="payment_method">
<option>Select Payment</option>
<option>Bank Transfer</option>
<option>IME</option>
</select>
</th>
</tr>
<tr>
<th align="right">Transaction Number</th>
<th><input type="text" name="trans_no"</th></th>
</tr>

<tr>
<th align="right">Payment Date</th>
<th><input type="text" name="date"</th></th>
</tr>
<tr align="center">
<th colspan="5"><input type="submit" name="confirm" value="Confirm Payment"</th></th>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['confirm'])){
	$update_id=$_GET['update_id'];
	$invoice=$_POST['invoice_no'];
	$amount=$_POST['amount'];
	$payment_method=$_POST['payment_method'];
	$ref_no=$_POST['trans_no'];
	$date=$_POST['date'];
	$complete='Complete';
	$insert_payment="insert into payments (invoice_no,amount,payment_method,trans_no,payment_date) values('$invoice','$amount','$payment_method','$ref_no','$date')";
	$run_payments=mysqli_query($con,$insert_payment);
	if($run_payments){
		echo"
		<h2 style='color:green'> Your order will be deliverd within 24 hrs</h2>
		";
		}
		$update_customer="update customer_order set order_status='Complete' where order_id='$update_id'";
		$run_customer=mysqli_query($con,$update_customer);
	}