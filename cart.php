<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bizmart</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
<link rel="stylesheet" href="customer/table.css" media="all" />
<?php
$ip_address=getIpAddress();
$get_quantity="select * from cart where id_address='$ip_address'";
$run_quantity=mysqli_query($db,$get_quantity);
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
<!-- Header2 starts-->
<div class="header2_wrapper"></div>
</div>
<!-- Header2 ends-->
<!-- Navigation Bar starts-->
<div id="iefix">
<ul class="nav">
    <li>
        <a href="index.php">Home</a>
    <ul>
    <li><a href="index.php">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="index.php">All Products</a>
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
    
    <li><a href="about.php">About us</a></li>
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


<div>

<div class="content_wrapper">


<div id="right_content">
<?php
cart();
?>

<table class="rwd-table">
<form method="post" action="cart.php" enctype="multipart/form-data">
<tbody>

<tr >
<th><b>Products<b></th>
<th><b>Remove<b></th>
<th><b>Quantity<b></th>
<th><b>Price($)<b></th>
</tr>
<?php
$ip_address=getIpAddress();
		$total=0;
		$sel_price="select * from cart  where id_address='$ip_address'";
		$run_price=mysqli_query($db,$sel_price);
		while($row_price=mysqli_fetch_array($run_price)){
		$pro_id=$row_price['p_id'];
		$qty1=$row_price['qty'];
		$sel_pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($db,$sel_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price)){	
		$product_price=array($row_pro_price['product_price']);
		$product_title=$row_pro_price['product_title'];
		$single_price=$row_pro_price['product_price'];
		$pro_img=$row_pro_price['product_img1'];
?>
<?php

?>
<tr>
<td><?php echo $product_title; ?><br> <?php echo" 
<img src='admin/product_images/$pro_img' height='100' width='120' />";?><br> <br> </td>
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"  </td>
<td>

<?php
/*
<input type="submit"  name="inc" value="+"  />

<?php
global $qty2;
$total=0;
if(isset($_POST['inc'])){
	echo"<script>window.open('cart.php?product+=$pro_id','_self')</script>";
	$pro_update_id=$_GET['product+'];
	$sel_update_pro ="select * from cart  where id_address='$ip_address' and p_id='$pro_update_id'";
		$run_update_pro=mysqli_query($db,$sel_update_pro);
		while($row_update_pro=mysqli_fetch_array($run_update_pro)){
		$qty2=$row_price['qty'];
		$qty2++;
		}
$update_quantity="update cart set qty='$qty2' where p_id='$pro_update_id'";
$run_update=mysqli_query($db,$update_quantity);	
	}

?>


<input type="submit" name="dec" value="-" />
<?php
global $qty2;
if(isset($_POST['dec'])){
	echo"<script>window.open('cart.php?product-=$pro_id','_self')</script>";
     $pro_update_id=$_GET['product-'];
	 $sel_update_pro ="select * from cart  where id_address='$ip_address' and p_id='$pro_update_id'";
		$run_update_pro=mysqli_query($db,$sel_update_pro);
		while($row_update_pro=mysqli_fetch_array($run_update_pro)){
		$qty2=$row_price['qty'];
		$qty2--;
		}
$update_quantity="update cart set qty='$qty2' where p_id='$pro_update_id'";
$run_update=mysqli_query($db,$update_quantity);	
	}
*/
?>
<input type="hidden" name="id[]" value="<?php echo $pro_id?>" />
<input type="text" name="qty[]" value="<?php
$sel_qty="select * from cart where p_id='$pro_id' and id_address='$ip_address'";
$run_qty=mysqli_query($db,$sel_qty);
$row=mysqli_fetch_array($run_qty);
$qty=$row['qty'];
echo $qty;
?>" size="3" / >
<?php
?>
<?php
/*
if(isset($_POST['update'])){
		$qty=$_POST['qty'];
	$run_qty="update cart set qty='$qty' where id_address='$ip_address'";

		
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
<?php
/*
$price_update="select * from cart  where id_address='$ip_address'";
$run_price_update_=mysqli_query($db,$price_update);
		while($row_price_update=mysqli_fetch_array($run_price_update_)){
		$qty_update=$row_price_update['qty'];
		$price_total=$row_price_update['total'];
		$total_update=$price_total*$qty_update;
		$update_total="update cart set total='$total_update' where id_address='$ip_address'" ;
		$run_update=mysqli_query($db,$update_total);
		}
*/
?>
<?php

echo "$".$final;
?>
<tr></tr>
<tr></tr>
<tr align="center">
<td><input type="submit" name="continue" value="Continue Shopping" /></td>
<td><input type="submit" name="update"	value="Update Cart" /></td>

<td>
<input type="button" value="Checkout" onclick="window.location.href='checkout.php'" /></td>
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
	</div>
<footer class="footer">
Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.</footer>
</body>
</html>