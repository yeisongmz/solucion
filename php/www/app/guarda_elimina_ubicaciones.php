<?php session_start();
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         grabacion/ modificacion
if (isset($_POST['textfield'])) 
{
	if(!empty($_POST['textfield']) )
			{
			
				$opc = $_POST['textfield2'];
				$ubicacion = trim($_POST['textfield']);
				$obs = trim($_POST['textarea']);
				$timestamp = date('Y-m-d G:i:s');
				$user = $_SESSION["user"];
				$id = $_POST['textfield3'];
				//echo $tipo;
				if ($opc=="A")
				{
									
									
									$query2="INSERT INTO ubicacion_dep(ubicacion,obs,creador,fe_ultmodi)  VALUES('".strtoupper($ubicacion)."','".$obs."','".$user."','".$timestamp."')";

									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_depositos.php");</script>>'; 
									
				}
				if ($opc=="M")
				{
							
							
							$nombre='';	
							
						
						$query2=mysql_query("select ubicacion from ubicacion_dep where id='".$id."' ");
						while($query4=mysql_fetch_array($query2))
						{
							$nombre = $query4['ubicacion'];
						}
						
						
						
									$query2="UPDATE ubicacion_dep set ubicacion ='".strtoupper($ubicacion)."',obs ='".$obs."',creador ='".$user."',fe_ultmodi='".$timestamp."' where id='".$id."' ";
									
								
									$resultado = mysql_query($query2);
									
								$query2="UPDATE sucursales set razon_sucursal ='".strtoupper($ubicacion)."' where razon_sucursal='".$nombre."' ";
								
								
									$resultado = mysql_query($query2);					
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_depositos.php");</script>>'; 
				}
				
//****************   ELIMINACION         **********************
				
				
		}

}


?>