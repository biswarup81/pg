<?php include("inc/header.php");?>

<script type="text/javascript">
<!--

function validate_form( )
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	var f_name = document.getElementById('f_name').value;
	var l_name = document.getElementById('l_name').value;
	var email = document.getElementById('email').value;
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var c_password = document.getElementById('c_password').value;
  // alert("Hi");
   if(f_name == ""){
	   alert("First Name should not be blank");
	   return false;
   }else if(l_name == ""){
	   alert("Last Name should not be blank");
	   return false;
   }else if(email == ""){
	   alert("Email should not be blank");
	   return false;
   }else if(reg.test(email) == false){
	   alert("Enter valid Email Id");
	   return false;
   }else if(username == ""){
	   alert("Username should not be blank");
	   return false;
   }else if(password == ""){
	   alert("Please give a password");
	   return false;
   }else if(c_password == ""){
	   alert("Please enter the confirm password");
	   return false;
   }else if(password !== c_password){
	   alert("Confirm password not matching");
	   return false;
   }else{
   return true;
   }
}

//-->
</script> 
   
<?php
if(isset($_POST['submit'])){
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5(trim($_POST['password']));
	$c_password = $_POST['c_password'];
	$date = date("Y-m-d");
	
	if($f_name == ""){
	}else{
	$sql = "insert into admin(f_name,l_name,email,username,password,status,date_added) values('$f_name','$l_name','$email','$username','$password','2','$date')";
	mysql_query($sql) or die(mysql_error());
	echo "<div class='success'>Your are registerd successfully </div>";
	}
}else{
?>
        <div class="body2" id="body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="myform" name="myform" onSubmit="return validate_form( );">
        	<table width="400" border="0" cellpadding="2" cellspacing="4">
              <tr>
                <td>First Name :</td>
                <td><div id='myform_f_name_errorloc' class="error_strings"></div><input type="text" name="f_name" id="f_name" /></td>
              </tr>
              <tr>
                <td>Last Name :</td>
                <td><input type="text" name="l_name" id="l_name" /></td>
              </tr>
              <tr>
                <td>Email :</td>
                <td><input type="text" name="email" id="email" /></td>
              </tr>
              <tr>
                <td>Username :</td>
                <td><input type="text" name="username" id="username" /></td>
              </tr>
              <tr>
                <td>Password :</td>
                <td><input type="password" name="password" id="password" /></td>
              </tr>
              <tr>
                <td>Confirm Password :</td>
                <td><input type="password" name="c_password" id="c_password" /></td>
              </tr>
              <tr>
              	<td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><input type="reset" value="Refresh" style="border:none; border:solid 1px #999; cursor:pointer;" /></td>
                <td><input type="submit" name="submit" value="Save" style="border:none; border:solid 1px #999; cursor:pointer;" /></td>
              </tr>
            </table>
        </form>
        </div>
 <?php  } ?>       
<?php include("inc/footer.php"); ?>