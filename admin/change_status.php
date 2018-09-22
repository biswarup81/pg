<?php
include("inc/db_connection.php");
$id = $_GET['id'];
$status = $_GET['status'];



if($status == 'Active'){
mysql_query("update top_news set status = 'Inactive' where news_id = '$id'") or die(mysql_error());
}else if($status == 'Inactive'){
mysql_query("update top_news set status = 'Active' where news_id = '$id'") or die(mysql_error());
}
mysql_close();

if(!empty($_GET['page'])){
	$page = $_GET['page'];
	$param1 = $_GET['param1'];
	$param2 = $_GET['param2'];
	
	header("location:news_list.php?page=$page&param1=$param1&param2=$param2");
}else{
header("location:news_list.php");
}
//echo "<script>location.href=javascript:history.go(-3)</script>";
?>
