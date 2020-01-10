<?php
include("includes/db.php");
session_start();
if(!isset($_SESSION['email'])){
	echo"<script>window.open('../customer_main_login.php','_self')</script>";
	}
else
{

?>

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
<link rel="stylesheet" href="../customer/table.css" media="all" />
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
        <a href="../index.php">Home</a>
    <ul>
    <li><a href="../index.php">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="all_products.php">All Products</a>
         </li>
    <li><a href="../customer/my_account.php?">My Account</a></li>
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
   <li><a href="index.php">Sell</a>
    <ul>
    <li><a href="insert_product.php">Sell Product</a></li>
    </ul>
    </li>
    </li>
    <li><a href="../about.php">About us</a></li>
    <li><a href="../customer_main_signup.php">Sign up</a></li>

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
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</li>
</div>
<div style="background-color:#FFF">
<form method="post" enctype="multipart/form-data">
<table class="rwd-table">
<tbody>
<tr align="center">
<td colspan='2'><h2>Insert New Products</h2></td>
</tr>
<tr >
<td align="right"><b>Product Title</b></td>
<td><input type="text" name="product_title" size="50" /></td>
</tr>
<tr>
<td align="right"><b>Product Category</b></td>
<td>
<select name="product_cat">
<option>Select a category</option>
<?php
$get_cats="select * from seller_categories";
	$run_cats=mysqli_query($con,$get_cats);
	$i=0;
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$i=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		echo "<option value='$i'>$cat_title</option>";
		$i++;
		
	}
?>
</select>
</td>
</tr>
<tr>
<td align="right"><b>Product Brand</b></td>
<td>
<select name="product_brand">
<option>Select a brand</option>
<?php
$get_brands="select * from seller_brands";
	$run_brands=mysqli_query($con,$get_brands);
	$j=0;
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$j=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
		echo "<option value='$j'>$brand_title</option>";
		$j++;
	}
	?>
    </select>
</td>
</tr>
<tr>
<td align="right"><b>Product Img1</b></td>
<td><input type="file" name="product_img1" /></td>
</tr>
<tr>
<td align="right"><b>Product Img2</b></td>
<td><input type="file" name="product_img2" /></td>
</tr>
<tr>
<td align="right"><b>Product Img3</b></td>
<td><input type="file" name="product_img3" /></td>
</tr>
<tr>
<td align="right"><b>Product Description</b></td>
<td><textarea name="product_description" rows="10" cols="35"></textarea></td>
</tr>
<tr>
<td align="right"><b>Product Keyword</b></td>
<td><input type="text" name="product_key" size="50"/></td>
</tr>
<tr>
<td align="right"><b>Product price</b></td>
<td><input type="text" name="product_price" size="50"/></td>
</tr>

<tr align="center">
<td colspan="2" ><input type="submit" name="insert_product" value="Insert Product" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset ($_POST['insert_product']))
{
	//text data
	$product_title=$_POST['product_title'];
	$product_cat1=$_POST['product_cat'];
	$product_brand1=$_POST['product_brand'];
	$product_description=$_POST['product_description'];
	$product_price=$_POST['product_price'];
	$status='on';
	$product_key=$_POST['product_key'];
	//img data
	$product_img1=$_FILES['product_img1']['name'];
	$product_img2=$_FILES['product_img2']['name'];
	$product_img3=$_FILES['product_img3']['name'];
	// temp name for image
	$temp_name1=$_FILES['product_img1']['tmp_name'];
	$temp_name2=$_FILES['product_img2']['tmp_name'];
	$temp_name3=$_FILES['product_img3']['tmp_name'];
	if($product_title=='' OR $product_cat1=='' OR $product_brand1=='' OR $product_description=='' OR $product_key=='' OR $product_price=='' OR $product_img1=='')
	{
		echo"<script>alert('Fill all the entity')</script>";
		exit();
		}
		else{
	move_uploaded_file($temp_name1,"product_images/$product_img1");
	move_uploaded_file($temp_name2,"product_images/$product_img2");
	move_uploaded_file($temp_name3,"product_images/$product_img3");
	$email1=$_SESSION['email'];
	$get_customer_id="select * from users where email='$email1'";
	$run_customer_id=mysqli_query($con,$get_customer_id);
	$row_email=mysqli_fetch_array($run_customer_id);
	$user_id=$row_email['id'];
		$insert_product="insert into seller_product (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status,product_keyword,customer_id) values ('$product_cat1','$product_brand1',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_description','$status','$product_key','$user_id')";  
 $run_products=mysqli_query($con,$insert_product);
 if($run_products){
	 echo"<script>alert('Product updated successfully')</script>";
	 echo"<script>window.open('index.php','_self')</script>";
	  }
 
}
}
?>
</div>
<div class="footer">
  	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
</div>
<?php
}
?>
