<?php

define("HOST", "localhost");
define("USER", "pginfose_assetmg");
define("PASSWORD", "login@123#");
define("DB_NAME", "pginfose_assetmg");



$con = mysql_connect(HOST, USER, PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME, $con) or die(mysql_error);



function query($a){
	$r = mysql_query($a) or die(mysql_error());
	return $r;
}
?>