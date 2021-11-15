<?php 
	include ("conexion/conectar.php");
	// Parametros recibidos del remision_simple2.php
	// --------------------------------------------------------------
		$nombre=$_GET['nombre'];
		$fecha_remision = $_GET['fe_remision'];							
	// --------------------------------------------------------------
		$fecha_ultimo_envio = '' ; 
		
		
	$query2="SELECT equipos.`descrip`,equipos.`id`,equipos.`unidadMedida`,deta_plantilla2.`cantidad`,deta_plantilla2.`p_total`,deta_plantilla2.`p_unitario` FROM equipos,deta_plantilla2 WHERE deta_plantilla2.plantillas_id='".$nombre."' AND deta_plantilla2.`equipos_id`=equipos.`id` ORDER BY `descrip` DESC";
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res))
		{
			
		// Traigo datos de ultimo envio de un solo articulo
		// cantidad , fecha de ultimo envio , frecuencia en dias , fec.sig_envio
		//--------------------------------------------------------------------
		$valida ="SELECT rd.equipos_id, rd.cantidad, rd.dsc_producto, r.fecha AS f_ult_envio,
(SELECT frecuencia FROM deta_plantilla2 WHERE plantillas_id = r.plantilla_id AND equipos_id=rd.equipos_id) AS frec_dias,
DATE_ADD(r.fecha,INTERVAL (SELECT frecuencia FROM deta_plantilla2 WHERE plantillas_id = r.plantilla_id AND equipos_id=rd.equipos_id) DAY) AS sig_envio
FROM remisiondeta rd, remision r
WHERE rd.remision_id = r.id AND r.plantilla_id = ".$nombre." AND rd.equipos_id =".$query4['id'];
		//--------------------------------------------------------------------
		
		$consultaBD=mysql_query($valida,$con);				
		$resultado=mysql_fetch_array($consultaBD) ; 
		
		// Dato de ultimo envio ------------------------------------------

		/*$ver = "select fecha from remision where plantilla_id=".$nombre." order by fecha desc limit 1"  ;
		$consultaBD2=mysql_query($ver,$con);				
		$fecha_ultimo=mysql_fetch_array($consultaBD2) ; 

		if (isset($fecha_ultimo['fecha'])) {
			$date = date_create($fecha_ultimo['fecha']);
			$fecha_ultimo_envio = date_format($date, 'd-m-Y');
		} else{
			$fecha_ultimo_envio = 'ninguno';
			
		}*/
		



		if (isset($resultado['f_ult_envio'])) {
//			$date = date_create($resultado['f_ult_envio']);
//			$fecha_ultimo_envio = date_format($date, 'd-m-Y');
		} else{
//			$fecha_ultimo_envio = 'ninguno';
			
		}
		
		
		//echo "<script type='text/javascript'> parent.document.getElementById('dato1').value ='".$fecha_ultimo_envio."' ; <script>";
		//=====================================================================		
		
		// si la fecha de REMISON es MENOR o igual a la siguiente fecha de envio 
		// calculado carga la grilla con el insumo.
		if ($fecha_remision >= $resultado['sig_envio'] ){
		
			// AQUI SE PONE MARCA=NO, por lo tanto no se marca en rojo.-
				$rr=utf8_decode($query4['descrip']);
			 echo "<script type='text/javascript'> parent.document.getElementById('skills4').value ='".utf8_encode($rr)."' ; </script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield20').value =".$query4['cantidad']." ; </script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield21').value =".$query4['p_unitario']." ; format(textfield7)</script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield7').value ='".$query4['unidadMedida']."' ; </script>";
			echo "<script type='text/javascript'> parent.document.getElementById('marca').value ='NO' ; </script>";			 			 
			echo "<script type='text/javascript'> parent.document.getElementById('v_cantidad_original').value = parent.document.getElementById('v_cantidad_original').value+".$query4['cantidad']."+'*' </script>";			 			 			
			 echo "<script type='text/javascript'> window.parent.bajar3() ; </script>";						
			} else {
				// AQUI SE PONE MARCA=SI, por lo tanto se marca en ROJO.-
				$rr=utf8_decode($query4['descrip']);
			 echo "<script type='text/javascript'> parent.document.getElementById('skills4').value ='".utf8_encode($rr)."' ; </script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield20').value =".$query4['cantidad']." ; </script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield21').value =".$query4['p_unitario']." ; format(textfield7)</script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield7').value ='".$query4['unidadMedida']."' ; </script>";
			 echo "<script type='text/javascript'> parent.document.getElementById('marca').value ='SI' ; </script>";			 
			 echo "<script type='text/javascript'> parent.document.getElementById('v_cantidad_original').value = parent.document.getElementById('v_cantidad_original').value+".$query4['cantidad']."+'*' </script>";			 			 			
			 echo "<script type='text/javascript'> window.parent.bajar3() ; </script>";	
				
			}				
		}
							
	mysql_close($con);
?>
						