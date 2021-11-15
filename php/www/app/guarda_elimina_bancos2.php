<?php 
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion

//****************   ELIMINACION         **********************
$opc2 = $_GET['opc2'];

				if ($opc2=="E")
				{
					$id = explode("--",$_GET['id']);
					$query2="select banco_sueldo_id FROM personal  WHERE banco_sueldo_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)==0)
					{						
								
									
									$query2="DELETE FROM banco_sueldo  WHERE ID='".$id[0]."' ";
									
								
									$resultado = mysql_query($query2) ;
					}
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_bancos.php");</script>>'; 
									//header("Location: busca_bancos.php");
				}				
				
		

?>