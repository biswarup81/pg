<?php session_start();?>
<?php
require_once "inc/datacon.php";
$customer_id = $_GET["customer_id"];
$strCustomerName = $_GET["customer_name"];

$where = "";
if($customer_id != ""){
        
        $where .= "and customer_id = '$customer_id'";
} 
if($strCustomerName != ""){
        
        $where .= "and customer_business_name like '$strCustomerName%'";
}

$sql1 = "select * from customer where customer_id != ''".$where;
$result1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($result1);
echo "<table width='888' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td class='bg_tble'>                    
            <table width='100%' border='0' cellspacing='1' cellpadding='0'>";    
if($no > 0){
        
        echo "<tr>
        <td class='head_tbl'>Customer/Business Name</td>
        <td class='head_tbl'>Customer ID</td>
        <td class='head_tbl'>First Name</td>
        <td class='head_tbl'>Last Name</td>
        <td class='head_tbl'>Customer Since</td>
        <td class='head_tbl'>Mobile No</td>
        <td class='head_tbl'>Landline No</td>
        <td class='head_tbl'>Street Address</td>
        
        <td class='head_tbl'>City / Town</td>
        <td class='head_tbl'>Email Address</td>
        </tr>";
        
        
        while($d1 = mysql_fetch_array($result1)){
           echo "<tr>
                <td class='odd'>".$d1['customer_business_name']."</td>
                <td class='odd'><a href='alloc_asset.php?customer_id=".$d1['customer_id']."' class='vlink'>".$d1['customer_id']."</a></td>
                <td class='odd'>".$d1['contact_first_name']."</td>
                <td class='odd'>".$d1['contact_last_name']."</td>
                <td class='odd'>".date('d / m / Y', strtotime($d1['customer_since']))."</td>
                <td class='odd'>".$d1['customer_cell_num']."</td>
                <td class='odd'>".$d1['customer_cell_num']."</td>
                <td class='odd'>".$d1['customer_alt_cell_num']."</td>
                
                <td class='odd'>".$d1['customer_city']."</td>
                <td class='odd'>".$d1['customer_email']."</td>
            </tr>";
            
        }
    }else{
            echo "<tr><td colspan='10' align='center' style='color:red'> No Result found.</td></tr>";
    }
    echo "</table>
       </td>
    </tr>
</table>";

?>
