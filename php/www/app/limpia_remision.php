<?php
include ("conexion/conectar.php");

$numero_remision = $_POST['numero'] ;

date_default_timezone_set('America/Caracas');

$remision = "delete FROM remisiondeta WHERE remision_id = (SELECT id FROM remision WHERE numero='".$numero_remision."' )" ;

$dato_remision = mysql_query($remision) ;

  //echo json_encode($dato_remision_arr);
?>
