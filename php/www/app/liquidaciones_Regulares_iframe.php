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
	$sql="SELECT id from personal where apellidos = '".$x[1]."' and nombres='".$x[0]."' and estado = 1 ";
	//echo $sql;
	$res=mysql_query($sql,$con);
	 while($fila=mysql_fetch_array($res)){
		$x2=$fila['id']; 
	 }
	
	$sql="SELECT liquiregular.`id`,liquiregular.`personal_id`,liquiregular.`fecha`,liquiregular.`desde`,liquiregular.`hasta`,liquiregular.`totalPagar`,liquiregular.`canhorastraba`,personal.`apellidos`,personal.`nombres` FROM liquiregular,personal WHERE liquiregular.`personal_id`=personal.`id` AND personal.`estado`=1  and liquiregular.personal_id = '".$x2."'  order by personal.`apellidos`,personal.`nombres` desc";	

	$res=mysql_query($sql,$con);
}
else
{
	$aux=date('m');
	$sql="SELECT liquiregular.`id`,liquiregular.`personal_id`,liquiregular.`fecha`,liquiregular.`desde`,liquiregular.`hasta`,liquiregular.`totalPagar`,liquiregular.`canhorastraba`,personal.`apellidos`,personal.`nombres` FROM liquiregular,personal WHERE liquiregular.`personal_id`=personal.`id` AND personal.`estado`=1 and month(liquiregular.`fecha`)='".$aux."' ORDER BY personal.`apellidos`,personal.`nombres` DESC ";		
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
			echo '<td> Fecha';
			echo '</td>';
			echo '<td> Desde';
			echo '</td>';
			echo '<td> Hasta';
			echo '</td>';
			echo '<td align="right">Horas Trabajadas';
			echo '</td>';
			echo '<td align="right">Total a Pagar';
			echo '</td>';
			echo '<td>';
			echo '</td>';
			echo '</tr>';
					 while($fila=mysql_fetch_array($res)){
				
						echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);">';
						
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['apellidos'].', '.$fila['nombres']." </a> ".'</td>';
	$aux=explode("-",$fila['fecha']);
	$aux2=$aux[2]."-".$aux[1]."-".$aux[0];
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
	$aux=explode("-",$fila['desde']);
	$aux2=$aux[2]."-".$aux[1]."-".$aux[0];						
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
$aux=explode("-",$fila['hasta']);
	$aux2=$aux[2]."-".$aux[1]."-".$aux[0];							
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';
						echo '<td align="right" >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['canhorastraba']." </a> ".'</td>';
						echo '<td align="right">'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".number_format($fila['totalPagar'],'0',',','.')." </a> ".'</td>';

						echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['id']."' id='radio_".$fila['id']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
						echo '</tr>';
						
						
					 
					 } echo '</tbody>';
						echo '</table>';
 } 
 mysql_close($con);