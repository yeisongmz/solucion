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
$res='';
$sql='';
if(!empty($_GET['q']))
{
	 $q=$_GET['q'];
}
if ($q<>'' and $q<>'999999')
{

	if(is_numeric($q)==false)
	{
		$b=explode("," , $q);
 	$sql="select * from personal where apellidos ='".$b[1]."' and nombres='".$b[0]."' and estado=1 order by apellidos asc";
	}
	else
	{
	$sql="select * from personal where nro_docum = '".$q."%'  and estado=1  order by apellidos asc";	
	}
	 $res=mysql_query($sql,$con);
}
else
{
	if ($q<>'999999')
	{
	$sql="select * from personal where estado=1 order by apellidos asc ";	
	}
	else
	{
	$sql="select * from personal where estado=0 order by apellidos asc ";		
	}
	 $res=mysql_query($sql,$con);
}




			echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
			echo '<tbody>';
			echo '<tr class="fondo_encabezado_buscador">';
			
			echo '<td> Apellidos';
			echo '</td>';
			echo '<td> Nombres';
			echo '</td>';
			echo '<td> Nº Documento';
			echo '</td>';
			echo '<td> Celular';
			echo '</td>';
			echo '<td> Direcci&oacute;n';
			echo '</td>';
			echo '<td>';
			echo '</td>';
			echo '</tr>';
					 while($fila=mysql_fetch_array($res)){
				
						echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);">';
						
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['apellidos']." </a> ".'</td>';
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['nombres']." </a> ".'</td>';
						
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['nro_docum']." </a> ".'</td>';
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['telMovil']." </a> ".'</td>';
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['direccion']." </a> ".'</td>';
						//echo '<td >'."<input type='checkbox' name='checkbox' id='".$fila['id']."' onClick='window.parent.cargar(".$fila['id']."); ' >".'</td>';
						echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
						echo '</tr>';
						
						
					 
					 } echo '</tbody>';
						echo '</table>';
 