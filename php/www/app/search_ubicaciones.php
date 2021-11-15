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
$query = $db->query("SELECT ubicacion FROM ubicacion_dep WHERE ubicacion LIKE '".$searchTerm."%'  ORDER BY ubicacion ASC limit 10");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['ubicacion'];
}
//return json data
echo json_encode($data);
?>
