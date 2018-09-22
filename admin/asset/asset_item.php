<?php include("inc/header.php"); ?>
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>
<script>
    
    function check() {
        if (document.form1.brand.value == "") {
            alert("Please Insert Brand Name.");
            return false;
        } else if (document.form1.model.value == "") {
            alert("Please Insert Model Name.");
            return false;
        } else if (document.form1.price.value == "") {
            alert("Please Insert Itemp Price.");
            return false;
        } else {
            return true;
        }
    }
</script>

<?php

$sql1 = "select * from item where status = 'Active' and not exists (select 1 from asset_item where asset_item.item_id = item.item_id and asset_item.active_flg ='Y')";
$result1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($result1);
echo "<table width='888' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td class='bg_tble'>                    
            <table width='100%' border='0' cellspacing='1' cellpadding='0'>";    
if($no > 0){
        
        echo "<tr>
        <td class='head_tbl'>Item Id</td>
        <td class='head_tbl'>Item Type</td>
        <td class='head_tbl'>Item Class</td>
        <td class='head_tbl'>Brand</td>
        <td class='head_tbl'>Model/Size</td>
        <td class='head_tbl'>Description</td>
        <td class='head_tbl'>Price</td>
        <td class='head_tbl'>Status</td>
        <td class='head_tbl'>Created Date</td>
        </tr>";
        
        
        while($d1 = mysql_fetch_array($result1)){
           echo "<tr>
                <td class='odd'>".$d1['item_id']."</td>
                <td class='odd'>".$d1['itemtype']."</td>
                <td class='odd'>".$d1['item_class']."</td>
                <td class='odd'>".$d1['brand']."</td>
                <td class='odd'>".$d1['model']."</td>
                <td class='odd'>".$d1['descr']."</td>
                <td class='odd'>".$d1['price']."</td>
                <td class='odd'>".$d1['status']."</td>
                <td class='odd'>".date('d / m / Y', strtotime($d1['data_entry_date']))."</td>
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
<div id="tabs">
    
    <ul>
		<li><a href="#tabs-1">Add Asset Item</a></li>
		
		
	</ul>
    <div id="tabs-1">
        <form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
    <?php
    if (isset($_POST['CREATE_AMC_ITEM_DATA'])) {
        $item_class = "AMC";
        $itemtype = $_POST['itemtype'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $descr = $_POST['descr'];
        $price = $_POST['price'];
        $used = "N";
        $status = "Active";
        $sql1 = "insert into item (itemtype,item_class,brand,model,descr,price, used, status, data_entry_date) 
                                         values('$itemtype','$item_class','$brand', '$model', '$descr','$price', '$used', '$status', NOW())";
        mysql_query($sql1) or die(mysql_error());

        $id = mysql_insert_id();


        echo "<div class='b_success'>$itemtype $brand $model data saved successfully<br><h2><a href='asset_item.php?'>OK</a></h2></div>";
    }
    if (isset($_POST['CREATE_RENT_ITEM_DATA'])) {
        $item_class = "RENT";
        $itemtype = $_POST['itemtype'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $descr = $_POST['descr'];
        $price = $_POST['price'];
        $used = "N";
        $status = "Active";
        $sql1 = "insert into item (itemtype,item_class,brand,model,descr,price, used, status, data_entry_date) 
                                         values('$itemtype','$item_class','$brand', '$model', '$descr','$price', '$used', '$status', NOW())";
        mysql_query($sql1) or die(mysql_error());

        $id = mysql_insert_id();


        echo "<div class='b_success'>$itemtype $brand $model data saved successfully<br><h2><a href='asset_item.php?'>OK</a></h2></div>";
    }else {
        ?>    
        <!--BEGIN form-->
        <div class="patientDetails">

            <span><p>Item Type</p>
                <select name="itemtype" class="drop_box_small" style="width:150px;">
                    <option>Cabinet</option>
                    <option>SMPS</option>
                    <option>Processor</option>
                    <option>Mother Board</option>
                    <option>Hard Disk</option>
                    <option>RAM</option>
                    <option>DVD RW</option>
                    <option>Key Board</option>
                    <option>Mouse</option>
                    <option>Monitor</option>
                    <option>UPS</option>
                    <option>Laptop Adapter</option>
                    <option>Laptop</option>
                </select>
            </span>                    
            <span><p>Brand</p><input name="brand" type="text" class="input_box_big" value="" /></span>                
            <span><p>Model/Gen</p><input name="model" type="text" class="input_box_big" value="" /></span>                
            <span><p>Description</p><input name="descr" type="text" class="input_box_add" value="" /></span>
            <span><p>Price</p><input name="price" type="number" class="input_box_add" value="" /></span>                
            <span><p>&nbsp;</p><input name="CREATE_AMC_ITEM_DATA" id="MAKE" type="submit" class="btn" value="Create AMC Asset Item" /></span>
            <span><p>&nbsp;</p><input name="CREATE_RENT_ITEM_DATA" id="MAKE" type="submit" class="btn" value="Create Rent Asset Item" /></span>
        </div>
        <!--END of form-->
    <?php } ?>
</form>
        
    </div>
</div>




<?php include("inc/footer.php"); ?>