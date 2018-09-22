<?php
session_start();
include("config.php");
$id = $_SESSION['id'];
$sql = "select * from admin where admin_id = '$id'";
$r = mysql_query($sql) or die(mysql_error());
$d = mysql_fetch_array($r);
$status = $d['status'];
if($status == 1){
	header("location:admin_area.php");
}else if($status == 2){
	header("location:member_area.php");
}else{
	header("location:index.php");
	//echo $sql;
}
?>