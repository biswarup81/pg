<?php
$con = mysql_connect("localhost","pginfose_pg_prod","login@123#") or die(mysql_error());
mysql_select_db("pginfose_pg_prod", $con) or die(mysql_error());
?>