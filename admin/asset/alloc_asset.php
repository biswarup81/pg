<?php include("inc/header.php"); ?>

<?php
if (isset($_GET['customer_id'])) {

    $customer_id = $_GET['customer_id'];
    $sql0 = "select * from customer"
            . " where customer_id = '$customer_id'";
    $result0 = mysql_query($sql0)or die(mysql_error());
    $custno = mysql_num_rows($result0);
    echo "<table width='888' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td>                    
            <table width='100%' border='0' cellspacing='1' cellpadding='0'>";
    if ($custno > 0) {

        echo "<tr>
        <td class='head_tbl'>Customer Id</td>
        <td class='head_tbl'>Customer Name</td>
        <td class='head_tbl'>Contact Name</td>
        <td class='head_tbl'>Address</td>
        <td class='head_tbl'>City</td>
        <td class='head_tbl'>Contact#</td>
        <td class='head_tbl'>Alternate#</td>
        <td class='head_tbl'>eMail</td>
        <td class='head_tbl'>Customer Since</td>
        </tr>";


        while ($d1 = mysql_fetch_array($result0)) {
            echo "<tr>
                <td class='odd'>" . $d1['customer_id'] . "</td>
                <td class='odd'>" . $d1['customer_business_name'] . "</td>
                <td class='odd'>" . $d1['contact_first_name'] . " " . $d1['contact_last_name'] . "</td>
                <td class='odd'>" . $d1['customer_address'] . "</td>
                <td class='odd'>" . $d1['customer_city'] . "</td>
                <td class='odd'>" . $d1['customer_cell_num'] . "</td>
                <td class='odd'>" . $d1['customer_alt_cell_num'] . "</td>
                <td class='odd'>" . $d1['customer_email'] . "</td>
                <td class='odd'>" . date('d / m / Y', strtotime($d1['customer_since'])) . "</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='10' align='center' style='color:red'> No Result found.</td></tr>";
    }
    echo "</table>
       </td>
    </tr>
</table>";

    $sql1 = "select a.asset_id, a.customer_id, a.alloc_type, b.name as asset_name, a.DEPL_ADDR as deplmnt_addr, "
            . "a.agrmnt_rent, a.start_date from customer_asset a, asset b "
            . "where a.asset_id = b.asset_id and a.customer_id = '$customer_id' and a.end_date is null";
    $result1 = mysql_query($sql1)or die(mysql_error());
    $no = mysql_num_rows($result1);
    echo "<table width='888' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td>                    
            <table width='100%' border='0' cellspacing='1' cellpadding='0'>";
    if ($no > 0) {

        echo "<tr>
        <td class='head_tbl'>Asset Id</td>
        <td class='head_tbl'>Asset Name</td>
        <td class='head_tbl'>Allocation Type</td>
        <td class='head_tbl'>Deployment Address</td>
        <td class='head_tbl'>Rent</td>
		<td class='head_tbl'>Start Date</td>
		<td class='head_tbl'>Release Asset</td> 
        </tr>";


        while ($d1 = mysql_fetch_array($result1)) {
            echo "<tr>
                <td class='odd'><a href='add_asset_item.php?asset_id=" . $d1['asset_id'] . "' class='vlink'>" . $d1['asset_id'] . "</a></td>
                <td class='odd'>" . $d1['asset_name'] . "</td>
                <td class='odd'>" . $d1['alloc_type'] . "</td>
                <td class='odd'>" . $d1['deplmnt_addr'] . "</td>
                <td class='odd'>" . $d1['agrmnt_rent'] . "</td>
                <td class='odd'>" . date('d / m / Y', strtotime($d1['start_date'])) . "</td>
				<td class='odd'><a href='release_asset.php?asset_id=" . $d1['asset_id'] . "' class='vlink'>" . "X" . "</a></td>
            </tr>";
        }
    } else {
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
    if (isset($_POST['ALLOC_ASSET_RENT'])) {
        $asset_id = $_POST['asset_id'];
        $sqlchk = "select asset_class from asset where asset_id = '$asset_id'";
        $reschk = mysql_query($sqlchk) or die(mysql_error());
        $no = mysql_num_rows($reschk);
        if ($no == 1) {
            $d1 = mysql_fetch_array($reschk);
            $asset_class = $d1['asset_class'];
        }
        $agrmnt_rent = $_POST['agrmnt_rent'];
        $start_date = $_POST['start_date'];
        $depl_addr = $_POST['depl_addr'];
        $alloc_type = "RENT";
        if ($asset_class == $alloc_type) {
            $active_flg = "Y";
            $sql1 = "insert into customer_asset (asset_id,customer_id,alloc_type,DEPL_ADDR, agrmnt_rent,start_date,active_flg,data_entry_date) 
                                         values('$asset_id', '$customer_id', '$alloc_type', '$depl_addr', '$agrmnt_rent', '$start_date', '$active_flg', NOW())";
            mysql_query($sql1) or die(mysql_error());

            $id = mysql_insert_id();
            echo "<div class='b_success'>$asset_id $customer_id data saved successfully<br><h2><a href='alloc_asset.php?customer_id=$customer_id'>OK</a></h2></div>";
        } else {
            echo "<div class='b_success'>AMC Asset can't be allocated for Rent to Customer<br><h2><a href='alloc_asset.php?customer_id=$customer_id'>Cancel</a></h2></div>";
        }
    }
    if (isset($_POST['ALLOC_ASSET_AMC'])) {
        $asset_id = $_POST['asset_id'];
        $sqlchk = "select asset_class from asset where asset_id = '$asset_id'";
        $reschk = mysql_query($sqlchk) or die(mysql_error());
        $no = mysql_num_rows($reschk);
        if ($no == 1) {
            $d1 = mysql_fetch_array($reschk);
            $asset_class = $d1['asset_class'];
        }
        $agrmnt_rent = $_POST['agrmnt_rent'];
        $start_date = $_POST['start_date'];
        $depl_addr = $_POST['depl_addr'];
        $alloc_type = "AMC";
        if ($asset_class == $alloc_type) {
            $active_flg = "Y";
            $sql1 = "insert into customer_asset (asset_id,customer_id,alloc_type,DEPL_ADDR,agrmnt_rent,start_date,active_flg,data_entry_date)"
                    . " values('$asset_id', '$customer_id', '$alloc_type', '$depl_addr', '$agrmnt_rent', '$start_date', '$active_flg', NOW())";
            mysql_query($sql1) or die(mysql_error());

            $id = mysql_insert_id();
            echo "<div class='b_success'>$asset_id $customer_id data saved successfully<br><h2><a href='alloc_asset.php?customer_id=$customer_id'>Ok</a></h2></div>";
        } else {
            echo "<div class='b_success'>Rent Asset can't be allocated for AMC Customer<br><h2><a href='alloc_asset.php?customer_id=$customer_id'>Cancel</a></h2></div>";
        }
    }
    ?>

    <div>

        <span><p>Asset Name</p>
            <select name="asset_id" class="drop_box_small" style="width:150px;">
    <?php
    $sqldropdown = "select * from asset where not exists (select 1 from customer_asset where customer_asset.asset_id = asset.asset_id and customer_asset.end_date is null)";
    $resdropdown = mysql_query($sqldropdown)or die(mysql_error());
    $no = mysql_num_rows($resdropdown);
    if ($no > 0) {
        while ($d1 = mysql_fetch_array($resdropdown)) {
            //alert("Please...");
            echo '<option value="' . $d1['asset_id'] . '">' . $d1['name'] . '</option>';
        }
    } else {
        echo '<option value="">No Item</option>';
    }
    ?>
            </select>
        </span>
        <span><p>Rent/AMC Charge</p><input name="agrmnt_rent" type="number" class="input_box_big" value="" /></span>
        <span><p>Start Date</p><input name="start_date" type="date" class="input_box_big" value="" /></span>
        <span><p>Deployment Address</p><input name="depl_addr" type="text" class="input_box_big" value="" /></span>
        <span><p>&nbsp;</p><input name="ALLOC_ASSET_AMC" id="MAKE" type="submit" class="btn" value="AMC Allocation" /></span>
        <span><p>&nbsp;</p><input name="ALLOC_ASSET_RENT" id="MAKE" type="submit" class="btn" value="Rent Allocation" /></span>
    </div>
</form>
<?php include("inc/footer.php"); ?>