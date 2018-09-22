
<?php
    include '../../admin/inc/db_connection.php';
    $addi_space = $_REQUEST['addi_space'];
	
        $queryselectprice = mysql_query("SELECT addi_per_space,price FROM additional_space_master")or die(mysql_error());
        $ob = mysql_fetch_object($queryselectprice);
        $space = $ob->addi_per_space;
        $price = $ob->price;
        $total_price = ($addi_space/$space)*$price;
        $bandwidth = $addi_space * 15;
        $arr = array('price' => $total_price, 'bandwidth'=>$bandwidth);
	echo json_encode($arr);

?>
