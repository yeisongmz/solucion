<?php date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion

//****************   ELIMINACION         **********************
$opc2 = $_GET['opc2'];

				if ($opc2=="E")
				{
									$id = explode("--",$_GET['id']);
					$query2="select cargos_id FROM personal  WHERE cargos_id='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)==0)
					{													
									$query2="DELETE FROM cargos  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									
					}
					
									
									mysql_close($con);	
									header("Location: busca_cargos.php");
				}				
				
		

?>