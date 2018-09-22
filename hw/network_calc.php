<?php
?>

<script language="javascript" type="text/javascript">

    //Browser Support Code
    function showmaxnocomputer(){
        var ajaxRequest;  // The variable that makes Ajax possible!
        var ajaxDisplay = document.getElementById('showcomputerDiv');
        try{
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        // Crea/te a function that will receive data sent from the server
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
                //var ajaxDisplay = document.getElementById('ajaxDiv3');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
       
	
        var length = document.getElementById('length').value;
        var breath = document.getElementById('breadth').value;
        //var method = document.getElementById('method').value;
        var queryString8 = "?length=" + length + "&breath=" + breath;
        ajaxRequest.open("GET", "cal_computer.php"  + queryString8, true);
        ajaxRequest.send(null); 
    }
  </script> 
  
  <script language="javascript" type="text/javascript">

    //Browser Support Code
    function calculate(){
        var ajaxRequest;  // The variable that makes Ajax possible!
        var ajaxDisplay = document.getElementById('calculationDiv');
        try{
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        // Crea/te a function that will receive data sent from the server
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
                //var ajaxDisplay = document.getElementById('ajaxDiv3');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
       
	
        var computer = document.getElementById('computer').value;
        //var breath = document.getElementById('breath').value;
        //var method = document.getElementById('method').value;
        var queryString8 = "?computer=" + computer;
        ajaxRequest.open("GET", "calculate.php"  + queryString8, true);
        ajaxRequest.send(null); 
    }
    
    function reloadPage()
  {
  window.location.reload()
  }
  </script>
  
<script type="text/ecmascript">
    
function func_print()
{ 
  var disp_setting="toolbar=no,location=no,directories=yes,menubar=no,"; 
      disp_setting+="scrollbars=yes, width=900, height=600, resize=yes"; 
  var content_vlue = document.getElementById("printArea").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head>'); 
   docprint.document.write('</head><body onLoad="self.print()">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

</script>
<!-- <div id="printArea"> 
<form name="computer_decoration" action="" method="post">
    <table border="0" align="center" width="500" cellpadding="3" cellspacing="5">
        <tr>
            <td colspan="2"><h1>Computer Decoration</h1></td>
        </tr>
        <tr>
            <td>Enter the Length of the Floor(ft) :&nbsp;<input type="text" name="length" id="length"/></td>
            
        </tr>
         <tr>
            <td>Enter the Breath of the Floor(ft) :&nbsp;<input type="text" name="breadth" id="breadth"/></td>
           
        </tr>
        </table>
        <div id="showcomputerDiv">
        
        <table border="0" align="center" width="500" cellpadding="3" cellspacing="5">
        <tr>
            
            <td align="center"><input type="button" name="submit" onclick="showmaxnocomputer()" value="Show"/></td>
        </tr>
    </table>
    </div>
</form>
</div>-->








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Setup your Computer Network - Online Quotation</title>
<link href="css/deb_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="printArea"> 
<div class="top_wrap">
	<div class="top">Integrated Computer Allocation Management</div>
</div>
<div class="clear"></div>

	<div class="main">
	  <table width="100%" border="0" cellspacing="10" cellpadding="0">
	    <tr>
	      <td width="10%">&nbsp;</td>
	      <td width="40%" class="fildtext">Length Of The Floor :</td>
	      <td width="40%"><form id="form1" name="computer_decoration" method="post" action="">
	        <label>
	          <input name="length" type="text" class="textfild" id="length" size="25" />
            </label>
          </form></td>
	      <td width="10%">&nbsp;</td>
        </tr>
	    <tr>
	      <td width="10%">&nbsp;</td>
	      <td width="40%" class="fildtext">Breadth Of The Floor :</td>
	      <td width="40%"><form id="form1" name="form1" method="post" action="">
	        <label>
	          <input name="breadth" type="text" class="textfild" id="breadth" size="25" />
            </label>
          </form></td>
	      <td width="10%">&nbsp;</td>
        </tr>
        </table>
            <div id="showcomputerDiv">
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                     <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="40%">&nbsp;</td>
                        <td width="40%"><input type="button" class="show" name="submit" onClick="showmaxnocomputer()" value="Show"/></td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        
        
      
	   <!-- <tr>
	      <td width="10%">&nbsp;</td>
	      <td width="40%" class="fildtext">Enter Your No Of Computers :</td>
	      <td width="40%"><form id="form1" name="form1" method="post" action="">
	        <label>
	          <input name="textfield" type="text" class="textfild" id="textfield" size="50" />
            </label>
          </form></td>
	      <td width="10%">&nbsp;</td>
        </tr>
	    <tr>
	      <td width="10%">&nbsp;</td>
	      <td width="40%">&nbsp;</td>
	      <td width="40%"><img src="images/cd_show.png" width="178" height="49" alt="show" /></td>
	      <td width="10%">&nbsp;</td>
        </tr>
      </table>
    
</div>-->

<div class="clear"></div>
<div class="footer_wrap">
	<div class="footer">:: © P.G.Infoservices 2012. Al Rights Reserved.  ::</div>
</div>

</body>
</html>
