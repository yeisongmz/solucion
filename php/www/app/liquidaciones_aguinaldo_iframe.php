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
	$sql="SELECT id from personal where apellidos = '".trim($x[0])."' and nombres='".trim($x[1])."' and estado = 1 ";
	
	$res=mysql_query($sql,$con);
	 while($fila=mysql_fetch_array($res)){
		$x2=$fila['id']; 
	 }
	
	$sql="SELECT liquiregular.`id`  as ss,liquiregular.`personal_id`,liquiregular.`fecha`,liquiregular.`desde`,liquiregular.`hasta`,liquiregular.`totalPagar`,liquiregular.`canhorastraba`,personal.`apellidos`,personal.`nombres`,liquidetalle.* FROM liquiregular,personal,liquidetalle WHERE liquiregular.`personal_id`=personal.`id` AND personal.`estado`=1  and liquiregular.personal_id = '".$x2."' and liquiregular.`fecha`=liquiregular.`desde` and liquiregular.`hasta` and liquiregular.`fecha` AND liquidetalle.`LiquiRegular_id`=liquiregular.`id` order by fecha desc";	

	$res=mysql_query($sql,$con);
}
else
{
	
	$sql="SELECT liquiregular.`id` as ss,liquiregular.`personal_id`,liquiregular.`fecha`,liquiregular.`desde`,liquiregular.`hasta`,liquiregular.`totalPagar`,liquiregular.`canhorastraba`,personal.`apellidos`,personal.`nombres`,liquidetalle.* FROM liquiregular,personal,liquidetalle WHERE liquiregular.`personal_id`=personal.`id` AND personal.`estado`=1 and liquiregular.`fecha`=liquiregular.`desde` and liquiregular.`hasta` and liquiregular.`fecha` AND liquidetalle.`LiquiRegular_id`=liquiregular.`id` ORDER BY fecha DESC ";		
	$res=mysql_query($sql,$con);
}

 //echo $sql;

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
			
			echo '<td align="right">Monto';
			echo '</td>';
			echo '<td>';
			echo '</td>';
			echo '</tr>';
					 while($fila=mysql_fetch_array($res)){
				
						echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);">';
						
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$fila['apellidos'].', '.$fila['nombres']." </a> ".'</td>';
	$aux=explode("-",$fila['fecha']);
	$aux2=$aux[2]."/".$aux[1]."/".$aux[0];
						echo '<td >'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".$aux2." </a> ".'</td>';

//$aux=($fila['totalPagar']/12)-$fila['importe'];
$aux=$fila['totalPagar'];
						
						echo '<td align="right">'."<a href='#' style='font-size:16px;font-weight:normal;text-decoration:none;color:#0B0B0B;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;'  >".number_format($aux,'0',',','.')." </a> ".'</td>';

						echo '<td align="right" >'."<input type='radio' name='radio' value='".$fila['ss']."' id='radio_".$fila['ss']."' onClick='window.parent.cargar(this.value); ' >".'</td>';
						echo '</tr>';
						
						
					 
					 } echo '</tbody>';
						echo '</table>';
 } 
 mysql_close($con);