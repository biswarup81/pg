<?php include("header.php");?>
<?php include("inc/check.php"); ?>

<div class="body2" id="body2">
        <div style="margin:10px auto;">
		<?php
				$sql = "select * from visitors where label = 'assign' and assigned_to = ".$_SESSION['id'];
				$r = mysql_query($sql) or die(mysql_error());
				$no = mysql_num_rows($r);
				if($no > 0){
		?>
        <table width="400" border="0" cellpadding="2">
          <tr>
            <th style='background:#CCC'>Name</th>
            <th style='background:#CCC'>Email</th>
            <th style='background:#CCC'>Text</th>
            <th style='background:#CCC'>Assigne Date</th>
            <th style='background:#CCC'>Close</th>
          </tr>
          <?php
				while($d = mysql_fetch_array($r)){
		   ?>
          <tr>
            <td style='background:#CCC'><?php echo ucwords($d['f_name']." ".$d['l_name']);?></td>
            <td style='background:#CCC'><?php echo $d['email']; ?></td>
            <td style='background:#CCC'><?php echo $d['text']; ?></td>
            <td style='background:#CCC'><?php echo $d['date_added']; ?></td>
            <td style='background:#CCC'><a href="close.php?id=<?php echo $d['v_id'];?>&key=resolved" title="Resolved" onclick="return confirm('Are you sure to resolved the job')"><img src="img/images.jpg" alt="" style="margin-left:12px;" /></a></td>
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


<?php include("footer.php"); ?>