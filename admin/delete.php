<?php
include("inc/db_connection.php");
$id = $_GET['id'];
$c = $_GET['c'];
if($c == "product"){
	mysql_query("update PRODUCTS set STATUS='INACTIVE' where SEQ_NUM = '$id'") or die(mysql_error());
	header("location:product_list.php");
}
?>