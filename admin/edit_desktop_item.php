<?php include("inc/header.php");?>


<style type="text/css"> 
		/* Undo some styles from the master stylesheet */
		.checklist li { background: none; padding-left: 0; }
		
		/* CSS for checklists */
		.checklist {
			border: 1px solid #ccc;
			list-style: none;
			height: 1em;
			overflow: auto;
			width: 10em;
		}
		.checklist, .checklist li { margin: 0; padding: 0; }
		.checklist label { display: block; padding: 0 0.2em 0 25px; text-indent: -25px; }
		.checklist label:hover, .checklist label.hover { background: #777; color: #fff; }
		* html .checklist label { height: 1%; }
	</style> 
    
    		<script type="text/javascript">
               
				
				
				
				
				function test(i)
				{
					//alert(i.value);
					if(i.value==null)
					{
						document.getElementById('updatestyleqty').value=0
					}
					else
					{
						document.getElementById('updatestyleqty').value=i.value;
						//alert(document.getElementById('updatestyleqty').value);
					}
				}
				
				function _add(straction)
				{
					alert (straction);
					//if(document.getElementById('txtaddqty').value=='')
					//{
						//alert ('Please entar quantity');
						//document.getElementById('ajaxDivmessage').innerHTML="";
						//document.getElementById('ajaxDivmessage').innerHTML="Please entar quantity";
						//document.getElementById('txtaddqty').focus();
						//return false;
					//}
					
					//else
					//{
								 var ajaxRequest;  // The variable that makes Ajax possible!
	
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
									// Create a function that will receive data sent from the server
									ajaxRequest.onreadystatechange = function(){
										if(ajaxRequest.readyState == 4){
											var ajaxDisplay = document.getElementById('ajaxDivAdd');
											ajaxDisplay.innerHTML = ajaxRequest.responseText;
												
											//alert(ajaxRequest.responseText);
											
										}
									};
									
									
								
									//alert (itemid);
								  var strItem=document.getElementById('cmbItem').value;
                                                                  alert (strItem);
							  		//var strqty=document.getElementById('txtaddqty').value;
									var styleid="<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'] ;}?>";
									
									var queryString = "?itemid=" + strItem+"&action="+straction+"&styleid="+styleid;
									
									ajaxRequest.open("GET", "ajax.php" + queryString, true);
									ajaxRequest.send(null); 
									
							 		 //document.getElementById('txtUnitname').value="";
							 		// document.getElementById('txtItemdesc').value="";
								}
							//}
				
				
				
                </script>
                <script type="text/javascript">
				function _validation(straction,id)
				{
					
					//alert (straction+id);
					
					if(document.getElementById('txtStylename').value=='')
					{
						alert ('Please entar an style name');
						document.getElementById('ajaxDivmessage').innerHTML="Please entar an style name";
						
						document.getElementById('txtStylename').focus();
						return false;
					}
					
					else
					{
                                            //alert('inside');
								 var ajaxRequest;  // The variable that makes Ajax possible!
	
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
									// Create a function that will receive data sent from the server
									ajaxRequest.onreadystatechange = function(){
										if(ajaxRequest.readyState == 4){
											var ajaxDisplay1 = document.getElementById('ajaxDivmessage');
											var ajaxDisplay2 = document.getElementById('ajaxDivAdd');
											var n=ajaxRequest.responseText.split("@");
                                                                                        //alert(n);
                                                                                        //if(n.lenghth>0)
                                                                                            //{
											//alert(n[0]);
											//alert(n[1]);
                                                                                       // alert(n[2]);
                                                                                       try
                                                                                       {
                                                                                           ajaxDisplay1.innerHTML = n[0];
                                                                                       }
                                                                                       catch(e)
                                                                                       {
                                                                                           ajaxDisplay1.innerHTML="";
                                                                                       }
											try
                                                                                        {
                                                                                            ajaxDisplay2.innerHTML = n[1];
                                                                                        }
											catch(e)
                                                                                        {
                                                                                            ajaxDisplay2.innerHTML="";
                                                                                        }
                                                                                        try
                                                                                        {
                                                                                            document.getElementById('txtStylename').value=n[2];
                                                                                        }
                                                                                        catch(e)
                                                                                        {
                                                                                            document.getElementById('txtStylename').value="";
                                                                                        }
											
											//alert(ajaxRequest.responseText);
                                                                                              // }
											
										}
									};
					}
									
									var chk_arr =  document.getElementsByName("chkItem[]");
									//var txtitemqty =  document.getElementsByName("txtitemqty[]");
									
									var itemid=[];
									//var itemqty=[];
									var chklength = chk_arr.length;             
									var iCount=0;
									for(i=0;i< chklength;i++)
									{
										if(chk_arr[i].checked ==true)
										{
											//if(txtitemqty[i].value!='')
											//{
											itemid.push(chk_arr[i].value);
											
											//itemqty.push(txtitemqty[i].value);
											//alert (itemqty);
											iCount+=1;
											//}
											//else
											//{
												//document.getElementById('ajaxDivmessage').innerHTML="Enter quantity for the selected item";
												//alert ('Enter quantity for the selected item');
												//return false;
											//}
										}
										else
										{
											
										}
										
									} 
									
									if(iCount>=1)
								{
									 var strstylename=document.getElementById('txtStylename').value;
							  		//var strItemdesc=document.getElementById('txtItemdesc').value;
									
									if(straction=='save_style')
									{
									var queryString = "?stylename=" + strstylename+"&itemid="+itemid+"&action="+straction;
									}
									else if(straction=='update_style')
									{
										//var aupdate=document.getElementsByName('aUpdate');
										//var itemidupdate=document.getElementById('aUpdate'+id).value;
										var itemqtyupdate=document.getElementById('updatestyleqty').value;
										//alert (itemqtyupdate);
										var queryString = "?stylename=" + strstylename+"&action="+straction+"&itemqty="+itemqtyupdate+"&styleid="+id+"&sid="+"<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'] ;}?>";
										//alert(queryString);
									}
									else if(straction=='delete_styledetails')
									{
										var istyledid=document.getElementById('aDeletestyledetails').value;
										
										var queryString = "?action="+straction+"&styledid="+id+"&styleid="+"<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'] ;}?>";
										//alert (straction);
									}
									//alert (queryString );
									var url = "ajax.php"+queryString;
									//alert(url);
									ajaxRequest.open("GET", url, true);
									ajaxRequest.send(null); 
									document.getElementById('txtStylename').value="";
									/*for(i=0;i< chklength;i++)
									{
										chk_arr[i].checked ==false;
										
										txtitemqty[i].value=='';
											
											
									}*/
									
								}
								else
								{
									document.getElementById('ajaxDivmessage').innerHTML="No item selected,select atlist one item.";
									//alert ('No item selected,select atlist one item.');
									return false;
								}
					return false;
				}
				
				</script>
                                
<script type="text/javascript">
    
    function deleteItem(itemId){
    
    alert(itemId);
    var ajaxRequest;  // The variable that makes Ajax possible!
	
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
    
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            var ajaxDisplay1 = document.getElementById('ajaxDivmessage');
            var ajaxDisplay2 = document.getElementById('ajaxDivAdd');
            var n=ajaxRequest.responseText.split("@");
            //alert(n);
            //if(n.lenghth>0)
                //{
            //alert(n[0]);
            //alert(n[1]);
            // alert(n[2]);
            try
            {
                ajaxDisplay1.innerHTML = n[0];
            }
            catch(e)
            {
                ajaxDisplay1.innerHTML="";
            }
            try
            {
                ajaxDisplay2.innerHTML = n[1];
            }
            catch(e)
            {
                ajaxDisplay2.innerHTML="";
            }
        };
        var queryString = "?action=DELETE_ITEM&styleid="+itemId;
									
        var url = "ajax.php"+queryString;
        //alert(url);
        ajaxRequest.open("GET", url, true);
}


