<?php session_start();?>
<?php

require_once "inc/datacon.php";
$asset_id = $_GET["asset_id"];
$strAssetName = $_GET["asset_name"];

$where = "";
if($asset_id != ""){
        
        $where .= "and asset_id = '$asset_id'";
} 
if($strAssetName != ""){
        
        $where .= "and name like '$strAssetName%'";
}

$sql1 = "select * from asset where asset_id != ''".$where;
$result1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($result1);
 $n = 0;

 echo"<p> List of Assets are shon below</p>";
 echo "<table width='100%' border='0' cellspacing='1' cellpadding='0'>";    
if($no > 0){
        
        echo "<tr>
        <td>Asset Name</td>
        <td>Asset ID</td>
        <td>Asset Class</td>
        <td>Asset Type</td>
        <td>Brand</td>
        <td>Model</td>
        <td>Price</td>
        <td>Expected Rent</td>
        <td>Created</td>
        <td>Status</td>
        </tr>";
        
        
        while($d1 = mysql_fetch_array($result1)){
           $n++;
            $t = $n%2; if($t==1){$c = "odd";}else{ $c = "even";}
           echo "<tr>
                <td class='".$c."'>".$d1['name']."</td>
                <td class='".$c."'><a href='add_asset_item.php?asset_id=".$d1['asset_id']."' class='vlink'>".$d1['asset_id']."</a></td>
                <td class='".$c."'>".$d1['asset_class']."</td>
                <td class='".$c."'>".$d1['asset_type']."</td>
                <td class='".$c."'>".$d1['brand']."</td>
                <td class='".$c."'>".$d1['model']."</td>
                <td class='".$c."'>".$d1['price']."</td>
				<td class='".$c."'>".$d1['exp_rent']."</td>
                <td class='".$c."'>".date('d / m / Y', strtotime($d1['data_entry_date']))."</td>
                <td class='".$c."'>".$d1['status']."</td>
            </tr>";
            
        }
    }else{
            echo "<tr><td colspan='10' align='center' style='color:red'> No Result found.</td></tr>";
    }
    echo "</table>";

?>
