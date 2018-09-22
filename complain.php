<?php session_start(); // this MUST be called prior to any output including whitespaces and line breaks!
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-US"><head>


<!--<link href="images_files/916e35d3-3f86-4def-a371-1e6beaf789cb.css" type="text/css" rel="stylesheet">-->
      
  <title>PG Infoservices</title>
  <!-- <link type="text/css" href="images_files/ACvtr288-b_002.css" rel="stylesheet">-->
   <link type="text/css" href="images_files/ACvtr288-b.css" rel="stylesheet">
   
   
   
    <!--[if lt IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie6/css-min/AC:vtr288-b" rel="stylesheet"><![endif]--><!--[if IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie7/css-min/AC:vtr288-b" rel="stylesheet"><![endif]-->


	
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript">
function backtoHome(){
    //alert('Back to home clicked');
    location.href="index.php";
}
</script>
    </head>
    
    <body class="productpages Home flyout js-active">
    <div id="skipmenu"><a class="skip" href="#">Skip to content</a></div>
    <div id="container" class="skin-oneandone"><div id="header-container">
    <div id="header" class="clearfix"><a class="core_button_normal" href="index.php" id="button-hd-log-home"><img src="images_files/lg-1and1.png" alt="" class="logo" title="Logo" ></a>
    <ul class="header-nav">
    <li class="header-nav-item header-nav-item-first"><span class="header-nav-text">Give us a Call: <span> +91.983.0875.590 </span></span></li>
     <li class="header-nav-item right"><a class="header-nav-text item-last" href="mailto:info@pginfoservices.com" id="button-hd-nav-contact">E-mail Us </a></li>
      </ul>
  <div class="main-nav-bar"></div></div></div>
          
          
          
          
          
          <div id="content" class="clearfix">
          <div id="iner-page-bg">
          <div id="iner-page-bg1" class="clearfix" style="min-height:610px;"><a class="skip-target" name="skip-to-content"></a>
          <div id="content-bottom-container">
          <div class="ct-marketingcontainer-a1 grid-16">
          
          
         <div class="inear-page"> 
         
<?php


$GLOBALS['DEBUG_MODE'] = 0;
// CHANGE TO 0 TO TURN OFF DEBUG MODE
// IN DEBUG MODE, ONLY THE CAPTCHA CODE IS VALIDATED, AND NO EMAIL IS SENT

?>
            
<?php

$GLOBALS['ct_recipient']   = 'info@pginfoservices.com'; // Change to your email address!
$GLOBALS['ct_msg_subject'] = 'Customer Query';

process_si_contact_form(); // Process the form, if it was submitted

if (isset($_SESSION['ctform']['error']) &&  $_SESSION['ctform']['error'] == true): /* The last form submission had 1 or more errors */ ?>
<!--<span class="error">There was a problem with your submission.  Errors are displayed below in red.</span><br /><br />-->
<?php elseif (isset($_SESSION['ctform']['success']) && $_SESSION['ctform']['success'] == true): /* form was processed successfully */ ?>
<span class="success">Thank You. Your request has been posted successfully. P.G Sales team will contact you shortly.</span><br /><br />
<a href="index.php"><span>Back to Home</span></a>
<?php endif; ?>


 

<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'] ?>" id="contact_form">
  <input type="hidden" name="do" value="contact" />

  
  
  <table width="650" border="0" cellpadding="2" cellspacing="6" align="center" style="margin:0 auto; clear:both; padding-top:20px;">   
              <tr>
                <td width="100">First Name :&nbsp; &nbsp;</td>
                <td width="340"><input type="text" name="f_name" id="f_name" style="width:300px; border:none; border:solid 1px #999"  
                           value="<?php echo htmlspecialchars(@$_SESSION['ctform']['f_name']) ?>"/></td>
                <td><?php echo @$_SESSION['ctform']['f_name_error'] ?></td>
              </tr>
              <tr>
                <td>Last Name :&nbsp; &nbsp;</td>
                <td><input type="text" name="l_name" id="l_name" style="width:300px; border:none; border:solid 1px #999" 
                           value="<?php echo htmlspecialchars(@$_SESSION['ctform']['l_name']) ?>"/></td>
                           <td><?php echo @$_SESSION['ctform']['l_name_error'] ?></td>
              </tr>
              <tr>
              	<td valign="top"><div style="margin-bottom:18px; float:left;">Address  :</div></td>
                <td><textarea name="address1" class="ta" id="address1" style="width:300px; border:none; border:solid 1px #999"><?php echo htmlspecialchars(stripslashes(trim(@$_SESSION['ctform']['address1']))) ?></textarea></td>
                <td>&nbsp;</td>
              </tr>
              
              <tr>
              	<td>Pin :</td>
                <td><input type="text" name="pin" id="pin" style="width:300px; border:none; border:solid 1px #999" 
                           value="<?php echo htmlspecialchars(@$_SESSION['ctform']['pin']) ?>"/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
              	<td>City :</td>
                <td><input type="text" name="city" id="city"  style="width:300px; border:none; border:solid 1px #999"
                           value="<?php echo htmlspecialchars(@$_SESSION['ctform']['city']) ?>"/></td>
                <td>&nbsp;</td>
              </tr>
              
              
              <tr>
              	<td>Mobile No :</td>
                <td><input type="text" name="mobile_no" id="mobile_no" style="width:300px; border:none; border:solid 1px #999"
                           value="<?php echo htmlspecialchars(@$_SESSION['ctform']['mobile_no']) ?>"/></td>
                <td>&nbsp;</td>
              </tr>
              
              <tr>
                <td>Email :&nbsp; &nbsp;</td>
                <td><input type="text" name="email" id="email" style="width:300px; border:none; border:solid 1px #999" 
                           value="<?php echo htmlspecialchars(@$_SESSION['ctform']['email']) ?>"/></td>
                <td><?php echo @$_SESSION['ctform']['email_error'] ?></td>
              </tr>
              <tr>
                <td valign="top"><div style="margin-bottom:50px; float:left;">Complain :</div></td>
                <td><textarea name="complain" rows="5" id="complain" cols="40" style="width:300px; border:none; border:solid 1px #999"><?php echo htmlspecialchars(stripslashes(trim(@$_SESSION['ctform']['complain']))) ?></textarea>
                </td>
                <td valign="top"><?php echo @$_SESSION['ctform']['message_error'] ?></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td>
                                              
                        <p>
                            &nbsp; &nbsp;
                            <img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="securimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left">
                            <object type="application/x-shockwave-flash" data="securimage/securimage_play.swf?audio_file=securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" height="32" width="32">
                            <param name="movie" value="securimage/securimage_play.swf?audio_file=securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000">
                            </object>
                            &nbsp;
                            <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onClick="document.getElementById('siimage').src = 'securimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="securimage/images/refresh.png" alt="Reload Image" onClick="this.blur()" align="bottom" border="0"></a><br />
                            <strong></strong>
                            <?php echo @$_SESSION['ctform']['captcha_error'] ?>
                            
                        </p>
                  </td> 
                <td><?php echo @$_SESSION['ctform']['captcha_error'] ?></td>
                  
              </tr>
              <tr>
              	<td>Enter Code :</td>
              	<td><input type="text" name="ct_captcha" size="12" maxlength="8" /></td>
              	<td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                  <td>
                      <input type="submit" value="Submit Now!" class="form-button">&nbsp;
                      <input type="button" value="Back to Home" class="form-button" onclick="backtoHome()">
                      
                  </td>
                  
                  <td></td>
                  
              </tr>
            </table>
            

           
        
  
  
</form>


</body>
</html>

<?php

// The form processor PHP code
function process_si_contact_form()
{
    include("pg/config.php");
     $_SESSION['ctform'] = array(); // re-initialize the form session data

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['do'] == 'contact') {
  	// if the form has been submitted
  	
    foreach($_POST as $key => $value) {
      if (!is_array($key)) {
      	// sanitize the input data
        if ($key != 'complain') $value = strip_tags($value);
        $_POST[$key] = htmlspecialchars(stripslashes(trim($value)));
      }
    }

        $f_name    = @$_POST['f_name'];    // name from the form
        $l_name   = @$_POST['l_name'];   // email from the form
        $address1     = @$_POST['address1'];     // url from the form
        $address2 = @$_POST['address2']; // the message from the form
        $pin    = @$_POST['pin'];    // name from the form
        $city   = @$_POST['city'];   // email from the form
        $state     = @$_POST['state'];     // url from the form
        $phone_no = @$_POST['phone_no']; 
        $mobile_no    = @$_POST['mobile_no'];    // name from the form
        $email   = @$_POST['email'];   // email from the form
        $complain     = @$_POST['complain'];     // url from the form
        $landmark = @$_POST['land_mark'];
        
        
        $captcha = @$_POST['ct_captcha']; // the user's entry for the captcha code
        $f_name    = substr($f_name, 0, 64);  // limit name to 64 characters
        $l_name    = substr($l_name, 0, 64);  // limit name to 64 characters

    $errors = array();  // initialize empty error array

    if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
      // only check for errors if the form is not in debug mode
      
      if (strlen($f_name) < 3) {
                // name too short, add error
                $errors['f_name_error'] = 'Your fisrt name is required';
            }  
            if (strlen($l_name) < 3) {
                // name too short, add error
                $errors['l_name_error'] = 'Your last name is required';
            }

            if (strlen($email) == 0) {
                // no email address given
                $errors['email_error'] = 'Email address is required';
            } else if ( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $email)) {
                // invalid email format
                $errors['email_error'] = 'Email address entered is invalid';
            }

            if (strlen($complain) < 20) {
                // message length too short
                $errors['message_error'] = 'Please enter a message';
            }
    }

    // Only try to validate the captcha if the form has no errors
    // This is especially important for ajax calls
    if (sizeof($errors) == 0) {
      require_once dirname(__FILE__) . '/securimage/securimage.php';
      $securimage = new Securimage();
      
      if ($securimage->check($captcha) == false) {
        $errors['captcha_error'] = 'Incorrect security code entered<br />';
      }
    }

    if (sizeof($errors) == 0) {
      //no error , save into database
            $sql = "insert into visitors(f_name,l_name,address1,address2,pin,city, 
                    state, phone_no, mobile_no, land_mark,email,text,label,date_added) 
                    values('".mysql_real_escape_string($f_name)."','".mysql_real_escape_string($l_name)."','
                        ".mysql_real_escape_string($address1)."','".mysql_real_escape_string($address2)."','".$pin."','".$city."',
                        '".$state."','".$phone_no."','".$mobile_no."','".mysql_real_escape_string($landmark)."','
                        ".$email."','".mysql_real_escape_string($complain)."','open',NOW())";
            
            mysql_query($sql) or die(mysql_error());

            $last_id = mysql_insert_id();
            $complain_no = getComplaint_no($last_id);
            
            mysql_query("update visitors set complain_no = '$complain_no' where v_id = '$last_id'") or die(mysql_error());


            // no errors, send the form
            $time       = date('r');
            $message = "<b>COMPLAINT NUMBER : $complain_no </b><br /><br />"
                     . "Name: $f_name $l_name<br />"
                     . "Email: $email<br />"
                     . "Contact Numbers: $phone_no | $mobile_no </br>"   
                     . "Address: $address1 - $address2. Pin - $pin </br>"   
                    
                     . "Message:<br />"
                     . "<pre>$complain</pre>"
                     . "<br /><br />IP Address: {$_SERVER['REMOTE_ADDR']}<br />"
                     . "Time: $time<br />"
                     . "Browser: {$_SERVER['HTTP_USER_AGENT']}<br />";

      if (isset($GLOBALS['DEBUG_MODE']) && $GLOBALS['DEBUG_MODE'] == false) {
      	// send the message with mail()
          
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=ISO-8859-1";
        $headers[] = "From: $f_name $l_name <$email>";
        $headers[] = "Cc: $email";
        $headers[] = "Cc: Manas Patra <manas.patra@pginfoservices.com>";
        $headers[] = "Cc: Moumita Jana <moumita.jana@pginfoservices.com>";
        $headers[] = "Cc: Moumita Jana <accounts@pginfoservices.com>";
        $headers[] = "Cc: Manas Patra <support@pginfoservices.com>";
        $headers[] = "Cc: Rajen Chakraborty <pginfo.sales1@gmail.com>";
        $headers[] = "Reply-To: {$email}";
        $headers[] = "Subject: [COMPLAINT NUMBER : ".$complain_no."]{$GLOBALS['ct_msg_subject']}";
        $headers[] = "X-Mailer: PHP/".phpversion();
        
        mail($GLOBALS['ct_recipient'], "[COMPLAINT NUMBER : ".$complain_no." :: OPEN ]", $message, implode("\r\n", $headers));
      }

      $_SESSION['ctform']['error'] = false;  // no error with form
      $_SESSION['ctform']['success'] = true; // message sent
    } else {
      
      $f_name    = @$_POST['f_name'];    // name from the form
        $l_name   = @$_POST['l_name'];   // email from the form
        $address1     = @$_POST['address1'];     // url from the form
        $address2 = @$_POST['address2']; // the message from the form
        $pin    = @$_POST['pin'];    // name from the form
        $city   = @$_POST['city'];   // email from the form
        $state     = @$_POST['state'];     // url from the form
        $phone_no = @$_POST['phone_no']; 
        $mobile_no    = @$_POST['mobile_no'];    // name from the form
        $email   = @$_POST['email'];   // email from the form
        $complain     = @$_POST['complain'];     // url from the form
        $landmark = @$_POST['land_mark'];  


      // save the entries, this is to re-populate the form
      $_SESSION['ctform']['f_name'] = $f_name;       // save name from the form submission
      $_SESSION['ctform']['l_name'] = $l_name;     // save email
      $_SESSION['ctform']['address1'] = $address1;         // save URL
      $_SESSION['ctform']['address2'] = $address2; // save message
      
      $_SESSION['ctform']['pin'] = $pin;       // save name from the form submission
      $_SESSION['ctform']['city'] = $city;     // save email
      $_SESSION['ctform']['state'] = $state;         // save URL
      $_SESSION['ctform']['phone_no'] = $phone_no; // save message
      
      $_SESSION['ctform']['mobile_no'] = $mobile_no;       // save name from the form submission
      $_SESSION['ctform']['email'] = $email;     // save email
      $_SESSION['ctform']['complain'] = $complain;         // save URL
      $_SESSION['ctform']['landmark'] = $landmark; // save message

      foreach($errors as $key => $error) {
      	// set up error messages to display with each field
        $_SESSION['ctform'][$key] = "<span style=\"font-weight: bold; color: #f00\">$error</span>";
      }

      $_SESSION['ctform']['error'] = true; // set error floag
    }
  } // POST
}
function getComplaint_no($a){
	$r = "PG-".date("d-m-y")."-".$a;
	return $r;
}
$_SESSION['ctform']['success'] = false; // clear success value after running
         
  ?>                
            </div></div></div></div>
              
              
              
              
              
              
              
              
              
              
              
              </div>
              
              
   <!--BEGIN footer-->         
              
  <div id="footer_container">

  <div class="sitemap-container clearfix1">
  <div class="footer">
  
  <div class="footer-left">
  <div class="block block-follow block-odd" id="block-follow-site">
  <div class="follow-links clearfix">
    <a href="#" class="follow-link follow-link-linkedin follow-link-site" title="Follow Centex Co. on LinkedIn">LinkedIn</a>
  <a href="#" class="follow-link follow-link-facebook follow-link-site" title="Follow Centex Co. on Facebook">Facebook</a>
  <a href="#" class="follow-link follow-link-twitter follow-link-site" title="Follow Centex Co. on Twitter">Twitter</a>
  </div>
  <div class="content">
    <p><strong>E-mail</strong>: <a href="#">info@pginfoservices.com</a><br>
Phone: <strong>+91.33.6540.2729</strong><br>
 &copy; 2012 <b>P. G. Infoservices</b> &nbsp;|&nbsp; <a href="#">Privacy Policy</a>
  </p></div>
  
  </div>
 </div>
 
 
 
 <div class="footer-midle">
 <div style="padding-left:8px;">  
 <b>Head Office</b><br>
AC-139 Prafulla Kanan (East),<br> Kolkata - 700 101, India.<br> M : +91.983.0875.590 </div>
</div>




 <div class="footer-right">
 <div class="copywright">
 <div style="padding-left:8px;">
 <b>Development Office</b><br>  35 Bose Pukur Road,<br> Kolkata - 700 042, India.<br>Ph : +91.33.6500.3045</div>
 

 
 
 
 </div>
 </div>
                
                
                
                </div>
                </div>
                  
                  </div>            
              
              
       <!--End of footer-->                       
              
              
              
              
              
              
              
              
              
              <!--[if lt IE 7]><script type="text/javascript" src="/xml/jasmin/get/120702-1216/hosting-ie6/js-min/AC:vtr288-b"></script><![endif]-->
</body></html>
<!-- GET_DOM: 11 HDL_DOC: 430 REX_DOC: 0 PRE_PROC: 1 -->