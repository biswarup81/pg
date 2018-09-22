<?php
    session_start();
    include '../../admin/inc/db_connection.php';
    $page_id = $_REQUEST['page_id'];
    $_SESSION['id'] = $page_id;
    
	
        $queryselectprice = mysql_query("SELECT ini_dev_price FROM page_master WHERE id='$page_id'")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $price = $ob->ini_dev_price;
        $arr = array('price' => $price);
	echo json_encode($arr);

?>
