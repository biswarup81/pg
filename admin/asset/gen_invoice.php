<?php include("inc/header.php"); ?>
<?php
$sql1 = "select month_name, YEAR( NOW( )) as curr_yr, MONTH(NOW( )) as curr_mth from inv_month order by month_name desc  LIMIT 1";
$res1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($res1);
if ($no == 1) {
    $d1 = mysql_fetch_array($res1);
    $LAST_INV_MTH = $d1['month_name'];
    $CURR_YR = $d1['curr_yr'];
    $CURR_MTH = $d1['curr_mth'];
    if ($CURR_MTH == 1) {
        $PREV_YR = $CURR_YR - 1;
        $PREV_MTH = 12;
    } else {
        $PREV_YR = $CURR_YR;
        $PREV_MTH = $CURR_MTH - 1;
    }
    if ($PREV_MTH > 9)
        $CALC_INV_MTH = $PREV_YR . $PREV_MTH;
    else
        $CALC_INV_MTH = $PREV_YR . "0" . $PREV_MTH;
    if ($CALC_INV_MTH == $LAST_INV_MTH) {
        //echo "<div>No Insert</div>";
    } else {
        $sql2 = "Insert into inv_month(month_name) values ('$CALC_INV_MTH')";
        mysql_query($sql2) or die(mysql_error());
        //echo "<div>Insert1</div>";
    }
} else {
    $sql3 = "select YEAR( NOW( )) as curr_yr, MONTH(NOW( )) as curr_mth from dual";
    $res3 = mysql_query($sql3)or die(mysql_error());
    $d3 = mysql_fetch_array($res3);
    $CURR_YR = $d3['curr_yr'];
    $CURR_MTH = $d3['curr_mth'];
    if ($CURR_MTH == 1) {
        $PREV_YR = $CURR_YR - 1;
        $PREV_MTH = 12;
    } else {
        $PREV_YR = $CURR_YR;
        $PREV_MTH = $CURR_MTH - 1;
    }
    if ($PREV_MTH > 9)
        $CALC_INV_MTH = $PREV_YR . $PREV_MTH;
    else
        $CALC_INV_MTH = $PREV_YR . "0" . $PREV_MTH;
    $sql2 = "Insert into inv_month(month_name) values ('$CALC_INV_MTH')";
    mysql_query($sql2) or die(mysql_error());
    //echo "<div>Insert2</div>";
}
?>
<div>
    <form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
<?php
if (isset($_POST['GEN_INV'])) {
    $month = $_POST['month'];
    $monthst = $month . "01";
    $monthend = $month . "28";
    $sql1 = "insert into invoice(customer_id, month_name,inv_amount, data_entry_date) (select a.customer_id, '$month' as month_name, SUM(case when (start_date > STR_TO_DATE('$monthst','%Y%m%d')) then a.agrmnt_rent*(30-day(start_date))/30 else  a.agrmnt_rent end) as inv_amount, now() as data_entry_date from customer_asset a
						where a.active_flg = 'Y' and a.start_date < STR_TO_DATE('$monthend','%Y%m%d') and not exists (select 1 from invoice b where a.customer_id = b.customer_id and b.month_name = '$month') group by a.customer_id)";
    //echo "<div>".$sql1."/div>";
    mysql_query($sql1) or die(mysql_error());
    //$no = mysql_num_rows($res);
    if (1 == 1) {
        //$d1 = mysql_fetch_array($res);
        echo "<div>Invoice Generated successfully for customer/s</div>";
    } else
        echo "<div>Error Generating Invoice/div>";
}
if (isset($_POST['LIST_INV'])) {
    $month = $_POST['month'];
    $monthst = $month . "01";
    $monthend = $month . "28";
    
    $sql1 = "select a.invoice_id, a.month_name, a.inv_amount, b.customer_id, b.customer_business_name"
            . " from invoice a, customer b"
            . " where a.customer_id = b.customer_id"
            . " and a.month_name = '$month'";
   // echo "<div>".$sql1."/div>";
    $res = mysql_query($sql1) or die(mysql_error());
    $no = mysql_num_rows($res);
    echo "<table width='888' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td class='bg_tble'>                    
            <table width='100%' border='0' cellspacing='1' cellpadding='0'>";    
if($no > 0){
        
        echo "<tr>
        <td class='head_tbl'>Invoice#</td>
        <td class='head_tbl'>Invoice Month</td>
        <td class='head_tbl'>Customer/Business Name</td>
        <td class='head_tbl'>Customer ID</td>
        <td class='head_tbl'>Invoice Amount</td>
        </tr>";
        
        
        while($d1 = mysql_fetch_array($res)){
           echo "<tr>
                <td class='odd'>".$d1['invoice_id']."</td>
                <td class='odd'>".$d1['month_name']."</td>
                <td class='odd'>".$d1['customer_business_name']."</td>
                <td class='odd'>".$d1['customer_id']."</td>
                <td class='odd'>".$d1['inv_amount']."</td>
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
        <div>

            <span><p>Month</p>
                <select name="month" class="drop_box_small" style="width:150px;">
        <?php
        $sqldropdown = "select month_name from inv_month order by month_name desc";
        $resdropdown = mysql_query($sqldropdown)or die(mysql_error());
        $no = mysql_num_rows($resdropdown);
        if ($no > 0) {
            while ($d1 = mysql_fetch_array($resdropdown)) {
                //alert("Please...");
                //echo '<option value="">No Item</option>';
                echo '<option value="' . $d1['month_name'] . '">' . $d1['month_name'] . '</option>';
            }
        } else {
            echo '<option value="">No Item</option>';
        }
        ?>
                </select>
            </span>                    
            <span><p>&nbsp;</p><input name="LIST_INV" id="INV" type="submit" class="btn" value="List Invoice" /></span>
            <span><p>&nbsp;</p><input name="GEN_INV" id="INV" type="submit" class="btn" value="Generate Invoice" /></span>
        </div>    

<?php include("inc/footer.php"); ?>