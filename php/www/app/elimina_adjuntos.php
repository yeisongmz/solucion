<?php 
if(isset($_GET['id']))
{
	if(!empty($_GET['id']))
		{
				$id=explode("--", $_GET['id']);
				include ("conexion/conectar.php");
				$query2="delete from adjuntos where id ='".$id[0]."'";
				$resultado = mysql_query($query2);
				echo '<script type="text/javascript" language="javascript">window.location.replace("busca_adjuntos_solucion.php");</script>>'; 
		}

}
					
		
?>