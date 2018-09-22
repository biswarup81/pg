<?php include("inc/header.php");?>
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
}

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
function complain(){
	//alert("Hi");
	document.getElementById('complain').style.display = "inline";
	document.getElementById('resolved').style.display = "none";
	document.getElementById('closed').style.display = "none";
	document.getElementById('txtHint').style.display = "inline";
	document.getElementById('txtHint2').style.display = "none";
}
function resolved(){
	//if(document.getElementById('resolved').style.display == "none"){
	document.getElementById('resolved').style.display = "inline";
	document.getElementById('complain').style.display = "none";
	document.getElementById('closed').style.display = "none";
	document.getElementById('txtHint').style.display = "none";
	//}
	//document.getElementById('complain').style.margin-top = "20px";
}
function closed(){
	document.getElementById('complain').style.display = "none";
	document.getElementById('resolved').style.display = "none";
	document.getElementById('closed').style.display = "inline";
	document.getElementById('txtHint').style.display = "none";
	document.getElementById('txtHint2').style.display = "none";
}

function resolved_sub(){
	document.forms["myform"].submit();
}
</script>
<?php 
	if(isset($_POST['check'])){
		$visitor = $_POST['visitor'];
		$sql = "update visitors set label = 'assign' assigned_date = NOW() where v_id = '$visitor'";
		mysql_query($sql) or die(mysql_error());
		
		echo "<div class='success'>Your Data Has saved successfully </div>";
		
	}else{
?>
        <div class="body2" id="body2">
        <div style="width:100%; background:#CCF; padding:3px; margin-bottom:10px;"><span onclick="complain()">Complain</span> | <span onclick="resolved()">Resolved</span> | <span onclick="closed()"> Closed </span></div>
        <div id="complain" style="margin:10px auto; display:inline;">
        Complain
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
            <!--<input type="submit" name="check" value="Assign">-->
            <input type="button" name="" value="Assign" style="cursor:pointer" onclick="whome()" />
        </form>
        </div>
        
        <div id="resolved" style="margin:0px auto; display:none">
        Resolved
        	<form action="close2.php" method="post" name="myform">
        	<select name="resolved" onChange="showResolved(this.value)">
            	<option value=""> Please Select One</option>
                <?php
				$sql2 = "select * from visitors where label = 'resolved'";
				$r2 = mysql_query($sql2) or die(mysql_error());
				while($d2 = mysql_fetch_array($r2)){
				?>
                <option value="<?php echo $d2['v_id']; ?>"><?php echo ucwords($d2['f_name']." ".$d2['l_name']);?></option>
                <?php } ?>
            </select>
            <!--<input type="submit" name="check" value="Assign">-->
            <input type="hidden" name="key" value="close" />
            <input type="button" name="" value="Assign" style="cursor:pointer" onclick="resolved_sub()" />
        </form>
        </div>
        
        <div id="closed" style="display:none">
        Closed
        	<table width="400" border="0">
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
                <td><?php echo $d3->f_name." ".$d3->l_name; ?></td>
                <td><?php echo $d3->email; ?></td>
                <td><?php echo $d3->text; ?></td>
                <td><?php echo $d3->f_name; ?></td>
              </tr>
              <?php } ?>
            </table>
        </div>
        
        
        <div id="txtHint"></div>
        <div id="txtHint2"></div>
        </div>
        <?php }?>
        
<?php include("inc/footer.php"); ?>