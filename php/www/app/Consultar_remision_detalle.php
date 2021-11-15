<?php
include ("conexion/conectar.php");

$numero_remision = $_POST['numero'] ;

date_default_timezone_set('America/Caracas');

$remision = "SELECT   equipos_id,dsc_producto,cantidad,(SELECT COUNT(*) FROM remisiondeta WHERE remision_id = (SELECT id FROM remision WHERE numero='".$numero_remision."' ) ) AS can_detalle ,CONCAT( CAST(equipos_id AS CHAR) ,  CAST(cantidad AS CHAR)  ) AS id , unidadMed,p_unitario,p_total,costo_calculado FROM remisiondeta WHERE remision_id = (SELECT id FROM remision WHERE numero='".$numero_remision."' )" ;

$dato_remision_arr=[];

$dato_remision = mysql_query($remision) ;
while($query4  = mysql_fetch_array($dato_remision))
{
    array_push($dato_remision_arr ,[ $query4['equipos_id']  , $query4['dsc_producto'] ,  $query4['cantidad']  , $query4['id']  ,$query4['can_detalle'] , $query4['unidadMed'] , $query4['p_unitario'] , $query4['p_total'] , $query4['costo_calculado'] ] ) ;
}

  echo json_encode($dato_remision_arr);
?>
