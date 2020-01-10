<?php
@session_start();
if(!isset($_SESSION['admin_email'])){
	echo"<script>window.open('admin_login.php','_self')</script>";
	}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Bizmart Admin Page</title>
    <link rel="stylesheet" href="adminmodify.css" charset="utf-8" />
    <link rel="stylesheet" href="admin--test.css" charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="admin">

    <header class="admin__statusbar flex--center">
      <span class="home"><a href="index.php" style="text-decoration:none; color:#999"><i class="fa fa-home"></i>Home</span></a>
      <span id="username"><i class="fa fa-user"></i>Prakash Parajuli</span>
    </header>
      <h2 style="margin-top:50px; margin-left:300px;" align="center";  ><?php echo @$_GET['logged_in']; ?></h2>
    <nav class="admin__sidepanel">
      
      <ul>
      <li><a href="index.php?insert_product" style="text-decoration:none; color:#999">
 <i class="fa fa-plus-square-o"></i>Insert new Product</a></li>
 <li><a href="index.php?view_products" style="text-decoration:none; color:#999"><i class="fa fa-eye" aria-hidden="true"></i>View all Products</a></li>
<li><a href="index.php?insert_cat" style="text-decoration:none; color:#999"> <i class="fa fa-plus-square-o"></i>Insert new Category</a></li>
<li><a href="index.php?view_cats" style="text-decoration:none; color:#999"><i class="fa fa-eye" aria-hidden="true"></i>View all Category</a></li>
<li><a href="index.php?insert_brand" style="text-decoration:none; color:#999"><i class="fa fa-plus-square-o"></i>Insert new Brand</a></li>
<li><a href="index.php?view_brands" style="text-decoration:none; color:#999"><i class="fa fa-eye" aria-hidden="true"></i>View all Brand</a></li>
<li><a href="index.php?view_customers" style="text-decoration:none; color:#999"><i class="fa fa-eye" aria-hidden="true"></i>View all Customers</a></li>
<li><a href="index.php?view_orders" style="text-decoration:none; color:#999"><i class="fa fa-eye" aria-hidden="true"></i>View Orders</a></li>
<li><a href="index.php?view_payments" style="text-decoration:none; color:#999"><i class="fa fa-eye" aria-hidden="true"></i>View Payments</a></li>
<li><a href="logout.php" style="text-decoration:none; color:#999"><i class="fa fa-power-off" aria-hidden="true"></i> Admin Logout</a></li>
      </ul>
    </nav>
 
  </body>
</html>
<?php
include("includes/db.php");
if(isset($_GET['insert_product'])){
	include("insert_product.php");
	}
if(isset($_GET['view_products'])){
	include("view_products.php");
	}
if(isset($_GET['edit_pro'])){
	include("edit_pro.php");
	}
if(isset($_GET['insert_cat'])){
	include("insert_cat.php");
	}

if(isset($_GET['view_cats'])){
	include("view_cats.php");
	}
if(isset($_GET['edit_cat'])){
	include("edit_cat.php");
	}
if(isset($_GET['delete_cat'])){
	include("delete_cat.php");
	}
if(isset($_GET['insert_brand'])){
	include("insert_brand.php");
	}
if(isset($_GET['view_brands'])){
	include("view_brands.php");
	}
if(isset($_GET['edit_brand'])){
	include("edit_brand.php");
	}
if(isset($_GET['delete_brand'])){
	include("delete_brand.php");
	}	
if(isset($_GET['view_customers'])){
	include("view_customers.php");
	}	
if(isset($_GET['delete_customer'])){
	include("delete_customer.php");
	}	
if(isset($_GET['view_orders'])){
	include("view_orders.php");
	}	
if(isset($_GET['edit_order_status'])){
	include("edit_order_status.php");
	}	
if(isset($_GET['delete_order'])){
	include("delete_order.php");
	}	
if(isset($_GET['view_payments'])){
	include("view_payments.php");
	}	
if(isset($_GET['logged_out'])){
	include("logout.php");
	}
?>
</div>

<div class="footer">

</div>
</div>
</body>
</html>
<?php
}
?>
