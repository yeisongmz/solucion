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
	//echo $q."   hola hola"."<br>";
 	$sql="select * from conceptos where concepto LIKE '".$q."%'  order by concepto asc";
}
else
{
	
	$sql="select * from conceptos   order by concepto asc limit 200";	
}

 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';
echo '<td  height="30" > Id';
echo '</td>';
echo '<td> Concepto';
echo '</td>';
echo '<td> Tipo';
echo '</td>';
echo '<td> Obs.';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
	echo '<td>'.$fila['id'].'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['concepto']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['tipo']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['obs']." </a> ".'</td>';
		//echo '<td align="right" >'."<input type='checkbox' name='checkbox' id='".$fila['id']."' onClick='window.parent.cargar(".$fila['id']."); ' >".'</td>';
		echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>