<?php 
$dbHost = 'localhost';
$dbUsername = 'admin';
$dbPassword = 'V4lurq123!';
$dbName = 'solucion';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = strtoupper(trim($_GET['term']));
//get matched data from skills table
$query = $db->query("SELECT razon FROM banco_sueldo WHERE razon LIKE '".$searchTerm."%' group by razon ORDER BY razon ASC limit 10");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['razon'];
}
//return json data
echo json_encode($data);
?>
