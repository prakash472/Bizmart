<?php
session_start();
session_destroy();
 echo"<script>window.open('retailer_main_login.php?logged_out=Successfully Logged Out','_self')</script>";
?>
