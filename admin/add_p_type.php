<?php include("inc/header.php"); ?>
<script>
function check(){
	if(document.getElementById("p_type").value == ""){
		alert("Product Name should not be blank");
		return false;
	}
}
function up(){
	document.getElementById("p_type").value = document.getElementById("p_type").value.toUpperCase();
}
</script>
<?php
if(isset($_POST['save'])){
	$p_type = trim($_POST['p_type']);
	$r1 = mysql_query("select * from PRODUCT_TYPE where PRODUCT_TYPE = '$p_type'") or die(mysql_error());
	$n1 = mysql_num_rows($r1);
	if($n1 > 0){
		echo "<div class='failed'>The Category already exist.<br><a href='add_p_type.php'>OK</a></div>";
	}else{
		mysql_query("insert into PRODUCT_TYPE (PRODUCT_TYPE, date_added) values('$p_type', NOW())") or die(mysql_error());
		echo "<div class='success'>The new category saved successfully.</div>";
	}
}else{
?>
<form action="" method="post" onsubmit="return check()">
<table border="0" align="center" style="margin-top:50px;">
  <tr>
    <td>Product Type :</td>
    <td><input type="text" name="p_type" id="p_type" onkeypress="up()" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="save" value="Save" /></td>
  </tr>
</table>

</form>
<?php } include("inc/footer.php"); ?>