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
 	$sql="select * from adjuntos where referencia ='EQUIPO' and nom_archivo LIKE '".$q."%' order by nom_archivo asc";
}
else
{
	$equipo_id = explode("--",$_GET['id']);
	$equipo_id2 = $equipo_id[0];
	$sql="select * from adjuntos where relacion ='EQUIPOS' and equipos_id='".$equipo_id2."' order by nom_archivo limit 200";	
}
//echo $sql;
 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';

echo '<td> Documentos';
echo '</td>';
echo '<td> Referencia';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;

	echo '<td >'."<a href='".$fila['path_archivo']."' target='_blank' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$fila['nom_archivo']." </a> ".'</td>';
	
	echo '<td >'."<a href='".$fila['path_archivo']."' target='_blank' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$fila['referencia']." </a> ".'</td>';
		//echo '<td align="right" >'."<input type='checkbox' name='checkbox' id='".$fila['id']."' onClick='window.parent.cargar(".$fila['id']."); ' >".'</td>';
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>