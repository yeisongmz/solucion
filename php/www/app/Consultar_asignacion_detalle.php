<?php
include ("conexion/conectar.php");

$nombre_personal = $_POST['nombre'] ;

date_default_timezone_set('America/Caracas');

// **********************************************
// IDENTIFICA EL ID DEL Personal
//***********************************************
$q = $nombre_personal ;

if ($q<>'' and $q<>'999999')
{

	if(is_numeric($q)==false)
	{
		$b=explode("," , $q);
 	$sql="select * from personal where apellidos ='".$b[1]."' and nombres='".$b[0]."' order by apellidos asc";
	}
	else
	{
	$sql="select * from personal where nro_docum = '".$q."%'  order by apellidos asc";
	}
	 $res=mysql_query($sql,$con);
}
else
{
    if ($q<>'999999')
	{
	$sql="select * from personal where estado=1 order by apellidos asc ";
	}
	else
	{
	$sql="select * from personal where estado=0 order by apellidos asc ";
	}
	 $res=mysql_query($sql,$con);
}

while($fila=mysql_fetch_array($res)){
    $id_personal =  $fila['id'] ;

}

//*********************************************************


date_default_timezone_set('America/Caracas');

$asignaciones = "SELECT id, (SELECT descrip FROM equipos WHERE id = equipos_id) AS equipo, cantidad, (SELECT COUNT(*) FROM responsables WHERE idPersonal='".$id_personal."' ) AS qty FROM responsables WHERE idPersonal='".$id_personal."' " ;

$datos_asignados=[];

$dato = mysql_query($asignaciones) ;
while($query4  = mysql_fetch_array($dato))
{
    array_push($datos_asignados , [ $query4['id']  , $query4['equipo']  , $query4['cantidad'] , $query4['qty'] ] ) ;
}

  echo json_encode($datos_asignados);
?>
