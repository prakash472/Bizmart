<link rel="stylesheet" href="table.css" media="all" />
<?php
include("includes/db.php");
$c=$_SESSION['email'];
								$get_c="select * from users where email='$c'";
								$run_c=mysqli_query($db,$get_c);
								$row_c=mysqli_fetch_array($run_c);
								$customer_id=$row_c['id']; 
								
?>
<?php
if(isset($_GET['view_messages'])){

?>
<table class="rwd-table">
<tr style="font-size:14px" >
<th>S.No.</th> 
<th>From</th>
<th>Product</th>
<th>Message action</th>
<th>Message Date</th>
<th>Status</th>
<th>Operation</th>
</tr>
<?php
$get_order="select * from messages where seller_id='$customer_id'";
$run_order=mysqli_query($con,$get_order);
$i=1;
while($row_order=mysqli_fetch_array($run_order)){
$buyer_id=$row_order['buyer_id'];
$status=$row_order['status'];
$product_id=$row_order['product_id'];
$date=$row_order['date'];
$message_id=$row_order['message_id'];
$get_product_title="select * from seller_product where product_id='$product_id'";
$run_product_title=mysqli_query($con,$get_product_title);
$row_product_title=mysqli_fetch_array($run_product_title);
$product_title=$row_product_title['product_title'];
echo"
<tr align='center'>
<td>$i</td>
<td>$buyer_id</td>
<td>$product_title</td>
<td>
<a href='view_message.php?view_message=$message_id' style='color:blue; font-size:bold; font-weight:bold;'>View Message</a>
&nbsp;&nbsp;<a href='delete_message.php?delete_message=$message_id' style='color:blue; font-size:medium; font-weight:bold;'>Delete Message</a>
</td>
<td>$date</td>
<td>$status</td>";
if($status=='Not Read'){
echo"
<td><a href='update_status.php?message=$message_id'><button>Mark as Read</button></a></td>
";


}
?>
<?php
$i++;}
?>
</table>
<?php
}
?>