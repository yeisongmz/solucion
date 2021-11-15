<?php session_start();
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         grabacion/ modificacion
if (isset($_POST['textfield'])) 
{
	if(!empty($_POST['textfield']) )
			{
				session_start();
				$opc = $_POST['textfield2'];
				$concepto = trim($_POST['textfield']);
				$tipo = $_POST['select'];
				$obs = trim($_POST['textarea']);
				$timestamp = date('Y-m-d G:i:s');
				$user = $_SESSION["user"];
				$id = $_POST['textfield3'];
				//echo $tipo;
				if ($opc=="A")
				{
									
									
									$query2="INSERT INTO conceptos(concepto,tipo,obs,creador,fe_ultmodi)  VALUES('".$concepto."','".$tipo."','".$obs."','".$user."','".$timestamp."')";

									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_conceptos.php");</script>>'; 
									
				}
				if ($opc=="M")
				{
									
									$query2="UPDATE conceptos set concepto ='".$concepto."',tipo ='".$tipo."',obs ='".$obs."',creador ='".$user."',fe_ultmodi='".$timestamp."' where id='".$id."' ";
									
								
									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_conceptos.php");</script>'; 
				}
				
//****************   ELIMINACION         **********************
				
				
		}

}


?>