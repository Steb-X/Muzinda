<?php



 		include 'opendb.php'; 
		
		$rs = mysql_query("SELECT * FROM orders,dept,fuel where orders.id = '$_GET[id]' and product=dept and product=type");
		while($row = mysql_fetch_array($rs))
		{
       	$name = $row['product'];
      	
       	$id = $row['pid'];
		$price = $row['price'];
		$notes = $row['level'];$location = $row['quantity'];
        }
		$pricerequired=$location*$price;
		$av=$notes-$location;
		if ($av < 0)
		{
		?>
  		<script language="javascript">
 		alert("No Stock avalible for this order ");
 		javascript:history.go(-1)
  		</script>
  		<?php
		exit;
		}
		//echo $id; exit;
?>
<?php 
    	include 'opendb.php'; 
		$date = date('m/d/Y');
        if(isset($_POST['submit']))
		
        {
		if ($_POST['amount'] < 0)
		{
		?>
  		<script language="javascript">
 		alert("Amount can not be less than zero");
 		javascript:history.go(-1)
  		</script>
  		<?php
		exit;
		}
		$customer_id = $_GET['id'];
		$amount = $_POST['amount'];
		$price = $_POST['price'];	
			if($_POST['amount'] !=$pricerequired)
			
		{
		?>
  		<script language="javascript">
 		alert("Pay required amount");	javascript:history.go(-1)
  		</script>
  		<?php
		exit;
		}
		else {
		
$result = mysql_query("INSERT INTO payment(id,orders,datep)VALUES (NULL,'$_GET[id]','$date')") or die (mysql_error());}
mysql_query("UPDATE orders set status = '1' where id = '$_GET[id]'");
		if ($result)
		{
		?>
  		<script language="javascript">
 		alert("Sale has been affected thank you for buying");
 		location = 'index.php?page=print.php&id=<?php echo $_GET['id']; ?>'
  		</script>
  		<?php
		}
		else
		{
		$msg= "Error occured ";
		}
	}		   

?><html><head>
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
</script></head>
<body>
<form action="" method="post" name="form1" id="form1" onSubmit="MM_validateForm('amount','','RisNum');return document.MM_returnValue">
  <center>
  <table width="50%" border="0" align="center" class="table-login">
    <tr><div align="left"> <font face="Verdana, Arial, Helvetica, sans-serif" ><font color="#0000FF"><b></b></font></font></div></tr>
      <th>Credit Payment Page</th>
    
      <tr>
        <td width="277"><table width="538" border="0" bgcolor="#FFFFFF"><tr>
            <td><span class="style2">Product</span></td>
            <td>
              <input name="name" type="text" id="name" value="<?php echo $name ?>" readonly size="50"  /> <input name="id" type="hidden" id="id" value="<?php echo $id ?>" readonly  />              </td>
          </tr><tr>
            <td><span class="style2">Quantity</span></td>
            <td>
              <input name="name" type="text" id="name" value="<?php echo $location ?>" readonly size="50"  /> <input name="id" type="hidden" id="id" value="<?php echo $id ?>" readonly  />              </td>
          </tr><tr>
            <td><span class="style2">Price Per Unit $</span></td>
            <td>
              <input name="name" type="text" id="name" value="<?php echo $price ?>" readonly size="50"  /> <input name="id" type="hidden" id="id" value="<?php echo $id ?>" readonly  />              </td>
          </tr>
          <tr>
            <td width="89"><span class="style2">Total Payment Amount $</span></td>
            <td width="300"><input name="price" type="text" id="price" value="<?php echo $pricerequired; ?>" readonly   />                                     </td>
          </tr>
          <tr>
            <td width="89">Amount Paid $</td>
            <td width="300">
            <input name="amount" type="text" id="amount" style="border:1px solid #000000;"  />              </td>
          </tr>
            
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Pay" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </form>


</body>
</html>