<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-US"><head>

<script type="text/ecmascript">
    
function func_print()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25"; 
  var content_vlue = document.getElementById("block").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Quotation for Computer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()"><center>');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</center></body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

</script>
    
<script type="text/javascript">
    
function claculate(){
	//alert("Hi");
	var processor = document.pg.processor.value;
	var mother_bord = document.pg.mother_bord.value;
	var harddisk = document.pg.harddisk.value;
	var ram = document.pg.ram.value;
	var cabinet = document.pg.cabinet.value;
	var keybord = document.pg.key_bord.value;
        var monitor = document.pg.monitor.value;
        var mouse = document.pg.mouse.value;
	var scard = document.pg.scard.value;
        var gcard = document.pg.gcard.value;
        var webcam = document.pg.webcam.value;
        var ups = document.pg.ups.value;
        
	document.getElementById("process").innerHTML = "Rs."+processor;
	document.getElementById("mb").innerHTML = "Rs."+mother_bord;
	document.getElementById("hdd").innerHTML = "Rs."+harddisk;
	document.getElementById("ra").innerHTML = "Rs."+ram;
	document.getElementById("cab").innerHTML = "Rs."+cabinet;
	document.getElementById("kb").innerHTML = "Rs."+keybord;
        
        document.getElementById("monitor").innerHTML = "Rs."+monitor;
	document.getElementById("mouse").innerHTML = "Rs."+mouse;
        document.getElementById("ups").innerHTML = "Rs."+ups;
	document.getElementById("gcard").innerHTML = "Rs."+gcard;
	document.getElementById("scard").innerHTML = "Rs."+scard;
        document.getElementById("webcam").innerHTML = "Rs."+webcam;
	
	if(processor == 0){
		
	}
	var total = eval(processor) + eval(mother_bord) + eval(harddisk) + eval(ram) + eval(cabinet) + eval(keybord)+
                    eval(monitor) + eval(mouse) + eval(gcard) + eval(scard) + eval(webcam) + eval(ups);
	//alert(total);
	
	document.getElementById("result").innerHTML = "Total Price of your computer is Rs. "+total+". Tax Extra.";
}
</script>


