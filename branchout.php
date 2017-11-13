<script type="text/javascript">
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
</script>
<center>
<a href="index.php?page=price.php" class="active">Price List</a>
  <table width="100%" border="0" bgcolor="#FFFFFF">
					   
					<form action="" method="post" onsubmit="MM_validateForm('sale','','RinRange0:9999999');return document.MM_returnValue" >
	  <tr>
            <td width="140"><span class="style12">Select Commodity</span></td>
            <td width="412">
              <?php 
include 'opendb.php';
error_reporting(0);
   
/*echo $date;
exit;*/
$sql="SELECT * FROM fuel,dept Where fuel.level>0 and dept.dept=fuel.type";
$rez=mysql_query($sql);
echo "<select name='type' id='type'>";
?>

<?php
while($row=mysql_fetch_array($rez,MYSQL_ASSOC)){
 echo "<option value='$row[dept]'>{$row[dept]}</option>"; 
}

?></select></td>
	        </tr>
<tr><tr>
                            <td width="27%"> <span class="style1 style9">Quantity</span></td>
  <td width="73%"><input type="text" name="sale" id="sale"></td> 
                      </tr><tr><td></td><td><input name="button" type="Submit" id="button" value="Save"  /> </td></tr> 
					</form>
					</table>
				  <br />
</h1>
					
                        
                        		 
								 
                                    
						
                      <?php
if(isset($_POST['button']))

{
	function getRandomString($length = 10)
{
$validCharacters = "012345abcde";
$validCharNumber = strlen($validCharacters);
$result = "";
for ($i = 0; $i < $length; $i++)
{
$index = mt_rand(0, $validCharNumber - 1);
$result .= $validCharacters[$index];

}

return $result;

}


$ordernumber=getRandomString();
	$sale=$_POST['sale'];
		$today = date('m/d/Y');
		$time = date('m/d/Y-h:m:s');

$resu = mysql_query("SELECT * FROM fuel ");

 $count1=mysql_num_rows($resu);
	if ($count1==0)
{
?>
<script language="javascript">
	alert("NO ALLOCATION ");
	

	</script>
	<?php
	exit();
	}
 while($rowz = mysql_fetch_array($resu, MYSQL_ASSOC))	  	  
{
$level = $rowz['level'];
}

$rem=$level-$_POST['sale'];
//echo $da; exit;
if ($rem<0)
{
?>
<script language="javascript">
	alert("ORDER OF <?php echo $_POST['sale']; ?> UNITS IS IMPOSSIBLE");
	alert(" <?php echo $level; ?> UNITS HAVE BEEN PLACED TO YOUR ORDER");

	</script>
    
	<?php
	mysql_query("INSERT INTO `orders` (`product`, `quantity`, `ordernumber`, `date`) 
VALUES ('$_POST[type]', '$level', '$ordernumber', '$today')");
echo "Order Number Is <font size='+3' color='#009900'>$ordernumber </font>of $_POST[type] of $level Units Recorded";
	exit();
	}

	else{

//mysql_query("UPDATE `allocation` SET `fuel`='$rem' WHERE (`type`='$_POST[type]' and branch ='$_SESSION[branch]') ");
mysql_query("INSERT INTO `orders` (`product`, `quantity`, `ordernumber`, `date`) 
VALUES ('$_POST[type]', '$sale', '$ordernumber', '$today')");
echo "Order Number Is <font size='+3' color='#009900'> $ordernumber </font> of $_POST[type] of $sale UNITS Recorded";
	}
}



?>        