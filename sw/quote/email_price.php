<?php
    include '../../admin/inc/db_connection.php';
    $email = $_REQUEST['email'];
	
        $queryselectprice = mysql_query("SELECT quantity,price FROM web_master WHERE type='email'")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $price = $ob->price;
        $quantity = $ob->quantity;
        $total_price = (($email/$quantity)-1) * $price;
        if($total_price < 0)
        {
            $total_price = 0;
        }
        $arr = array('price' => $total_price);
	echo json_encode($arr);

?>
