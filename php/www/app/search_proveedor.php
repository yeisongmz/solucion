<?php
$dbHost = 'localhost';
$dbUsername = 'admin';
$dbPassword = 'V4lurq123!';
$dbName = 'solucion';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT nombre FROM proveedor WHERE nombre LIKE '".$searchTerm."%'  ORDER BY nombre ASC limit 10");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nombre'];
}
//return json data
echo json_encode($data);
?>
