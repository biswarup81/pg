<?php
include("config.php");

$q=$_GET["q"];



$sql="SELECT * FROM PRODUCTS WHERE PRODUCT_TYPE = '".$q."'";

$result = mysql_query($sql);


if( mysql_num_rows($result) == 0){
		echo "<table width='476' border='1'>
        <tr>
          <th colspan='2' scope='row'>NO RESULT FOUND</th>
        </tr>
		</table>";
} else {


 echo "<table width='500' border='1' >
        <tr>
          <th colspan='2' scope='row'style='border-bottom: 1px solid #EFB602;color: #EFB602; font-size: 16px; font-weight: bold; padding: 14px; text-align:center;'>SEARCH RESULT</th>
        </tr>
		
		
        <tr style='background: #06C'>
          <th width='350'style='border-right: 1px solid #EFB602; border-bottom: 1px solid #EFB602;color: #EFB602;font-size: 16px; font-weight: bold;' scope='row'><div align='center'><strong>PRODUCT TYPE:</strong></div></th>
          <td width='100'style='text-align:center;color: #EFB602;font-size: 16px; font-weight: bold; border-bottom: 1px solid #EFB602'><strong>PRICE</strong></td>
        </tr>";
      


while($row = mysql_fetch_array($result))
  {
  echo "<tr style='border-top: 1px solid #EFB602;'>";
  echo "<td style='border-right: 1px solid #EFB602;text-align:left;font-size: 14px; border-bottom: 1px solid #EFB602; font-weight: bold;'><div style='padding-left:5px;'>" . $row['PRODUCT_NAME'] . "</div></td>";
  echo "<td style='border-bottom: 1px solid #EFB602;'><div style='padding-left:5px;'> Rs. " . $row['PRICE'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
}
mysql_close($con);
?> 