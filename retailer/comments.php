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
<link rel="stylesheet" href="styles/comments.css" media="all"/>
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
        <a href="index.php?retailer=<?php echo $retailer_id ?>">Home</a>
    <ul>
    <li><a href="index.php?retailer=<?php echo $retailer_id ?>">Homepage</a></li>
    </ul>
    </li>

    <li>
        <a href="all_products.php?retailer=<?php echo $retailer_id ?>">All Products</a>
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
<li></b>
<?php

if(!isset($_SESSION['email'])){
echo"<a style='text-align:right' href='customer_main_login.php' style='color:#00F;'>Login</a>";
}
else{
echo"<a style='text-align:right' href='logout.php' style='color:#00F;'>Logout</a>";
}
?> </b>
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

<div id="products_box1">
<h3>Place Your Rating:</h3>
<?php
if(isset($_GET['product'])){
	$product_id=$_GET['product'];
	$get_products="select * from retailer_products where product_id='$product_id'";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)){
    $pro_image1=$row_products['product_img1'];
	echo"
	<div>
	<br>
		<img src='admin/product_images/$pro_image1' width='200' height='200' align='middle' id='products_box'/><br><br>
</div> 
";
	
	}
		}


?>

<form method="post" enctype="multipart/form-data" >

<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" required="required" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" required="required" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" required="required" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" required="required" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" required="required" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
</fieldset>
<br />
<br />
<label style="position:relative;">Name</label><br>
<input type="text" name="name" class="name" required />
<br />
<label style="position:relative;">Comment</label><br>
<textarea style="position:relative;" name="comments" rows="10" cols="25" required>
</textarea>
<br>
<input type="submit" name="submit" value="Submit" />
<br>
</form>
<?php
?>
<?php
if(isset($_POST['submit'])){
	if(!isset($_SESSION['email'])){
	echo"<script>window.open('../customer_main_login.php','_self')</script>";
}
else{
	$e=$_SESSION['email'];
	$name=$_POST['name'];
	$comments=$_POST['comments'];
	$rating=$_POST['rating'];
	
	$get_comment="insert into retailer_comments(name,comments,date,product_id,rating,retailer_id) values ('$name','$comments',NOW(),'$product_id','$rating','$retailer_id')";
	$run_comment=mysqli_query($con,$get_comment);
	if(isset($run_comment)){
		echo"<script>alert('Your review has been added. Thank You ')</script>";
		echo"<script>window.open('comments.php?retailer=$retailer_id&product=$product_id','_self')</script>";
		}
	
}
}
?>


<?php
$p_id=$_GET['product'];
$get_prev_comment="select * from retailer_comments where product_id='$p_id' and retailer_id=$retailer_id";
$run_prev_comment=mysqli_query($con,$get_prev_comment);
;
$count=mysqli_num_rows($run_prev_comment);
if($count==0){
	echo"No Reviews Yet....";
	}
   else{
	   while($row_prev_comment=mysqli_fetch_array($run_prev_comment)){
			$prev_name=$row_prev_comment['name'];
            $prev_comments=$row_prev_comment['comments'];
            $prev_date=$row_prev_comment['date'];
            $prev_rating=$row_prev_comment['rating'];
			?>
            <br />
<table width="200" align="left" bgcolor='#fce4ec'>
      <tr></tr>
      <tr></tr>
      </table>
      <br />
      <?php 
	  if($prev_rating==1){
		  echo"
      <span style='font-size:150%;color:yellow;'>&starf;</span>";
	  }
	  if($prev_rating==2){
		  echo"
      <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  ";
	  }
	  if($prev_rating==3){
		  echo"
      <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>";
	  }
	  if($prev_rating==4){
		  echo"
      <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>"
	  ;
	  }
	  if($prev_rating==5){
		  echo"
      <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>
	  <span style='font-size:150%;color:yellow;'>&starf;</span>";
	  }
      ?>
   			
<?php
echo "<br>".$prev_name;
echo "<br>".$prev_date;
echo "<br>".$prev_comments; 
echo"<br>";  
	   }
?>	   
	  
	   <?php
	   	   
		   }
?>
</div>
</div>
</div>
<div class='footer'>
	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
</div>
</body>
</html>































