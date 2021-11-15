<?php
include ("conexion/conectar.php");

// $log = ['idRemision'=>[] , 'query' => [] ];

$id_registro     = $_POST['registro'] ;
$cantidad        = $_POST['cantidad'] ;

date_default_timezone_set('America/Caracas');

for ($i=0; $i < count($cantidad) ; $i++) {
  if($cantidad[$i]==0){
    $actualiza = "UPDATE responsables SET idpersonal = '0' WHERE id ='".$id_registro[$i]."'" ;
   }
    mysql_query($actualiza) ;
}

 //print_r($log);
// echo json_encode($dato_remision_arr);
?>
