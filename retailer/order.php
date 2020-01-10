<?php
include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['c_id'])){
	$retailer_id=$_GET['retailer'];
	$customer_id=$_GET['c_id'];
}
		$ip_address=getIpAddress();
		$total=0;
		$sel_price="select * from retailer_cart  where id_address='$ip_address' and retailer_id='$retailer_id'";
		$run_price=mysqli_query($db,$sel_price);
		$status='Pending';
		$invoice_no=mt_rand();
		$count_pro=mysqli_num_rows($run_price);
		while($row_price=mysqli_fetch_array($run_price)){
		$pro_id=$row_price['p_id'];
		$sel_pro_price="select * from retailer_products where product_id='$pro_id' and retailer_id='$retailer_id'";
		$run_pro_price=mysqli_query($db,$sel_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price)){	
		$product_price=array($row_pro_price['product_price']);
		$values=array_sum($product_price);
		$total=$total+$values;
		}
		}	
	
// Getting qty 
	$get_cart="select * from retailer_cart where retailer_id='$retailer_id'";
	$run_cart=mysqli_query($con,$get_cart);
	$get_qty=mysqli_fetch_array($run_cart);
	$qty=$get_qty['qty'];
		if($qty==0){
		$qty=1;
		$sub_total=$total;
		}
    else{
		$qty=$qty;
		$sub_total=$total*$qty;
		}
		$insert_order="insert into retailer_customer_order (customer_id,due_amount,invoice_no,total_products,order_date,order_status,retailer_id) values('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status','$retailer_id')";
		$run_product=mysqli_query($con,$insert_order);
				echo"<script>alert('Order Successfully Submitted')</script>";
		$empty_cart="delete from retailer_cart where id_address='$ip_address'";
			$run_empty=mysqli_query($con,$empty_cart);
			$insert_pending_order="insert into retailer_pending_order(customer_id,invoice_no,product_id,qty,order_status,retailer_id) values ('$customer_id','$invoice_no','$pro_id','$qty','$status','$retailer_id')";
			$run_insert_pending_order=mysqli_query($con,$insert_pending_order);
			$empty_cart="delete from retailer_cart where id_address='$ip_address'";
			$run_empty=mysqli_query($con,$empty_cart);
			echo"<script>window.open('../customer/my_account.php','_self')</script>";
?>