<?php
include ("conexion/conectar.php");

$log = ['idRemision'=>[] , 'query' => [] ];
$numero_remision = $_POST['numero'] ;
$idproductos     = $_POST['idproducto'] ;
$cantidad        = $_POST['cantidad'] ;
$unidad          = $_POST['unidad'] ;         // mucho
$unitario        = $_POST['unitario'] ;     // mucho
$total             = $_POST['total'] ;          // nada
$cal            = $_POST['cal'] ;           // nada
$dsc            = $_POST['descri'] ;        // nada

//print_r($dsc) ;

date_default_timezone_set('America/Caracas');

$remision = "SELECT id FROM remision WHERE numero='".$numero_remision."'" ;

$dato_remision = mysql_query($remision) ;
while($query4  = mysql_fetch_array($dato_remision)){
    $idremison = $query4['id'] ;
    //array_push( $log['idRemision'], $query4['id'] );
}

for ($i=0; $i < count($cantidad) ; $i++) {
    $precio_unitario = 0 ;
    $precio_total = 0 ;
    $calculado = 0 ;

    if($unitario[$i]!='null'){
        $precio_unitario = $unitario[$i] ;
    }
    if($total[$i]!='null'){
        $precio_total = $total[$i] ;
    }
    if($cal[$i]!='null'){
        $calculado = $cal[$i] ;
    }

    $remision = "insert into remisiondeta (equipos_id, Remision_id, cantidad, dsc_producto, unidadMed, p_unitario, p_total, costo_calculado) values('".$idproductos[$i]."','".$idremison."','".$cantidad[$i]."','".$dsc[$i]."','".$unidad[$i]."','".$precio_unitario."','".$precio_total."','".$calculado."')" ;
    //if($i==0){
        array_push($log['query'],$remision);
    //}
    mysql_query($remision) ;
}

 print_r($log);
// echo json_encode($dato_remision_arr);
?>
