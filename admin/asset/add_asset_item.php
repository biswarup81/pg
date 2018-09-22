<?php include("inc/header.php"); ?>
<?php
if (isset($_GET['asset_id'])) {
    $asset_id = $_GET['asset_id'];

    $sql1 = "select * from asset where asset_id ='" . $asset_id . "'";
    $res = mysql_query($sql1) or die(mysql_error());
    $no = mysql_num_rows($res);
        echo "<table width='888' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td class='bg_tble'>                    
            <table width='100%' border='0' cellspacing='1' cellpadding='0'>";    
    if($no > 0){
        echo "<tr>
        <td class='head_tbl'>Asset Id</td>
        <td class='head_tbl'>Asset Name</td>
        <td class='head_tbl'>Asset Type</td>
        <td class='head_tbl'>Asset Class</td>
        <td class='head_tbl'>Expected Rent/AMC</td>
        <td class='head_tbl'>Brand</td>
        <td class='head_tbl'>Model</td>
        <td class='head_tbl'>Description</td>
        <td class='head_tbl'>Status</td>
        </tr>";

        while($d1 = mysql_fetch_array($res)){
           $asset_class = $d1['asset_class'];
           echo "<tr>
                <td class='odd'>".$d1['asset_id']."</td>
                <td class='odd'>".$d1['name']."</td>
                <td class='odd'>".$d1['asset_type']."</td>
                <td class='odd'>".$d1['asset_class']."</td>
                <td class='odd'>".$d1['exp_rent']."</td>
                <td class='odd'>".$d1['brand']."</td>
                <td class='odd'>".$d1['model']."</td>
                <td class='odd'>".$d1['descr']."</td>
                <td class='odd'>".$d1['status_flg']."</td>
            </tr>";
            
        }
    }else{
            echo "<tr><td colspan='10' align='center' style='color:red'> No Result found.</td></tr>";
    }
    echo "</table>
       </td>
    </tr>
</table>";
}
?>

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
<?php
if (isset($_POST['ADD_ASSET_ITEM'])) {

    $item_id = $_POST['item_id'];
    $sql1 = "insert into asset_item (asset_id,item_id,active_flg,data_entry_date) 
                                         values('$asset_id', '$item_id', 'Y', NOW())";
    mysql_query($sql1) or die(mysql_error());

    //$AssetId = mysql_insert_id();
    echo "<div class='b_success'>Item Added Successfully</div>";
} else {
    ?>



        <!--BEGIN form-->
        <div >

            <span><p>Item Name</p>
                <select name="item_id" class="drop_box_big" style="width:150px;">
    <?php
    $sqldropdown = "select * from item "
            . "where status = 'Active' and item_class = '$asset_class'"
            . "and not exists (select 1 from asset_item where asset_item.item_id = item.item_id and asset_item.active_flg ='Y')";
    $resdropdown = mysql_query($sqldropdown)or die(mysql_error());
    $no = mysql_num_rows($resdropdown);
    if ($no > 0) {
        while ($d1 = mysql_fetch_array($resdropdown)) {
            //alert("Please...");
            echo '<option value="' . $d1['item_id'] . '">' . $d1['itemtype'] . "-" . $d1['brand'] . "-" . $d1['model'] . "-" . $d1['descr'] . '</option>';
        }
    } else {
        echo '<option value="">No Item</option>';
    }
    ?>
                </select>
            </span>
            <span><p>&nbsp;</p><input name="ADD_ASSET_ITEM" id="MAKE" type="submit" class="btn" value="Add Item"</span>
        </div>
        <!--END of form-->
                <?php } ?>
</form>

                <?php include("inc/footer.php"); ?>