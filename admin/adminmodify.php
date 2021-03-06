<style>
@import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

* {font-family: 'Open Sans', sans-serif;}

.rwd-table {
  margin: auto;
  min-width: 300px;
  max-width: 100%;
  border-collapse: collapse;
}

.rwd-table tr:first-child {
  border-top: none;
  background: #428bca;
  color: #fff;
}

.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background-color: #f5f9fc;
}

.rwd-table tr:nth-child(odd):not(:first-child) {
  background-color: #ebf3f9;
}

.rwd-table th {
  display: none;
}

.rwd-table td {
  display: block;
}

.rwd-table td:first-child {
  margin-top: .5em;
}

.rwd-table td:last-child {
  margin-bottom: .5em;
}

.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 120px;
  display: inline-block;
  color: #000;
}

.rwd-table th,
.rwd-table td {
  text-align: left;
}

.rwd-table {
  color: #333;
  border-radius: .4em;
  overflow: hidden;
}

.rwd-table tr {
  border-color: #bfbfbf;
}

.rwd-table th,
.rwd-table td {
  padding: .5em 1em;
}
@media screen and (max-width: 601px) {
  .rwd-table tr:nth-child(2) {
    border-top: none;
  }
}
@media screen and (min-width: 600px) {
  .rwd-table tr:hover:not(:first-child) {
    background-color: #d8e7f3;
  }
  .rwd-table td:before {
    display: none;
  }
  .rwd-table th,
  .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child,
  .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child,
  .rwd-table td:last-child {
    padding-right: 0;
  }
  .rwd-table th,
  .rwd-table td {
    padding: 1em !important;
  }
}
</style>
<table class="rwd-table">
<tbody>
<tr style="font-size:14px" >
<th>Insert New Products</th>
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
$get_cats="select * from categories";
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
$get_brands="select * from brands";
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
	$product_brand=$_POST['brand_title'];
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
	
	$insert_product="insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status,product_keyword) values ('$product_cat1','$product_brand1',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_description','$status','$product_key')";  
 $run_products=mysqli_query($con,$insert_product);
 if($run_products){
	 echo"<script>alert('Product updated successfully')</script>";
	 echo"<script>window.open('index.php?insert_product','_self'</script>";
	 
	 
	 }
 
}
}
?>
