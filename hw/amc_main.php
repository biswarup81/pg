<?php
    
    include '../admin/inc/db_connection.php';
    $u_id = $_GET['u_id'];
    $comp_no = $_GET['comp_no'];
    $age_comp_id = $_GET['age_comp'];
    $parts = $_GET['parts'];
    
    $queryselectage = mysql_query("SELECT age FROM comp_age_master WHERE id='$age_comp_id'") or die(mysql_error());
    $obage = mysql_fetch_object($queryselectage);
    $age = $obage->age;
    
    $queryselectprice = mysql_query("SELECT price FROM comp_age_master WHERE id='$age_comp_id'") or die(mysql_error());
    $obprice = mysql_fetch_object($queryselectprice);
    
    if($parts == 'Yes')
    {
        $price = $obprice->price * $comp_no * 2;
    }
    else 
    {
        $price = $obprice->price * $comp_no;
    }
     mysql_query("insert into amc_details(user_id,comp_number,comp_age,parts,price)values('$u_id','$comp_no','$age','$parts','$price')") or die(mysql_error());
     //$id = mysql_insert_id();
     
     $queryselectlist = mysql_query("SELECT * FROM amc_details WHERE user_id = '$u_id'") or die(mysql_error());
     echo '<table width="100%" border="0" align="center" cellpadding="3" cellspacing="5">';
     $total_price = 0;
     while ($arr = mysql_fetch_array($queryselectlist)) {
            $price = $arr['price'];
            
            $total_price = $total_price + $arr['price'];
            
                echo '<tr>
                            <td width="25%" height="25px" align="center">'.$arr['comp_number'].'</td>
                            <td width="25%" height="25px" align="center">'.$arr['comp_age'].'</td>
                            <td width="25%" height="25px" align="center">'.$arr['parts'].'</td>
                            <td width="25%" height="25px" align="center">'.$price.'</td>
                            
                    </tr>';
            }
            echo '</table>';
            echo '<table width="150px" border="0" align="center" cellpadding="3" cellspacing="5">';
			 echo '<tr>
                    <td height="35px">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>';
            echo '<tr>
                    <td>Total Price :</td>
                    <td>'.$total_price.'</td>
                  </tr>';
				  echo '<tr>
                    <td height="25px">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>';
            echo '</table>';
            
    
    
?>
