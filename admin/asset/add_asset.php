<?php include("inc/header.php"); ?>

<script>
    function search1() {
        //alert(document.getElementById("s_p_id").value);
        //alert(document.getElementById("s_p_name").value);
        if (document.getElementById("s_p_id").value == "" && document.getElementById("s_p_name").value == "") {
            alert("Please Give some Input");
            return false;
        } else {
            var asset_id = document.getElementById("s_p_id").value;
            var asset_name = document.getElementById("s_p_name").value;

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("searchDiv").innerHTML = xmlhttp.responseText;
                }
            }
            //str = "delete_precribed_medicine.php?MEDICINE_ID="+k+"&PRES_ID="+pid;
            var url = "searchAsset.php?asset_id=" + asset_id + "&asset_name=" + asset_name;
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

    }
    
    
</script>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>

<!--BEGIN wrapper-->
<?php
//$AssetId = 63;
$exp_rent = "1200";
$asset_name = "E.g. Desktop 2100";
$asset_type = "Select from LOV";
$brand = "E.g. Dell";
$model = "E.g. Dual Core";
$descr = "E.g. 500GB/2GB/1GB/DOS";
$status_flg = "Creating";

if (isset($AssetId)) {
    $CreateAsset = false;
    echo "<div>Edit Asset1</div>";
} elseif (isset($_SESSION['AssetId'])) {
    $AssetId = $_SESSION['AssetId'];
    echo "<div>Edit Asset2</div>";
} else {
    $CreateAsset = true;
    echo "<div>Create Asset</div>";
}
if ($CreateAsset)
    ;
else {
    $sql1 = "select * from asset where asset_id ='" . $AssetId . "'";
    $res = mysql_query($sql1) or die(mysql_error());
    $no = mysql_num_rows($res);
    if ($no == 1) {
        $d1 = mysql_fetch_array($res);
        $asset_name = $d1['name'];
        $asset_type = $d1['asset_type'];
        $exp_rent = $d1['exp_rent'];
        $brand = $d1['brand'];
        $model = $d1['model'];
        $descr = $d1['descr'];
        $status_flg = $d1['status'];
    } else {
        $CreateAsset = true;
    }
}
?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Search Asset</a></li>
		<li><a href="#tabs-2">Create Asset</a></li>
		
	</ul>
	<div id="tabs-1">
            <span><p>Asset Id</p><input id="s_p_id" name="asset_id" type="text" class="input_box_add" value="" /></span>                
            <span><p>Asset Name</p><input id="s_p_name" name="asset_name" type="text" class="input_box_big" value="" /></span>               
            <span><p>&nbsp;</p><input type="submit" value="Search Asset" name="search" class="btn" onclick="search1();" /></span>
            <div  id="searchDiv">
                <!--RESULT OF SEARCH -->
            </div>
        </div>
	<div id="tabs-2">
	
        <form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
    <?php
    if (isset($_POST['CREATE_AMC_ASSET'])) {

        $asset_name = $_POST['asset_name'];
        $asset_type = $_POST['asset_type'];
        $asset_class = "AMC";
        $exp_rent = $_POST['exp_rent'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $descr = $_POST['descr'];
        $status_flg = "Creating";
        $used_flg = "N";
        $sql1 = "insert into asset (name,asset_type,asset_class,exp_rent,price,brand,model,descr,used,status,data_entry_date) 
                                         values('$asset_name', '$asset_type', '$asset_class', '$exp_rent', '$price', '$brand', '$model','$descr', '$used_flg', '$status_flg', NOW())";
        mysql_query($sql1) or die(mysql_error());

        $AssetId = mysql_insert_id();
        //echo "<div class='b_success'>$AssetId data saved successfully</div>";
    } 
    if (isset($_POST['CREATE_RENT_ASSET'])) {

        $asset_name = $_POST['asset_name'];
        $asset_type = $_POST['asset_type'];
        $asset_class = "RENT";
        $exp_rent = $_POST['exp_rent'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $descr = $_POST['descr'];
        $status_flg = "Creating";
        $used_flg = "N";
        $sql1 = "insert into asset (name,asset_type,asset_class, exp_rent,price,brand,model,descr,used,status,data_entry_date) 
                                         values('$asset_name', '$asset_type', '$asset_class', '$exp_rent', '$price', '$brand', '$model','$descr', '$used_flg', '$status_flg', NOW())";
        mysql_query($sql1) or die(mysql_error());

        $AssetId = mysql_insert_id();
        //echo "<div class='b_success'>$AssetId data saved successfully</div>";
    }else {
        ?>


            <span><p>Asset Name</p><input name="asset_name" type="text"  onblur="if (this.value == '') {this.value = 'E.g. Desktop 2100';}"
 onfocus="if (this.value == 'E.g. Desktop 2100') {this.value = '';}" <?php echo "value='$asset_name'" ?> /></span>
            <?php if ($CreateAsset)
                echo '<span><p>Asset Type</p><select name="asset_type" class="drop_box_small" style="width:150px;" /></span>
												<option>Desktop</option>
												<option>Laptop</option>
												<option>Monitor</option>
												<option>UPS</option>
												<option>Hard Disk</option>
												</select>';
            else
                echo '<span><p>Asset Type</p><input name="asset_type"  value=' . "$asset_type";
            ?>
            <span><p>Expected Rent/AMC</p><input name="exp_rent" type="number" onblur="if (this.value == '') {this.value = '1200';}"
 onfocus="if (this.value == '1200') {this.value = '';}" <?php echo "value='$exp_rent'" ?> /></span>
            <span><p>Asset Price</p><input name="price" type="number" onblur="if (this.value == '') {this.value = '2000';}"
 onfocus="if (this.value == '2000') {this.value = '';}" <?php echo "value='$price'" ?> /></span>
            <span><p>Brand</p><input name="brand" type="text" onblur="if (this.value == '') {this.value = 'E.g. Dell';}"
 onfocus="if (this.value == 'E.g. Dell') {this.value = '';}" <?php echo "value='$brand'" ?> /></span>
            <span><p>Model</p><input name="model" type="text" onblur="if (this.value == '') {this.value = 'E.g. Dual Core';}"
 onfocus="if (this.value == 'E.g. Dual Core') {this.value = '';}" <?php echo "value='$model'" ?> /></span>
            <span><p>Description</p><input name="descr" type="text" onblur="if (this.value == '') {this.value = 'E.g. 500GB/2GB/1GB/DOS';}"
 onfocus="if (this.value == 'E.g. 500GB/2GB/1GB/DOS') {this.value = '';}" <?php echo "value='$descr'" ?> /></span>
            <span><p>Status</p><input name="status" type="text" onblur="if (this.value == '') {this.value = 'Creating';}"
 onfocus="if (this.value == 'Creating') {this.value = '';}" <?php echo "value='$status_flg'" ?> /></span>
            <span><p>&nbsp;</p><input name="CREATE_AMC_ASSET" id="MAKE" type="submit" class="btn" <?php if ($CreateAsset)
                                      echo "value='Create AMC Asset'";
                                  else
                                      echo "value='Add / Remove Item'";
                                  ?> /></span>
            <span><p>&nbsp;</p><input name="CREATE_RENT_ASSET" id="MAKE" type="submit" class="btn" <?php if ($CreateAsset)
                                      echo "value='Create Rent Asset'";
                                  else
                                      echo "value='Add / Remove Item'";
                                  ?> /></span>
        
        
        <!--END of form-->
<?php } ?>
</form>

        
        </div>
	
</div>



<?php include("inc/footer.php"); ?>