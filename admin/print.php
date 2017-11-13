<?php
include 'opendb.php';
 

$result = mysql_query("SELECT * FROM orders,dept,fuel where orders.id = '$_GET[id]' and product=dept and product=type") or die (mysql_error());
while($row = mysql_fetch_array($result)){
$name = $row['product'];
      	
       	$id = $row['id'];
		$price = $row['price'];
		$notes = $row['level'];$location = $row['quantity'];$pricerequired=$location*$price;
}

?>
<SCRIPT LANGUAGE="JavaScript">
if (window.print) {
document.write;
}
</script><br />


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
}
.style3 {font-size: 12px}
.style5 {font-size: 12px; font-style: italic; }
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" style="border:1px solid #000000" bgcolor="#FFFFFF">
<tr>
  <td align="right"> <span class="style3">Ref No:<?php echo $id ?>
</span></td>
</tr>
  <tr>
    <td align="center">
      <p align="center" class="style1"><strong>PAYMENT SLIP</strong></p>
      <p align="left">PRODUCT: <?php echo $name; ?> </p>
    <p align="center">QUANTITY: <?php echo $location; ?></p>
   
        <p align="center">PRICE:$ <?php echo $pricerequired; ?></p>
<p align="center">AMOUNT TENDERED:$ <?php echo $pricerequired; ?></p>

    
    <p align="center">PAYMENT TYPE:<?php echo "CASH"; ?></p>
    <p align="center"><em>Thank You for choosing us,</em></p>
    </td>
  </tr>
  <tr>
    <td><span class="style5">Date Issued</span>      <em>
      <?php $date = date('d/m/Y'); echo $date; ?>
    </em></td>
  </tr>
</table><center><form><input type=button name=print value="Print" onClick="window.print()"></form></center>
</body>
</html>
