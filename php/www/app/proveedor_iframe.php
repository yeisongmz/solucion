<?php include ("conexion/conectar.php");?>

<script src="js/funciones.js"></script>
<style type="text/css">
body {
	background-color: #FDFBFB;
}
</style>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<?php
	$q='';
if (isset($_GET['q']))
{
	 $q=$_GET['q'];
}
if ($q<>'')
{
	 $q=$_GET['q'];
	//echo $q."   hola hola"."<br>";
 	$sql="select * from proveedor where nombre LIKE '".$q."%'  order by nombre asc";
}
else
{
	
	$sql="select * from proveedor  order by nombre asc ";	
}

 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';

echo '<td> Nombre';
echo '</td>';
echo '<td> Direcci&oacute;n';
echo '</td>';
echo '<td> Tel&eacute;fono';
echo '</td>';
echo '<td> Contacto';
echo '</td>';
echo '<td> Celular';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr  onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';

	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['nombre']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['direccion']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['telefono']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['contacto']." </a> ".'</td>';
		echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['telmovil']." </a> ".'</td>';
	//echo '<td align="right" >'."<input type='checkbox' name='checkbox' id='".$fila['id']."' onClick='window.parent.cargar(".$fila['id']."); ' >".'</td>';
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>