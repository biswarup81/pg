<?php include("inc/header.php");?>
<?php include("inc/check.php"); ?>
<script type="text/javascript">
function showResolved(str){
	if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser2.php?q="+str,true);
xmlhttp.send();
}
</script>
<div class="body2" id="body2">
        <div style="width:100%; background:#CCF; padding:3px; margin-bottom:10px;"> Closed</div>
        
        <div id="closed" style="">
       
        	<table width="100%" border="0">
              <tr>
                <th class="back_table">Name</th>
                <th class="back_table">Email</th>
                <th class="back_table">Text</th>
                <th class="back_table">Closed</th>
              </tr>
              <?php
			  $sql3 = "select * from visitors where label = 'close'";
			  $result3 = mysql_query($sql3) or die(mysql_error());
			  while($d3 = mysql_fetch_object($result3)){
			  ?>
              <tr>
                <td class="alltd"><a href="details.php?v_id=<?php echo $d3->v_id; ?>"><?php echo $d3->f_name." ".$d3->l_name; ?></a></td>
                <td class="alltd"><?php echo $d3->email; ?></td>
                <td class="alltd"><?php echo $d3->text; ?></td>
                <td class="alltd"><?php echo date("d/m/Y H:i", strtotime($d3->closed_date)); ?></td>
              </tr>
              <?php } ?>
            </table>
        </div>
        
        
        <div id="txtHint2"></div>
        </div>
<?php include("inc/footer.php"); ?>