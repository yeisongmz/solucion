<?php 
 include ("conexion/conectar.php");
 $nombre=$_GET['nombre'];
$query2="SELECT equipos.`descrip`,equipos.`id`,deta_plantilla.`cantidad`,deta_plantilla.`p_total`,deta_plantilla.`p_unitario` FROM equipos,deta_plantilla WHERE deta_plantilla.plantillas_id='".$nombre."' AND deta_plantilla.`equipos_id`=equipos.`id`  order by  descrip desc";

$res=mysql_query($query2,$con);

									
							
						while($query4 = mysql_fetch_array($res))
						{
						//echo $query4['descrip']."<br>";
						$rr=utf8_decode($query4['descrip']);
 echo "<script type='text/javascript'> parent.document.getElementById('skills2').value ='".utf8_encode($rr)."' ; </script>";
 echo "<script type='text/javascript'> parent.document.getElementById('textfield3').value =".$query4['cantidad']." ; </script>";
 echo "<script type='text/javascript'> parent.document.getElementById('textfield7').value =".$query4['p_unitario']." ; format(textfield7)</script>";
 echo "<script type='text/javascript'> window.parent.bajar3() ; </script>";
						}
						mysql_close($con);
						?>
                      
