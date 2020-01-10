<?php
$db=mysqli_connect("localhost","root","","bizmart");
function getCat()
{
	global $db;
$get_cats="select * from categories";
	$run_cats=mysqli_query($db,$get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}
function getBrands(){
	global $db;
$get_brands="select * from brands";
	$run_brands=mysqli_query($db,$get_brands);
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
function getProducts(){
	global $db;
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	$get_products="select * from products order by rand() LIMIT 0,9";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_desc=$row_products['product_desc'];
		$pro_price=$row_products['product_price'];
		$pro_image=$row_products['product_img1'];
	echo"
	<div>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<p id='products_title'><b>Price: Rs.$pro_price<b></p>
	<a href='details.php?pro_id=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	
}
}
function getAllProducts(){
	global $db;
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	$get_products="select * from products order by rand()";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_desc=$row_products['product_desc'];
		$pro_price=$row_products['product_price'];
		$pro_image=$row_products['product_img1'];
	echo"
	<div>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<p id='products_title'><b>Price: Rs.$pro_price<b></p>
	<a href='details.php?pro_id=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	
}

function getDefault(){
	global $db;

								$c=$_SESSION['email'];
								$get_c="select * from users where email='$c'";
								$run_c=mysqli_query($db,$get_c);
								$row_c=mysqli_fetch_array($run_c);
								$customer_id=$row_c['id']; 
								    								
	if(!isset($_GET['my_orders'])){
			if(!isset($_GET['edit_account'])){
					if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
								if(!isset($_GET['view_messages'])){
								       if(!isset($_GET['my_orders_retailer'])){ 
								$get_orders="select * from customer_order where customer_id='$customer_id' AND order_status='Pending'";
								$run_orders=mysqli_query($db,$get_orders);
								$count_orders=mysqli_num_rows($run_orders);
								if($count_orders>0){
									echo"
									<div>
									<h1> No of Pending Orders: $count_orders</h1>
									<h2> To view order details click<a href='my_account.php?my_orders'>Link</a></h2>
									<h3> To pay offline now click <a href='pay_offline.php'>Link</a></h3>
									</div>							
									";
								}
									else{
										echo"
									<div>
									<h1> No of Pending Orders:0</h1>
									<h2>To see your order history click<a href='my_account.php?my_orders'>Link</h2>
									</div>							
									";
										
										}
									
	
	
	}
					}
			}
	}
}
	}
}
function getCatPro(){
	global $db;
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
	$get_cat_pro="select * from products where cat_id='$cat_id'";
	$run_cat_pro=mysqli_query($db,$get_cat_pro);
	$count=mysqli_num_rows($run_cat_pro);
	if($count==0)
	{
		echo"<h3>Sorry we don't have this product</h3>";
		}
	while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		$pro_id=$row_cat_pro['product_id'];
		$pro_title=$row_cat_pro['product_title'];
		$pro_desc=$row_cat_pro['product_desc'];
		$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_img1'];
	echo"
	<div>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<a href='details.php?pro_id=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	
function getBrandPro(){
	global $db;
	if(isset($_GET['brand'])){
		$brand_id=$_GET['brand'];
	$get_brand_pro="select * from products where brand_id='$brand_id'";
	$run_brand_pro=mysqli_query($db,$get_brand_pro);
	$count=mysqli_num_rows($run_brand_pro);
	if($count==0)
	{
		echo"<h3>Sorry we don't have this product</h3>";
		}
	while ($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
		$pro_id=$row_brand_pro['product_id'];
		$pro_title=$row_brand_pro['product_title'];
		$pro_desc=$row_brand_pro['product_desc'];
		$pro_price=$row_brand_pro['product_price'];
		$pro_image=$row_brand_pro['product_img1'];
	echo"
	<div>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
		<a href='details.php?pro_id=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a href='index.php?add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	
function getIpAddress(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
function cart(){
if(isset($_GET['add_cart'])){	
global $db;
$p_id=$_GET['add_cart'];
$ip_address=getIpAddress();
$check="select * from cart where p_id='$p_id' AND id_address='$ip_address'";
$run_check=mysqli_query($db,$check);
if(mysqli_num_rows($run_check)>0){
echo"";
}
else{
	$q="insert into cart (p_id,id_address) values ('$p_id','1')";
	$run_q=mysqli_query($db,$q);
	echo"<script>window.open('index.php','_self')</script>";
}
	}
}
function items(){
	global $db;
	if(isset($_GET['add_cart'])){
		$get_items="select * from cart where id_address='1' ";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	else{
		$get_items="select * from cart where id_address='1'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

		}
	echo $count_items;
		
		}
	function total_price(){
		global $db;
		$ip_address=getIpAddress();
		$total=0;
		$sel_price="select * from cart  where id_address='1'";
		$run_price=mysqli_query($db,$sel_price);
		while($row_price=mysqli_fetch_array($run_price)){
		$pro_id=$row_price['p_id'];
		$sel_pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($db,$sel_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price)){	
		$product_price=array($row_pro_price['product_price']);
		$values=array_sum($product_price);
		$total=$total+$values;
		}
		}	
	
	echo"Rs: ".$total;
	}
function updatecart(){
	global $db;
if(isset($_POST['update'])){	
foreach($_POST['remove'] as $remove_id){
	$delete_products="delete from cart where p_id='$remove_id'";
	$run_products=mysqli_query($db,$delete_products);
    if($run_products){
		echo "<script>window.open('cart.php','_self')</script>";
		}
	}	
}
if(isset($_POST['continue'])){
	echo"<script>window.open('index.php','_self')</script>'";
	}
}

function getRetailer()
{
	global $db;
$get_retailer="select * from retailer";
	$run_retailer=mysqli_query($db,$get_retailer);
	while ($row_retailer=mysqli_fetch_array($run_retailer)){
		$retailer_id=$row_retailer['retailer_id'];
		$retailer_title=$row_retailer['retailer_title'];
		echo "<li><a href='retailer/index.php?retailer=$retailer_id'>$retailer_title</a></li>";
	}
}



?>
