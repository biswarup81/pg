<?php include("inc/header.php");?>
<?php include("inc/check.php"); ?>
<script type="text/javascript">
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
</script>
<div class="body2" id="body2">
        <div style="width:100%; background:#CCF; padding:3px; margin-bottom:10px;">Resolved</div>
        <form action="close2.php" method="post" name="myform">
        <div id="resolved" style="margin:0px auto;">
        Resolved
        	
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
            
           
            
       
        </div>
        <div id="txtHint2"></div>
        
         </form>
        </div>
<?php include("inc/footer.php"); ?>