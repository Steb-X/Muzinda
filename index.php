<?php

include 'opendb.php';
if(isset($_POST['submit'])){
	  function clean($str) {
                            $str = @trim($str);
                            if (get_magic_quotes_gpc()) {
                                $str = stripslashes($str);
                            }
                            return mysql_real_escape_string($str);
                        }
$username = clean($_POST["username"]);
$password = clean($_POST["password"]);

  if($username == '' OR $password == ''){
	  	 echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Enter All fields')
		  javascript:history.go(-1)
		 	</SCRIPT>");  
			exit;
		  }
		  
		  
		   $resul = mysql_query("SELECT * from users where username='$username' AND password = '$password' and suspend='0'");
	

		  $rows = mysql_num_rows($resul);
	if($rows==1)
 {
 	echo("<SCRIPT LANGUAGE='JavaScript'> window.alert('You Have Been Suspended Contact The Adminstrator')
		  javascript:history.go(-1)
		 	</SCRIPT>");  
			exit;

 }
 else{

 $result ="";
$query = "SELECT * from users where username='$username' AND password = '$password' and suspend='1'";
$result = mysql_query($query);
$rows=mysql_fetch_array($result);
$access=$rows['access'];
$q=$rows['department'];
$q1=$rows['name'];
$q2=$rows['surname'];
$full=$q1." ".$q2;
session_start();
$_SESSION['username'] = $username;
$_SESSION['branch'] = $q;
$_SESSION['name'] = $full;
$_SESSION['access'] = $access;
if(!$result)
{
	die( "\n\ncould'nt send the query because".mysql_error());
	exit;
}
	$row = mysql_num_rows($result);
	if($row==1)
 {
 	header("location: admin/index.php");
	exit;
 }

  else
 {
echo("<SCRIPT LANGUAGE='JavaScript'> window.alert('Wrong Username And Password Combination')
		 javascript:history.go(-1)
		 	</SCRIPT>");   
	
}
}}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Current Quickserve</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

<link rel="stylesheet" href="style.css" media="screen">
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
    <a href="#">OIMs </a>
</h1>
<h2 class="art-slogan" data-left="88.14%">Online Inventory Management System  </h2>



            </div>

<nav class="art-nav clearfix">
    <ul class="art-hmenu"><li><a href="index.php"class="active">Home</a></li><li><a href="index.php?page=branchout.php" class="active">Place Order</a></li></ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">&nbsp;</h2>
                                                            
                                    </div>
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
                        <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Login</h3>
        </div>
        <div class="art-blockcontent"><form action="" method="post">
 
<table border="0" align="center"><tbody><tr align="left"><td width="35%" height="27"><font size="2" face="verdana">Username</font></td><td width="65%"><font size="2" face="verdana"><input value="" name="username" onfocus="" type="text" id="username" size="10"></font></td></tr><tr><td height="24"><font size="2" face="verdana">Password</font></td><td><font size="2" face="verdana"><input value="" name="password" type="password" id="pass" size="10"></font></td></tr><tr><td></td><td align="left"><input type="submit" name="submit" value=" login" style="animation-duration:"></td></tr><tr><td></td><!--<td><a href="index.php?page=registration.php">Create Account</a></td>--></tr></tbody></table>
</form><br></div>
</div></div>
                    </div>
                </div>
            </div><footer class="art-footer clearfix">
<p><br></p>
<p>PBF Developers  © 2017 &nbsp;</p>
</footer>

    </div>
  
</div>


</body></html>