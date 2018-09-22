<?php session_start(); ?>

<?php

include("inc/db_connection.php");


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'DELETE_ITEM'){
         $styleid = $_GET['styleid'];
         
         mysql_query("DELETE  from desktop_item WHERE dskt_item_id='$styleid'");
        
        echo 'Data deleted';
        echo '@';
        echo '<table>';
        $getq = mysql_query("SELECT * FROM desktop_item where dskt_id=" . $styleid . "");
        while ($row = mysql_fetch_assoc($getq)) {
/*
            echo "<tr>";

            echo "<td width='200'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'>{$row['product']} </td>";
            /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['item_id']."' value='{$row['style_qty']}' onkeyup='test(this)' />
              <input type='hidden' value='".$row['style_qty']."' name='updatestyleqty' id='updatestyleqty'/> ".$row['unt_name']."
              </td>"; */
            /* echo "<td><input type='button'  id='".$row['dskt_item_id']."'  onclick=_validation('update_style','".$row['dskt_item_id']."') value='Update'></input>
              <input type='hidden' value='".$row['dskt_item_id']."' name='aUpdate".$row['dskt_item_id']."' id='aUpdate".$row['dskt_item_id']."'/>
              </td>"; *
            echo "<td><input type='button'  onclick=_validation('delete_styledetails','" . $row['dskt_item_id'] . "') value='Delete'></input>
					<input type='hidden' value='" . $row['dskt_item_id'] . "' name='aDeletestyledetails' id='aDeletestyledetails'/>
					</td>";


            echo "</tr>";
            
          */  
        
        echo "<tr>";
					
            echo "<td width='50'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'></td>";
            echo "<td width='200'>{$row['product']} </td>";
        /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['item_id']."' value='{$row['style_qty']}' onkeyup='test(this)' />
            <input type='hidden' value='".$row['style_qty']."' name='updatestyleqty' id='updatestyleqty'/> ".$row['unt_name']."  
            </td>";*/
            /*echo "<td><input type='button'  id='".$row['dskt_item_id']."'  onclick=_validation('update_style','".$row['dskt_item_id']."') value='Update'></input>
            <input type='hidden' value='".$row['dskt_item_id']."' name='aUpdate".$row['dskt_item_id']."' id='aUpdate".$row['dskt_item_id']."'/>
            </td>";*/
        echo "<td><input type='button'  onclick=_validation('delete_styledetails','".$row['dskt_item_id']."') value='Delete'></input>
        <input type='hidden' value='".$row['dskt_item_id']."' name='aDeletestyledetails' id='aDeletestyledetails'/>
        </td>";


            echo "</tr>";
        
        
        
        
        
        }

        echo "</table>";

        
         
    }


    else if ($action == 'update_style') {
        $stylename = $_GET['stylename'];
        //$itemid= $_GET['itemid'];
        $itemqty = $_GET['itemqty'];
        $styleid = $_GET['styleid'];
        $sid = $_GET['sid'];

        mysql_query("update tblstyledetails set style_qty=$itemqty where style_did=$styleid");
        //echo "update tblstyledetails set style_qty=$itemqty where style_did=$styleid";
        //echo 'Data updated';

        echo "<table width='300' border='1' cellspacing='0' cellpadding='0'>";
        echo"<tr>";

        echo"<td>Style name</td>";
        echo"<td>&nbsp;</td>";
        echo"</tr>";
        $r = mysql_query("select * from tblstyle");
        while ($row = mysql_fetch_array($r)) {
            echo"<tr>";

            echo"<td>" . $row['style_name'] . "</td>";
            echo"<td><a href='style_master.php?id=" . $row['style_id'] . "'>Edit</td>";
            echo"</tr>";
        }

        echo"</table>";



        echo "@";
        echo 'Data updated';
        $getq = mysql_query("select i.item_name,sd.item_id,sd.style_qty,sd.style_did,u.unt_name from tblitem as i INNER JOIN tblstyledetails as sd on i.item_id=sd.item_id 
                                            INNER JOIN tblunit as u on  u.unt_id=i.unt_id   where style_id=" . $sid . "");
        //$getdata=mysql_fetch_row($getq);

        echo "<table>";

        // run through the results from the database, generating the checkboxes
        while ($row = mysql_fetch_assoc($getq)) {

            echo "<tr>";

            echo "<td width='200'><input id='{$row['item_id']}' value='{$row['item_id']}' type='checkbox' name='chkItem[]' checked='checked'>{$row['item_name']} </td>";
            echo "<td><input name='txtitemqty[]' type='text' id='" . $row['item_id'] . "' value='{$row['style_qty']}' onkeyup='test(this)' />
					 <input type='hidden' value='" . $row['style_qty'] . "' name='updatestyleqty' id='updatestyleqty'/> " . $row['unt_name'] . "
					 </td>";
            echo "<td><input type='button' id='" . $row['item_id'] . "'  onclick=_validation('update_style','" . $row['style_did'] . "') value='Update'></input>
					 <input type='hidden' value='" . $row['style_did'] . "' name='aUpdate" . $row['item_id'] . "' id='aUpdate" . $row['item_id'] . "'/>
					 </td>";
            echo "<td><input type='button'  onclick=_validation('delete_styledetails','" . $row['style_did'] . "') value='Delete'></input>
					<input type='hidden' value='" . $row['style_did'] . "' name='aDeletestyledetails' id='aDeletestyledetails'/>
					</td>";


            echo "</tr>";
        }

        echo "</table>";

        echo "@";

        $stylenameq = mysql_query("select style_name from tblstyle where style_id=$sid");
        $stylenamw = mysql_fetch_row($stylenameq);

        echo $stylenamw[0];
    } else if ($action == 'delete_styledetails') {
        $styledid = $_GET['styledid'];
        $styleid = $_GET['styleid'];

        mysql_query("DELETE  from desktop_item WHERE dskt_item_id='$styledid'");
        
        echo 'Data deleted';
        echo '@';
        echo '<table>';
        $getq = mysql_query("SELECT * FROM desktop_item where dskt_id=" . $styleid . "");
        while ($row = mysql_fetch_assoc($getq)) {
/*
            echo "<tr>";

            echo "<td width='200'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'>{$row['product']} </td>";
            /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['item_id']."' value='{$row['style_qty']}' onkeyup='test(this)' />
              <input type='hidden' value='".$row['style_qty']."' name='updatestyleqty' id='updatestyleqty'/> ".$row['unt_name']."
              </td>"; */
            /* echo "<td><input type='button'  id='".$row['dskt_item_id']."'  onclick=_validation('update_style','".$row['dskt_item_id']."') value='Update'></input>
              <input type='hidden' value='".$row['dskt_item_id']."' name='aUpdate".$row['dskt_item_id']."' id='aUpdate".$row['dskt_item_id']."'/>
              </td>"; *
            echo "<td><input type='button'  onclick=_validation('delete_styledetails','" . $row['dskt_item_id'] . "') value='Delete'></input>
					<input type='hidden' value='" . $row['dskt_item_id'] . "' name='aDeletestyledetails' id='aDeletestyledetails'/>
					</td>";


            echo "</tr>";
            
          */  
        
        echo "<tr>";
					
            echo "<td width='50'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'></td>";
            echo "<td width='200'>{$row['product']} </td>";
        /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['item_id']."' value='{$row['style_qty']}' onkeyup='test(this)' />
            <input type='hidden' value='".$row['style_qty']."' name='updatestyleqty' id='updatestyleqty'/> ".$row['unt_name']."  
            </td>";*/
            /*echo "<td><input type='button'  id='".$row['dskt_item_id']."'  onclick=_validation('update_style','".$row['dskt_item_id']."') value='Update'></input>
            <input type='hidden' value='".$row['dskt_item_id']."' name='aUpdate".$row['dskt_item_id']."' id='aUpdate".$row['dskt_item_id']."'/>
            </td>";*/
        echo "<td><input type='button'  onclick=_validation('delete_styledetails','".$row['dskt_item_id']."') value='Delete'></input>
        <input type='hidden' value='".$row['dskt_item_id']."' name='aDeletestyledetails' id='aDeletestyledetails'/>
        </td>";


            echo "</tr>";
        
        
        
        
        
        }

        echo "</table>";

        echo "@";

        $stylenameq = mysql_query("SELECT description FROM desktops WHERE dskt_id=$styleid");
        $stylenamw = mysql_fetch_row($stylenameq);

        echo $stylenamw[0];
    } else if ($action == 'add_item_when_edit') {
        $itemid = $_GET['itemid'];
        //$qty= $_GET['qty'];

        $styleid = $_GET['styleid'];

        
        $query2 = "select PRODUCT_NAME from PRODUCTS WHERE SEQ_NUM = '".$itemid."'";
        
        $result = mysql_query($query2);
        
        $row = mysql_fetch_row($result);
        
        mysql_query("INSERT INTO desktop_item (product_id, product,product_type,dskt_id)VALUES('$itemid','$row[0]','0','$styleid')");

        echo 'Data added Successfully';



        if (isset($itemid)) {

            $getq = mysql_query("SELECT * FROM desktop_item where dskt_id=" . $styleid . "");
            //$getdata=mysql_fetch_row($getq);
            echo "";
            echo "<table>";

            // run through the results from the database, generating the checkboxes
            while ($row = mysql_fetch_assoc($getq)) {
                
                /*
                echo "<tr>";

                echo "<td width='200'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'>{$row['product']} </td>";

                echo "<td><input type='button'  onclick=_validation('delete_styledetails','" . $row['dskt_item_id'] . "') value='Delete'></input>
					<input type='hidden' value='" . $row['dskt_item_id'] . "' name='aDeletestyledetails' id='aDeletestyledetails'/>
					</td>";


                echo "</tr>";
                
                */
                
                echo "<tr>";
					
            echo "<td width='50'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'></td>";
            echo "<td width='200'>{$row['product']} </td>";
        /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['item_id']."' value='{$row['style_qty']}' onkeyup='test(this)' />
            <input type='hidden' value='".$row['style_qty']."' name='updatestyleqty' id='updatestyleqty'/> ".$row['unt_name']."  
            </td>";*/
            /*echo "<td><input type='button'  id='".$row['dskt_item_id']."'  onclick=_validation('update_style','".$row['dskt_item_id']."') value='Update'></input>
            <input type='hidden' value='".$row['dskt_item_id']."' name='aUpdate".$row['dskt_item_id']."' id='aUpdate".$row['dskt_item_id']."'/>
            </td>";*/
        echo "<td><input type='button'  onclick=_validation('delete_styledetails','".$row['dskt_item_id']."') value='Delete'></input>
        <input type='hidden' value='".$row['dskt_item_id']."' name='aDeletestyledetails' id='aDeletestyledetails'/>
        </td>";


            echo "</tr>";
                
                /*
                echo "<tr>";
					
                echo "<td width='50'><input id='{$row['dskt_item_id']}' value='{$row['dskt_item_id']}' type='checkbox' name='chkItem[]' checked='checked'></td>";
                echo "<td width='200'>" . $row['product'] . " </td>";
                echo "<td><input type='button'  onclick=_validation('delete_styledetails','" . $row['dskt_item_id'] . "') value='Delete'></input>
                <input type='hidden' value='" . $row['dskt_item_id'] . "' name='aDeletestyledetails' id='aDeletestyledetails'/>
                </td>";
                echo "</tr>";*/
            }

            echo "</table>";
        } else {
            //echo 'hi2';
            $result = mysql_query("select item_id,item_name from tblitem");

            echo "<table>";

            // run through the results from the database, generating the checkboxes
            while ($row = mysql_fetch_assoc($result)) {

                echo "<tr>";

                echo "<td width='200'><input id='{$row['item_id']}' value='{$row['item_id']}' type='checkbox' name='chkItem[]'>{$row['item_name']} </td>";
                echo "<td><input name='txtitemqty[]' type='text' id='" . $row['item_id'] . "' onkeypress='return numbersonly(event)' /></td>";


                echo "</tr>";
            }

            echo "</table>";
        }






        //echo $dtStyleid['id'];
    } else if ($action == 'save_style') {
        $stylename = $_GET['stylename'];
        $itemid = explode(",", $_GET['itemid']);
        //$itemqty=explode(",",$_GET['itemqty']);
        $count = sizeof($itemid);
        $strCheck = mysql_query("SELECT COUNT(dskt_id) as count FROM desktops where description='$stylename'");
        $dtCount = mysql_fetch_row($strCheck);

        if ($dtCount[0] > 0) {
            echo 'item with same name exists';
            echo "<table width='300' border='1' cellspacing='0' cellpadding='0'>";
            echo"<tr>";

            echo"<td>Style name</td>";
            echo"<td>&nbsp;</td>";
            echo"</tr>";
            $r = mysql_query("SELECT * FROM desktops");
            while ($row = mysql_fetch_array($r)) {
                echo"<tr>";

                echo"<td>" . $row['description'] . "</td>";
                echo"<td><a href='choose_product1.php?id=" . $row['dskt_id'] . "'>Edit</td>";
                echo"</tr>";
            }

            echo"</table>";
            echo '@';
            $result = mysql_query("SELECT * FROM products ");

            echo "<table>";

            // run through the results from the database, generating the checkboxes
            while ($row = mysql_fetch_assoc($result)) {

                echo "<tr>";

                echo "<td width='200'><input id='{$row['PRODUCT_NAME']}' value='{$row['PRODUCT_NAME']}' type='checkbox' name='chkItem[]'>{$row['PRODUCT_NAME']} </td>";
                /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['SEQ_NUM']."' onkeypress='return numbersonly(event)' />  </td>"; */


                echo "</tr>";
            }

            echo "</table>";
            echo '@';
            echo '';
            return;
        } else {
            $strSQL = mysql_query("insert INTO desktops (description,date_added,status) VALUES ('$stylename',CURDATE(),'active')");
            $strSQL = mysql_query("SELECT LAST_INSERT_ID() as 'id'");
            $dtStyleid = mysql_fetch_array($strSQL);

            for ($i = 0; $i <= $count - 1; $i++) {
                mysql_query("INSERT INTO desktop_item(product,product_type,dskt_id) VALUES('" . $itemid[$i] . "','0','" . $dtStyleid['id'] . "')");
            }
        }
        echo 'Data saved Successfully';
        //echo $dtStyleid['id'];

        echo "<table width='300' border='1' cellspacing='0' cellpadding='0'>";
        echo"<tr>";

        echo"<td>Style name</td>";
        echo"<td>&nbsp;</td>";
        echo"</tr>";
        $r = mysql_query("SELECT * FROM desktops");
        while ($row = mysql_fetch_array($r)) {
            echo"<tr>";

            echo"<td>" . $row['description'] . "</td>";
            echo"<td><a href='choose_product1.php?id=" . $row['dskt_id'] . "'>Edit</td>";
            echo"</tr>";
        }

        echo"</table>";

        echo '@';
        $result = mysql_query("SELECT * FROM products ");

        echo "<table>";

        // run through the results from the database, generating the checkboxes
        while ($row = mysql_fetch_assoc($result)) {

            echo "<tr>";

            echo "<td width='200'><input id='{$row['PRODUCT_NAME']}' value='{$row['PRODUCT_NAME']}' type='checkbox' name='chkItem[]'>{$row['PRODUCT_NAME']} </td>";
            /* echo "<td><input name='txtitemqty[]' type='text' id='".$row['SEQ_NUM']."' onkeypress='return numbersonly(event)' />  </td>"; */


            echo "</tr>";
        }

        echo "</table>";
        echo '@';
        echo '';
    }
}