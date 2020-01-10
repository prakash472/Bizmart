<?php

if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{


?>
<?php
include("includes/db.php");
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    
if(isset($_GET['edit_pro'])){
	$edit_id=$_GET['edit_pro'];
	$get_id="select * from retailer_products where product_id=$edit_id and retailer_id='$retailer_id'";
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
$get_cat="select * from retailer_categories where cat_id='$cat_id' and retailer_id='$retailer_id'";
$run_cat=mysqli_query($con,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$cat_title=$row_cat['cat_title'];
$get_brand="select * from retailer_brands where brand_id='$brand_id' and retailer_id='$retailer_id'";
$run_brand=mysqli_query($con,$get_brand);
$row_brand=mysqli_fetch_array($run_brand);
$brand_title=$row_brand['brand_title'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <?php
  
 /*<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea' });</script>
*/
 
 
  ?>


</head>

<body bgcolor="#666666">

<form method="post"   enctype="multipart/form-data">
<table width= "798px" text align="center" border="2" style="border:#00CCCC" bgcolor="#00CCCC" >
<tr align="center">
<td colspan='2'><h2>Edit Products</h2></td>
</tr>
<tr >
<td align="right"><b>Product Title</b></td>
<td><input type="text" name="product_title" size="50" value="<?php echo $product_title;?>" /></td>
</tr>
<tr >
<td align="right"><b>Retailer Email</b></td>
<td>
<select name="retailer_cat">
<option><?php echo $retailer_email;?></option>
</select>
</td>
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
	
	$insert_product="update retailer_products set product_title='$product_title',product_keyword='$product_key',product_price='$product_price',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_desc='$product_description' where product_id='$update_id' 
	and retailer_id='$retailer_id'";  
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