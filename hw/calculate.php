<?php ob_start(); ?>
<?php session_start();?>

<?php

include '../admin/inc/db_connection.php';
    
    $n = $_GET['computer'];
    $l = $_SESSION['length'];
    $b = $_SESSION['breath'];
    $cal_comp = $_SESSION['cal_comp'];
    
    $w = 3*($n*($n+1)+18*$n)/2;
    $io = $n;
    $c = ($l+$b-8)/3;
    $p = ($l+$b-8)/3;
    $l_shape = $n;
    $rj = 3*$n;
    if($n <= 8)
    {
        $s8 = 1;
        $s16 = 0;
    }
    elseif ($n > 8 && $n <= 16 ) {
        $s8 = 0;
        $s16 = 1;
    }
    elseif ($n % 16 == 0) {
        $s16 = $n /16;
        $s8  = 0;
    }
    elseif ($n % 16 <= 8) {
        $s16 = $n /16;
        $s8 = 1;
    }
    elseif ($n % 16 > 8 && $n % 16 < 16) {
        $s16 = ($n /16) + 1;
        $s8 = 0;
}

    $queryselect1 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = 'wire'")or die(mysql_error());
    $obwire = mysql_fetch_object($queryselect1);
    
    $queryselect2 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = 'i/o_box'")or die(mysql_error());
    $obio = mysql_fetch_object($queryselect2);
    
    $queryselect3 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = 'clamp'")or die(mysql_error());
    $obclamp = mysql_fetch_object($queryselect3);
    
    $queryselect4 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = 'pipe'")or die(mysql_error());
    $obpipe = mysql_fetch_object($queryselect4);
    
    $queryselect5 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = 'l_shape'")or die(mysql_error());
    $obl_shape = mysql_fetch_object($queryselect5);
    
    $queryselect6 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = 'rj_45'")or die(mysql_error());
    $obrj_45 = mysql_fetch_object($queryselect6);
    
    $queryselect7 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = '8_port_switch'")or die(mysql_error());
    $ob8_port_switch = mysql_fetch_object($queryselect7);
    
    $queryselect8 = mysql_query("SELECT price FROM PRODUCTS WHERE PRODUCT_NAME = '16_port_switch'")or die(mysql_error());
    $ob16_port_switch = mysql_fetch_object($queryselect8);
    if($n > $cal_comp)
    {
        echo '<table width="100%" border="0" cellspacing="10" cellpadding="0">
            <tr>
            <td width="10%">&nbsp;</td>
                <td width="40%" class="error" align="center">System does not allow you to Proceed !!!!<br/>Please enter either equal or less number of maximum computer</td>
                <td width="40%">&nbsp;</td>
            <td width="10%">&nbsp;</td> 
            </tr>
            
                <tr>
                    <td width="10%">&nbsp;</td>
                    <td width="40%">&nbsp;</td>
                    <td width="40%"><input type="reset" class="show" name="refresh" onclick="reloadPage()" value="Go back"/></td>
                    <td width="10%">&nbsp;</td>
                </tr>


           
            </table>';
    }
 else {
        

   
    echo '<div class="right_col"><table width="450px" border="0" cellspacing="5px" cellpadding="0">
            <tr>
                <td class="fildtext">Material</td>
                <td class="fildtext">Quantity</td>
                <td class="fildtext">Price</td>
            </tr>
            <tr>
                <td class="fildtext">Wire</td>
                <td class="fildtext">'.round($w).'</td>
                <td class="fildtext">'. round($w)*$obwire->price.'</td>
            </tr>
            <tr>
                <td class="fildtext">I/O Box</td>
                <td class="fildtext"> '.round($io).'</td>
                <td class="fildtext">'.round($io)*$obio->price.' </td>
            </tr>
            <tr>
                <td class="fildtext">Clamp</td>
                <td class="fildtext">'.round($c).'</td>
                <td class="fildtext">'. round($c)*$obclamp->price.' </td>
            </tr>
            <tr>
                <td class="fildtext">Pipe</td>
                <td class="fildtext"> '.round($p).'</td>
                <td class="fildtext"> '.round($p)*$obpipe->price .'</td>
            </tr>
            <tr>
                <td class="fildtext">L-shape</td>
                <td class="fildtext">'.round($l_shape).'</td>
                <td class="fildtext">'.round($l_shape)*$obl_shape->price .'</td>
            </tr>
            <tr>
                <td class="fildtext">RJ 45</td>
                <td class="fildtext">'.round($rj).'</td>
                <td class="fildtext">'. round($rj)*$obrj_45->price .'</td>
            </tr>
            <tr>
                <td rowspan="2" class="fildtext">Switch</td>
                <td class="fildtext">16 port- '.floor($s16).'</td>
                <td class="fildtext"> '.floor($s16) *$ob16_port_switch->price .'</td>
            </tr>
            <tr>
                
                <td class="fildtext">8 port- '.$s8.'</td>
                <td class="fildtext"> '.round($io)*$obio->price .'</td>
            </tr>
        </table>
        </div>
            <div style="width=400px; height:70px;">
            <div style="text-align: center; float:left; margin-left:100px; margin-top:25px;"><a style="cursor:pointer;" onclick="return func_print()"><input type="button" class="show" value="Print"/></a></div>
            <div style="text-align: center; float:left; padding-left:120px; margin-top:25px;"><input type="reset" class="show" value="Refresh" onclick="reloadPage()" /></div></div>';
            
 }
 
?>
<?php ob_flush(); ?>