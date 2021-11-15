<?php $databasehost = "localhost:3306";
$databasename = "solucion";
$databaseusername ="soluadmin";
$databasepassword = "123";

$con = mysql_connect($databasehost,$databaseusername,$databasepassword) or die(mysql_error());
mysql_select_db($databasename) or die(mysql_error());
mysql_query("SET CHARACTER SET utf8");
$query = file_get_contents("php://input");
$sth = mysql_query($query);

if (mysql_errno()) {
   // header("HTTP/1.1 500 Internal Server Error");
    //echo $query.'\n';
   //echo mysql_error();
}
else
{
    $rows = array();
    while($r = mysql_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);
}
$query2=mysql_query("SELECT * FROM cargos  " );
						
						while($query4=mysql_fetch_array($query2))
						{
							echo  $query4['cargo'];
							
						}