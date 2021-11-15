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
					$query2="select proveedor_id FROM mov_equipo  WHERE proveedor_id='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}
					
					if($ban==0){
									$id = explode("--",$_GET['id']);
									$query2="DELETE FROM proveedor  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
					}
									
									mysql_close($con);	

									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_proveedor.php");</script>>'; 
									//header("Location: busca_proveedor.php");
				}				
				
		

?>