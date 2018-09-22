<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Admin</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php
if(!isset($_SESSION['email'])){
echo "<script>location.href='index.php'</script>";
}
include("inc/db_connection.php");
include("ps_pagination.php");


?>
<body>
    <!-- CODE FOR GOOGLE ANALYTICS STARTS -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39325219-1']);
  _gaq.push(['_setDomainName', 'pginfoservices.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- CODE FOR GOOGLE ANALYTICS ENDS -->
<div class="main">
<div class="contain">
	<div class="header">
            <a href="home.php">Home</a> |
            <a href="add_products.php">Add Products</a>	|
            <a href="add_p_type.php">Add Product Type</a> |
            <a href="product_list.php">Product List</a> |
            <a href="edit_desktop_item.php">Edit Desktop Item</a> |
            <a href="asset/home.php">Asset</a> |
            <a href="logout.php">Logout</a>
            <!--<a href="domestic.php">Domestic</a> |   -->
        </div>
<div class="body">