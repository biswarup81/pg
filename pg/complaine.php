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

var aa = document.getElementById('assigned_to').style.display = "inline";
document.getElementById('assign').style.display = "none";
document.getElementById('assign_sub').style.display = "inline";
}


function assignto(){
	//alert("Hi");
	//alert(b);
	if(document.getElementById('assigned_to').value == ""){
		alert("Please select assign to");
		return false;
	}else{
		return true;
	}
}
</script>
<?php 
	if(isset($_POST['check'])){
		$visitor = $_POST['visitor'];
		$assigned_to = $_POST['assigned_to'];
                $assigned_by = $_SESSION['id1'];
                
                
                
                $query2 = "select * from visitors where v_id = '$visitor'";
                
                $result = mysql_query($query2) or die(mysql_error());
                $complain_no = "";
                while($rs = mysql_fetch_array($result)){
                    $complain_no = $rs['complain_no'];
                }
                
		$sql = "update visitors set label = 'assign', 
                    assigned_date = NOW(),assigned_by = ".$_SESSION['id1'].", 
                        assigned_to = '$assigned_to' where v_id = '$visitor'";
		mysql_query($sql) or die(mysql_error());
		
		/*================================= FOR MAIL =========================================*/
			$r_at = mysql_query("select * from admin where admin_id = '$assigned_to'") or die(mysql_error());
			$d_at = mysql_fetch_array($r_at) or die(mysql_error());
			
			$to  = $d_at['email'] . ', ';
                        
                        $r_at1 = mysql_query("select * from admin where admin_id = '$assigned_by'") or die(mysql_error());
			$d_at1 = mysql_fetch_array($r_at1) or die(mysql_error());
			
			$from  = $d_at1['email'] . ', ';
			
			$subject = 'A Job Assigned form Admin';
			$message = ' A new job has assigned from admin, please check your assigned job. http://pginfoservices.com/pg/login.php';
			
			 $headers   = array();
                        $headers[] = "MIME-Version: 1.0";
                        $headers[] = "Content-type: text/html; charset=ISO-8859-1";
                        $headers[] = "From: $from";
                        
                        $headers[] = "Cc: Manas Patra <manas.patra@pginfoservices.com>";
                        $headers[] = "Cc: Moumita Jana <moumita.jana@pginfoservices.com>";
                        $headers[] = "Cc: Moumita Jana <accounts@pginfoservices.com>";
                        $headers[] = "Cc: Manas Patra <support@pginfoservices.com>";
                        $headers[] = "Cc: Rajen Chakraborty <pginfo.sales1@gmail.com>";
                        $headers[] = "Reply-To: {$from}";
                        $headers[] = "Subject: [COMPLAINT NUMBER : ".$complain_no." :: ASSIGNED ]";
                        $headers[] = "X-Mailer: PHP/".phpversion();
			
			// Additional headers
			//$headers .= 'To: '.$d_at['f_name'] .' '.$d_at['l_name']. "\r\n";
			
			mail($to, "[COMPLAINT NUMBER : ".$complain_no." :: ASSIGNED ]", $message, implode("\r\n", $headers));
		/*================================== END MAIL ========================================*/
		
		echo "<div class='success'>Your have assigned successfully </div>";
		
	}
?>
<div class="body2" id="body2">
        <div style="width:100%; background:#CCF; padding:3px; margin-bottom:10px;">New</div>
        
        <div id="complain" style="margin:10px auto; display:inline;">
        New
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return assignto()">
        	<select name="visitor" onChange="showUser(this.value)">
            	<option value=""> Please Select One</option>
                <?php
				$sql = "select * from visitors where label = 'open'";
				$r = mysql_query($sql) or die(mysql_error());
				while($d = mysql_fetch_array($r)){
				?>
                <option value="<?php echo $d['v_id']; ?>"><?php echo $d['complain_no'];?></option>
                <?php } ?>
            </select>
            
            <select name="assigned_to" id="assigned_to" style="display:none;">
            	<option value=""> - Select One Person - </option>
                <?php 
				$r2 = mysql_query("select * from admin where status = '2'") or die(mysql_error());
				while($d2 = mysql_fetch_array($r2)){
				?>
                <option value="<?php echo $d2['admin_id'];?>"><?php echo $d2['f_name']." ".$d2['l_name']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="check" value="Assign" id="assign_sub" style="display:none; width:60px;">
            <input type="button" id="assign" value="Assign" style="cursor:pointer; width:60px;" onClick="whome()" />
        </form>
        </div>
        <div id="txtHint"></div>
        </div>
<?php include("inc/footer.php"); ?>