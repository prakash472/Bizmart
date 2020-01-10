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
<link rel="stylesheet" href="styles/abt_style.css" media="all"/>

</head>
<body>
<!--Main content Starts-->
<div class="main_wrapper">
  
<!--header1 starts-->
<div class="header1_wrapper">
<h5>BIZMART</h5>
 
<!-- Header2 ends-->
<!-- Navigation Bar starts-->
<div id="navbar">
<ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="all_products.php">All Products</a></li>
    <li><a href="customer/my_account.php?">My Account</a></li>
    <li><a href="customer_main_signup.php">Sign up</a></li>
    <li><a href="about.php">About us</a></li>
    <li><a href="seller/index.php">Sell</a><li>
</ul>
<div id="form" >
<form method="get" action="results.php" enctype="multipart/form-data/">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</div>

<link rel="stylesheet" href="styles/about_style.css" media="all"/>
<body>

  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 hero">
          <h1></h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <hr>

    <div class="row">
      <div class="col-sm-8">
        <h2>BizMart</h2>
        <p></p> Online Shopping Platform<strong/></p>
        <p></p> It's no longer just the privilege of a metro city or an urban area to shop online for their favorite products. BizMart is one online shopping site that has made it possible for consumers even in the remote areas of Nepal to avail products from the best brands at low prices online. Considering the present lifestyle of people, it's no surprise that they prefer to buy online most of the products that they need on a daily basis like clothes for men and women, electronics, mobiles, home appliances, products for personal beauty and care , and the like. The ultimate convenience of having to simply browse through their favorite online shopping website and place orders from the comfort of their home, and get it delivered in the shortest time possible at their doorstep is a service that is unbeatable.</p>
        
      </div>
      <div class="col-sm-4">
        <h2>Contact Us</h2>
        <div>
          <strong>Our Branch</strong>
          <br />New Baneshwor,Kathmandu
          
          <br />
        </div>
        <div>
          <abbr title="Phone">Phone: </abbr>(+977) 9843611389
          <br />
          <abbr title="Email">Email: </abbr> <a href="mailto:Bizmart.com">Email Us</a>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <div class="row text-center">

      <div class="col-lg-12">
        <h1>Meet Our Team</h1>
        <br />
      </div>

      <div class="col-sm-4">
        <img class="image image--circle image--center", src = "images/prakash.jpg" alt="">
        <h2>Prakash Bist
             (Programmer)</h2>
        <p>BCT Student @ ACEM</p>
      </div>
      <div class="col-sm-4">
        <img class="image image--circle image--center" src="images/parajuli.jpg" alt="">
        <h2>Prakash Parajuli
              (Programmer)</h2>
        <p>BCT Student @ ACEM</p>
      </div>
      <div class="col-sm-4">
        <img class="image image--circle image--center" src="images/rishav.jpg" alt="">
        <h2>Rishav Pokharel
             (Designer)</h2>
        <p>BCT Student @ ACEM</p>
      </div>
    </div>
    <!-- /.row -->

    
  

  <footer class="footer" />
  <div>
  	Copyright@B7 technology ©2017 bizmart.com||
	Terms of use.
  </div>

</body>

</html>

 
  
 

</body>
</html>
