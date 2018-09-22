<?php
include("config.php");
$v_id = $_POST['resolved'];
mysql_query("update visitors set label = 'close', closed_date = NOW() where v_id = '$v_id'") or die(mysql_error());
header("location:resolved.php");
?>