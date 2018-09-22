<?php include("header.php"); ?>
<!-- end top -->

<!-- start middle -->
<div class="middle">
<div align="center" style="padding-top:20px;">
<?php 
	$err = "";
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5(trim($_POST['password']));
		
		$sql = "select * from admin where username = '$username' and password = '$password'";
		$result = mysql_query($sql) or die(mysql_error());
		$no = mysql_num_rows($result);
		if($no > 0){
			$d = mysql_fetch_array($result);
			$_SESSION['id'] = $d['admin_id'];
			if($d['status'] == 1){
			echo "<script>location.href='complaine.php'</script>";
			}else if($d['status'] == 2){
			echo "<script>location.href='member_area.php'</script>";
			}
		}
		else{
		$err = "Ueername of Password does not match";
	}
	}
?>
<div class="body2" id="body2">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<table width="450" border="0" cellpadding="2" cellspacing="4">
              <tr>
                <td colspan="2"><?php if(!empty($err)){ ?><div class='no-result'><?php echo $err; ?></div><?php } ?></td>
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
                <td>&nbsp;</td>
                <td><input type="submit" name="login" value="Login" /></td>
              </tr>
            </table>
        </form>
        </div>
 </div></div>
 <?php include("footer.php"); ?>