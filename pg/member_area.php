<?php include("inc/header.php");?>
<?php include("inc/check.php"); ?>

<div class="body2" id="body2">
        <div style="margin:10px auto;">
		<?php
				$sql = "select * from visitors where label = 'assign' and assigned_to = ".$_SESSION['id1'];
				$r = mysql_query($sql) or die(mysql_error());
				$no = mysql_num_rows($r);
				if($no > 0){
		?>
        <table width="100%" border="0" cellpadding="2">
          <tr>
           <th style='background:#CCC'>Comp. No.</th>
            <th style='background:#CCC'>Name</th>
            <th style='background:#CCC'>Contact num</th>
            <th style='background:#CCC'>Complaint</th>
            <th style='background:#CCC'>Assigned Date</th>
            
          </tr>
          <?php
				while($d = mysql_fetch_array($r)){
		   ?>
          <tr>
            <td style='background:#CCC' align="center"><?php echo $d['complain_no']; ?></td>
            <td style='background:#CCC'>
            <a href="details.php?v_id=<?php echo $d['v_id'];?>" title="<?php echo "Address : ".$d['address1']."//".$d['address2']." Pin : ".$d['pin']." City :".$d['city']." Phone : ".
			$d['phone_no']." Mobile : ".$d['mobile_no']." Land Mark : ".$d['land_mark'];?>">
			<?php echo ucwords($d['f_name']." ".$d['l_name']);?>
            </a>
            </td>
            <td style='background:#CCC'>Mob. <?php echo $d['mobile_no']; ?><br />Ph.<?php echo $d['phone_no']; ?></td>
            <td style='background:#CCC'><?php echo $d['text']; ?></td>
            <td style='background:#CCC'><?php echo date("d/m/Y H:i", strtotime($d['date_added'])); ?></td>
            <!--<td style='background:#CCC'><a href="close.php?id=<?php echo $d['v_id'];?>&key=resolved" 
                title="Resolved" onclick="return confirm('Are you sure to resolved the job')">
                <img src="img/resolve.jpg" alt="" style="margin-left:12px;" /></a>
                </td> -->
          </tr>
          <?php }
		  ?>
        </table>
		<?php
		} else{
			  echo "<div class='no-result'>No Job assined </div>";
		  }
		?>
        </div>
        </div>


<?php include("inc/footer.php"); ?>