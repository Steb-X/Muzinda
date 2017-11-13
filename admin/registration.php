
<?php
  if(isset($_POST['Submit'])){
   include "opendb.php";
   
   $date = date('m/d/Y');
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $username = $_SESSION['username'];
   $id_no = $_POST['id_first_digit']."-".$_POST['id_second_digit']."-".$_POST['id_third_letters']."-".$_POST['id_forth_digit'];
   $rs1 = mysql_query("select * from users where username = '$_POST[username]'");
   $rw = mysql_num_rows($rs1);
   if($rw == 1){
   ?>
  <script language="javascript">
 alert("Username already in use");
 location = 'index.php?page=registration.php'
  </script>
  <?php
  exit;
   }
   $rs1 = mysql_query("select * from users where idnumber = '$id_no'");
   $rw = mysql_num_rows($rs1);
   if($rw == 1){
   ?>
  <script language="javascript">
 alert("ID Number already in use");
 location = 'index.php?page=registration.php'
  </script>
  <?php
  exit;
   }
   if($_POST['password']!=$_POST['cpass']){
   ?>
  <script language="javascript">
 alert("Password did not match with confrim password");
 location = 'index.php?page=registration.php'
  </script>
  <?php
  exit;
   }
   if(strlen($_POST['password']) < 8 ){
   ?>
  <script language="javascript">
 alert("Password should be above 8 charactors");
 location = 'index.php?page=registration.php'
  </script>
  <?php
  exit;
   }
   else{
 $rs = mysql_query("insert into users(id,name,surname,sex,email,address,username,password,idnumber,status,date,access,department,suspend) values ('NULL','$_POST[name]','$_POST[surname]','$_POST[sex]','$_POST[email]','$_POST[address]','$_POST[username]','$_POST[password]','$id_no','1','$date','$_POST[access]','$_POST[department]','1')") ;
  ?>
  <script language="javascript">
 alert("User successfully created");
 location = 'index.php'
  </script>
  <?php
  }}
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
 <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style7 {
	font-size: 18px;
	color: #000000;
}
.style8 {
	color: #000000;
	font-style: italic;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
<script language="javascript">
function lettersOnly(evt) {
evt = (evt) ? evt : event;
var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
((evt.which) ? evt.which : 0));
if ( (charCode < 65 || charCode > 90 ) &&
(charCode < 97 || charCode > 122)) {
if(charCode != 8){
alert("Enter letters only.");
return false;
}

}
return true;
}
</script><script>
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}
</script>
<div class="style4">
  <div align="center"><em>User Registration</em></div>
</div>
<form action="" method="post" name="" onsubmit="MM_validateForm('name','','R','surname','','R','email','','RisEmail','phone','','RisNum','id_first_digit','','RisNum','id_second_digit','','RisNum','id_third_letters','','R','id_forth_digit','','RisNum','username','','R','password','','R','cpass','','R');return document.MM_returnValue" target="my-iframe">

   
  <table width="80%" border="0" bgcolor="#FFFFFF" align="center" style="border-top:3px solid #000000;">
  
    <tr><td colspan="2"><div align="center">
      <p class="style3 style5">Please Enter the user details below to create a new system user.</p>
      <p class="style5 style3"><strong>Note: All fields should be filled.</strong></p>
      <p class="style3 style7"><em><strong><u>General  Details</u></strong></em></p>
    </div></td>
    </tr>
    <tr>
      <td>Name</td>
      <td>
        <input name="name" type="text" id="name" onkeypress="return lettersOnly(event)" />       </td>
        </tr>
          <tr>
            <td width="267"> Surname</td>
            <td width="412">
            <input name="surname" type="text" id="surname" onkeypress="return lettersOnly(event)"  />              </td>
    </tr>
          
          <tr>
            <td>E mail</td>
            <td>
              <input name="email" type="text" id="email" onblur="validateEmail(this);" />            </td>
          </tr>
            <td>Sex</td>
            <td>
              <select name="sex"><option>male</option><option>female</option></select>            </td>
          </tr>
		  <tr>
            <td>Contact Phone Number</td>
            <td>
              <input name="phone" type="text" id="phone" maxlength="12"  />            </td>
          </tr>
          <tr>
            <td>Contact Address</td>
            <td>
              <textarea name="address" id="address"></textarea>            </td>
          </tr>
          <tr>
            <td>National ID Number</td>
            
            <td>
            <input name="id_first_digit" type="text" id="id_first_digit" size="2" maxlength="2"  />-<input name=" id_second_digit" type="text" maxlength="8" id="id_second_digit" size="9" />-<select name="id_third_letters"><option>A</option><option>B</option><option>C</option><option>D</option><option>E</option><option>F</option><option>G</option><option>H</option><option>I</option><option>J</option><option>K</option><option>L</option><option>M</option><option>N</option><option>O</option><option>P</option><option>Q</option><option>R</option><option>S</option><option>T</option><option>U</option><option>V</option><option>W</option><option>X</option><option>Y</option><option>X</option></select>
            -<input name="id_forth_digit" type="text" id="id_forth_digit" size="2" maxlength="2"  /></td>
          </tr>
   
    <tr><td colspan="2"><div align="center"><span class="style8"><u>Login Details</u></span></div></td>
    </tr>
    <tr>
      <td>User Name</td>
      <td>
        <input name="username" type="text" id="username"   />             </td>
      </tr>
          <tr>
            <td width="267">Password</td>
            <td width="412"><input name="password" type="password" id="password"   />
            <br />
           Password should be  atleast 8 characters long</td>
    </tr>
          <tr>
            <td>Confirm </td>
            <td>
              <input name="cpass" type="password" id="cpass"  />            </td></tr> <tr>
            <td>Access level</td>
            <td>
              <select name="access"> <option value="2">Staff</option><option value="3">Manager</option><option value="1">Admin</option></select>        </td></tr>
         		  <tr>
            <td></td>
            <td>
              <input name="Submit" type="Submit" id="Submit" value="Save"  />            </td>
          </tr>
    </table>
  
</form>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:8, validateOn:["blur", "change"]});
//-->
</script>
<iframe name="my-iframe" width="0" height="0"></iframe>