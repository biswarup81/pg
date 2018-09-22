<?php include("inc/header.php");?>
<script>
function up(){
	document.getElementById("name").value = document.getElementById("name").value.toUpperCase();
}
</script>
<?php
$id = $_GET['id'];
$q = "select * from PRODUCTS where SEQ_NUM = '$id'";
$r = mysql_query($q) or die(mysql_error());
$d = mysql_fetch_object($r);

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	//$designation = $_POST['designation'];
	$product_type = $_POST['product_type'];
	$price = $_POST['price'];
        $tax = $_POST['tax'];
        $profit = $_POST['profit'];
        $discount = $_POST['discount'];
        $fk_price = $_POST['fk_price'];
        $sd_price = $_POST['sd_price'];
	
	mysql_query("update PRODUCTS set PRODUCT_NAME = '$name', UPDATE_DATE = now(), "
                . "PRODUCT_TYPE = '$product_type', PRICE = '$price', "
                . "TAX=$tax, PROFIT=$profit, "
                . "FLIPKART_PRICE=$fk_price, SNAPDEAL_PRICE=$sd_price, "
                . "DISCOUNT=$discount  where SEQ_NUM = '$id'") or die(mysql_error());
	
	echo '<div style="width:250px; height:35px; border:solid 1px #87EA79; color:#090; background:#E2FCE8; margin:40px auto; text-align:center; line-height:35px;">Selected row successfully updated<br><a href="product_list.php">OK</a></div>';
}else{
?>
<form action="" method="post" name="add_gov" onsubmit="return check()">
<table border="0" align="center" style="margin-top:40px;">
  <tr>
    <td>Product Name :</td>
    <td><input type="text" name="name" onkeypress="up()" id="name"  value="<?php echo $d->PRODUCT_NAME; ?>"/></td>
  </tr>

  <tr>
    <td>Product Type :</td>
    <td>
    <select name="product_type" >
    	<?php 
		$r = mysql_query("select * from PRODUCT_TYPE") or die(mysql_error());
		while($d2 = mysql_fetch_object($r)){
		?>
        <option value="<?php echo $d2->PRODUCT_TYPE; ?>" <?php if(  strcmp(trim("$d->PRODUCT_TYPE"),trim("$d2->PRODUCT_TYPE")) == 0 ){?> selected <?php } ?>>
		<?php echo $d2->PRODUCT_TYPE; ?>
        </option>
        <?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Price :</td>
    <td><input type="text" name="price" value="<?php echo $d->PRICE; ?>" /></td>
  </tr>
  <tr>
    <td>Tax :</td>
    <td><input type="text" name="tax" value="<?php echo $d->TAX; ?>" /></td>
  </tr>
  <tr>
    <td>Profit :</td>
    <td><input type="text" name="profit" value="<?php echo $d->PROFIT; ?>" /></td>
  </tr>
  <tr>
    <td>Discount :</td>
    <td><input type="text" name="discount" value="<?php echo $d->DISCOUNT; ?>" /></td>
  </tr>
  <tr>
    <td>FlipKart Price :</td>
    <td><input type="text" name="fk_price" value="<?php echo $d->FLIPKART_PRICE; ?>" /></td>
  </tr>
  <tr>
    <td>SnapDeal Price :</td>
    <td><input type="text" name="sd_price" value="<?php echo $d->SNAPDEAL_PRICE; ?>" /></td>
  </tr>
    <!--<tr>
    <td>Attach file :</td>
    <td>
    	<div><input type="file" name="attach" />
    </td>
  </tr>-->
  <tr>
    <td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
    <td><input type="submit" name="update" value="Update" /></td>
  </tr>
</table>
</form>


<?php } include("inc/footer.php"); ?>