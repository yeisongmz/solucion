<?php
$databasehost = "db:3306";
$databasename = "solucion";
$databaseusername ="admin";
$databasepassword = "V4lurq123!";

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
?>
