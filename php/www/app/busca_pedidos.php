<?php 
 include ("conexion/conectar.php");
 $numero=$_GET['numero'];
$query2="SELECT pedidos.`id`,ped_detalle.`cantidad`,equipos.`descrip`,ped_detalle.`ptotal`,ped_detalle.`punitario`,ped_detalle.`cant_recibida`,equipos.`tipo` FROM pedidos,ped_detalle,equipos WHERE pedidos.`id`=ped_detalle.`Pedidos_id` AND equipos.`id`=ped_detalle.`equipos_id` AND pedidos.`numero`='".$numero."' and (ped_detalle.`cant_recibida` is null or ped_detalle.`cant_recibida`<>cantidad)" ;

$res=mysql_query($query2,$con);

									
							
						while($query4 = mysql_fetch_array($res))
						{
						$resta=0;
						$resta=$query4['cantidad']-$query4['cant_recibida'];
						$rr=utf8_decode($query4['descrip']);
 echo "<script type='text/javascript'> parent.document.getElementById('skills2').value ='".utf8_encode($rr)."' ; </script>";
 echo "<script type='text/javascript'> parent.document.getElementById('number').value =".$resta." ; </script>";
  echo "<script type='text/javascript'> parent.document.getElementById('textfield16').value ='".$query4['tipo']."' ; </script>";
 echo "<script type='text/javascript'> parent.document.getElementById('number3').value =".$query4['ptotal']." ; format(number3)</script>";
 echo "<script type='text/javascript'> window.parent.bajar3() ; </script>";
						}
						mysql_close($con);
						?>