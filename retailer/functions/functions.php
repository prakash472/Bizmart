<?php
$db=mysqli_connect("localhost","root","","bizmart");
if(isset($_GET['retailer'])){
	$retailer_id=$_GET['retailer'];
}

function getCat()
{
	if(isset($_GET['retailer'])){
		$retailer_id=$_GET['retailer'];
	global $db;
$get_cats="select * from retailer_categories where retailer_id='$retailer_id'";
	$run_cats=mysqli_query($db,$get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		echo "<li><a href='index.php?retailer=$retailer_id&cat=$cat_id'>$cat_title</a></li>";
	}
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
		echo "<li><a href='index.php?retailer=$retailer_id'>$retailer_title</a></li>";
	}
}


function getBrands(){
	global $db;
	if(isset($_GET['retailer'])){
		$retailer_id=$_GET['retailer'];
		
		
$get_brands="select * from retailer_brands where retailer_id='$retailer_id'";
	$run_brands=mysqli_query($db,$get_brands);
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
		echo "<li><a href='index.php?retailer=$retailer_id&brand=$brand_id'>$brand_title</a></li>";
	}
}
}
function getProducts(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $db;
	global $retailer_id;
	$get_products="select * from retailer_products where retailer_id='$retailer_id'  order by rand() LIMIT 0,9";
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
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<a href='comments.php?retailer=$retailer_id&product=$pro_id' style='text-decoration:none;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button align='centre;'>Review Product</button></a><br><br>


	<p id='products_title'><b>Price:
	$$pro_price<b></p>
	<a href='details.php?retailer=$retailer_id&product=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?retailer=$retailer_id&add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
}
}
function getAllProducts(){
	global $db;
	global $retailer_id;
	$get_products="select * from retailer_products where retailer_id='$retailer_id'  order by rand() ";
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
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<a href='comments.php?retailer=$retailer_id&product=$pro_id' style='text-decoration:none;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button align='centre;'>Review Product</button></a><br><br>


	<p id='products_title'><b>Price: Rs.$pro_price<b></p>
	<a href='details.php?retailer=$retailer_id&product=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?retailer=$retailer_id&add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
		

function getCatPro(){
	global $db;
	if(isset($_GET['retailer'])&&isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
		$retailer_id=$_GET['retailer'];
		
	$get_cat_pro="select * from retailer_products where cat_id='$cat_id' and retailer_id='$retailer_id'";
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
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
	<b>Price:
	$$pro_price<b></p>
	<a href='details.php?retailer=$retailer_id&product=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='index.php?retailer=$retailer_id&add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
	<br><br>
</div>	
";
	}
		}
	}	

function getBrandPro(){
	global $db;

	if(isset($_GET['retailer'])&&isset($_GET['brand'])){
	
		 $retailer_id=$_GET['retailer'];
		$brand_id=$_GET['brand'];
	$get_brand_pro="select * from retailer_products where brand_id='$brand_id' and retailer_id='$retailer_id'";
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
	
	<img src='admin/product_images/$pro_image' width='200' height='200' align='middle' id='products_box'/><br><br>
		<b>Price:
	$$pro_price<b></p>
		<a href='details.php?retailer=$retailer_id&product=$pro_id' style='float:middle;' id='products_title'>Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a href='index.php?retailer=$retailer_id&add_cart=$pro_id'><button style='float:middle;'><span>Add to Cart</span></button></a>	
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
	global $retailer_id;
if(isset($_GET['add_cart'])){	
global $db;
$retailer_id=$_GET['retailer'];
$p_id=$_GET['add_cart'];
$ip_address=getIpAddress();
$sel_pro_price="select * from retailer_products where product_id='$p_id'";
		$run_pro_price=mysqli_query($db,$sel_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price)){	
		$pro_price=$row_pro_price['product_price'];
		}
$check="select * from retailer_cart where p_id='$p_id' AND id_address='$ip_address' AND retailer_id='$retailer_id'";
$run_check=mysqli_query($db,$check);
if(mysqli_num_rows($run_check)>0){
echo"";
}
else{
	$q="insert into retailer_cart (p_id,id_address,retailer_id,qty,total) values ('$p_id','$ip_address','$retailer_id',1,'$pro_price')";
	$run_q=mysqli_query($db,$q);
	if($run_q)
	{
		echo"<script>alert('added')</script>";
	echo"<script>window.open('index.php?retailer=$retailer_id','_self')</script>";
	}
}
	}
}
function items(){
	global $db;
	$ip_address=getIpAddress();
	$retailer_id=$_GET['retailer'];
	if(isset($_GET['add_cart'])){
		
		$get_items="select * from retailer_cart where id_address='$ip_address' and retailer_id='$retailer_id'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	else{
		$get_items="select * from retailer_cart where id_address='$ip_address' and retailer_id='$retailer_id'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

		}
	echo $count_items;
		
		}
	function total_price(){
		$retailer_id=$_GET['retailer'];
		global $db;
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
		$values=array_sum($product_price);
		$total=$total+$values;
		}
		}	
	
	echo"Rs: ".$total;
	}
function updatecart(){	
global $db;
$retailer_id=$_GET['retailer'];
if(isset($_POST['update'])){
if(isset($_POST['qty'])){
		$quaty=$_POST['qty'];
		$ids=$_POST['id'];
		$array=array_combine($quaty,$ids);
		foreach($array as $q => $i){
			
			$query="update retailer_cart set qty='$q' where p_id='$i'";
			$run_query=mysqli_query($db,$query);
			if($run_query){
				echo"<script>alert('qty updated')</script>";
			echo "<script>window.open('cart.php?retailer=$retailer_id','_self')</script>";
				
				}
			}
		}
foreach($_POST['remove'] as $remove_id){
	$delete_products="delete from retailer_cart where p_id='$remove_id'";
	$run_products=mysqli_query($db,$delete_products);
    if($run_products){
		echo "<script>window.open('cart.php?retailer=$retailer_id','_self')</script>";
		}
		
	}	
}
}
if(isset($_POST['continue'])){
	echo"<script>window.open('index.php?retailer=$retailer_id','_self')</script>'";
	}


?>
