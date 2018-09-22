<?php include("inc/header.php");?>
<script>
function check(){
	if(document.add_gov.name.value == ""){
		alert("Please Insert Name");
		return false;
	}/*else if(document.add_gov.designation.value == ""){
		alert("Please Insert Designation");
		return false;
	}*/else if(document.add_gov.categori.value == ""){
		alert("Please Select One Category");
		return false
	}else{
		return true;
	}
	}
</script>
<?php
if(isset($_POST['save'])){
	$name = trim($_POST['name']);
	$designation = trim($_POST['designation']);
	$categori = $_POST['categori'];
	$qualification = $_POST['qualification'];
	
	$sql = "insert into governing_body (name, designation, category, qualification, date_added) values('$name','$designation', '$categori', '$qualification', NOW())";
	mysql_query($sql) or die(mysql_error());
	
	echo '<div style="width:200px; height:35px; border:solid 1px #87EA79; color:#090; background:#E2FCE8; margin:40px auto; text-align:center; line-height:35px;">Member Added successfully<br><a href="add_member.php">Add Another</a></div>';
}else{
?>

<form action="" method="post" name="add_gov" onsubmit="return check()">
<table border="0" align="center" style="margin-top:40px;">
  <tr>
    <td>Name :</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td>Designation :</td>
    <td><input type="text" name="designation" /></td>
  </tr>
  <tr>
    <td>Categori :</td>
    <td>
    <select name="categori">
    	<option value=""> -- Please Select One -- </option>
        <option value="Governing_Body">Governing Body</option>
        <option value="Advisory_Committee">Advisory Committee</option>
        <option value="Faculty_Members">Faculty Members</option>
        <option value="Office_Members">Office Members</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Qualification : </td>
    <td><input type="text" name="qualification" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="save" value="Save" /></td>
  </tr>
</table>
</form>

<?php } include("inc/footer.php"); ?>