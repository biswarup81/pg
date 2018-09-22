<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php  include '../admin/inc/db_connection.php'; ?>
<html lang="en-US"><head>


        <link href="images_files/916e35d3-3f86-4def-a371-1e6beaf789cb.css" type="text/css" rel="stylesheet">

        <title>PG Infoservices</title>
        <link type="text/css" href="images_files/ACvtr288-b_002.css" rel="stylesheet">
        <link type="text/css" href="images_files/ACvtr288-b.css" rel="stylesheet">



        <!--[if lt IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie6/css-min/AC:vtr288-b" rel="stylesheet"><![endif]--><!--[if IE 7]><link type="text/css" href="/xml/jasmin/get/120702-1216/hosting-ie7/css-min/AC:vtr288-b" rel="stylesheet"><![endif]-->

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/easySlider1.7.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){	
                $("#slider").easySlider({
                    auto: true, 
                    continuous: true
                });
            });	
        </script>

        <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />

    </head>

    <body class="productpages Home flyout js-active">
        <div id="skipmenu"><a class="skip" href="#">Skip to content</a></div>
        <div id="container" class="skin-oneandone"><div id="header-container">
                <div id="header" class="clearfix"><a class="core_button_normal" href="index.html" id="button-hd-log-home"><img src="images_files/lg-1and1.png" alt="" class="logo" title="Logo" ></a>
                    <ul class="header-nav">
                        <li class="header-nav-item header-nav-item-first"><span class="header-nav-text">Give us a Call: <span> +91.983.0875.590 </span></span></li>
                        <li class="header-nav-item right"><a class="header-nav-text item-last" href="mailto:info@pginfoservices.com" id="button-hd-nav-contact">E-mail Us </a></li>
                    </ul>
                    <div class="main-nav-bar">
                        <ul class="main-nav">
                            <li id="main-nav-domains" class="main-nav-item first-item">
                                <a title="Register your web address today" class="main-nav-link" href="index.php" id="button-hd-mainnav-domains"> Home</a> </li>   
                            <li id="main-nav-email" class="main-nav-item"><a title="1&amp;1 email solutions" class="main-nav-link" href="#" id="button-hd-mainnav-email">Our Services</a></li>
                            <li id="main-nav-servers" class="main-nav-item">
                                <a title="A full range of high performance server solutions" class="main-nav-link" href="#" id="button-hd-mainnav-servers"> Contacts</a></li>





                        </ul>

                    </div></div></div>





            <div id="content" class="clearfix">
                <div id="frame" class="clearfix"><a class="skip-target" name="skip-to-content"></a>
                    <div id="content-bottom-container">
                        <div class="ct-marketingcontainer-a1 grid-16">
                            <div class="grid-12 prefix-04"><div id="product_scene">

                                    <div id="product_display">

                                        <div id="content2">

                                            <div id="slider">
                                                <ul>				
                                                    

                                                    <?php
                               
                                $query4 = "select * from desktops limit 6";
                                $result4 = mysql_query($query4) or die(mysql_error());
                                while ($rs4 = mysql_fetch_array($result4)) {
                                    ?>    

                                                    
                                                    <li><a href="#"> 
                                                            <div class="siilder-1-p">
                                                                <div class="siilder-1-p-left"><img src="images_files/stage-eshop3.png" width="402" height="273" alt=""></div>

                                                                <div class="siilder-1-p-right">
                                                                    <h1 class="typo-headline-a1"><?php echo $rs4['description']; ?></h1>
                                                                    <h3 class="subline-head">The best support on the web! </h3>
                                                                    <div class="checklist"><p>Speed &amp; reliability</p><p>24X7 live support</p><p>Professional standard</p></div>
                                                                       <?php
                                                                $count = 0;
                                                                $price = 0;
                                                                $query5 = "select prod.PRODUCT_NAME, prod.PRICE from PRODUCTS prod, desktop_item desk_item where 
                                                                                    prod.SEQ_NUM = desk_item.product_id and
                                                                                    desk_item.dskt_id = '" . $rs4['dskt_id'] . "'";

                                                                $result5 = mysql_query($query5) or die(mysql_error());
                                                                while ($rs5 = mysql_fetch_array($result5)) {
                                                                    $count++;
                                                                    $price += $rs5['PRICE'];
                                                                }
                                                                    ?>
                                                                    <div class="img-r"><?php echo ($price * 1.04); ?></div>
                                                                    <div class="section-follow"> <a href="#"><img src="images_files/button.png" width="236" height="40"></a></div>


                                                                </div>




                                                            </div></a></li>
                                                            <?php } ?>
                                                </ul>
                                            </div>

                                        </div>


                                    </div></div></div>




                            <div id="container-tabs">


                                <?php
                               
                                $query1 = "select * from desktops limit 6";
                                $result = mysql_query($query1) or die(mysql_error());
                                while ($rs = mysql_fetch_array($result)) {
                                    ?>    

                                    <div id="productbox_diy_business.tab" class="grid-04 ct-pricetable-index">
                                        <div class="head diy">

                                            <h2 class="tab_diy">



                                            <?php echo $rs['description']; ?>

                                            </h2></div><div class="content diy"><p>

    <?php
    $count = 0;
    $price = 0;
    $query3 = "select prod.PRODUCT_NAME, prod.PRICE from PRODUCTS prod, desktop_item desk_item where 
                        prod.SEQ_NUM = desk_item.product_id and
                        desk_item.dskt_id = '" . $rs['dskt_id'] . "'";

    $result3 = mysql_query($query3) or die(mysql_error());
    while ($rs3 = mysql_fetch_array($result3)) {
        $count++;
        $price += $rs3['PRICE'];
        ?>
                                                    <?php if ($count <= 3) {
                                                        echo $rs3['PRODUCT_NAME'];
                                                    } ?><br>
                                                <?php } ?>
                                            </p></div>
                                        <a title="" class="btn_changelink" href="#" id="button-ct-tab-mywebsite-business"><span>Details</span></a>
                                        <div class="ribbon1"><h1>Rs:<br><?php echo round(($price * 1.04)); ?></h1></div>
    <!--<div class="ribbon"><img src="images_files/vi-ribbon-free.png" alt="" height="89" width="85"></div>--></div>
                                <?php } ?>



                            </div>


                        </div>


                    </div></div></div>











        </div>


        <div id="footer_container">

            <div class="sitemap-container clearfix1">
                <div class="footer">
                    <div class="footer-left">
                        <ul class="footer-left clearfix">
                            <li style="background:none;"><a href="#">Home</a> </li>
                            <li><a href="#">Our Services</a> </li>              
                            <li ><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="footer-right">
                        <div class="copywright">&copy; 2012 <b>P. G. Infoservices</b>. All Rights Reserved.</div></div>



                </div>
            </div>

        </div>            









<!--[if lt IE 7]><script type="text/javascript" src="/xml/jasmin/get/120702-1216/hosting-ie6/js-min/AC:vtr288-b"></script><![endif]-->
    </body></html>
<!-- GET_DOM: 11 HDL_DOC: 430 REX_DOC: 0 PRE_PROC: 1 -->