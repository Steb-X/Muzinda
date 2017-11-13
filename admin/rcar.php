
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- Include Core Datepicker Stylesheet -->
<link rel="stylesheet" href="../../redan/admin/ui.datepicker.css" type="text/css" media="screen" title="core css file" charset="utf-8" />


<!-- Include jQuery -->
<script src="../../redan/admin/jquery.js" type="text/javascript" charset="utf-8"></script>

<!-- Include Core Datepicker JavaScript -->
<script src="../../redan/admin/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>

<!-- Attach the datepicker to dateinput after document is ready -->
<script type="text/javascript" charset="utf-8">
jQuery(function($){
$("#date").datepicker();
});
</script>
<script type="text/javascript" charset="utf-8">
jQuery(function($){
$("#date1").datepicker();
});
</script>
<script language = "Javascript">
/**
 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/datevalidation.asp)
 */
// Declaring valid date character, minimum year and maximum year
var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		alert("Enter dates, date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date")
		return false
	}
return true
}

function ValidateForm(){
	var dt=document.frmSample.date1
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    return true
 }
 function ValidateForm(){
	var dt=document.frmSample.date
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    return true
 }

</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<meta name="" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../../redan/admin/css/defaulf.css" rel="stylesheet" type="text/css" />
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {font-size: 14px}
.style4 {font-size: 12px; font-weight: bold; }
-->
</style>
</head>
<body>
<div align="center">
	<div class="main_div">
		<div class="main">
			<div class="main_site">
			  <div class="header">Report Vehicle out<br />

				  Date format is mm/dd/yyyy e.g 12/31/1985
					<h1>
					  <table width="100%" border="0" >
					   
					<form action="" method="post" onSubmit="return ValidateForm()" name="frmSample">
					<tr><td width="6%"><span class="style1">Start Date</span></td><td width="14%">
					  <input type="text" name="date" id="date" />
				   </td>
					<td width="7%"><span class="style1">End Date</span></td>
					<td width="67%">
                    <input type="text" name="date1" id="date1" /> 
                  </td>
					<td width="6%"><input name="Submit" type="submit" value="Search" /></td></tr>
					</form>
					</table>
				  <br />
</h1>
					
					 <table width="100%" border="0">
					  <tr> 
                                 
                        <td bgcolor="#CCCCCC" width="125"><font color="#0033CC">type</font></td> 
                        <td bgcolor="#CCCCCC" width="119"><font color="#0033CC">reg number</font></td>
                        <td bgcolor="#CCCCCC" width="125"><font color="#0033CC">status</font></td>
                                                <td bgcolor="#CCCCCC" width="222"><font color="#0033CC">date</font></td>

					    
								 
                                    
						
                      <?php
					  //error_reporting(0);
	  if (isset($_POST['Submit'])){
	  include 'opendb.php';
	  $date =$_POST['date'];
	  $date1 =$_POST['date1'];
	   $nguva=date('m/d/Y');
	  if($date == '' OR $date1 == ''){
	  	 echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Enter All dates fields')
		  javascript:history.go(-1)
		 	</SCRIPT>");  
		  }
	  if($date > $date1)
{
echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Invalid Ranges')
		 javascript:history.go(-1)
		 	</SCRIPT>"); 
			exit; 
}
elseif($date1 > $nguva)
{
echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Invalid Range')
		 javascript:history.go(-1)
		 	</SCRIPT>");  
			}
			else
{
	  $result ="";
	 $result = mysql_query("SELECT * FROM car where date>='$date' and date<='$date1' order by date ")or die(mysql_query());
		 
	   if(!$result)
{
	die( "\n\ncould'nt send the query because".mysql_error());
	exit;
}
	$rows = mysql_num_rows($result);
	if($rows==0)
 {
 	echo("<SCRIPT LANGUAGE='JavaScript'> window.alert('No report for this period')
		  javascript:history.go(-1)
		 	</SCRIPT>");  
			exit;

 }
  while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	  	  
{

echo "<tr><td>{$row['model']}</td><td>{$row['reg']}</td><td>{$row['status']}</td><td>{$row['date']}</td></tr>";
}
}

}
?>        </tr></table>      

							</div>
			</div>
	  </div>
  </div>

	
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {validateOn:["change"], format:"dd.mm.yyyy"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {validateOn:["change"], format:"dd.mm.yyyy", hint:"dd.mm.yyyy"});
//-->
</script>
</body>
</html>