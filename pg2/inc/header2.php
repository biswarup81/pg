<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
function div2(){
	document.getElementById('body').style.display = "none";
	document.getElementById('body2').style.display = "block";
	alert("hi");
}
</script>
</head>

<body>
<?php include("config.php"); ?>
<div class="main">
	<div class="contain">
    	<div class="heading">
        </div>
        <div class="navigation">
        	<div class="nav">
            	<a href="index.php">Home</a> &nbsp;
            </div>
        </div>