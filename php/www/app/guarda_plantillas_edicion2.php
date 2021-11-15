<?php session_start();
 include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');


$ban=0;

	//************  DATOS  ALTA *********************

	
				$plantilla_id=$_POST['textfield1900'];
				$frecuencia = trim($_POST['textfield2']);
				$equipos =  explode("--",$_POST['textfield12']);
				$ubicacion = $_POST['skills4'];
			
				$ubicacion_id='';
				$nombre = $_POST['textfield'];
				$cantidad =explode("--",$_POST['textfield11']);
				//$obs = $_POST['textarea'];
				$unitario = explode("--",$_POST['textfield13']);
				//$total = explode("--",$_POST['textfield14']);
				$creador = $_SESSION["user"];				
				$fe_ultmodi = date('Y-m-d G:i:s');	
				$mat=array();
				$fila=0;
				$query2="select id from ubicacion_dep where ubicacion='".$ubicacion."' " ;
			
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
							$ubicacion_id = $query4['id'];
						}
					}

				for ($x = 0; $x < count($equipos)-1; $x++) {
				$query2="select id from equipos where descrip='".$equipos[$x]."' " ;
				
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
						$mat[$fila]=$query4['id'];
					
						$fila=$fila+1;
						}
					}
				}
					


//					/// *********  grabacion del registro
				
					
if($ban==0)
{	
						$query2="update plantillas set sucursales_id='".$ubicacion_id."',nombre='".$nombre."',horas_presupuestadas='".$_POST['horas']."' where id='".$plantilla_id."' ";
//echo $query2;
						$resultado = mysql_query($query2);
						
						$query2="delete from deta_plantilla where plantillas_id='".$plantilla_id."' ";

						$resultado = mysql_query($query2);
					
						for ($x = 0; $x < count($equipos)-1; $x++)
		 				{					
		 					$query2="INSERT INTO deta_plantilla(equipos_id,plantillas_id,cantidad,frecuencia,p_unitario,p_total)  VALUES('".$mat[$x]."','".$plantilla_id."','".$cantidad[$x]."','0','0','0')";

						$resultado = mysql_query($query2);
		 				}
						
}

mysql_close($con);	
if($ban==0)
{	
	echo '<script type="text/javascript" language="javascript">window.location.replace("panel_plantillas2.php");</script>'; 
}
else
{
echo "El registro de compra NO SE REALIZO, es posible que algunos datos  no fueran correctos.";	
}
//									
?>