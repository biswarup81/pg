<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::Asset Management:: Admin</title>
<link rel="stylesheet" type="text/css" href="../style.css" />

  
<link rel="stylesheet" href="../jquery-ui-1.10.4/development-bundle/themes/base/jquery.ui.all.css">
	<script src="../jquery-ui-1.10.4/js/jquery-1.10.2.js"></script>
	<script src="../jquery-ui-1.10.4/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="../jquery-ui-1.10.4/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="../jquery-ui-1.10.4/development-bundle/ui/jquery.ui.tabs.js"></script>
        <script src="../jquery-ui-1.10.4/development-bundle/ui/jquery.ui.datepicker.js"></script>
        <link rel="stylesheet" href="../jquery-ui-1.10.4/development-bundle/demos/demos.css"></link>
</head>
<?php
if(!isset($_SESSION['email'])){
echo "<script>location.href='index.php'</script>";
}
include("inc/datacon.php");


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
            <a href="add_asset.php">Asset</a>	|
            <a href="asset_item.php">Asset Item</a> |
            <!--<a href="alloc_asset.php">Allocate Asset</a> |-->
            <!--<a href="release_asset.php">Release Asset</a> | -->
            <!--<a href="searchAsset.php">Search Asset</a> | -->
            <a href="Customer.php">Customer</a> | 
            <a href="gen_invoice.php">Invoice</a> | 
            <a href="rec_pmnt.php">Payment</a> | 
            <a href="../home.php">Back to Admin</a>
            
        </div>
<div class="body"> 