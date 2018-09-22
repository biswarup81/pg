<?php include("header.php"); ?>
<!-- end top -->

<!-- start middle -->
<div class="middle">
<div align="center" style="padding-top:20px;">
<div class="body2" id="body2">

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
 </div></div>
 <?php include("footer.php"); ?>