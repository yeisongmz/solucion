<?php  include ("conexion/conectar.php");
$proveedor=0;
$numero=0;
if(isset($_GET['id']))
{
	$aux=explode("--",$_GET['id']);
	$aux2=explode(",",$aux[0]);
	$numero	=$aux2[0];
	$proveedor=$aux2[1];
}
$aux=explode("--",$_GET['id']);

$query2="SELECT * FROM mov_equipo where com_nrofact='".$numero."' and proveedor_id='".$proveedor."'" ;
					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$query2="UPDATE stock SET cantidad=cantidad+".$query4['cantidad']." where equipos_id='".$query4['equipos_id']."' and Ubicacion_dep_id='".$query4['idubic_destino']."' ";
							$resultado = mysql_query($query2);
						}
					$query2="delete FROM mov_equipo where com_nrofact='".$numero."'";
					
					$resultado = mysql_query($query2);
					mysql_close($con);
						echo '<script type="text/javascript" language="javascript">window.location.replace("busca_compras.php");</script>'; 


?>