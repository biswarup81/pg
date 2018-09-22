<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PG INFOSERVICES</title>
</head>
<style type="text/css">
.main{ margin:0px auto; font-family:Verdana, Geneva, sans-serif; color:#757575}
.contain{ width:600px; height:330px; background:#E8E8E8;}
.block{ width:580px; margin-left:10px; border:solid 1px #909090; min-height:50px; margin-top:12px;}
.block_head{ width:560px;  padding-left:20px; background:#D1D1D1}
.block_body{ width:70%; margin:15px auto;}
.list{ width:30%; border:solid 1px #FFF; margin:19px; padding:10px; display:none;}
#result{ width:410px; padding-left:170px; line-height:30px; border-top:solid 1px #666; margin-top:15px; height:30px;}
</style>

<script type="text/ecmascript">
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
	
    
    <div class="block">
    	<div class="block_head">
        	Choose your computers Acceries
        </div>
        
        <table width="550" border="0" align="center" cellspacing="10">
          <tr>
            <th scope="col" colspan="3">Choose your computers Acceries</th>
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
    </div>
</form>
</div>
</div>
</body>
</html>
