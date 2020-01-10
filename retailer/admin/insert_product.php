<?php
include("includes/db.php");
if(!isset($_SESSION['retailer_email'])){
	echo"<script>window.open('retailer_main_login.php','_self')</script>";
	}
else
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../table.css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <?php
  
 /*<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea' });</script>
*/
 
 
  ?>


</head>
<?php
    $retailer_email=$_SESSION['retailer_email'];
	$get_reteiler_id="select * from retailer where email='$retailer_email'";
	$run_retailer_id=mysqli_query($con,$get_reteiler_id);
	$row_retailer_id=mysqli_fetch_array($run_retailer_id);
	$retailer_id=$row_retailer_id['retailer_id'];
    

?>

<body bgcolor="#666666">

<form method="post" action="index.php?insert_product" enctype="multipart/form-data">
<table class="rwd-table">
<tbody>

<th colspan='2'><h2>Insert New Products</h2></th>
</tr>
<tr >
<th align="right"><b>Product Title</b></th>
<th><input type="text" name="product_title" size="50" /></th>
</tr>
<tr >
<th align="right"><b>Retailer Email</b></th>
<th>
<select name="retailer_cat">
<option><?php echo $retailer_email;?></option>
</select>
</th>
</tr>

<tr>
<th align="right"><b>Product Category</b></th>
<th>
<select name="product_cat">
<option>Select a category</option>
<?php
$get_cats="select * from retailer_categories where retailer_id='$retailer_id'";
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
</th>
</tr>
<tr>
<th align="right"><b>Product Brand</b></th>
<th>
<select name="product_brand">
<option>Select a brand</option>
<?php
$get_brands="select * from retailer_brands where retailer_id='$retailer_id'";
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
</th>
</tr>
<tr>
<th align="right"><b>Product Img1</b></th>
<th><input type="file" name="product_img1" /></th>
</tr>
<tr>
<th align="right"><b>Product Img2</b></th>
<th><input type="file" name="product_img2" /></th>
</tr>
<tr>
<th align="right"><b>Product Img3</b></th>
<th><input type="file" name="product_img3" /></th>
</tr>
<tr>
<th align="right"><b>Product Description</b></th>
<th><textarea name="product_description" rows="10" cols="35"></textarea></th>
</tr>
<tr>
<th align="right"><b>Product Keyword</b></th>
<th><input type="text" name="product_key" size="50"/></th>
</tr>
<tr>
<th align="right"><b>Product price</b></th>
<th><input type="text" name="product_price" size="50"/></th>
</tr>

<tr align="center">
<th colspan="2" ><input type="submit" name="insert_product" value="Insert Product" /></th>
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
	
	$insert_product="insert into retailer_products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status,product_keyword,retailer_id) values ('$product_cat1','$product_brand1',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_description','$status','$product_key','$retailer_id')";  
 $run_products=mysqli_query($con,$insert_product);
 if($run_products){
	 echo"<script>alert('Product updated successfully')</script>";
	 echo"<script>window.open('index.php?insert_product','_self'</script>";
	 
	 
	 }
 
}
}
?>
<?php
}
?>