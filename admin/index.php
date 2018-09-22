<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Admin Login</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php

include("inc/db_connection.php");
$err = false;

if(isset($_POST['login'])){
$user_name = $_POST['user_name'];
$password = md5(trim($_POST['password']));

$sql = "select * from admin_user where admin_emil = '$user_name' and admin_password = '$password'";
$r = mysql_query($sql) or die(mysql_error());
$no = mysql_num_rows($r);

if($no > 0){
$_SESSION['email'] = $user_name;
echo "<script>location.href='home.php'</script>";
}
else{
$err = true;

}

}
?>

<body>
<div class="login_main">
	<div class="login_box">
		<div class="heading"><img src="img/admin.jpg" alt="" height="100" /></div>
		<?php if($err == true){ ?>
		<div class="worning">Username or Password does not match.</div>
		<?php } ?>
		<div class="login">
		<form action="" method="post">
			<table width="350" border="0" cellspacing="4" cellpadding="5" align="center">
			  <tr>
				<td>Email :</td>
				<td><input type="text" name="user_name" class="text" /></td>
			  </tr>
			  <tr>
				<td>Password</td>
				<td><input type="password" name="password" class="text" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="login" value="Login"  style="border:solid 1px #CCCCCC; padding:3px; cursor:pointer;"/></td>
			  </tr>
			</table>
		</form>
		</div>
	</div>
</div>
</body>
</html>