</script>
                <script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode

			if (unicode!=8)
			{ //if the key isn't the backspace key (which we should allow)
			if(unicode==46)
			{
				return true
			}
			if (unicode<48||unicode>57) //if not a number
			return false //disable key press
			}
}

  </script>
<script type="text/javascript">
    function _cleare()
    {
        window.location.href="choose_product1.php";
    }
</script>
    
</head>

<body>

<?php //include('header.php') ?>
<?php //include('menu.php') ?>	


<form id="frmstylemaster" method="get" onsubmit="return false;">

		
        <div id="ajaxDivmessage">
        </div>
    
    
        <div id="ajaxDiv">
            <table width="90%" align="center" style="margin-top:20px; border:solid 1px #666;">

                <?php
                    $n = 0;
                    $r=mysql_query("SELECT * FROM desktops");
                    while($row=mysql_fetch_array($r))
                    {
                        $n++;
                        $t = $n%2; if($t==1){$c = "odd";}else{ $c = "even";}
                        echo"<tr>";

                            echo"<td width='450px' class='$c'>".$row['description']."</td>";
                            echo"<td class='$c'><a href='edit_desktop_item.php?id=".$row['dskt_id']."'>Edit</td>";
                        echo"</tr>";
                                }


                ?>
            </table>
        </div>
       
  <table width="90%" align="center" style="margin-top:20px; border:solid 1px #666;">
  <?php
			if(isset($_REQUEST['id']))
				{	
				//echo 'hi';
				$stylenameq=mysql_query("select description from desktops where dskt_id=".$_REQUEST['id']."");
				$stylenamw=mysql_fetch_row($stylenameq);
                                $disabled="disabled";
				
			
				?>
  
  <tr>
    <td colspan="3">Style Name : <b><?php if(isset($stylenamw)){ if(count($stylenamw)>0){echo  $stylenamw[0];}} ?></b>
  <input type="hidden" id="txtStylename" value="<?php if(isset($stylenamw)){ if(count($stylenamw)>0){echo  $stylenamw[0];}} ?>"/></td>
  </tr>
   <?php } ?>                 
                   
   
  
  <tr>
    <td colspan="3">
   <div id="ajaxDivAdd"> 
       <table>
					
    			<?php
			if(isset($_REQUEST['id']))
				{	
				//echo 'hi';
				
			//	echo  $stylenamw[0];
			
					$getq=mysql_query("SELECT * FROM desktop_item where dskt_id=".$_REQUEST['id']."");
					//$getdata=mysql_fetch_row($getq);
				
					// run through the results from the database, generating the checkboxes
					while ($row = mysql_fetch_assoc($getq))
                                        {
					
					echo "<tr>";
					
					 echo "<td width='50'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'></td>";
                                         echo "<td width='200'>{$row['product']} </td>";
   					/* echo "<td><input name='txtitemqty[]' type='text' id='".$row['item_id']."' value='{$row['style_qty']}' onkeyup='test(this)' />
					 <input type='hidden' value='".$row['style_qty']."' name='updatestyleqty' id='updatestyleqty'/> ".$row['unt_name']."  
					 </td>";*/
					 /*echo "<td><input type='button'  id='".$row['dskt_item_id']."'  onclick=_validation('update_style','".$row['dskt_item_id']."') value='Update'></input>
					 <input type='hidden' value='".$row['dskt_item_id']."' name='aUpdate".$row['dskt_item_id']."' id='aUpdate".$row['dskt_item_id']."'/>
					 </td>";*/
					echo "<td><input type='button' onclick=_validation('delete_styledetails','".$row['dskt_item_id']."') value='Delete'></input>
					<input type='hidden' value='".$row['dskt_item_id']."' name='aDeletestyledetails' id='aDeletestyledetails'/>
					</td>";
				
					 
					   echo "</tr>";
					
					}
					
					
					
				}
			
				?>
  </table>            
   </div>
    
   
  <?php
			if(isset($_REQUEST['id']))
				{
  echo"<tr>";
  	echo"<td>";
    		
        echo "<select name='cmbItem' id='cmbItem'>";
		
        $query="SELECT SEQ_NUM,PRODUCT_NAME, PRODUCT_TYPE from PRODUCTS ORDER BY PRODUCT_TYPE";
        $result = mysql_query($query);
        while($query_data = mysql_fetch_array($result))
        {
       
        
       echo" <option value='".$query_data["SEQ_NUM"]."'>". $query_data["PRODUCT_TYPE"]. ' - ' . $query_data["PRODUCT_NAME"] ."</option>";
        } 
		
	  echo"</select>";
      
				
             
      echo"<td>";
echo    "<input type='button' name='btnAdd' id='btnAdd' value='Add' onclick=_add('add_item_when_edit') />";
    echo"</td>";
			
  echo"</td>";
    
  echo"</tr>";
  
  }
  ?>
  </table>
</form>


				
					
					


</body>
</html>