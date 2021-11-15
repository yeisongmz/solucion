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
				$cargo = trim($_POST['textfield']);
				$obs = trim($_POST['textarea']);
				$timestamp = date('Y-m-d G:i:s');
				$user = $_SESSION["user"];
				$id = $_POST['textfield3'];
				if ($opc=="A")
				{
									
									
									$query2="INSERT INTO cargos(cargo,obs,creador,fe_ultmodi)  VALUES('".$cargo."','".$obs."','".$user."','".$timestamp."')";
								
									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_cargos.php");</script>>'; 
									
				}
				if ($opc=="M")
				{
									
									$query2="UPDATE cargos set cargo ='".$cargo."',obs ='".$obs."',creador ='".$user."',fe_ultmodi ='".$timestamp."' where id='".$id."' ";
									
								
									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_cargos.php");</script>>'; 
				}
				
//****************   ELIMINACION         **********************
				
				
		}

}


?>