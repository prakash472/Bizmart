<?php
$db=mysqli_connect("localhost","root","","bizmart");

function getCat()
{
	global $db;
$get_cats="select * from seller_categories";
	$run_cats=mysqli_query($db,$get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
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


function getBrands(){
	global $db;
$get_brands="select * from seller_brands";
	$run_brands=mysqli_query($db,$get_brands);
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}
function getProducts(){
	global $db;
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	$get_products="select * from seller_product order by rand() LIMIT 0,9";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_desc=$row_products['product_desc'];
		$pro_price=$row_products['product_price'];
		$pro_image=$row_products['product_img1'];
	echo"
	<div id='single_product'>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<a href='comments.php?product=$pro_id' style='text-decoration:none;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button align='centre;'>Review Product</button></a><br><br>


	<p id='products_title'><b>Price: &nbsp;&nbsp;$$pro_price<b></p>
	<a href='details.php?pro_id=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='message.php?add_cart=$pro_id'><button style='float:middle;'><span>Like it Consult Owner</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	
}
function getAllProducts(){
	global $db;
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	$get_products="select * from seller_product order by rand()";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_desc=$row_products['product_desc'];
		$pro_price=$row_products['product_price'];
		$pro_image=$row_products['product_img1'];
	echo"
	<div id='single_product'>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<a href='comments.php?product=$pro_id' style='text-decoration:none;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button align='centre;'>Review Product</button></a><br><br>


	<p id='products_title'><b>Price:&nbsp;&nbsp;$$pro_price<b></p>
	<a href='details.php?pro_id=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='message.php?add_cart=$pro_id'><button style='float:middle;'><span>Like it Consult Owner</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	
}


function getCatPro(){
	global $db;
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
	$get_cat_pro="select * from seller_product where cat_id='$cat_id'";
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
	<div id='single_product'>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	<img src='product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<p id='products_title'><b>Price:&nbsp;&nbsp;$$pro_price<b></p>
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
	$get_brand_pro="select * from seller_product where brand_id='$brand_id'";
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
	<div id='single_product'>
	<br>
	<h3 id='products_title'>$pro_title</h3>
	<br>
	
	<img src='product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<p id='products_title'><b>Price:&nbsp;&nbsp;$$pro_price<b></p>
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
	$q="insert into cart (p_id,id_address) values ('$p_id','$ip_address')";
	$run_q=mysqli_query($db,$q);
	echo"<script>window.open('index.php','_self')</script>";
}
	}
}
function items(){
	global $db;
	$ip_address=getIpAddress();
	if(isset($_GET['add_cart'])){
		$get_items="select * from cart where id_address='$ip_address'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	else{
		$get_items="select * from cart where id_address='$ip_address'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

		}
	echo $count_items;
		
		}
	function total_price(){
		global $db;
		$ip_address=getIpAddress();
		$total=0;
		$sel_price="select * from cart  where id_address='$ip_address'";
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

?>