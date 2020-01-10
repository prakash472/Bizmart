<?php

if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{


?>
<?php
include("includes/db.php");
if(isset($_GET['edit_pro'])){
	$edit_id=$_GET['edit_pro'];
	$get_id="select * from products where product_id=$edit_id";
	$run_id=mysqli_query($con,$get_id);
	$row_id=mysqli_fetch_array($run_id);
	$product_title=$row_id['product_title'];
	$cat_id=$row_id['cat_id'];
	$update_id=$row_id['product_id'];
	$brand_id=$row_id['brand_id'];
	$product_img1=$row_id['product_img1'];
	$product_img2=$row_id['product_img2'];
	$product_img3=$row_id['product_img3'];
	$product_price=$row_id['product_price'];
	$product_desc=$row_id['product_desc'];
	$product_key=$row_id['product_keyword'];	 
$get_cat="select * from categories where cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$cat_title=$row_cat['cat_title'];
$get_brand="select * from brands where brand_id='$brand_id'";
$run_brand=mysqli_query($con,$get_brand);
$row_brand=mysqli_fetch_array($run_brand);
$brand_title=$row_brand['brand_title'];
}
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
  <body class="admin">
 <?php
  
 /*<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea' });</script>
*/
 
 
  ?>


</head>

<body bgcolor="#666666">

<form method="post"   enctype="multipart/form-data">
<table class="rwd-table" style="margin-left:370px;">
<tbody>
<td colspan='2'><h2>Edit Products</h2></td>
</tr>
<tr >
<td align="right"><b>Product Title</b></td>
<td><input type="text" name="product_title" size="50" value="<?php echo $product_title;?>" /></td>
</tr>
<tr>
<td align="right"><b>Product Category</b></td>
<td>
<select name="product_cat">
<option value="<?php echo $cat_id?>"><?php echo $cat_title ?></option>
</select>
</td>
</tr>
<tr>
<td align="right"><b>Product Brand</b></td>
<td>
<select name="product_brand">
<option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>

    </select>
</td>
</tr>
<tr>
<td align="right"><b>Product Img1</b></td>
<td><input type="file" name="product_img1" value="<?php echo "Image 3"; ?>" /><br><img src="product_images/<?php echo $product_img1;?>" width="90" height="90" /></td>
</tr>
<tr>
<td align="right"><b>Product Img2</b></td>
<td><input type="file" name="product_img2" value="<?php echo "Image 2"; ?>" /><br><img src="product_images/<?php echo $product_img2;?>" width="90" height="90" /></td>
</tr>
<tr>
<td align="right"><b>Product Img3</b> </td>
<td><input type="file" name="product_img3" value="<?php echo "Image 3"; ?>"/><br><img src="product_images/<?php echo $product_img3;?>" width="90" height="90" /> </td>
</tr>
<tr>
<td align="right"><b>Product Description</b></td>
<td><textarea name="product_description" rows="10" cols="35"><?php echo $product_desc;?></textarea></td>
</tr>
<tr>
<td align="right"><b>Product Keyword</b></td>
<td><input type="text" name="product_key" size="50" value="<?php echo $product_key?>"/></td>
</tr>
<tr>
<td align="right"><b>Product price</b></td>
<td><input type="text" name="product_price" size="50" value="<?php echo $product_price?>"/></td>
</tr>

<tr align="center">
<td colspan="2" ><input type="submit" name="update_product" value="Update Product" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset ($_POST['update_product']))
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
	
	$insert_product="update products set product_title='$product_title',product_keyword='$product_key',product_price='$product_price',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_desc='$product_description' where product_id='$update_id'";  
 $run_products=mysqli_query($con,$insert_product);
 if($run_products){
	 echo"<script>alert('Product updated successfully')</script>";
	 echo"<script>window.open('index.php?view_products','_self')</script>";
	 
	 
	 }
 
}
}
?>
<?php
}
?>