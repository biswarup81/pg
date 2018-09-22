<?php
define("HOST","localhost");
define("USER","pginfose_crm");
define("PASSSWORD","login@123#");
define("DB_NAME","pginfose_crm");

define("TITLE","PG Infoservices");

$con = mysql_connect(HOST, USER, PASSSWORD) or die("<br>Could not connect with the Database<br>".mysql_error());
mysql_select_db(DB_NAME,$con) or die("Could not select the Database".mysql_error());


?>