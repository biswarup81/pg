<?php include("inc/header.php"); ?>

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
    <?php
    if (isset($_POST['REC_PMNT'])) {
        $month = $_POST['month'];
        $invoice_id = $_POST['invoice'];
        $pay_amount = $_POST['pay_amount'];
        $pay_date = $_POST['pay_date'];
        $sql1 = "insert into payment(invoice_id, month_name,pay_amount, pay_date, data_entry_date)
						values ('$invoice_id', '$month', '$pay_amount', '$pay_date', NOW())";
        //echo "<div>".$sql1."/div>";
        mysql_query($sql1) or die(mysql_error());
        $id = mysql_insert_id();
        echo "<div>Payment# $id created against Invoice# $invoice_id</div>";
    } else {
        
    }
    ?>
    <div class="invDetails">

        <span><p>Month</p>
            <select name="month" class="drop_box_small" style="width:150px;">
                <?php
                include "datacon.php";
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
        <span><p>Customer</p>
            <select name="invoice" class="drop_box_small" style="width:150px;">
<?php
$month = "201404";
$custdropdown = "SELECT a.customer_id, a.customer_business_name, b.invoice_id, b.month_name, b.inv_amount
FROM customer a, invoice b
WHERE a.customer_id = b.customer_id
AND b.month_name =  '$month'
and b.inv_amount > (select IFNULL(sum(pay_amount),0) from payment c where b.invoice_id = c.invoice_id)
order by a.customer_id, b.month_name desc";
$rescust = mysql_query($custdropdown)or die(mysql_error());
$no = mysql_num_rows($rescust);
if ($no > 0) {
    while ($d2 = mysql_fetch_array($rescust)) {
        //alert("Please...");
        //echo '<option value="">No Item</option>';
        echo '<option value="' . $d2['invoice_id'] . '">' . $d2['customer_business_name'] . '</option>';
    }
} else {
    echo '<option value="">No invoice</option>';
}
?>
            </select>
        </span>
        <span><p>Amount</p><input name="pay_amount" type="number" class="input_box_big" value="" /></span>
        <span><p>Payment Date</p><input name="pay_date" type="date" class="input_box_big" value="" /></span>
        <span><p>&nbsp;</p><input name="REC_PMNT" id="INV" type="submit" class="btn" value="Receive Payment" /></span>
    </div>    
    <!--BEGIN wrapper-->
</form>
<?php include("inc/footer.php"); ?>