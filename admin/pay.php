<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
</head>

<body>
<form action="" method="post" name="form1" onsubmit="MM_validateForm('number','','R');return document.MM_returnValue" >
	   
	 <center>
	  <table width="70%" border="0" align="center" cellpadding="0" cellspacing="5" style="border-bottom:3px solid #000000;">
<tbody>
	            <tr align="center">
	        <td colspan="2" class="style8 style2 style9"><!--<p class="style11"><u> Add Departmental Modules</u></p>-->
	          <center>
	          <p class="style13">Order Processing<br />
Please enter Order Number</p>
	          <p class="style13"><?php 
			 // error_reporting(0);echo $msg; ?></p></td>
	        <tr>
            <td width="140"><span class="style12">Order Number</span></td>
            <td width="412">
             
       
            <input name="number" type="text" id="number" />
      <input class="form_submit_button" type="submit" name="submit" value="Find"></td></tr>
           
	      
            
           
          </tr></td>                     
	          </tbody>
	    </table><br />

	 
					 <table width="100%" border="0" bgcolor="#000000">
					  <tr> 
                                  <td bgcolor="#CCCCCC" width="119"><font color="#0033CC">Product</font></td>
                                              <!--<td bgcolor="#CCCCCC" width="222"><font color="#0033CC">ID Number</font></td>

-->					    <td bgcolor="#CCCCCC" width="123"><font color="#0033CC">Quantity</font></td>

                         <!--<td bgcolor="#CCCCCC" width="125"><font color="#0033CC">date</font></td>-->
                         <td bgcolor="#CCCCCC" width="125"><font color="#0033CC">Date</font></td> <td bgcolor="#CCCCCC" width="125"><font color="#0033CC">pay</font></td>
        </form>
         <?php
include 'opendb.php';	

		if (isset($_POST['submit'])){

		$rs=mysql_query("SELECT * FROM orders where ordernumber ='$_POST[number]' and status='0' order by date") or die(mysql_error());
			$rw = mysql_num_rows($rs);
   if($rw == 0){
   ?>
  <script language="javascript">
 alert("No order By this Number");
javascript:history.go(-1)	  </script>
  <?php
  exit;
   }
while($row = mysql_fetch_array($rs)){
		
		$name = $row['product'];
		$surname = $row['quantity'];
		$idnum = $row['location'];
		$price = $row['price'];
		$date = $row['date'];
		$dateexp = $row['dateexp'];
		$id= $row['id'];
	?>
<tr bgcolor="#CCCCCC">
    <td colspan="9">&nbsp;</td>
  </tr>

  <tr bgcolor="#FFFFFF">
  
    <td><font size="1" face="Arial, Helvetica, sans-serif"><?php echo $name; ?></font></td>
   
   
    <td><font size="1" face="Arial, Helvetica, sans-serif"><?php echo $surname; ?></font></td>

    
    <td><font size="1" face="Arial, Helvetica, sans-serif"><?php echo $date; ?></font></td>
    
    <td><font size="1" face="Arial, Helvetica, sans-serif"><a href="index.php?page=pay1.php&id=<?php echo $id; ?>">[Process Order]</a></font></td>
   
    
  </tr>
  
  
<?php
}}
?>
</table>

</body>
</html>
