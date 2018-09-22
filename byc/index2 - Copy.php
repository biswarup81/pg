<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PG INFOSERVICES</title>
</head>
<style type="text/css">
.main{ margin:0px auto; font-family:Verdana, Geneva, sans-serif; color:#757575}
.contain{ width:600px; height:360px;}
.block{ width:580px; margin-left:10px; border:solid 1px #909090; min-height:50px; margin-top:12px; background:#E8E8E8;}
.block_head{ width:560px;  padding-left:20px; background:#222222}
.block_body{ width:70%; margin:15px auto;}
.list{ width:30%; border:solid 1px #FFF; margin:19px; padding:10px; display:none;}
#result{ width:410px; padding-left:170px; line-height:30px; border-top:solid 1px #666; margin-top:15px; height:30px;}
</style>

<script type="text/ecmascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25"; 
  var content_vlue = document.getElementById("block").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()"><center>');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</center></body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}


function claculate(){
	//alert("Hi");
	var processor = document.pg.processor.value;
	var mother_bord = document.pg.mother_bord.value;
	var harddisk = document.pg.harddisk.value;
	var ram = document.pg.ram.value;
	var cabinet = document.pg.cabinet.value;
	var keybord = document.pg.key_bord.value;
	var monitor = document.pg.monitor.value;
	
	if(processor == "0"){
		document.getElementById("process").innerHTML = "-------";
	}else{
	document.getElementById("process").innerHTML = "Rs."+processor;
	}
	
	if(mother_bord == "0"){
		document.getElementById("mb").innerHTML = "-------";
	}else{
		document.getElementById("mb").innerHTML = "Rs."+mother_bord;
	}
	
	if(harddisk == "0"){
		document.getElementById("hdd").innerHTML = "-------";
	}else{
	document.getElementById("hdd").innerHTML = "Rs."+harddisk;
	}
	
	if(ram == "0"){
		document.getElementById("ra").innerHTML = "-------";
	}else{
	document.getElementById("ra").innerHTML = "Rs."+ram;
	}
	
	if(cabinet == "0"){
		document.getElementById("cab").innerHTML = "-------";
	}else{
	document.getElementById("cab").innerHTML = "Rs."+cabinet;
	}
	
	if(keybord == "0"){
		document.getElementById("kb").innerHTML = "-------";
	}else{
	document.getElementById("kb").innerHTML = "Rs."+keybord;
	}
	
	if(monitor == "0"){
		document.getElementById("mon").innerHTML = "-------";
	}else{
		document.getElementById("mon").innerHTML = "Rs. "+monitor;
	}
	var total = eval(processor) + eval(mother_bord) + eval(harddisk) + eval(ram) + eval(cabinet) + eval(keybord) + eval(monitor);
	//alert(total);
	if(total == "NaN"){
		document.getElementById("result").innerHTML = "Total Priceing of your computer is Rs. -------";
	}else{
		document.getElementById("result").innerHTML = "Total Priceing of your computer is Rs. "+total+"*";
	}
}
</script>
    
<script type="text/javascript">
function productsearch(str)
{
	
if (str=="")
  {
  document.getElementById("resultDiv").innerHTML="";
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
  if (xmlhttp.readyState==3 || xmlhttp.readyState==1 || xmlhttp.readyState==2  ){
		document.getElementById("resultDiv").innerHTML= "<table width='476' border='1'><tr><th colspan='2' scope='row'>Loading Result...</th></tr></table>"
  } else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("resultDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getproductlist.php?q="+str,true);
xmlhttp.send();
}
</script>    
<?php

include("config.php");

function select($a){
	$sql = "select * from PRODUCTS where PRODUCT_TYPE = '$a'";
	$r = mysql_query($sql) or die(mysql_error());
		echo "<option value='0'> - - Please Select one option - - </option>";
	while($d = mysql_fetch_array($r)){
		echo "<option value='$d[PRICE]'>$d[PRODUCT_NAME]</option>";
	}
}
?>
<body>
<div class="main">
<div class="contain">
<form action="" method="post" name="pg">
	
    
    <div class="block" id="block">
    	<div class="block_head">
        	<img src="http://pginfoservices.com/images/logo.png" height="40" /><a href="JavaScript:window.print();" title="Print" style="float:right; color:#FFF; font-size:12px; margin-right:12px; margin-top:10px;"><img src="print.png" /></a>
        </div>
        
        <table width="550" border="0" align="center" cellspacing="10">
          <tr>
            <th scope="col" colspan="3">Choose your computers Accessories</th>
          </tr>
          <tr>
            <td>PPRCESSOR :</td>
            <td><select name="processor" onchange="claculate()"><?php select('PROCESSOR');?></select></td>
            <td id="process"></td>
          </tr>
          <tr>
            <td>MOTHERBORD :</td>
            <td><select name="mother_bord" onchange="claculate()"><?php select('MOTHER BOARD');?></select></td>
            <td id="mb"></td>
          </tr>
          <tr>
            <td>HARDDISK : </td>
            <td><select name="harddisk" onchange="claculate()"><?php select('HARD DISK');?></select></td>
            <td id="hdd"></td>
          </tr>
          <tr>
            <td>RAM :</td>
            <td><select name="ram" onchange="claculate()"><?php select('RAM');?></select></td>
            <td id="ra"></td>
          </tr>
          <tr>
            <td>CABINET</td>
            <td><select name="cabinet" onchange="claculate()"><?php select('CABINET');?></select></td>
            <td id="cab"></td>
          </tr>
          <tr>
            <td>KEY BORD :</td>
            <td><select name="key_bord" onchange="claculate()"><?php select('KEYBOARD');?></select></td>
            <td id="kb"></td>
          </tr>
          <tr>
            <td>MONITOR :</td>
            <td><select name="monitor" onchange="claculate()"><?php select('MONITOR');?></select></td>
            <td id="mon"></td>
          </tr>
        </table>
		<div id="result"></div>
    
    
    <table width="476" border="1">
        <tr>
          <th colspan="2" scope="row">SEARCH PRODUCT</th>
        </tr>
        <tr>
          <th width="167" scope="row"><div align="left">PRODUCT TYPE:</div></th>
          <td width="293"><select name = "product_type" onchange="productsearch(this.value)">
            <?php
//$q=$_GET["q"];
//include("config.php");


$sql="SELECT * FROM PRODUCT_TYPE";

$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
  {
	  echo "<option value='" .  $row['PRODUCT_TYPE']  . "'>" .  $row['PRODUCT_TYPE']  . "</option>";
}
?>
          </select></td>
        </tr>
        
      </table>
      <p>&nbsp;</p>
	
	  <div id="resultDiv"><b>Search Result will be displayed here</b></div>

      <p>&nbsp;      </p>
      </div>
</form>
</div>
</div>
</body>
</html>