<!--<link href="images_files/916e35d3-3f86-4def-a371-1e6beaf789cb.css" type="text/css" rel="stylesheet">-->
      
   <title> Our Services </title>
  <!-- <link type="text/css" href="images_files/ACvtr288-b_002.css" rel="stylesheet">-->
   <link type="text/css" href="../images_files/ACvtr288-b.css" rel="stylesheet">
   
   
   
    <!--[if lt IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie6/css-min/AC:vtr288-b" rel="stylesheet"><![endif]--><!--[if IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie7/css-min/AC:vtr288-b" rel="stylesheet"><![endif]-->


	
<link href="../css/screen.css" rel="stylesheet" type="text/css" media="screen" />
    
    </head>
    
    <body class="productpages Home flyout js-active">
    <div id="skipmenu"><a class="skip" href="#">Skip to content</a></div>
    <div id="container" class="skin-oneandone"><div id="header-container">
    <div id="header" class="clearfix"><a class="core_button_normal" href="../index.php" id="button-hd-log-home"><img src="../images_files/lg-1and1.png" alt="" class="logo" title="Logo" ></a>
    <ul class="header-nav">
    <li class="header-nav-item header-nav-item-first"><span class="header-nav-text">Give us a Call: <span> +91.983.0875.590 </span></span></li>
     <li class="header-nav-item right"><a class="header-nav-text item-last" href="mailto:info@pginfoservices.com" id="button-hd-nav-contact">E-mail Us </a></li>
      </ul>
      <div class="main-nav-bar"></div></div></div>
          
          
          
          
          
          <div id="content" class="clearfix">
          <div id="iner-page-bg">
          <div id="iner-page-bg1" class="clearfix"><a class="skip-target" name="skip-to-content"></a>
          <div id="content-bottom-container">
          <div class="ct-marketingcontainer-a1 grid-16">
          
          
         <div class="inear-page"> 
         
         
         <?php

include("config.php");

function select($a){
	$sql = "select * from PRODUCTS where PRODUCT_TYPE = '$a'";
	$r = mysql_query($sql) or die(mysql_error());
		//echo "<option value=''> - - Please Select one option - - </option>";
	echo "<option value='0'>---NA---</option>";
        while($d = mysql_fetch_array($r)){
		echo "<option value='$d[PRICE]'>$d[PRODUCT_NAME]</option>";
	}
}
?>
<body onload="claculate()">
<!-- start top -->
<div class="top">
    <div class="full-width rel">
       
        <div class="two-third">
            <div class="rel">
                
            </div>
            
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end top -->
<!-- start middle -->
<div class="middle">
<!-- start home -->
<div class="home">  <!-- start inner -->          
<div class="inner gradient-down">
<div class="full-width">
<form action="" method="post" name="pg">
	
    
    <div class="block">
    	
    	<div class="block" id="block">
        
        
        
        
        <table width="100%" border="0" align="center" cellspacing="5">
          <tr>
            <th scope="col" colspan="3" height="50;" style="font-size:20px; font-weight:bold; text-align:center;">Build Your Own Machine!</th>
          </tr>
          <tr>
            <td  height="25">PROCESSOR :</td>
            <td><select name="processor" onChange="claculate()" style="width:335px;">
                <?php select('PROCESSOR');?></select></td>
            <td id="process"></td>
          </tr>
          
          <tr>
            <td  height="25">MOTHERBOARD :</td>
            <td><select name="mother_bord" onChange="claculate()" style="width:245px;"><?php select('MOTHER BOARD');?></select></td>
            <td id="mb"></td>
          </tr>
          <tr>
            <td  height="25">MONITOR :</td>
            <td><select name="monitor" onChange="claculate()" style="width:245px;"><?php select('MONITOR');?></select></td>
            <td id="monitor"></td>
          </tr>
          <tr>
            <td  height="25">HARD DISK : </td>
            <td><select name="harddisk" onChange="claculate()" style="width:245px;"><?php select('HARD DISK');?></select></td>
            <td id="hdd"></td>
          </tr>
          <tr>
            <td  height="25">RAM :</td>
            <td><select name="ram" onChange="claculate()" style="width:245px;"><?php select('RAM');?></select></td>
            <td id="ra"></td>
          </tr>
          <tr>
            <td  height="25;">CABINET :</td>
            <td><select name="cabinet" onChange="claculate()" style="width:245px;"><?php select('CABINET');?></select></td>
            <td id="cab"></td>
          </tr>
          <tr>
            <td  height="25;">KEY BOARD :</td>
            <td><select name="key_bord" onChange="claculate()" style="width:245px;"><?php select('KEYBOARD');?></select></td>
            <td id="kb"></td>
          </tr>
            <tr>
            <td  height="25;">MOUSE :</td>
            <td><select name="mouse" onChange="claculate()" style="width:245px;"><?php select('MOUSE');?></select></td>
            <td id="mouse"></td>
          </tr>
          <tr>
            <td  height="25;">UPS :</td>
            <td><select name="ups" onChange="claculate()" style="width:245px;"><?php select('UPS');?></select></td>
            <td id="ups"></td>
          </tr
          ><tr>
            <td  height="25;">GRAPHICS CARD :</td>
            <td><select name="gcard" onChange="claculate()" style="width:245px;"><?php select('GRAPHICS CARD');?></select></td>
            <td id="gcard"></td>
          </tr>
          <tr>
            <td  height="25;">SPEAKER :</td>
            <td><select name="scard" onChange="claculate()" style="width:245px;"><?php select('SPEAKER');?></select></td>
            <td id="scard"></td>
          </tr>
          <tr>
            <td  height="25;">PRINTER :</td>
            <td><select name="webcam" onChange="claculate()" style="width:245px;"><?php select('PRINTER');?></select></td>
            <td id="webcam"></td>
          </tr>
        </table>
		<div id="result"></div>
        <div class="block_head">
                <a href="#" onClick="return func_print();" style="float:right; color:#FFF; font-size:12px; margin-right:12px; margin-top:10px;">CLICK HERE TO PRINT </a>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
         
         

     
           
             
             
             
         
         
         </div>
    
    

    
    
   
        
        </div>
        
        
        
        
        
                  
                  
                  
                  </div></div></div></div>
              
              
              
              
              
              
              
              
              
              
              
              </div>
              
              
   <!--BEGIN footer-->         
              
  <div id="footer_container">

  <div class="sitemap-container clearfix1">
  <div class="footer">
  
  <div class="footer-left">
  <div class="block block-follow block-odd" id="block-follow-site">
  <div class="follow-links clearfix">
    <a href="#" class="follow-link follow-link-linkedin follow-link-site" title="Follow Centex Co. on LinkedIn">LinkedIn</a>
  <a href="#" class="follow-link follow-link-facebook follow-link-site" title="Follow Centex Co. on Facebook">Facebook</a>
  <a href="#" class="follow-link follow-link-twitter follow-link-site" title="Follow Centex Co. on Twitter">Twitter</a>
  </div>
  <div class="content">
    <p><strong>E-mail</strong>: <a href="#">info@pginfoservices.com</a><br>
Phone: <strong>+91.33.6540.2729</strong><br>
 &copy; 2012 <b>P. G. Infoservices</b> &nbsp;|&nbsp; <a href="#">Privacy Policy</a>
  </p></div>
  
  </div>
 </div>
 
 
 
 <div class="footer-midle">
 <div style="padding-left:8px;">  
 <b>Head Office</b><br>
AC-139 Prafulla Kanan (East),<br> Kolkata - 700 101, India.<br> M : +91.983.0875.590 </div>
</div>




 <div class="footer-right">
 <div class="copywright">
 <div style="padding-left:8px;">
 <b>Development Office</b><br>  35 Bose Pukur Road,<br> Kolkata - 700 042, India.<br>Ph : +91.33.6500.3045</div>
 

 
 
 
 </div>
 </div>
                
                
                
                </div>
                </div>
                  
                  </div>            
              
              
       <!--End of footer-->                       
              
              
              
              
              
              
              
              
              
              <!--[if lt IE 7]><script type="text/javascript" src="/xml/jasmin/get/120702-1216/hosting-ie6/js-min/AC:vtr288-b"></script><![endif]-->
</body></html>
<!-- GET_DOM: 11 HDL_DOC: 430 REX_DOC: 0 PRE_PROC: 1 -->