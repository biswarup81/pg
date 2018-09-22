<?php
include("config.php");
$vid = $_GET['v_id'];
$re_comment = $_GET['resolve_comment'];

//echo $vid . " ".$re_comment;

$query = "update visitors set resolved_comment = '".$re_comment."', label='resolved' ,
          resloved_date= NOW()  where v_id = '".$vid."'";
        
$result = mysql_query($query) or die(mysql_error());

if(mysql_affected_rows() > 0) {

    echo("SUCCESS");
    
} else {
    echo "ERROR OCCURED. TRY AGAIN";
    // header("location:details.php");
}
?>
