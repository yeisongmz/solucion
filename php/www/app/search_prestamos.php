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
$query = $db->query("SELECT * FROM equipos WHERE descrip LIKE '".$searchTerm."%' group by descrip ORDER BY descrip ASC limit 10");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['descrip'];
}
//return json data
echo json_encode($data);
?>
