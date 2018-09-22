<?php 
      
/* script to connect fo Mandir Database and pick up neccesary Information to display on screen */
      /* declare some relevant variables */
      $hostname = "localhost";
      $username = "pginfose_assetmg";
      $passwordsc = "login@123#";
      $dbName = "pginfose_assetmgr";

      $con = mysql_connect($hostname,$username,$passwordsc);
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
	mysql_select_db($dbName, $con);

?>
