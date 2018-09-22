<?php
    session_start();
    include '../../admin/inc/db_connection.php';
    $page_id = $_SESSION['id'];
    $total_page = $_REQUEST['total_page'];
	
        $queryselectprice = mysql_query("SELECT price,quantity FROM page_master WHERE id='$page_id'")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $page_price = $ob->price;
        $quantity = $ob->quantity;
        $total_price = ($total_page/$quantity) * $page_price;
        $arr = array('page_price' => $total_price);
	echo json_encode($arr);

?>