<?php
    include '../admin/inc/db_connection.php';
    echo '<form name="amc_price" action="" method="post">
            <table align="center" border="0" width="500" cellpadding="0" cellspacing="6">
            <tr>
                    <td colspan="7"><h1>AMC Price</h1></td>
                </tr>
                <tr>
                    <td valign="top">Contract Time </td>
                    <td>Maximum visit<br/>(H/W)<br/>(per year)</td>
                    <td>Maximum visit<br/>(H/W)<br/>(per year)</td>
                    <td>Maximum visit<br/>(H/W)<br/>(per year)</td>
                    <td>Maximum visit<br/>(H/W)<br/>(per year)</td>
                    <td>Maximum visit<br/>(H/W)<br/>(per year)</td>
                    <td>Maximum visit<br/>(H/W)<br/>(per year)</td>

                </tr>';
    $queryselecttime = mysql_query("SELECT * FROM contract_time_master") or die(mysql_error());
    $queryselectvisit = mysql_query("SELECT * FROM amc_hardware") or die(mysql_error());
    while ($row = mysql_fetch_array($queryselecttime)) {
            
     
            $contract_time  = $row['contract_time'];
            $multiplying_value  = $row['multiplying_value'];
            $adding_value  = $row['adding_value'];
            echo '<tr>
                    <td valign="top"></td>';

        
        while ($row1 = mysql_fetch_array($queryselectvisit)) {
            $max_visit  = $row1['max_visit'];
            $percentage  = $row1['percentage'];
            $total_price = ((($multiplying_value * $percentage)/100) * $max_visit) + $adding_value;
            
            
        
        echo '
                    <td>'.$max_visit.'</td>';
        }
        echo '</tr>';
}
echo '      
        </table>
    </form>';

?>
