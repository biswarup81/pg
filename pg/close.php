<?php
session_start();
include("config.php");
$v_id = $_REQUEST['id'];
$key = $_REQUEST['key'];
if($key == 'resolved'){
	$comment = $_REQUEST['resolve_comment'];
	mysql_query("update visitors set label = 'resolved', resloved_date = NOW(), 
            resolved_comment = '$comment' where v_id = '$v_id'") or die(mysql_error());
	header("location:member_area.php");
	
}else if($key == 'reopen'){
	
	mysql_query("update visitors set label = 'false' where v_id = '$v_id'") or die(mysql_error());
	header("location:complaine.php");
	
}
?>