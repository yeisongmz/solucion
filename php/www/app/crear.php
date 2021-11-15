<?php
 include ("conexion/conectar.php");

$query2="UPDATE remisiondeta,equipos SET remisiondeta.`dsc_producto`=equipos.`descrip`,remisiondeta.`unidadMed`=equipos.`unidadMedida` WHERE remisiondeta.Remision_id='6281' AND remisiondeta.`equipos_id`=equipos.`id` " ;
$res=mysql_query($query2,$con);
echo $query2.'<br>';
/*$query2="select * from remision where numero=10975" ;
echo $query2.'<br>';
$res=mysql_query($query2,$con);
$resultado=mysql_fetch_array($res) ; 
echo $resultado['id'].'<br>';
$id_remision=$resultado['id'];
echo $resultado['sucursales_id'].'<br>';
echo $resultado['numero'].'<br>';
echo $resultado['fecha'].'<br>';
echo $resultado['id'].'<br>';


 
 
 
echo $resultado['creador'].'<br>'; 
echo $resultado['fe_ultmodi'].'<br>'; 
echo $resultado['refererencia'].'<br>'; 
echo $resultado['destino'].'<br>'; 
echo $resultado['fe_retiro'].'<br>'; 
echo $resultado['movil'].'<br>'; 
echo $resultado['dir_salida'].'<br>'; 
echo $resultado['fe_iniciotras'].'<br>'; 
echo $resultado['fe_fintras'].'<br>'; 
echo $resultado['razon_tras'].'<br>'; 
echo $resultado['ruc_tras'].'<br>'; 
echo $resultado['conductor'].'<br>'; 
echo $resultado['ci_conductor'].'<br>'; 
echo $resultado['dir_conductor'].'<br>'; 
echo $resultado['comp_vta'].'<br>';
echo $resultado['nrofactura'].'<br>'; 
echo $resultado['tipo_remision'].'<br>';
echo $resultado['plantilla_id'].'<br>'; 
echo $resultado['sucdestino_id'].'<br>'; 
echo $resultado['referencia'].'<br>';

$query2="select * from remisiondeta where Remision_id='$id_remision' " ;
echo $query2.'<br>';
$res=mysql_query($query2,$con);
$resultado=mysql_fetch_array($res) ; 
echo "La id es : ".$resultado['id'].'<br>';*/

/*$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('344','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('64','$id_plantilla','2','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('68','$id_plantilla','15','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('110','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('134','$id_plantilla','2','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('386','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('162','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('179','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('181','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('200','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('212','$id_plantilla','2','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('213','$id_plantilla','2','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('2','$id_plantilla','1','0','0','0','NO')";
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('268','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('276','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('300','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('315','$id_plantilla','1','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('335','$id_plantilla','2','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('190','$id_plantilla','2','0','0','0','NO')";
echo $query2b.'<br>';
mysql_query($query2b,$con);
$query2b="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('338','$id_plantilla','1','0','0','0','NO')";

echo $query2b.'<br>';
mysql_query($query2b,$con);*/

/*$query2c="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('50','".$id_plantilla."','1','0','0','0','NO')";
mysql_query($query2c,$con);
echo $query2c.'<br>';

$query2d="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('64','".$id_plantilla."','3','0','0','0','NO')";
mysql_query($query2d,$con);
echo $query2d.'<br>';

$query2e="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('73','".$id_plantilla."','1','0','0','0','NO')";
mysql_query($query2e,$con);
echo $query2e.'<br>';

$query2f="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('134','".$id_plantilla."','10','0','0','0','NO')";
mysql_query($query2,$con);
echo $query2f.'<br>';

$query2g="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('386','".$id_plantilla."','3','0','0','0','NO')";
mysql_query($query2g,$con);
echo $query2g.'<br>';

$query2h="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('248','".$id_plantilla."','3','0','0','0','NO')";
mysql_query($query2h,$con);
echo $query2h.'<br>';

$query2i="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('335','".$id_plantilla."','3','0','0','0','NO')";
mysql_query($query2i,$con);
echo $query2i.'<br>';

$query2j="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('308','".$id_plantilla."','6','0','0','0','NO')";
mysql_query($query2j,$con);
echo $query2j.'<br>';

$query2k="insert into `deta_plantilla` (`equipos_id`, `plantillas_id`, `cantidad`, `p_unitario`, `p_total`, `frecuencia`, `es_con_frecuencia`) values('485','".$id_plantilla."','2','0','0','0','NO')";
mysql_query($query2k,$con);
echo $query2k.'<br>';*/

					//if($res=mysql_query($query2,$con) )
//					{
						/*while($query4 = mysql_fetch_array($res) )
						{
							echo $query4['nombre'].'<br>'; 
						}*/
					//else
//					{
//						 echo "Error creating table: ";
//					}
					
/*$query2="ALTER TABLE `solucion`.`deta_plantilla` ADD COLUMN `es_con_frecuencia` VARCHAR(2) DEFAULT '' NULL AFTER `frecuencia`; " ;

					if($res=mysql_query($query2,$con) )
					{
						echo "Table MyGuests created successfully";
						}
					else
					{
						 echo "Error creating table: ";
					}					
					mysql_close($con);*/
					/*$con->close();
// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();*/
?>