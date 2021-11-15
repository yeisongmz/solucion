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
$sql='';
if(isset($_GET['q']))
{
	 $q=$_GET['q'];
}
if ($q<>'')
{
	$q=explode(",", $_GET['q']);
	$sql="select id from personal where apellidos='".$q[1]."' and nombres='".$q[0]."' and estado = 1";
	
	 $res=mysql_query($sql,$con);

 	if(mysql_num_rows($res)>0){
		 while($fila=mysql_fetch_array($res))
		 {
			$q= $fila['id'];
		 }
			 
 	}

	$sql="SELECT prestamos.`id`, prestamos.`plazo`, prestamos.`fecha`,prestamos.`fe_pricuota`,prestamos.`interes`,prestamos.`monto`,prestamos.`motivo`,personal.`nombres`,personal.`apellidos` FROM prestamos,personal WHERE  prestamos.personal_id = '".$q."' and personal.`id`=prestamos.`personal_id`  ORDER BY personal.`apellidos`,fecha ASC";	
	$res=mysql_query($sql,$con);
}
else
{
	
	$sql="SELECT prestamos.`id`, prestamos.`plazo`, prestamos.`fecha`,prestamos.`fe_pricuota`,prestamos.`interes`,prestamos.`monto`,prestamos.`motivo`,personal.`nombres`,personal.`apellidos` FROM prestamos,personal WHERE personal.`id`=prestamos.`personal_id` ORDER BY personal.`apellidos`,fecha ASC";	
}

 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res) == 0){



 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';

echo '<td> Personal';
echo '</td>';
echo '<td align="right"> Fecha del Préstamo';
echo '</td>';
echo '<td align="center"> Monto del Préstamo';
echo '</td>';
echo '<td align="center"> Cantidad Cuotas';
echo '</td>';
echo '<td align="right"> Interes';
echo '</td>';
echo '<td align="center"> Fecha Primera Cuota';
echo '</td>';
echo '<td> Motivo';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);">';
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['nombres'].", ".$fila['apellidos']." </a> ".'</td>';
	$aux=explode("-",$fila['fecha']);
	$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
	echo '<td align="right">'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
	echo '<td align="center" >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'   >".number_format($fila['monto'], 0, ',', '.')." </a> ".'</td>';
	echo '<td align="center">'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['plazo']." </a> ".'</td>';
	echo '<td align="right">'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['interes']." </a> ".'</td>';
	$aux=explode("-",$fila['fe_pricuota']);
	$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
	echo '<td align="center">'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['motivo']." </a> ".'</td>';
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>