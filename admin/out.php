

<?php
include 'opendb.php';
if(isset($_POST['Submit'])){
$date = date('m/d/Y');
	//echo $_POST['driver'];echo $_POST['access'];
/*$resu = mysql_query("SELECT * from out where reg='$_POST[reg]' and status='out'");
$rw = mysql_num_rows($resu);
   if($rw == 1){
 mysql_query("UPDATE `out` SET `status`='$_POST[access]' WHERE (`reg`='$_POST[reg]') ") ;
exit;
}

	
else {*/      
$result = mysql_query("UPDATE `car` SET `status`='$_POST[access]' , date ='$date' WHERE (`id`='$_POST[driver]') ") or die (mysql_error());
if ($result )
{
 ?>
<script language="javascript">
 alert("Database Updated");
</script>
<?php
				 }
			 else
			  {
			      $msg= "Error Occured";
		}	   
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="staff_infor.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
<script language="JavaScript" src="../../mail/scripts/gen_validatorv31.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<style type="text/css">
<!--
.style9 {font-size: 14px}
-->
</style>
</head>
<style type="text/css">
table.cool {
	border-width: 1px;
	border-spacing: ;
	border-style: solid;
	border-color: #FF9239;
	border-collapse: collapse;
	background-color: #fff5ee;
}
table.cool th {
	border-width: 1px;
	padding: 1px;
	border-style: outset;
	border-color: #FF9239;
	background-color: ;
	-moz-border-radius: ;
}
.errr
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: #0066FF;
	
}
.err
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: red;
}
table.cool td {
	border-width: 1px;
	padding: 1px;
	border-style: outset;
	border-color: #FF9239;
	background-color: ;
	-moz-border-radius: ;
}
</style>

<style type="text/css">
<!--
.style7 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #000000;
	font-weight: bold;
	font-style: italic;
}
-->

.errstyle {
	color: #FF0000;
	font-size: 12px;

}
#response {
	color: #000;
	font-size: 12px;

}
</style>
<body>

<form action="" method="post" name="qualification_form" >
<center>
<table width="50%" border="0" align="center" style="border-bottom:3px solid #000000;">
 
 
      <tr>
        <td><div align="center"><span class="style7">Car Status</span></div></td>
       
      </tr>
      
    </table> 
    <div class="errstyle" id="errr"></div>
    <div class="errstyle" id="err"></div>
 <table width="100%">
</table>



  
  <table width="50%" align="center"><tr>
      <td width="140">Car Reg Number</td>
      <td width="412"><?php 
include 'opendb.php';
 
$sql="select * from car where model='internal'";
$rez=mysql_query($sql);
?>
<select name='driver' id ='driver'>

<?php
while($row=mysql_fetch_array($rez,MYSQL_ASSOC))
{
 echo "<option value='$row[id]'>{$row['reg']}</option>"; 
}

?>
</select></td>
      </tr><tr>
        <td>Status</td>
        <td><select name="access"><option value="out">Out Going</option>   <option value="in">Incoming</option></select></td>
        </tr>
          


<tr><td colspan="2"  align="center"><input type="submit" name="Submit" size="30"  value="Save"/></td>
</tr>
</table>
</form>

</body>

</html>
