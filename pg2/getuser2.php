<?php
$q=$_GET["q"];

include("config.php");

$sql="SELECT * FROM visitors WHERE v_id = '".$q."'";

$result = mysql_query($sql);
$row = mysql_fetch_array($result);

/*echo "<table border='0' cellpadding='4' cellspacing='2' width='100%'>
<tr>
<th style='background:#CCC'>Name</th>
<th style='background:#CCC'>Email</th>
<th style='background:#CCC'>Text</th>
<th style='background:#CCC'>Resolved Date</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
	  $timestamp = strtotime($row['date_added']);
  echo "<tr>";
  echo "<td style='background:#CCC'>" . $row['f_name']." ". $row['l_name'] . "</td>";
  echo "<td style='background:#CCC'>" . $row['email'] . "</td>";
  echo "<td style='background:#CCC'>" . $row['text'] . "</td>";
  echo "<td style='background:#CCC'>" . date("d/m/Y  H:i") . "</td>";
  
  echo "</tr>";
  }*/
  
  $timestamp = strtotime($row['resloved_date']);
  
echo "<table border='0' cellpadding='4' cellspacing='2' style='border solid 1px #ccc' >
		<tr>
		<td colspan='2' align='center' class='back_table'>Complani No : ".$row['complain_no']."</td>
		</tr>
  		<tr>
  		<th class='back_table'> Name </th><td>".$row['f_name']." ". $row['l_name']."</td>
		</tr>
		<tr>
		<th class='back_table'> Email </th><td>".$row['email']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Address 1 </th><td>".$row['address1']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Address 2 </th><td>".$row['address2']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Pin </th><td>".$row['pin']."</td>
		</tr>
		<tr>
  		<th class='back_table'> City </th><td>".$row['city']."</td>
		</tr>
		<tr>
  		<th class='back_table'> State </th><td>".$row['state']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Phone No </th><td>".$row['phone_no']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Mobile No </th><td>".$row['mobile_no']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Note </th><td>".$row['text']."</td>
		</tr>
		<tr>
  		<th class='back_table'> Resolved Date </th><td>".date("d/m/Y  H:i", $timestamp)."</td>
		</tr>";
		
echo "</table>";
?> 