<?php
include("includes/db.php");
include("functions/functions.php");
$retailer_id=$_GET['retailer'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bizmart</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
<link rel="stylesheet" href="table.css" media="all" />
<?php
$ip_address=getIpAddress();	
$get_quantity="select * from retailer_cart where id_address='$ip_address' and retailer_id='$retailer_id'";
$run_quantity=mysqli_query($con,$get_quantity);
$final=0;
while($row_quantity=mysqli_fetch_array($run_quantity)){
	$quantity=$row_quantity['qty'];
	$subtotal=$row_quantity['total'];
	$final=$final+$quantity*$subtotal;
	}
?>

</head>
<body>
<!--Main content Starts-->
<div class="main_wrapper">
  
<!--header1 starts-->
<div class="header1_wrapper">
<h5>Bizmart</h5>
</div>
<!--header2 ends-->
<!-- Header2 ends-->
<!-- Navigation Bar starts-->
<div id="iefix">
<ul class="nav">
    <li>
        <a href="index.php?retailer=<?php echo $retailer_id?>">Home</a>
    <ul>
    <li><a href="index.php?retailer=<?php echo $retailer_id?>">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="all_products.php?retailer=<?php echo $retailer_id?>">All Products</a>
         </li>
    <li><a href="customer/my_account.php?">My Account</a></li>
    <li>
        <a href="#">Categories</a>
        <ul>
       <li>   
                <?php
			getCat();
			?>
       </li>
        </ul>
    </li>
    <li>
        <a href="#">Brands</a>
        <ul>
       <li>   
                <?php
			getBrands();
			?>
       </li>
        </ul>
    </li>
    <li>
        <a href="#">Retailers</a>
        <ul>
       <li>   
                <?php
			getRetailer();
			?>
       </li>
        </ul>
    </li>
    
    <li><a href="../about.php">About us</a></li>
    <li><a href="customer_main_signup.php">Sign up</a></li>

<?php
if(!isset($_SESSION['email'])){
?>

<li  class="session"> <b>Welcome Guest!</b></li>
<?php

}
else {
?>
<li class="session"><b>Welcome:<span style='color:skyblue'><?php echo $_SESSION['email']; ?></li>
<?php } ?>
<li>
<?php

if(!isset($_SESSION['email'])){
echo"<a style='text-align:right' href='customer_main_login.php' style='color:#00F;'>Login</a>";
}
else{
echo"<a style='text-align:right' href='logout.php' style='color:#00F;'>Logout</a>";
}
?>
</li>

<li>
<a href="cart.php" >Cart</a></p>
</li>
<li>
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</li>


</div>

<div class="content_wrapper">


<div id="right_content">
<?php
cart();
?>
<table class="rwd-table">
<form method="post" action="cart.php?retailer=<?php echo $retailer_id;?>" enctype="multipart/form-data">
<tbody>

<tr >
<th><b>Products<b></th>
<th><b>Remove<b></th>
<th><b>Quantity<b></th>
<th><b>Price<b></th>
</tr>
<?php
$ip_address=getIpAddress();
		$total=0;
		$sel_price="select * from retailer_cart  where id_address='$ip_address' and retailer_id='$retailer_id'";
		$run_price=mysqli_query($db,$sel_price);
		while($row_price=mysqli_fetch_array($run_price)){
		$pro_id=$row_price['p_id'];
		$sel_pro_price="select * from retailer_products where product_id='$pro_id' and retailer_id='$retailer_id'";
		$run_pro_price=mysqli_query($db,$sel_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price)){	
		$product_price=array($row_pro_price['product_price']);
		$product_title=$row_pro_price['product_title'];
		$single_price=$row_pro_price['product_price'];
		
		$values=array_sum($product_price);
		$total=$total+$values;
		$pro_img=$row_pro_price['product_img1'];
?>
<tr>
<td><?php echo $product_title; ?><br> <?php echo" 
<img src='admin/product_images/$pro_img' height='120' width='120' />";?><br> <br> </td>
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>" /></td>
<td>
<input type="hidden" name="id[]" value="<?php echo $pro_id?>" />
<input type="text" name="qty[]" value="<?php
$sel_qty="select * from retailer_cart where p_id='$pro_id' and id_address='$ip_address'";
$run_qty=mysqli_query($db,$sel_qty);
$row=mysqli_fetch_array($run_qty);
$qty=$row['qty'];
echo $qty;
?>" size="3" / >

<?php
/*
if(isset($_POST['update'])){
		$qty=$_POST['qty'];
	$run_qty="update retailer_cart set qty='$qty' where id_address='$ip_address' and retailer_id='$retailer_id'";
	$run_que=mysqli_query($db,$run_qty);
	$total=$total*$qty;
		
	}
*/
?>
<td> <?php  echo $single_price; ?></td>
<?php

}
		}
?>			
</tr>
<tr colspan="5" align="right">
<td>Sub Total<td>
<?php echo $final;?>
<tr></tr>
<tr></tr>
<tr align="center">
<td><input type="submit" name="continue" value="Continue Shopping" /></td>
<?php
if(isset($_POST['continue'])){
	echo"
	<script>window.open('index.php?retailer=$retailer_id','_self')</script>";
	
	}

?>

<td><input type="submit" name="update"	value="Update Cart" /></td>

<td>
<input type="button" value="Checkout" onclick="window.location.href='checkout.php?retailer=<?php echo $retailer_id?>'" /></td>

</tr>
</tbody>
</table>
</form>
<?php
echo @$update=updatecart();
?>

</div>
</div>
	</div>
<footer class="footer" />
  <div>
  	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
  </div>

</body>

</html>