<?php

define("HOST", "localhost");
define("USER", "AssetMgr");
define("PASSWORD", "welcome@123");
define("DB_NAME", "assetmgr");

#define("HOST", "localhost");
#define("USER", "gariahat_doctor");
#define("PASSWORD", "Ni#T6&i.xKc,");
#define("DB_NAME", "gariahat_doctor");

$con = mysql_connect(HOST, USER, PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME, $con) or die(mysql_error);



function query($a){
	$r = mysql_query($a) or die(mysql_error());
	return $r;
}
?>