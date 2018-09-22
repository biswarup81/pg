<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-US"><head>

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


<!--<link href="images_files/916e35d3-3f86-4def-a371-1e6beaf789cb.css" type="text/css" rel="stylesheet">-->
      
   <title> AMC - Network</title>
  <!-- <link type="text/css" href="images_files/ACvtr288-b_002.css" rel="stylesheet">-->
   <link type="text/css" href="../images_files/ACvtr288-b.css" rel="stylesheet">
   <link type="text/css" href="../css/deb_style.css" rel="stylesheet">
   
   
   
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
      <li class="header-nav-item right"><a class="header-nav-text item-last" href="../index.php" id="button-hd-nav-contact">Go to Main page </a></li>
      </ul>
      <div class="main-nav-bar">
      <ul class="main-nav">
      <li id="main-nav-domains" class="main-nav-item first-item">
      <a class="main-nav-link" href="index.php" id="button-hd-mainnav-domains"> Home</a> </li> 
       <li id="main-nav-email" class="main-nav-item"><a  class="main-nav-link" href="amcnetwork.php" id="button-hd-mainnav-email">AMC - Network </a></li>   
      <li id="main-nav-email" class="main-nav-item"><a  class="main-nav-link" href="ourservices.php" id="button-hd-mainnav-email">Services </a></li>
      <li id="main-nav-servers" class="main-nav-item">
      <a  class="main-nav-link" href="contacts_hw.php" id="button-hd-mainnav-servers"> Contacts</a></li>

      
      
      
      
      </ul>
      
  </div></div></div>
          
          
          
          
          
          <div id="content" class="clearfix">
          <div id="iner-page-bg">
          <div id="myiner-page-bg1" class="clearfix"><a class="skip-target" name="skip-to-content"></a>
          <div id="content-bottom-container">
          <div class="ct-marketingcontainer-a1 grid-16">
          
          
         <div class="inear-page"> 
         
         <div class="app_heading">AMC - Network </div><br>
         
         
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