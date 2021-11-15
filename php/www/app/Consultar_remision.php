<?php
include ("conexion/conectar.php");

$numero_remision = $_POST['numero'] ;

date_default_timezone_set('America/Caracas');

$remision = 'select fecha, destino FROM remision WHERE numero ="'.$numero_remision.'" order by id desc limit 1' ;

$dato_remision = mysql_query($remision) ;
while($query4  = mysql_fetch_array($dato_remision))
{
    $fecha   = $query4['fecha'];
    $destino = $query4['destino'];
}
$dato_remision_arr = [ $fecha , $destino] ;
// $a = ['test','b'];
 for ($i=0; $i <count($dato_remision_arr); $i++) {
     for ($j=0; $j <count($dato_remision_arr[$i]) ; $j++) {
         $dato_remision_arr[$i][$j] = utf8_encode( $dato_remision_arr[$i][$j] );
     }
 }
 //echo $destino ;
  echo json_encode($dato_remision_arr);
?>
