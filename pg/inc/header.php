<?php session_start(); 
//echo "<h1>".$_SESSION['id1']."</h1>";
?>
<?php include("config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE; ?></title>
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

<div class="main">
	<div class="contain">
    	<div class="heading">
        	PG Infoservices
        </div>
        <div class="navigation">
        	<div class="nav">
        	<!--<a href="../index.php">Home</a> &nbsp;|-->
            <?php if(!empty($_SESSION['id1'])){ ?>
            <a href="logout.php" >Logout</a>&nbsp;|&nbsp;<!--<a href="mypage.php" >My Page</a>&nbsp;|-->
            <?php
			$id = $_SESSION['id1'];
			$dd = mysql_query("select status from admin where admin_id = '$id'");
			$dd2 = mysql_fetch_array($dd);
			if($dd2['status'] == 1){
				?>
                <a href="complaine.php">New</a>&nbsp; | <a href="resolved.php"> Resolved </a>&nbsp; | <a href="closed.php">Closed</a> |
                <a href="all.php">All</a>
                <?php
			}
			?>
            <?php }else{ ?>
            <a href="login.php" >Login</a>&nbsp;| <a href="register.php">Register</a>
            <?php } ?>
            </div>
        </div>