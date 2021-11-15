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
 	$sql="SELECT * FROM plantillas2 WHERE nombre LIKE '".$q."%'  order by nombre";
}
else
{
	
	$sql="SELECT * FROM plantillas2 order by nombre";	
}
//echo $sql;
 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';

echo '<td> Nombre Plantilla';
echo '</td>';

echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr  onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';

	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['nombre']." </a> ".'</td>';
	//echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['ubicacion']." </a> ".'</td>';
	
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>