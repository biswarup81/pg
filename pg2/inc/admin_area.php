<?php include("inc/header.php");?>
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
}
</script>
<?php 
	if(isset($_POST['check'])){
		$visitor = $_POST['visitor'];
		
	}else{
?>
        <div class="body2" id="body2">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<select name="visitor" onchange="showUser(this.value)">
            	<option value=""> Please Select One</option>
                <?php
				$sql = "select * from visitors where label = 'false'";
				$r = mysql_query($sql) or die(mysql_error());
				while($d = mysql_fetch_array($r)){
				?>
                <option value="<?php echo $d['v_id']; ?>"><?php echo ucwords($d['name']);?></option>
                <?php } ?>
            </select>
            <input type="submit" name="check" value="Assign">
        </form>
        </div>
        <?php }?>
        
<?php include("inc/footer.php"); ?>