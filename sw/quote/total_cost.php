<?php
    
    $domain_cost = $_REQUEST['domain_cost'];
    $space_cost = $_REQUEST['space_cost'];
    $addi_space_cost = $_REQUEST['addi_space_cost'];
    $bndwdth_cost = $_REQUEST['bndwdth_cost'];
    $email_cost = $_REQUEST['email_cost'];
    $page_cost = $_REQUEST['page_cost'];
    $ini_cost = $_REQUEST['ini_cost'];
    $admin_panel = $_REQUEST['admin_panel'];
    $amc_cost = $_REQUEST['amc_cost'];
    
        $total_price = $domain_cost + $space_cost + $addi_space_cost + $bndwdth_cost + $email_cost + $page_cost + $ini_cost + $admin_panel + $amc_cost;
        //echo $total_price;
        $arr = array('total_price' => "$total_price");
        //$arr = array('total_price' => "12345");
	echo json_encode($arr);
//total_cost.php?domain_cost=250&space_cost=1000&addi_space_cost=0&bndwdth_cost=0&email_cost=0&page_cost=1000&ini_cost=1500&admin_panel=0&amc_cost=0
?>

