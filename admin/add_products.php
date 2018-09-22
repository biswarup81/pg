<?php
include("inc/header.php");


if(isset($_POST['save'])){
	$headline = strtoupper(trim($_POST['headline']));
	$attach = $_FILES['attach']['name'];
	
	$type = $_POST['type'];
	$price = $_POST['price'];
	$file_name = $type."_".time().$attach;
	
	$file_path = "uploads/".$file_name;
	if(move_uploaded_file($_FILES['attach']['tmp_name'],$file_path)){
	mysql_query("insert into PRODUCTS (PRODUCT_NAME, PRODUCT_TYPE, PRICE, file_path, date_added) 
							values('$headline', '$type', '$price','$file_path', NOW())") or die(mysql_error());
	}else{
		mysql_query("insert into PRODUCTS (PRODUCT_NAME, PRODUCT_TYPE, PRICE, file_path, date_added) 
							values('$headline', '$type', '$price','', NOW())") or die(mysql_error());
	}
	//$id = mysql_insert_id();
	
	
	echo "<div class='success'>".$headline." has successfully saved</div>";
}else{
?>
<script>
function check(){
	if(document.add.headline.value == ""){
		alert("Product Name Should not be Blank");
		return false;
	}else if(document.add.headline.value.length < 3){
		//alert(document.add.headline.value.length);
		alert("Heading should not be less then 3 Charecter");
		return false;
	}else if(document.add.type.value == ""){
		alert("Please select a category");
		return false;
	}else if(document.add.price.value == ""){
		alert("You have forgoy to give the price.")
		return false;
	}else{
		return true;
	}
}

function up(){
	document.getElementById("headline").value = document.getElementById("headline").value.toUpperCase();
}
</script>


<form action="" method="post" onsubmit="return check()" name="add" enctype="multipart/form-data">
<table border="0" cellpadding="3" cellspacing="6" width="80%" align="center">
  <tr>
    <td>Product Name :</td>
    <td><input type="text" name="headline" onkeypress="up()" id="headline" /></td>
  </tr>
  <tr>
  	<td>Product Type :</td>
    <td>
    <select name="type">
    	<option value=""> -- Select one option -- </option>
        <?php 
		$r = mysql_query("select * from PRODUCT_TYPE") or die(mysql_error());
		while($d = mysql_fetch_object($r)){
		?>
        <option value="<?php echo $d->PRODUCT_TYPE; ?>"><?php echo $d->PRODUCT_TYPE; ?></option>
        <?php } ?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Price :</td>
    <td><input type="text" name="price" /></td>
  </tr>
  <tr>
  <tr>
  	<td>Attach file :</td>
    <td><input type="file" name="attach" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="save" value="Save" /></td>
  </tr>
</table>
</form>
<?php } ?>






<?php
include("inc/footer.php");
?>