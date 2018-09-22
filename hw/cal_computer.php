<?php
   session_start();
            $length = $_GET['length'];
            $breath = $_GET['breath'];
            $_SESSION['length'] =  $length;
            $_SESSION['breath'] =  $breath;
            $cal_comp = 2 *($length + $breath -8)/3;
            $_SESSION['cal_comp'] =  floor($cal_comp);
            echo '<table width="100%" border="0" cellspacing="10" cellpadding="0">
                   <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="40%" class="fildtext">Maximum No Of Computers :</td>
                        <td width="40%"><form id="form1" name="form1" method="post" action="">
                    <label>
                        <input name="textfield" type="text" class="textfild" id="textfield" size="25" value="'.floor($cal_comp).'"/>
                    </label>
                    </form></td>
                        <td width="10%">&nbsp;</td>
                </tr>

                <tr>
                    <td width="10%">&nbsp;</td>
                    <td width="40%" class="fildtext">Enter Your No Of Computers :</td>
                    <td width="40%"><form  method="post" action="">
                        <label>
                        <input name="computer" type="text" class="textfild" id="computer" size="25" />
                    </label>
                </form></td>
                    <td width="10%">&nbsp;</td>
                </tr>
                </table>
                <div id="calculationDiv">
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>
                    <td width="10%">&nbsp;</td>
                    <td width="40%">&nbsp;</td>
                    <td width="40%"><input type="button" class="show" name="submit" onclick="calculate()" value="Submit"/></td>
                    <td width="10%">&nbsp;</td>
                </tr>
                </table>
            <div>';

        

?>
