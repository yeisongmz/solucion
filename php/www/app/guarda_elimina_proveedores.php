<?php session_start();
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         grabacion/ modificacion
if (isset($_POST['textfield'])) 
{
	if(!empty($_POST['textfield']) )
			{
				
				$opc = $_POST['textfield8'];
				$timestamp = date('Y-m-d G:i:s');
				$user = $_SESSION["user"];
				$id = $_POST['textfield9'];
				
							$razon=trim($_POST['textfield']);
							$dir=trim($_POST['textfield2']);
							$ruc=trim($_POST['textfield3']);
							$tele=trim($_POST['textfield4']);
							$rubro=trim($_POST['textfield5']);
							$cont=trim($_POST['textfield6']);
							$cel=trim($_POST['textfield7']);
							$obs =trim($_POST['textarea']);
							
			
				if ($opc=="A")
				{
									
									
									$query2="INSERT INTO proveedor(nombre,ruc,direccion,telefono,contacto,telmovil,rubro,creador,fe_ultmodi,obs)  VALUES('".$razon."','".$ruc."','".$dir."','".$tele."','".$cont."','".$cel."','".$rubro."','".$user."','".$timestamp."','".$obs."')";

									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_proveedor.php");</script>>'; 
									
				}
				if ($opc=="M")
				{
									
									$query2="UPDATE proveedor set nombre ='".$razon."',ruc ='".$ruc."',direccion ='".$dir."',telefono ='".$tele."',contacto='".$cont."',telmovil='".$cel."',rubro='".$rubro."',fe_ultmodi='".$timestamp."',obs='".$obs."' where id='".$id."' ";
									
								
									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_proveedor.php");</script>>'; 
				}
				
//****************   ELIMINACION         **********************
				
				
		}

}


?>