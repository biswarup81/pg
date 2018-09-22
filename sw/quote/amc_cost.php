<?php
    include '../../admin/inc/db_connection.php';
    $amc_id = $_REQUEST['amc'];
	
        $queryselectprice = mysql_query("SELECT price FROM web_master WHERE id='$amc_id'")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $price = $ob->price;
        $arr = array('price' => $price);
	echo json_encode($arr);

?>