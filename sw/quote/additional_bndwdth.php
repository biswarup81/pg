<?php
    include '../../admin/inc/db_connection.php';
    $addi_bndwdth = $_REQUEST['addi_bndwdth'];
	
        $queryselectprice = mysql_query("SELECT quantity,price FROM web_master WHERE type='bandwidth'")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $price = $ob->price;
        $quantity = $ob->quantity;
        $total_price = ($addi_bndwdth/$quantity) * $price;
        $arr = array('price' => $total_price);
	echo json_encode($arr);

?>
