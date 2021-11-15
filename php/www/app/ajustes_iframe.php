<?php include ("conexion/conectar.php");?>
<style type="text/css">
body {
	background-color: #FDFBFB;
}
</style>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<?php
$q='';
$opc='';
$sql='';
$ano='';
$mes='';

if(isset($_GET['mes']) and $_GET['mes']!=="0" )
{
	$mes=$_GET['mes'];
}
if(isset($_GET['ano']) and $_GET['ano']!=="0" )
{
	$ano=$_GET['ano'];
}
if (isset($_GET['opc']))
{
	 $opc=$_GET['opc'];
}

if (isset($_GET['q']))
{
	 $q=$_GET['q'];
}

if ($q<>'')
{
	$x=explode(",",$q);
	$sql2="select id from personal where nombres='".$x[0]."' and apellidos='".$x[1]."' and estado=1 ";
	//echo $sql2;
	 $res2=mysql_query($sql2,$con);
 	if(mysql_num_rows($res2)>0){
		
		while($fila=mysql_fetch_array($res2)){
		$q=$fila['id'];	
		}
 	}
	if($opc==1)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,descuentos.`fecha`,descuentos.`concepto`,descuentos.`importe`,descuentos.`id` FROM personal,descuentos WHERE personal.`id`=descuentos.`personal_id` and personal.`id`='".$q."' and month(fecha)='".$mes."'  and year(fecha)='".$ano."' ORDER BY personal.`apellidos` limit 2000";
				//echo $sql;
				
	}
	if($opc==2)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,bonificacion.`fecha`,bonificacion.`concepto`,bonificacion.`importe`,bonificacion.`id` FROM personal,bonificacion WHERE personal.`id`=bonificacion.`personal_id` and personal.`id`='".$q."' and month(fecha)='".$mes."' and year(fecha)='".$ano."' ORDER BY personal.`apellidos` LIMIT 2000";	
	}
	
	if($opc==3)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,ausencias.`fecha`,ausencias.`motivo` AS concepto,'' AS importe,ausencias.`id` FROM personal,ausencias WHERE personal.`id`=ausencias.`personal_id` and personal.`id` ='".$q."' and month(fecha)='".$mes."' and year(fecha)='".$ano."'  ORDER BY personal.`apellidos` LIMIT 2000";	
	}
	
	if($opc==4)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,adelantos.`fecha`,adelantos.`obs` AS concepto,adelantos.`importe`,adelantos.`id` FROM personal,adelantos WHERE personal.`id`=adelantos.`personal_id` and personal.`id`='".$q."' and month(fecha)='".$mes."' and year(fecha)='".$ano."' ORDER BY personal.`apellidos` LIMIT 2000";	
	}
	if($opc=="5" and $mes!=="0")
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,asistencia.`fecha`,asistencia.`fecha_asistencia`,asistencia.id FROM personal,asistencia WHERE personal.`id`=asistencia.`personal_id` and month(asistencia.fecha)='".$mes."' and year(asistencia.fecha)='".$ano."' and personal.`id` ='".$q."' group by  month(asistencia.fecha)  ORDER BY personal.`apellidos`";	
	}
}
else
{
	
	if($opc==1)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,descuentos.`fecha`,descuentos.`concepto`,descuentos.`importe`,descuentos.`id` FROM personal,descuentos WHERE personal.`id`=descuentos.`personal_id` and month(fecha)='".$mes."' and year(fecha)='".$ano."' ORDER BY personal.`apellidos` limit 2000";	
	}
	if($opc==2)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,bonificacion.`fecha`,bonificacion.`concepto`,bonificacion.`importe`,bonificacion.`id` FROM personal,bonificacion WHERE personal.`id`=bonificacion.`personal_id` and month(fecha)='".$mes."' and year(fecha)='".$ano."'  ORDER BY personal.`apellidos` LIMIT 2000";	
	}
	
	if($opc==3)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,ausencias.`fecha`,ausencias.`motivo` AS concepto,'' AS importe,ausencias.`id` FROM personal,ausencias WHERE personal.`id`=ausencias.`personal_id` and month(fecha)='".$mes."' and year(fecha)='".$ano."'  ORDER BY personal.`apellidos` LIMIT 2000";	
	}
	
	if($opc==4)
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,adelantos.`fecha`,adelantos.`obs` AS concepto,adelantos.`importe`,adelantos.`id` FROM personal,adelantos WHERE personal.`id`=adelantos.`personal_id` and month(fecha)='".$mes."' and year(fecha)='".$ano."' ORDER BY personal.`apellidos` LIMIT 2000";	
	}
	if($opc=="5" and $mes!=="0")
	{
				$sql="SELECT personal.`nombres`,personal.`apellidos`,asistencia.`fecha`,asistencia.`fecha_asistencia`,asistencia.id FROM personal,asistencia WHERE personal.`id`=asistencia.`personal_id` and month(asistencia.fecha_asistencia)='".$mes."' and year(date(asistencia.fecha_asistencia))='".$ano."' GROUP BY personal.id,YEAR(DATE(asistencia.`fecha`)),MONTH(DATE(asistencia.`fecha`)) ORDER BY personal.`apellidos`";	
	}
	
}
//echo $opc."<br>";
//echo $sql;

 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{
if($opc!=="5")
	{
					echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
					echo '<tbody>';
					echo '<tr class="fondo_encabezado_buscador">';
					
					echo '<td> Personal';
					echo '</td>';
					echo '<td> Fecha';
					echo '</td>';
					echo '<td> Concepto';
					echo '</td>';
					echo '<td> Importe';
					echo '</td>';
					echo '<td>';
					echo '</td>';
					echo '</tr>';
					 while($fila=mysql_fetch_array($res)){
					// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
						echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
						
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$fila['nombres'].", ".$fila['apellidos']." </a> ".'</td>';
						$aux=explode("-",$fila['fecha']);
						$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['fecha']." </a> ".'</td>';
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['concepto']." </a> ".'</td>';
						$aux2='';
						if(!empty($fila['importe']))
						{
							$aux2=number_format($fila['importe'],'0','','.');
						}
						
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
							//echo '<td align="right" >'."<input type='checkbox' name='checkbox' id='".$fila['id']."' onClick='window.parent.cargar(".$fila['id']."); ' >".'</td>';
							
							
							echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
						echo '</tr>';
						
						echo '</tr>';
						
					 
					 
					 }
						mysql_close($con);
						echo '</tbody>';
						echo '</table>';
	}
	else
	{
						echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
						echo '<tbody>';
						echo '<tr class="fondo_encabezado_buscador">';
						
						echo '<td> Personal';
						echo '</td>';
						echo '<td> Fecha asistencia (se indica solo 1 por mes)';
						echo '</td>';
						echo '<td> Fecha  de carga';
						echo '</td>';
						echo '<td>';
						echo '</td>';
						echo '</tr>';
						 while($fila=mysql_fetch_array($res)){
						// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
							echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
							
							echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$fila['apellidos'].", ".$fila['nombres']." </a> ".'</td>';
							$aux=explode("-",$fila['fecha']);
							$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
							echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
							$aux=explode("-",$fila['fecha_asistencia']);
							$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
							echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
							echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
							echo '</tr>';
							
							echo '</tr>';
							
						 
						 
						 }
							mysql_close($con);
							echo '</tbody>';
							echo '</table>';
							}
 }

?>