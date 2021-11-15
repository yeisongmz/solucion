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
	$res='';
if (isset($_GET['q']))
{
	 $q=$_GET['q'];
}
if ($q<>'')
{
	 $q=$_GET['q'];
	
 	$sql="select * from proveedor where nombre LIKE '".$q."%'  order by nombre asc";
	 $res=mysql_query($sql,$con);
}
else
{
	
	$sql="select * from planillasueldoips  order by ano asc,mes asc ";	
	 $res=mysql_query($sql,$con);
}

 $res=mysql_query($sql,$con);

 if(mysql_num_rows($res)==0){



 }else{

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';

echo '<td> Año';
echo '</td>';
echo '<td> Mes';
echo '</td>';
echo '<td> Referencia';
echo '</td>';
echo '<td>';
echo '</td>';
echo '</tr>';
 while($fila=mysql_fetch_array($res)){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
 	echo '<tr  onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
	
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['ano']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['mes']." </a> ".'</td>';
	echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['Referencia']." </a> ".'</td>';
	echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
	echo '</tr>';
	
 
 
 }

	echo '</table>';
 }
mysql_close($con);
?>