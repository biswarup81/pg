<?php
include("config.php");
$v_id = $_POST['resolved'];
$closed_comment = $_POST['closed_comment'];
mysql_query("update visitors set label = 'close', closed_date = NOW(), closed_comment = '$closed_comment' where v_id = '$v_id'") or die(mysql_error());
header("location:resolved.php");
?>