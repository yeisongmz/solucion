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
if(!empty($_GET['q']))
{
	 $q=$_GET['q'];
}

if ($q<>'' )
{
	$x=explode(",", $_GET['q']);
	$x2='';
	$sql="SELECT id from personal where apellidos = '".$x[0]."' and nombres='".$x[1]."' and estado = 1 ";
	
	$res=mysql_query($sql,$con);
	 while($fila=mysql_fetch_array($res)){
		$x2=$fila['id']; 
	 }
	
	$sql="SELECT liquisalida.`id`,liquisalida.`personal_id`,liquisalida.`fechaemision`,liquisalida.`fecharetiro`,liquisalida.`totalPagar`,personal.`apellidos`,personal.`nombres` FROM liquisalida,personal WHERE liquisalida.`personal_id`=personal.`id` AND personal.`estado`=0  and personal_id = '".$x2."'  order by personal.`apellidos` DESC";	

	$res=mysql_query($sql,$con);
}
else
{
	
	$sql="SELECT liquisalida.`id`,liquisalida.`personal_id`,liquisalida.`fechaemision`,liquisalida.`fecharetiro`,liquisalida.`totalPagar`,personal.`apellidos`,personal.`nombres` FROM liquisalida,personal WHERE liquisalida.`personal_id`=personal.`id` AND personal.`estado`=0  ORDER BY personal.`apellidos` DESC ";		
	$res=mysql_query($sql,$con);
}


 

 if(mysql_num_rows($res)==0){

 //echo '<b>No hay sugerencias</b>';onClick="cargar(this.id)"

 }else{

			echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
			echo '<tbody>';
			echo '<tr class="fondo_encabezado_buscador">';
			
			echo '<td> Personal';
			echo '</td>';
			echo '<td> Fecha emisión';
			echo '</td>';
			echo '<td> Fecha retiro';
			echo '</td>';
			echo '<td> Pagado';
			echo '</td>';
			
			echo '<td>';
			echo '</td>';
			echo '</tr>';
					 while($fila=mysql_fetch_array($res)){
				
						echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);">';
						
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['apellidos'].', '.$fila['nombres']." </a> ".'</td>';
						$aux=explode("-",$fila['fechaemision']);
						$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
						$aux=explode("-",$fila['fecharetiro']);
						$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
						
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
						
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".number_format($fila['totalPagar'],'0',',','.')." </a> ".'</td>';

						echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
						echo '</tr>';
						
						
					 
					 } echo '</tbody>';
						echo '</table>';
 } 
 mysql_close($con);