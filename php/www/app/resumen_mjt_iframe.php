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
if (isset($_GET['q']))
{
	 $q=$_GET['q'];
}
if ($q<>'')
{
	 $q=$_GET['q'];
//	echo $q."   hola hola"."<br>";
 	$sql="select * from planillamt where id = '".$q."%'  order by fe_ultmodi asc";
}
else
{
	
	$sql="select * from planillamt where referencia='RESUMEN'  order by fe_ultmodi limit 200";	
}
//echo $sql;
 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';

echo '<td> Periodo';
echo '</td>';
echo '<td> Mes';
echo '</td>';
echo '<td> Observación';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
	
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$fila['periodo']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['mes']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['obs']." </a> ".'</td>';
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }