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

}

function resolveCall(){
    var resolve_comment = document.getElementById("resolve_comment").value;
    var v_id = document.getElementById("v_id").value;
    //alert(resolve_comment );
    //alert(v_id);
   
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
        if(xmlhttp.responseText == 'SUCCESS'){
            var objback = document.getElementById('backbutton');
            
            alert('Issue is resolved')
            
            //alert(objback);
            objback.click();
            
        } else {
            alert(xmlhttp.responseText);
        }
        }
    }
        xmlhttp.open("GET","resolve_comment.php?resolve_comment="+resolve_comment+"&v_id="+v_id,true);
        xmlhttp.send();
   
    
}
</script>
<?php 
$id = $_GET['v_id'];
$sql = "select * from visitors where v_id = '$id'";
$r = mysql_query($sql) or die(mysql_error());
$d = mysql_fetch_object($r);

$compalin_date = strtotime($d->date_added);
$assign_date = strtotime($d->assigned_date);
$resolved_date = strtotime($d->resloved_date);
$closed_date = strtotime($d->closed_date);

$assigned = $d->assigned_by;
$rr = mysql_query("select * from admin where admin_id = '$assigned'") or die(mysql_error());
$dd = mysql_fetch_array($rr);

$assigned_to = $d->	assigned_to;
$rrr = mysql_query("select * from admin where admin_id = '$assigned_to'") or die(mysql_error());
$ddd = mysql_fetch_object($rrr);
?>

<div class="body2" id="body2">

	<div>
        <input type="hidden" id="v_id" name="v_id" value="<?php echo $id ?>" />
    	<table width="95%" border="0">
          <tr>
            <td>Name</td>
            <td><?php echo $d->f_name." ".$d->l_name; ?></td>
          </tr>
          <tr>
            <td>Complain No :</td>
            <td><?php echo $d->complain_no; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $d->email;?></td>
          </tr>
          <tr>
            <td>Address 1 :</td>
            <td><?php echo $d->address1;?></td>
          </tr>
          <tr>
            <td>Adddress 2 :</td>
            <td><?php echo $d->address2;?></td>
          </tr>
          <tr>
            <td>Pin :</td>
            <td><?php echo $d->pin;?></td>
          </tr>
          <tr>
            <td>City :</td>
            <td><?php echo $d->city;?></td>
          </tr>
          <tr>
            <td>State :</td>
            <td><?php echo $d->state;?></td>
          </tr>
          <tr>
            <td>Phone No :</td>
            <td><?php echo $d->phone_no;?></td>
          </tr>
          <tr>
            <td>Mobile No :</td>
            <td><?php echo $d->mobile_no;?></td>
          </tr>
          <tr>
            <td>Land Mark :</td>
            <td><?php echo $d->land_mark;?></td>
          </tr>
          <tr>
            <td>Complain :</td>
            <td><?php echo $d->text;?></td>
          </tr>
          <tr>
            <td>Complanin Date :</td>
            <td><?php echo date("d/m/Y H:i",$compalin_date);?></td>
          </tr>
          <tr>
            <td>Assign Date :</td>
            <td><?php echo date("d/m/Y H:i",$assign_date);?></td>
          </tr>
          <tr>
            <td>Assigned By :</td>
            <td><?php echo $dd['f_name']." ".$dd['l_name'];?></td>
          </tr>
          <tr>
            <td>Assigned To :</td>
            <td><?php echo $ddd->f_name." ".$ddd->l_name;?></td>
          </tr>
          <tr>
            <td>Resolved Date :</td>
            <td><?php echo date("d/m/Y H:i",$resolved_date);?></td>
          </tr>
		   <tr>
            <td>Resolved Comments :</td>
            <td><?php echo $d->resolved_comment; ?></td>
          </tr>
          <tr>
            <td>Closed Date :</td>
            <td><?php echo date("d/m/Y H:i",$closed_date);?></td>
          </tr>
		 
		  <tr>
            <td>Closed Comment :</td>
            <td><?php echo  $d->closed_comment; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>Provide Resolve Comment</td>
            <td><textarea id="resolve_comment" name="resolve_comment" rows="2" cols="100"></textarea></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td><input type="button" id="backbutton" onclick="javascript: history.go(-1)" value="<< Back"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            
            <td>
              <input type="button" value="Resolve" onclick="resolveCall()">
            </td>
          </tr>
          
          
        </table>
        <div><!--<input type="button" name="" value="Reopen" onclick="location.href='close.php?id=<?php //echo $d->v_id;?>&key=reopen'" />-->
        <!--<a href="reopen.php?v_id=<?php //echo $d->v_id;?>">Reopen</a>-->
        </div>
    </div>
</div>

<?php include("inc/footer.php"); ?>
