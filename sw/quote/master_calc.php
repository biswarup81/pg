
<?php
    include '../../admin/inc/db_connection.php';
    $domain_id = $_REQUEST['domain_id'];
	
        $queryselectprice = mysql_query("SELECT price FROM domain WHERE id='$domain_id'")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $price = $ob->price;
        $arr = array('price' => $price);
	echo json_encode($arr);

?>


