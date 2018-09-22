<?php 
include("inc/header.php");
function complain_no($a){
	$r = "PG-".date("d/m")."-".$a;
	return $r;
}
?>
<script>
function check(){
	//alert("Hi");
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var num = /^[0-9]$/;
	
	var f_name = document.getElementById('f_name').value;
	var l_name = document.getElementById('l_name').value;
	var address1 = document.getElementById('address1').value;
	var address2 = document.getElementById('address2').value;
	var pin = document.getElementById('pin').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var phone_no = document.getElementById('phone_no').value;
	var mobile_no = document.getElementById('mobile_no').value;
	var email = document.getElementById('email').value;
	var text = document.getElementById('text').value;
	var bb = typeof(pin);
	
	
	if(f_name == ""){
	alert('Please Insert First Name');
	return false;
	}else if(l_name == ""){
		alert('Please Insert Last Name');
		document.pg.f_name.focus();
		return false;
	}else if(address1 =="" && address2 == ""){
		alert("Give at least one address");
		return false;
	}else if(pin == ""){
		alert('Please give pin no');
		return false;
	}else if(pin != pin / 1){
		alert('Invalid Pin');
		return false;
	}else if(phone_no == "" && mobile_no == ""){
		alert('Give a contact number');
		return false;
	}else if(mobile_no != ""){
		if(mobile_no != mobile_no / 1){
			alert('Mobile Number should only number without any space');
			return false;
		}
	}else if(email == ""){
		alert('Please Insert email');
		return false;
	}
  // var address = document.forms[form_id].elements[email].value;
  else if(reg.test(email) == false) {
 
      alert('Invalid Email Address');
      return false;
   }else{
	   return true;
   }
}
</script>
        <?php if(isset($_POST['submit'])){
			$f_name = $_POST['f_name'];
			$l_name = $_POST['l_name'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$pin = $_POST['pin'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$phone_no = $_POST['phone_no'];
			$mobile_no = $_POST['mobile_no'];
			$landmark = $_POST['land_mark'];
			
			$email = $_POST['email'];
			$text = $_POST['text'];
			
			$sql = "insert into visitors(f_name,l_name,address1,address2,pin,city, state, phone_no, mobile_no, land_mark,email,text,label,date_added) values('$f_name','$l_name','$address1','$address2','$pin','$city','$state','$phone_no','$mobile_no','$landmark','$email','$text','false',NOW())";
			mysql_query($sql) or die(mysql_error());
			
			$last_id = mysql_insert_id();
			$complain_no = complain_no($last_id);
			mysql_query("update visitors set complain_no = '$complain_no' where v_id = '$last_id'") or die(mysql_error());
			
			
			echo "<div class='success'>Your Request has been successfully registered</div>";
			
		}else{
		?>
        <div class="body" id="body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="pg" onSubmit="return check()">
        	<table width="400" border="0" cellpadding="2" cellspacing="4" align="center">
              <tr>
                <td>First Name :</td>
                <td><input type="text" name="f_name" id="f_name" style="width:200px; border:none; border:solid 1px #999" /></td>
              </tr>
              <tr>
                <td>First Name :</td>
                <td><input type="text" name="l_name" id="l_name" style="width:200px; border:none; border:solid 1px #999" /></td>
              </tr>
              <tr>
              	<td>Address 1 :</td>
                <td><textarea name="address1" class="ta" id="address1"></textarea></td>
              </tr>
              <tr>
              	<td>Address 2 :</td>
                <td>
                <textarea name="address2" class="ta" id="address2"></textarea>
                </td>
              </tr>
              <tr>
              	<td>Pin :</td>
                <td><input type="text" name="pin" id="pin" /></td>
              </tr>
              <tr>
              	<td>City :</td>
                <td><input type="text" name="city" id="city" /></td>
              </tr>
              <tr>
              	<td>State :</td>
                <td>
                <select name="state" id="state">
                	<option value="WB">West Bengal</option>
                </select>
                </td>
              </tr>
              <tr>
              	<td>Phone No:</td>
                <td><input type="text" name="phone_no" id="phone_no" /></td>
              </tr>
              <tr>
              	<td>Mobile No :</td>
                <td><input type="text" name="mobile_no" id="mobile_no" /></td>
              </tr>
              <tr>
              	<td>Land Mark :</td>
                <td><input type="text" name="land_mark" /></td>
              </tr>
              <tr>
                <td>Email :</td>
                <td><input type="text" name="email" id="email" style="width:200px;" /></td>
              </tr>
              <tr>
                <td valign="top">Complain :</td>
                <td><textarea name="text" rows="9" id="text" cols="40"></textarea></td>
              </tr>
              <tr>
                <td><input type="reset" value="Refresh"  style="border:none; border:solid 1px #999; cursor:pointer;"/></td>
                <td><input type="submit" name="submit" value="Save" style="border:none; border:solid 1px #999; cursor:pointer;" /></td>
              </tr>
            </table>
        </form>
        </div>
        <?php } ?>
<?php include("inc/footer.php"); ?>