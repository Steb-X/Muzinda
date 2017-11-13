<center><table border='1'><tr><td>Units </td> <td>Product</td><td> Price $ </td></td></tr><?php 
include 'opendb.php';
$resul = mysql_query("SELECT * FROM fuel,dept Where fuel.level>0 and dept.dept=fuel.type ");
 while($row = mysql_fetch_array($resul, MYSQL_ASSOC))	  	  
{
$fu = $row['level'];$ty = $row['type'];$p = $row['price'];
echo " <tr><td>{$fu}</td> <td>{$ty}</td><td> {$p}</td></td></tr>"; } ?>
</table>