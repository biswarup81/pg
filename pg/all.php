<?php include("inc/header.php");?>
<?php include("inc/check.php"); 
?>

<div class="body2" id="body2">
        <div style="width:100%; background:#CCF; padding:3px; margin-bottom:10px;">All Compalnis</div>
        
        <div id="closed" style="">
        <!--Closed-->
        	<table width="100%" border="0">
              <tr>
                <th class="back_table">Name</th>
                <th class="back_table">Text</th>
                <th class="back_table">Status</th>
              </tr>
              <?php
			  $sql3 = "select * from visitors";
			  $result3 = mysql_query($sql3) or die(mysql_error());
			  while($d3 = mysql_fetch_object($result3)){
			  ?>
              <tr>
                <td class="alltd"><a href="details.php?v_id=<?php echo $d3->v_id; ?>"><?php echo $d3->f_name." ".$d3->l_name; ?></a></td>
                <td class="alltd"><?php echo $d3->text; ?></td>
                <td class="alltd"><?php echo ucfirst($d3->label); ?></td>
              </tr>
              <?php } ?>
            </table>
        </div>
        
        
        <div id="txtHint2"></div>
        </div>
        
<?php include("inc/footer.php"); ?>