<?php
error_reporting(0);
include ('aut.php'); 
?><!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59688 -->
    <meta charset="utf-8">
    <title>OIMs</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu&amp;subset=latin">

    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>



</head>
<body>
<div id="art-main">
<header class="art-header clearfix">


    <div class="art-shapes">
<h1 class="art-headline" data-left="92.83%">
    <a href="#">OIMs</a>
</h1>
<h2 class="art-slogan" data-left="88.14%">Online Inventory  Management Systems</h2>



            </div>

<nav class="art-nav clearfix">
    <ul class="art-hmenu"><li><a href="./index.php?page=home.php">Home</a>  
                </li><?php if($_SESSION['access'] == "1") { ?><li>
		<a href="./index.php?page=fuel.php">Goods Received</a>
	</li>	
    
    <li><a href="index.php?page=pay.php">Payments</a></li>
     <li><a href="index.php?page=alert.php">Stock Alert</a></li>
    <li><a href="index.php?page=department.php">Add Commodity</a></li> <li>
		<a href="./index.php?page=car.php" >Create Truck</a></li>
        <?php } ?><?php if($_SESSION['access'] == "2") { ?><li>
		<a href="./index.php?page=out.php">Process Truck</a>
	</li>	
    <li><a href="index.php?page=out2.php">Process External Truck</a></li>
    
    <li><a href="index.php?page=changepass.php">Change Password</a></li> 
        <?php } ?><?php if($_SESSION['access'] == "3") { ?>
     
    <li><a href="index.php?page=rcar.php">Report Truck</a></li><li><a href="index.php?page=rorder.php">Report order</a></li>    <li><a href="index.php?page=changepass.php">Change Password</a></li> <li>
		<a href="./index.php?page=backup.php" >BACK UP</a>
        <?php } ?></ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                               
                                <div class="art-postcontent art-postcontent-0 clearfix"><p><?php
$pg = @$_REQUEST['page'];
if($pg != "" && file_exists(dirname(__FILE__)."/".$pg)){
require(dirname(__FILE__)."/".$pg);
}elseif(!file_exists(dirname(__FILE__)."/".$pg))
include_once(dirname(__FILE__)."/pages/404.php");
else{
include_once("home.php");
}
?><br></p></div>


</article></div>
                        <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-vmenublock clearfix">
        <div class="art-vmenublockcontent">
<ul class="art-vmenu"><?php if($_SESSION['access'] == "1") { ?><li><a href="index.php?page=levelhq.php">Reorder Level</a></li><li>
		<a href="./index.php?page=registration.php">New User</a>
	</li>	
    <li><a href="index.php?page=editusers.php">Edit Users</a></li>
    <li><a href="index.php?page=suspend_users.php">Suspend Users</a></li>
    <li><a href="index.php?page=unsuspend_users.php">Unsuspend Users</a></li>
    <li><a href="index.php?page=changepass.php">Change Password</a></li> <li>
		<a href="./index.php?page=backup.php" >BACK UP</a>
        <?php } ?><?php if($_SESSION['access'] == "2") { ?>
    
    <li><a href="index.php?page=changepass.php">Change Password</a></li> 
        <?php } ?><?php if($_SESSION['access'] == "3") { ?>
     
    <li><a href="index.php?page=rsales.php">Report Sales</a></li>
    <li><a href="index.php?page=rclient.php">Report users</a></li>
        <?php } ?><li><a href="../logout.php">Logout</a></li></ul>
                
        </div>
</div></div>
                    </div>
                </div>
            </div><footer class="art-footer clearfix">
<p><br></p>
<p>PBF Developers© 2017.&nbsp;</p>
</footer>

    </div>
    <p class="art-page-footer">
       
    </p>
</div>


</body></html>