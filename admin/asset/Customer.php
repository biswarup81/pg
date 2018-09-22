<?php include("inc/header.php"); ?>

<script type="text/javascript">
    function myFocus(element) {
        if (element.value == element.defaultValue) {
            element.value = '';
        }
    }
    function myBlur(element) {
        if (element.value == '') {
            element.value = element.defaultValue;
        }
    }
    function check() {
        if (document.form1.fname.value == "") {
            alert("Please Insert First Name.");
            return false;
        } else if (document.form1.lname.value == "") {
            alert("Please Insert Last Name Name.");
            return false;
        } else if (document.form1.cellnum.value == "") {
            alert("Please Insert Mobile Number.");
            return false;
        } else {
            return true;
        }
    }
    function checkSearch() {
        if (document.s_form.customer_id.value == "" && document.s_form.patient_name.value == "") {
            alert("Please Give some Input");
            return false;
        }
    }
    function search1() {
        //alert(document.getElementById("s_p_id").value);
        //alert(document.getElementById("s_p_name").value);
        if (document.getElementById("s_p_id").value == "" && document.getElementById("s_p_name").value == "") {
            alert("Please give some Input");
            return false;
        } else {
            var customer_id = document.getElementById("s_p_id").value;
            var customer_name = document.getElementById("s_p_name").value;
            //alert("Please Give some");
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
            var url = "searchCustomer.php?customer_id=" + customer_id + "&customer_name=" + customer_name;
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

    }
</script>

<script>
	$(function() {
		$( "#tabs" ).tabs();
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    buttonImageOnly: true,
                    dateFormat: "dd-mm-yy"
                });
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
		<li><a href="#tabs-1">Search Customer</a></li>
		<li><a href="#tabs-2">Create Customer</a></li>
		
	</ul>
	<div id="tabs-1">
	
            <span><p>Customer ID</p><input id="s_p_id" name="customer_id" type="text" class="input_box_add" value="" /></span>                
            <span><p>Customer/Business Name</p><input id="s_p_name" name="customer_name" type="text" class="input_box_big" value="" /></span>               
            <span><p>&nbsp;</p><input type="submit" value="Search" name="search" class="btn" onclick="search1();" /></span>
            <div class="searchResults" id="searchDiv">
                <!--RESULT OF SEARCH -->
            </div>
        </div>
	<div id="tabs-2">
            <form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
    <?php
    if (isset($_POST['CREATE_CUSTOMER_DATA'])) {
        $businessname = $_POST['businessname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $addr = $_POST['addr'];
        $city = $_POST['city'];
        $cellnum = $_POST['cellnum'];
        $altcellnum = $_POST['altcellnum'];
        $email = $_POST['email'];
        $dob = date("Y-m-d", strtotime($_POST['theDate']));

        $sql1 = "insert into customer (customer_business_name,contact_first_name, 	
                                                        contact_last_name, customer_address, customer_city, customer_since, customer_cell_num,
							customer_alt_cell_num, customer_email, data_entry_date) 
                                                        values('$businessname','$fname', '$lname', '$addr', '$city', '$dob' ,'$cellnum', '$altcellnum', '$email', NOW())";
        mysql_query($sql1) or die(mysql_error());

        $id = mysql_insert_id();

        echo "<div class='b_success'>$fname $lname data saved successfully<br><h2><a href='alloc_asset.php?customer_id=$id'>OK</a></h2></div>";
    } else {
        ?>    
        <!--BEGIN form-->
        <div class="patientDetails">

            <span><p>Customer/Business Name</p><input name="businessname" type="text" class="input_box_big" value="" /></span>                                
            <span><p>Contact First Name</p><input name="fname" type="text" class="input_box_big" value="" /></span>                
            <span><p>Contact Last Name</p><input name="lname" type="text" class="input_box_big" value="" /></span>                
            <span><p>Customer Since</p>
                <input id="datepicker" name="theDate" type="text" value="DD-MM-YYYY" onfocus="myFocus(this);" onblur="myBlur(this);" /></span>                
            <span><p>Mobile No</p><input name="cellnum" type="text" class="input_box_add" value="" /></span>                
            <span><p>Landline No</p><input name="altcellnum" type="text" class="input_box_add" value="" /></span>                  
            <span><p>Street Address</p><textarea name="addr" cols="" rows=""></textarea></span>            

            <span><p>City / Town</p><input name="city" type="text" class="input_box_big" value="" /></span>                
            <span><p>Email Address</p><input name="email" type="text" class="input_box_big" value="" /></span>           
            <span><p>&nbsp;</p><input name="CREATE_CUSTOMER_DATA" id="MAKE" type="submit" class="btn" value="Add" /></span>

        </div>
        <!--END of form-->
    <?php } ?>
</form>
        </div>
</div>

<?php include("inc/footer.php"); ?>