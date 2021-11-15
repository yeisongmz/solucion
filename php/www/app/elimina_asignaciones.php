<?php 
include ("conexion/conectar.php");
$personal= explode(",", $_GET["skills3"]);
$apellidos=$personal[1];
$nombres=$personal[0];

$sucursal_id=explode("--",$_GET["textfield7"]);
$ban=0;
			
$fe_ultmodi = date('Y-m-d ');	
$query2="select id from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$personal_id = $query4['id'];
						}
$query2="select id from asistencia where personal_id='".$personal_id."' and id_sucursal='".$sucursal_id[0]."' " ;
//echo $query2;
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)!=0)
					{
						$ban=1;	
						echo '<script type="text/javascript" language="javascript">alert("No se puede eliminar la asignacion porque ya se cargaron asistencias en ese cliente.");window.location.replace("sucursales_personal_edicion.php");</script>';
					}
					if($ban==0)
					{
						$query2="delete from sucursales_personal where personal_id='".$personal_id."' and sucursales_id='".$sucursal_id[0]."' " ;

					$res=mysql_query($query2,$con);	
					echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>';
					}