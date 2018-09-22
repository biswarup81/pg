<?php include("inc/header.php");?>
<table border="0" style="margin:10px 0px 10px 80px">
  <tr>
    <th scope="col" style="line-height:10px;"><!--<a href="add_member.php" title="Add Member"><img src="img/add.jpg" /></a>--></th>
  </tr>
</table>

<table border="0" width="90%" align="center" style="margin-top:20px; border:solid 1px #666;">
  <tr>
    <th scope="col">Sl. No.</th>
    <th scope="col">Name</th>
     <th scope="col">Category</th>
     <th scope="col">Price</th>
     <th scope="col">Sell Price</th>
     <th scope="col">FlipKart Price</th>
     <th scope="col">SnapDeal Price</th>
     <th scope="col">Edit</th>
    <!--<th scope="col">&nbsp;</th>-->
    <th scope="col">Delete</th>
  </tr>
<?php
$n = 0;
$r = mysql_query("select SEQ_NUM, PRODUCT_NAME, PRODUCT_TYPE, PRICE, ((PRICE*1.05) + PROFIT - DISCOUNT) AS SELL_PRICE, FLIPKART_PRICE, SNAPDEAL_PRICE"
        . " from PRODUCTS where STATUS='ACTIVE' order by PRODUCT_TYPE, PRODUCT_NAME ") or die(mysql_error());
while($d = mysql_fetch_object($r)){
	$n++;
	$t = $n%2; if($t==1){$c = "odd";}else{ $c = "even";}
?>
  <tr>
    <td align="center" class="<?php echo $c; ?>"><?php echo $n;?></td>
    <td class="<?php echo $c; ?>"><?php echo $d->PRODUCT_NAME; ?></td>
    <td class="<?php echo $c; ?>"><?php echo $d->PRODUCT_TYPE; ?></td>
    <td class="<?php echo $c; ?>"><?php echo $d->PRICE; ?></td>
    <td class="<?php echo $c; ?>"><?php echo $d->SELL_PRICE; ?></td>
    <td class="<?php echo $c; ?>"><?php echo $d->FLIPKART_PRICE; ?></td>
    <td class="<?php echo $c; ?>"><?php echo $d->SNAPDEAL_PRICE; ?></td>
    
    <td align="center" class="<?php echo $c; ?>"><a href="edit_products.php?id=<?php echo $d->SEQ_NUM; ?>" title="Edit"><img src="img/images.jpg" alt=""></a></td>
    <td align="center" class="<?php echo $c; ?>"><a href="delete.php?id=<?php echo $d->SEQ_NUM; ?>&c=product" title="Delete" onClick="return confirm('Are you realy want to delete <?php echo $d->PRODUCT_NAME;?>')"><img src="img/delete.jpg" alt=""></a></td>
  </tr>
<?php
}
?>
</table>

<?php include("inc/footer.php"); ?>