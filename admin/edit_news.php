<?php
include("inc/header.php");
$id = $_GET['id'];

if(isset($_POST['save'])){
	$headline = $_POST['headline'];
	$session = $_POST['session'];
	$body = $_POST['body'];
	$id = $_POST['id'];
	$type = $_POST['type'];
	
	$file_name = $_FILES['attach']['name'];
	$file_path = "uploads/".$type."_".time().$file_name;
	
	
	if($file_name <> ""){
	$rr = mysql_query("select file_path from top_news where news_id = '$id'") or die(mysql_error());
	$dd = mysql_fetch_object($rr);
	unlink($dd->file_path);
	mysql_query("update top_news set news_heading = '$headline',
									session = '$session',
									file_path = '$file_path',
									type = '$type',
									news_body = '$body' where news_id = '$id'") or die(mysql_error());
	move_uploaded_file($_FILES['attach']['tmp_name'],$file_path);
	}else{
		
	mysql_query("update top_news set news_heading = '$headline',
									session = '$session',
									type = '$type',
									news_body = '$body' where news_id = '$id'") or die(mysql_error());
	
	}
	echo "<div class='success'>News has successfully Updated</div>";
}else{
	function session_c($a, $b){
		if($a == $b){ return "selected";}
	}
	$r = mysql_query("select * from top_news where news_id = '$id'") or die(mysql_error());
	$d = mysql_fetch_object($r) or die(mysql_error());
?>
<script>
function check(){
	if(document.edit.headline.value == ""){
		alert("Heading Should not be Blank");
		return false;
	}else{
		return true;
	}
}
</script>


<form action="" method="post" onsubmit="return check()" name="edit" enctype="multipart/form-data">
<table border="0" cellpadding="3" cellspacing="6" width="80%" align="center">
  <tr>
    <td>News Headline :</td>
    <td><input type="text" name="headline" value="<?php echo $d->news_heading;?>" /></td>
  </tr>
  <tr>
    <td>Session :</td>
    <td>
    <select name="session">
    	<option value="2011-2012"  <?php if($d->session == "2011-2012"){ echo "selected";}?>>2011-2012</option>
        <option value="2012-2013" <?php if($d->session == "2012-2013"){ echo "selected";}?>>2012-2013</option>
        <option value="2013-2014" <?php if($d->session == "2013-2014"){ echo "selected";}?>>2013-2014</option>
        <option value="2014-2015" <?php if($d->session == "2014-2015"){ echo "selected";}?>>2014-2015</option>
        <option value="2015-2016" <?php if($d->session == "2015-2016"){ echo "selected";}?>>2015-2016</option>
        <option value="2016-2017" <?php if($d->session == "2016-20172"){ echo "selected";}?>>2016-2017</option>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Attach file :</td>
    <td>
	<?php if(!empty($d->file_path)){ $f = explode("/",$d->file_path); echo $f[1]; }else{ echo "<span style='color:red'>Ther is no attached file</span>";} ?>
    </td>
  </tr>
  <tr>
  	<td><?php if(!empty($d->file_path)){ echo "Remove Previou and Attach new file :";}else{ echo "Attach a new file :";} ?></td>
    <td><input type="file" name="attach" /><input type="hidden" name="file_path" value="<?php echo $d->file_path;?>" /></td>
  </tr>
  <tr>
  	<td>Type :</td>
    <td>
    <select name="type">
    	<option value=""> -- Select one option -- </option>
        <option value="notice" <?php if($d->type == "notice"){ echo "selected";}?>>Notice</option>
        <option value="BA Part 1" <?php if($d->type == "BA Part 1"){ echo "selected";}?>>BA Part 1</option>
        <option value="BA Part 2" <?php if($d->type == "BA Part 2"){ echo "selected";}?>>BA Part 2</option>
        <option value="BA Part 3" <?php if($d->type == "BA Part 3"){ echo "selected";}?>>BA Part 3</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>News Body :</td>
    <td><!--<textarea name="body" rows="9" cols="35"><?php //echo $d->news_body; ?></textarea>-->
    <?php
	
	require_once('fckeditor/fckeditor.php');
	$FCKeditor = new FCKeditor('body');
	$FCKeditor->BasePath = 'fckeditor/';
	$FCKeditor->Value = $d->news_body;;
	$FCKeditor->Height = '400px';
	$FCKeditor->Create();

	?>
    </td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="button" onclick="javascript: history.go(-1)" value="<< Back"></td>
    <td><input type="submit" name="save" value="Save" /></td>
  </tr>
</table>
</form>
<?php } ?>






<?php
include("inc/footer.php");
?>