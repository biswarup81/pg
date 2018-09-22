<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
<title>PG Infoservices</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style-pink.css" type="text/css" media="screen">    
</head>
<body>
<?php include("config.php"); ?>
<!-- start top -->
<div class="top">
    <div class="full-width rel">
        <div class="one-third"><div class="logo"><a href="index.php"><img src="images/logo.png" alt="PG Infoservices" /></a></div></div>
        <div class="two-third">
            <div class="rel">
                <div class="abs utility">
                    <div class="icon-to-left"><img src="images/smallphone.png"></div>Give us a Call: <strong>+91.987.4404.111</strong> or <a href="mailto:pginfoservices@yahoo.com">E-mail Us</a> Directly.<div class="clear"></div>
                </div>
            </div>
            <div class="mainmenu">
            <ul>
                <li class="active"><a href="index.php"><span>Home</span></a></li>
                <?php if(!empty($_SESSION['id'])){ ?>
                <li><a href="logout.php"><span>Logout</span></a></li>
                <?php
				$id = $_SESSION['id'];
				$dd = mysql_query("select status from admin where admin_id = '$id'");
				$dd2 = mysql_fetch_array($dd);
				if($dd2['status'] == 1){
				?>
                <li><a href="complaine.php">New</a></li>
                <li><a href="resolved.php"> Resolved </a></li>  
                <li><a href="closed.php">Closed</a></li>
                <?php
				}
				?>
            	<?php }else{ ?>
                <li><a href="login.php" >Login</a></li>
                <li><a href="register.php">Register</a></li>
                <?php } ?>
            </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>