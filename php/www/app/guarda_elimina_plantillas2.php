<?php session_start();
 include ("conexion/conectar.php");
				$plantilla_id=$_GET['id'];
				$query2="delete from deta_plantilla where plantillas_id='".$plantilla_id."' ";
				$resultado = mysql_query($query2);
				$query2="delete from plantillas where id='".$plantilla_id."' ";
				$resultado = mysql_query($query2);	
echo '<script type="text/javascript" language="javascript">window.location.replace("panel_plantillas2.php");</script>'; 							