<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-US"><head>

<?php include '../../admin/inc/db_connection.php';?>
<script type="text/javascript" src="../../js/jquery-1.6.4.min.js"></script>
<script>
	function showDomainCost()
	{
            
                var domain = document.getElementById('domain').value;
                //alert(domain);
       
		var url='master_calc.php';
		url+="?domain_id=" + domain;
			//alert(url);
			$.getJSON( url, function( json ) {
				
                                document.getElementById('domain_cost').value = json.price;
                                //document.getElementById('loc_details').value = json.location_details;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
								//alert('Here-->'+json.price);	
					
			});	
	}
        
        function showSpaceCost()
	{
            
                var addi_space = document.getElementById('addi_space').value;
                //alert(addi_space);
       
		var url='additional_space.php';
		url+="?addi_space=" + addi_space;
			
			$.getJSON( url, function( json ) {
				
                                document.getElementById('addi_space_cost').value = json.price;
                                document.getElementById('addi_bndwdth').value = json.bandwidth;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
	}
        
         function showBndwdthCost()
	{
            
                var more_addi_bndwdth = document.getElementById('more_addi_bndwdth').value;
                //alert(addi_space);
       
		var url='additional_bndwdth.php';
		url+="?addi_bndwdth=" + more_addi_bndwdth;
			
			$.getJSON( url, function( json ) {
				
                                document.getElementById('bndwdth_cost').value = json.price;
                                //document.getElementById('addi_bndwdth').value = json.bandwidth;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
	}
        
         function showEmailCost()
	{
            
                var email = document.getElementById('email').value;
                //alert(addi_space);
       
		var url='email_price.php';
		url+="?email=" + email;
			
			$.getJSON( url, function( json ) {
				
                                document.getElementById('email_cost').value = json.price;
                                //document.getElementById('addi_bndwdth').value = json.bandwidth;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
	}
        
        function showPageCost()
	{
            
                var page = document.getElementById('page').value;
                //var total_page = document.getElementById('total_page').value;
                //alert(total_page);
       
		var url='ini_price.php';
		url+="?page_id=" + page;
			
			$.getJSON( url, function( json ) {
				
                                document.getElementById('ini_cost').value = json.price;
                                //document.getElementById('page_cost').value = json.bandwidth;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
	}
        
        
        function showTotalPageCost()
	{
            
                //var page = document.getElementById('page').value;
                var total_page = document.getElementById('total_page').value;
                //alert(total_page);
       
		var url='page_cost.php';
		url+="?total_page=" + total_page;
			
			$.getJSON( url, function( json ) {
				
                                //document.getElementById('ini_cost').value = json.price;
                                document.getElementById('page_cost').value = json.page_price;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
	}
        
        function selectAMC()
	{
            
                //var page = document.getElementById('page').value;
                var amc = document.getElementById('amc').value;
                //alert(total_page);
       
		var url='amc_cost.php';
		url+="?amc=" + amc;
			
			$.getJSON( url, function( json ) {
				
                                //document.getElementById('ini_cost').value = json.price;
                                document.getElementById('amc_cost').value = json.price;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
	}
        
         function viewTotalCost()
	{
            var check_addi_space = document.getElementById("check_addi_space");
            var check_addi_bndwdth = document.getElementById("check_addi_bndwdth");
            var check_admin_panel = document.getElementById("check_admin_panel");
                //var page = document.getElementById('page').value;
                var domain_cost = document.getElementById('domain_cost').value;
                var space_cost = document.getElementById('space_cost').value;
                if(check_addi_space.checked){
                    var addi_space_cost = document.getElementById('addi_space_cost').value;
                }else
                     {
                         var addi_space_cost = 0;
                     }
                 if(check_addi_bndwdth.checked){
                    var bndwdth_cost = document.getElementById('bndwdth_cost').value;
                 }else
                     {
                         var bndwdth_cost = 0;
                     }
                var email_cost = document.getElementById('email_cost').value;
                if(email_cost == "" ){
                    email_cost = 0;
                }
                var page_cost = document.getElementById('page_cost').value;
                if(page_cost == "" ){
                    page_cost = 0;
                }
                var ini_cost = document.getElementById('ini_cost').value;
                if(ini_cost == "" ){
                    ini_cost = 0;
                }
                if(check_admin_panel.checked){
                var admin_panel = document.getElementById('admin_panel').value;
                }else
                     {
                         var admin_panel = 0;
                     }
               
                var amc_cost = document.getElementById('amc_cost').value;
                if(amc_cost == "" ){
                    amc_cost = 0;
                }
                /*alert(domain_cost);
                alert(space_cost);
                alert(addi_space_cost);
                alert(bndwdth_cost);
                alert(email_cost);
                alert(page_cost);
                alert(ini_cost);
                alert(admin_panel);
                alert(amc_cost);*/
               
               
		var url='total_cost.php';
		url+="?domain_cost=" + domain_cost + "&space_cost=" + space_cost + "&addi_space_cost=" + addi_space_cost + "&bndwdth_cost=" + bndwdth_cost 
                    + "&email_cost=" + email_cost + "&page_cost=" + page_cost + "&ini_cost=" + ini_cost + "&admin_panel=" + admin_panel 
                    + "&amc_cost=" + amc_cost;
               // alert(url);
			
			$.getJSON( url, function( json ) {
				//alert(json.price);
                                //document.getElementById('ini_cost').value = json.price;
                                document.getElementById('total_cost').value = json.total_price;
                                //document.getElementById('hdf_loc_id').value = json.location_id;
					
					
			});	
        
        //var total = parseInt(domain_cost) + parseInt(page_cost);
        //document.getElementById('total_cost').value = total;
	}
        
        
        function showAddiSpace(){
        var check_addi_space = document.getElementById("check_addi_space");
        
        if(check_addi_space.checked){
            document.getElementById('spaceDiv').style.display = "block";
        } else {
            document.getElementById('spaceDiv').style.display = "none";
        }
    
    }
    
    
    function showAddiBndwdth(){
        var check_addi_bndwdth = document.getElementById("check_addi_bndwdth");
        
        if(check_addi_bndwdth.checked){
            document.getElementById('bndwdthDiv').style.display = "block";
        } else {
            document.getElementById('bndwdthDiv').style.display = "none";
        }
    
    }
    
    function showAdminPanel(){
        var check_admin_panel = document.getElementById("check_admin_panel");
        
        if(check_admin_panel.checked){
            document.getElementById('adminDiv').style.display = "block";
        } else {
            document.getElementById('adminDiv').style.display = "none";
        }
    
    }
</script>


<!--<link href="images_files/916e35d3-3f86-4def-a371-1e6beaf789cb.css" type="text/css" rel="stylesheet">-->
      
   <title> Our Services </title>
  <!-- <link type="text/css" href="images_files/ACvtr288-b_002.css" rel="stylesheet">-->
   <link type="text/css" href="../../images_files/ACvtr288-b.css" rel="stylesheet">
   
   <link type="text/css" href="../../css/deb_style.css" rel="stylesheet">
   
    <!--[if lt IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie6/css-min/AC:vtr288-b" rel="stylesheet"><![endif]--><!--[if IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie7/css-min/AC:vtr288-b" rel="stylesheet"><![endif]-->


	
<link href="../../css/screen.css" rel="stylesheet" type="text/css" media="screen" />
    
    </head>
    
    <body class="productpages Home flyout js-active">
    <div id="skipmenu"><a class="skip" href="#">Skip to content</a></div>
    <div id="container" class="skin-oneandone"><div id="header-container">
    <div id="header" class="clearfix"><a class="core_button_normal" href="../../index.php" id="button-hd-log-home"><img src="../../images_files/lg-1and1.png" alt="" class="logo" title="Logo" ></a>
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
         
         
         <div><form name="quotation" action="" method="post">
         <table width="800px" border="0" align="center" cellpadding="0" cellspacing="0">
         	
         
    	<tr>
        <td>
        <table width="800"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="10" align="center"><h1><b>Quotation for Web Development<b></h1></td>
        </tr>
        <tr>
            <td colspan="10" style="height:35px"></td>
        </tr>
        <tr>
            <td>Domain Registration:</td>
            <td></td>
         	<td colspan="2">&nbsp;</td>
            <td style="padding-left:5px;"><select name="domain" id="domain" onChange="showDomainCost()"><option>--Select One--</option>
                <?php
                    $querydomainselect = mysql_query("SELECT id,domain_name FROM domain")or die(mysql_error());
                    while($row = mysql_fetch_array($querydomainselect)){
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['domain_name'] ?></option>
                    <?php }?>
                </select></td>
            <td>&nbsp;</td>
            <td>Cost&nbsp;(Rs.):</td>
            <td></td>
            <td><input type="text" name="domain_cost" id="domain_cost" readonly="readonly"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Space :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <?php
                $queryselectspace = mysql_query("SELECT space,price FROM space_master")or die(mysql_error());
                $obspace = mysql_fetch_object($queryselectspace);
            ?>
            <td><input type="text" name="space" id="space" readonly="readonly" value="<?php echo $obspace->space ?>">&nbsp;MB</td>
            <td>&nbsp;</td>
            <td>Cost&nbsp;(Rs.):</td>
            <td></td>
            <td rowspan="2"><input type="text" name="space_cost" id="space_cost" readonly="readonly" value="<?php echo $obspace->price ?>"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Bandwidth:</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="text" name="bndwdth" id="bndwdth" readonly="readonly" value="<?php echo $obspace->space * 15 ?>">&nbsp;MB</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td style="padding-top:5px;"><input type="checkbox" name="check_addi_space" id="check_addi_space" onClick="showAddiSpace()"></td>
            <td>Require Additional Space</td>
            <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
         <tr>
            <td>&nbsp;</td>
          <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
    </table>
    </td>
    </tr>
        
            <tr>
            <td>
            <div id='spaceDiv' style="display:none ;">
            <table width="800"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Additional Space :</td>
                    <td width="45" colspan="3">&nbsp;</td>
                	<td><input type="text" name="addi_space" id="addi_space" onKeyUp="showSpaceCost()">&nbsp;MB</td>
                    <td>&nbsp;</td>
                    <td rowspan="2">Cost&nbsp;(Rs.) :</td>
                    <td>&nbsp;</td>
                    <td rowspan="2"><input type="text" name="addi_space_cost" id="addi_space_cost" readonly="readonly"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Bandwidth :</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="addi_bndwdth" id="addi_bndwdth" readonly="readonly">&nbsp;MB</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            </td>
            </tr>
            
        </div>
    	<tr>
        <td>
        <table  border="0" align="center" cellpadding="0" cellspacing="0" width="800">
		<tr>
            <td colspan="2" width="49">&nbsp;</td>
            
          	<td style="padding-top:5px;" width="25"><input type="checkbox" name="check_addi_bndwdth" id="check_addi_bndwdth" onClick="showAddiBndwdth()"></td>
            <td colspan="3">Require Additional Bandwidth</td>
          	<td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
</table>
</td>
</tr>
        
            <tr>
            <td>
            <div id='bndwdthDiv' style="display:none ;">
            <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Additional Bandwidth :</td>
                    <td width="23" colspan="3">&nbsp;</td>
                    <td><input type="text" name="more_addi_bndwdth" id="more_addi_bndwdth" onKeyUp="showBndwdthCost()">&nbsp;GB</td>
                    <td>&nbsp;</td>
                    <td>Cost&nbsp;(Rs.) :</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="bndwdth_cost" id="bndwdth_cost" readonly="readonly"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
        		</tr>
            </table>
            </td>
            </tr>
        
        </div>
    	<tr>
        <td>
        <table width="800"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="163">Enter No of Email&nbsp;(1 GB)&nbsp;(One Email Free) :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="text" name="email" id="email" onKeyUp="showEmailCost()"></td>
            <td width="4%">&nbsp;</td>
            <td>Cost&nbsp;(Rs.) :</td>
            <td>&nbsp;</td>
            <td><input type="text" name="email_cost" id="email_cost" readonly="readonly"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Select Web Page Type :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="padding-left:4px;"><select name="page" id="page" onChange="showPageCost()"><option value="">--Select One--</option>
            <?php
                    $querypageselect = mysql_query("SELECT id,type FROM page_master WHERE type_name='web page'")or die(mysql_error());
                    while($row1 = mysql_fetch_array($querypageselect)){
                ?>
                    <option value="<?php echo $row1['id'] ?>"><?php echo $row1['type'] ?></option>
                    <?php }?>
                    </select></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
       </tr>
       <tr>
            
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>No of Pages :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="text" name="total_page" id="total_page" onKeyUp="showTotalPageCost()"></td>
            <td>&nbsp;</td>
            <td>Cost&nbsp;(Rs.) :</td>
            <td>&nbsp;</td>
            <td><input type="text" name="page_cost" id="page_cost" readonly="readonly"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Initial Development Cost&nbsp;(Rs.) :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="text" name="ini_cost" id="ini_cost" readonly="readonly"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="checkbox" name="check_admin_panel" id="check_admin_panel" onClick="showAdminPanel()"></td>
            <td>&nbsp;</td>
            <td>Require Admin Panel</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    </td>
    </tr>
    
    
     <tr>
     <td>
     <div id='adminDiv' style="display:none ;">
     <table width="800"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="170">Admin Panel<br/>(Starting from Rs.)&nbsp;:</td>
            <td  colspan="3"></td>
            <?php
                $queryselectadmin = mysql_query("SELECT price FROM web_master WHERE type_name='admin panel'")or die(mysql_error());
                $obadmin = mysql_fetch_object($queryselectadmin);
            ?>
            <td><input type="text" name="admin_panel" id="admin_panel" value="<?php echo $obadmin -> price ?>" readonly="readonly"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    </td>
    </tr>
    
    </div>
    <tr>
    <td>
    <table width="800"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="190">Annual Maintenance Contract :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="261"><select name="amc" id="amc" onChange="selectAMC()"><option value="">--Select One--</option>
              <?php
                    $queryamcselect = mysql_query("SELECT id,type FROM web_master WHERE type_name='amc'")or die(mysql_error());
                    while($row2 = mysql_fetch_array($queryamcselect)){
                ?>
              <option value="<?php echo $row2['id'] ?>"><?php echo $row2['type'] ?></option>
              <?php }?>
              
            </select></td>
            <td>&nbsp;</td>
            <td>Cost&nbsp;(Rs.) :</td>
            <td>&nbsp;</td>
            <td><input type="text" name="amc_cost" id="amc_cost" readonly="readonly"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
        	
            <td colspan="5" align="right" style="position:relative; top:15px; float:right;"><input type="button" class="show" name="view_total" value="TOTAL COST" onClick="viewTotalCost()"></td>
           
            
            <td colspan="5" align="left" valign="top"><input type="text" name="total_cost" id="total_cost"></td>
           
            
        </tr>
    </table>
    </td>
    </tr>
    </table>
</form>
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