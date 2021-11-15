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
if ($q<>'')
{

	$query2=mysql_query("SELECT id FROM proveedor where nombre='".$q."'   " );
	
	$id=0;
						while($query4=mysql_fetch_array($query2))
						{
							$id=$query4['id'];
						}
	
 	$sql="SELECT mov_equipo.*,proveedor.`nombre`,SUM(com_importe) AS total FROM mov_equipo,proveedor WHERE mov_equipo.proveedor_id>0 AND proveedor.`id`=mov_equipo.proveedor_id and mov_equipo.proveedor_id ='".$id."'  GROUP BY mov_equipo.com_nrofact order by mov_equipo.fecha desc";
//echo $sql;
	 $res=mysql_query($sql,$con);
}
else
{
	
	$sql="SELECT mov_equipo.*,proveedor.`nombre`,SUM(com_importe) AS total FROM mov_equipo,proveedor WHERE mov_equipo.proveedor_id>0 AND proveedor.`id`=mov_equipo.`proveedor_id`   GROUP BY com_nrofact ORDER BY mov_equipo.fecha DESC LIMIT 1000";	
	
	 $res=mysql_query($sql,$con);
}


			echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
			echo '<tbody>';
			echo '<tr class="fondo_encabezado_buscador">';
			
			echo '<td> Proveedor';
			echo '</td>';
			echo '<td> Fecha';
			echo '</td>';
			echo '<td> Nº Factura';
			echo '</td>';
			echo '<td align="right"> Total';
			echo '</td>';
			echo '<td>';
			echo '</td>';
			echo '</tr>';
					 while($fila=mysql_fetch_array($res)){
				
						echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);">';
						
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['nombre']." </a> ".'</td>';
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['fecha']." </a> ".'</td>';
						
						echo '<td >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['com_nrofact']." </a> ".'</td>';
						echo '<td  align="right" >'."<a href='#' style='font-size:12px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".number_format($fila['total'],'0','','.')." </a> ".'</td>';
						
						echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['com_nrofact'].','.$fila['proveedor_id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
						echo '</tr>';
						
						
					 
					 } echo '</tbody>';
						echo '</table>';
 