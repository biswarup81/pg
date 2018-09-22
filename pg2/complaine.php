<?php include("header.php");?>
<?php include("inc/check.php"); ?>
<script type="text/javascript">
function showUser(str)
{
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();

var aa = document.getElementById('assigned_to').style.display = "inline";
document.getElementById('assign').style.display = "none";
document.getElementById('assign_sub').style.display = "inline";
}
</script>
<?php 
	if(isset($_POST['check'])){
		$visitor = $_POST['visitor'];
		$assigned_to = $_POST['assigned_to'];
		$sql = "update visitors set label = 'assign', assigned_date = NOW(),assigned_by = ".$_SESSION['id'].", assigned_to = '$assigned_to' where v_id = '$visitor'";
		mysql_query($sql) or die(mysql_error());
		
		echo "<div class='success'>Your have assigned successfully </div>";
		
	}
?>
<div class="middle">
<div class="body2" id="body2">

        <div style="width:100%; background:#CCF; padding:3px; margin-bottom:10px;">New</div>
        
        <div id="complain" style="margin:10px auto; display:inline;">
        New
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<select name="visitor" onChange="showUser(this.value)">
            	<option value=""> Please Select One</option>
                <?php
				$sql = "select * from visitors where label = 'false'";
				$r = mysql_query($sql) or die(mysql_error());
				while($d = mysql_fetch_array($r)){
				?>
                <option value="<?php echo $d['v_id']; ?>"><?php echo ucwords($d['f_name']." ".$d['l_name']);?></option>
                <?php } ?>
            </select>
            
            <select name="assigned_to" id="assigned_to" style="display:none;">
            	<option value=""> - Select One Person - </option>
                <?php 
				$r2 = mysql_query("select * from admin where status = '2'") or die(mysql_error());
				while($d2 = mysql_fetch_array($r2)){
				?>
                <option value="<?php echo $d2['admin_id'];?>"><?php echo $d2['f_name']." ".$d2['l_name']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="check" value="Assign" id="assign_sub" style="display:none; width:60px;">
            <input type="button" id="assign" value="Assign" style="cursor:pointer; width:60px;" onClick="whome()" />
        </form>
        </div>
        <div id="txtHint"></div>
        </div>
        </div>
<?php include("footer.php"); ?>