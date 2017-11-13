<?php 
	include_once("includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	 ?>
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
</script> </script>
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
if ( (charCode > 65 || charCode < 90 ) &&
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
 
<form method = "post" name = "app_education" id="app_education" onsubmit="MM_validateForm('school_college','','RinRange0:9999999');return document.MM_returnValue"><table width="345" border = "0" cellspacing="5">
	<tr>
            <td width="140"><span class="style12">Select Product</span></td>
            <td width="412">
              <?php 
include 'opendb.php';
error_reporting(0);
   
/*echo $date;
exit;*/
$sql="select * from fuel where level >0";
$rez=mysql_query($sql);
echo "<select name='level' id='level'>";
?>
<option>Headquaters</option>
<?php
while($row=mysql_fetch_array($rez,MYSQL_ASSOC)){
 echo "<option value='$row[type]'>{$row[type]}</option>"; 
}

?></select></td>
	        </tr>
	  <td>Quantity</td>
	  <td><input type = "text" name = "school_college" id="school_college"/></td></tr>
	

	
	
	<tr><td colspan = "2"><input type = "button" value = "Add" name = "save" id="save"/></td>
	</table>
  <p>&nbsp;</p>
	 </form>
	 <em>Below is a list of commodities you have added.</em>
<hr />
	 <div id="edu-list"></div>
	 
<script language="javascript">
	function deleteEdu(key){
		$.post("scripts/ajax.delete_application_education.php",{"key": key} , function(data){
			document.getElementById("edu-list").innerHTML = data;
		});
	}
	
	$('#save').click(function() {
		var values = $("#app_education").serialize();

		if(  $("#school_college").val() == '' ){
			alert('Enter institution name');
			return false;
		}
		
		
		
		if( $(".txt_year").val() > 2013 ){
			alert('Enter a valid year');
			return false;	
		}
		
		$.post("scripts/ajax.save_application_education.php",{"values": values} , function(data){
			document.getElementById("edu-list").innerHTML = data;
			document.app_education.school_college.value = '';
			document.app_education.year.value = '';

		});
	
		return false;
	
	});

</script>
	 
