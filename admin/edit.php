
<?php
include 'opendb.php';	

		$rs=mysql_query("select * from users where id = '$_GET[id]'") or die(mysql_error());
while($row = mysql_fetch_array($rs)){
		$id = $row['id'];
		$name = $row['name'];
		$surname = $row['surname'];
		//$phone= $row['phone'];
		$address = $row['address'];
				$email = $row['email'];
				}
				
	?>
<?php
  if(isset($_POST['Submit'])){
   include "opendb.php";
  $rs = mysql_query("UPDATE users set email = '$_POST[email]',phone='$_POST[phone]',address='$_POST[address]' where id = '$_GET[id]'");
 
  if($rs){
  ?>
  <script language="javascript">
 alert("User successfully updated");
 location = 'index.php?page=editusers.php'
  </script>
  <?php
  
  }
  else
  {
  echo "problem occured";
  }
  }

?>
<script language=javascript type='text/javascript' src="jquery.js"> </script>
<script src="../../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {color: #0066FF}
.style4 {
	color: #000000;
	font-weight: bold;
	font-size: 24px;
}
.errstyle {
	color: #FF0000;
	font-size: 12px;
	}
-->
</style>
<style type="text/css">
<!--
.style5 {
	color: #000000;
	font-size: 14px;
}
-->
</style>
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
.style6 {font-size: 12px}
-->
</style>
<div class="style4">
  <div align="center"><em>Edit User Details</em></div>
</div>
<form action="" method="post" target="my-iframe" onsubmit="MM_validateForm('name','','R','surname','','R','email','','RisEmail','phone','','RisNum','address','','R');return document.MM_returnValue">

   
<center><table width="30%" border="0" bgcolor="#FFFFFF" align="center" style="border-bottom:3px solid #000000;">
  
        <tr>
      <td>Name</td>
      <td>
        <input name="name" type="text" id="name" value="<?php echo $name; ?>" readonly="readonly" />       </td>
        </tr>
          <tr>
            <td width="194"> Surname</td>
            <td width="328">
              <input name="surname" type="text" id="surname" value="<?php echo $surname; ?>" readonly="readonly"  />              </td>
          </tr>
          <tr>
            <td>E mail</td>
            <td>
              <input name="email" type="text" id="email" value="<?php echo $email; ?>"   />            </td>
          </tr>
		 
          <tr>
            <td>Contact Address</td>
            <td>
              <textarea name="address" id="address"><?php echo $address; ?></textarea>            </td>
          </tr>
         		  <tr>
            <td></td>
            <td>
              <input name="Submit" type="Submit" id="Submit" value="Update"  />            </td>
          </tr>
    </table>
   </form>

<iframe name="my-iframe" width="0" height="0"></iframe>