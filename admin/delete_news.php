<?php
include("inc/db_connection.php");
$id = $_GET['id'];
mysql_query("delete from top_news where news_id = '$id'") or die(mysql_error());
mysql_close();
header("location:news_list.php");
?>