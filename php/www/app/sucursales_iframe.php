<?php include ("conexion/conectar.php");?>
<style type="text/css">
body {
	background-color: #FDFBFB;
}
</style>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<?php
	 $q=$_GET['q'];
//echo 'window.parent.cargar2(7,'.chr(39).'6'.chr(39).')';
if ($q<>'')
{
	 $q=explode("--",$_GET['q']);

 	$sql="select * from sucursales where cliente_id = '".$q[0]."'  order by razon_sucursal asc";

}

 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';
echo '<td> Sucursal';
echo '</td>';
echo '<td> Direcci&oacute;n';
echo '</td>';
echo '<td> Tel&eacute;fono';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
	
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['razon_sucursal']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['direccion']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['telefono']." </a> ".'</td>';
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar2(".$fila['id'].',"'.$fila['razon_sucursal'].'"'."); ' >".'</td>';
	//echo '<td >'."<input type='checkbox' name='checkbox' id='".$fila['id']."' onClick='window.parent.cargar2(".$fila['id'].',"'.$fila['razon_sucursal'].'"'."); ' >".'</td>';
	//echo 'window.parent.cargar2(7,'.chr(39).'6'.chr(39).')';
//	cargar(".$fila['id']."); ' >".'</td>';
	echo '</tr>';
	
 
 
 }
	echo '</tbody>';
	echo '</table>';
 }

?>
