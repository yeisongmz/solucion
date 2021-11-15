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
$res='';
if ($q<>'')
{
 	$q=$_GET['q'];
 	$sql="select * from planilla_banco where documentos LIKE '".$q."%'  order by documentos asc";
	$res=mysql_query($sql,$con);
}
else
{
	
	$sql="select * from planilla_banco  order by fecha asc";	
	$res=mysql_query($sql,$con);
}
//echo $sql;
 

 if(mysql_num_rows($res)==0){

 

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';
echo '<td> Fecha';
echo '</td>';
echo '<td> Monto';
echo '</td>';
echo '<td> Notas';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){

 	echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
	$aux=explode("-",$fila['fecha']);
	$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$aux2." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['montototal']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['notas']." </a> ".'</td>';
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>