<?php date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion

//****************   ELIMINACION         **********************
$opc2 = $_GET['opc2'];
$ban=0;
				if ($opc2=="E")
				{

$id = explode("--",$_GET['id']);
					$query2="select proveedor_id FROM mov_equipo  WHERE idubic_origen='".$id[0]."' or  idubic_destino='".$id[0]."'  ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}
					$query2="select sucursales_id FROM sucursales_personal  WHERE sucursales_id='".$id[0]."'  ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}
					
					if($ban==0){
									$id = explode("--",$_GET['id']);								
									$query2="DELETE FROM ubicacion_dep  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
					}
									mysql_close($con);	
					echo '<script type="text/javascript" language="javascript">window.location.replace("busca_depositos.php");</script>>'; 				
									
									//header("Location: busca_depositos.php");
				}				
				
		

?>