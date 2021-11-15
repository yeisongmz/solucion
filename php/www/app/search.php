<?php
include ("conectar.php");
//$dbHost = 'localhost';
//$dbUsername = 'soluadmin';
//$dbPassword = '123';
//$dbName = 'solucion';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table

if(is_numeric($searchTerm)==false)
{
$query = $db->query("SELECT apellidos,nombres FROM personal WHERE CONCAT(nombres,' ',apellidos) LIKE '%".$searchTerm."%' and estado = 1 group by apellidos ORDER BY apellidos ASC limit 10");
while ($row = $query->fetch_assoc()) {
    //$data[] = utf8_encode($row['apellidos']);
	$data[] =utf8_encode($row['nombres']).",".utf8_encode($row['apellidos']);
}
}
else
{
$query = $db->query("SELECT nro_docum FROM personal WHERE nro_docum LIKE '".$searchTerm."%' and estado = 1  ORDER BY apellidos ASC limit 10");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nro_docum'];
}
}
//echo gettype($searchTerm);
echo json_encode($data);
?>
