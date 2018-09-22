<html>
<head>
<title>P.G.INFOSERVICES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/designstylesheet.css" rel="stylesheet" type="text/css">

 
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
      <a class="main-nav-link" href="../hw/index.php" id="button-hd-mainnav-domains"> Home</a> </li> 
       <li id="main-nav-email" class="main-nav-item"><a  class="main-nav-link" href="../hw/amcnetwork.php" id="button-hd-mainnav-email">AMC - Network </a></li>   
      <li id="main-nav-email" class="main-nav-item"><a  class="main-nav-link" href="../hw/ourservices.php" id="button-hd-mainnav-email">Services </a></li>
      <li id="main-nav-servers" class="main-nav-item">
      <a  class="main-nav-link" href="../hw/contacts_hw.php" id="button-hd-mainnav-servers"> Contacts</a></li>

      
      
      
      
      </ul>
      
  </div></div></div>
          
          
          
          
          
          <div id="content" class="clearfix">
          <div id="iner-page-bg">
          <div id="myiner-page-bg1" class="clearfix"><a class="skip-target" name="skip-to-content"></a>
          <div id="content-bottom-container">
          <div class="ct-marketingcontainer-a1 grid-16">
          
          
         <div class="inear-page"> 
         
         <div class="app_heading">SEARCH PRODUCT</div><br>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td valign="top"> 
    
	</td>
</tr>
<TR><TD>
	<form >
      <p>&nbsp;</p>
      <table width="500" border="1" style="margin-left:80px;">
      
        <tr>
          <th width="200" scope="row"><div  class="product-type">PRODUCT TYPE :</div></th>
          <td width="293"><select class="product-type-select" name = "product_type" onChange="productsearch(this.value)">
            <?php
//$q=$_GET["q"];
include("config.php");


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
	
	  <div id="resultDiv"><b>Search Result Will Be Displayed Here</b></div>

      <p>&nbsp;      </p>
	</form>
	</td></TR>
<tr><td></td></tr>
<table></table>


  
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