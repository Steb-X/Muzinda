<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head> <?php if (isset($_POST['Submit'])){
	  include 'opendb.php';
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
$date = date('m/d/Y');
 $res = mysql_query("select * from fuel");
	
	while($row = mysql_fetch_array($res))
	{	
	$answerid = $_POST[$row['idfuel']];
	$qty = $_POST['quantity'];
	mysql_query("INSERT INTO `order` (`product`, `quantity`, `ordernumber`, `date`) 
VALUES ('$answerid', '$qty', '$ordernumber', '$date')");  
}}
?>
<body>
<form id="form1" name="form1" method="post"  action="">
<?php
include 'opendb.php';
 $result = mysql_query("SELECT * FROM fuel,dept Where fuel.level>0 and dept.dept=fuel.type  ")or die(mysql_query());
		 
	   if(!$result)
{
	die( "\n\ncould'nt send the query because".mysql_error());
	exit;
}
	$rows = mysql_num_rows($result);
	if($rows==0)
 {
 	echo("<SCRIPT LANGUAGE='JavaScript'> window.alert('No Products on offer')
		  javascript:history.go(-1)
		 	</SCRIPT>");  
			exit;

 }
  while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	  	  
{
?><center><table><tr><td>
  <input type="checkbox" name="<?php echo "$row[idfuel]" ; ?>" id="<?php echo "$row[idfuel]" ; ?>" value="<?php echo "$row[type]" ; ?>">
  <label for="checkbox"> <?php echo "$row[type]" ; ?> Price $ <?php echo "$row[price]" ; ?> </label>Quantity  <input name="quantity" type="text" id="quantity" size="7" maxlength="3" /></td><td width="118">
            
           
           </td>
          </tr> 
          <hr>
  <?php } ?>
</form>
<tr><br>

            <td>&nbsp;</td>
  <td><br>
<input type="submit" name="Submit" value="Order" /></td>
          </tr></table>
</body>
</html>