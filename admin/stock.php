<?php	include 'opendb.php'; 
$resul = mysql_query("SELECT * FROM fuel ");
	while($row = mysql_fetch_array($resul, MYSQL_ASSOC))
	  	  
{
$id= $row['level'];$idq= $row['type'];
echo "CURRENT STOCK LEVEL $id units FOR $idq <br />";}?>