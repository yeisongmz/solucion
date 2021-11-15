<?php include ("conexion/conectar.php");
?>
<style type="text/css">
body {
	background-color: #FDFBFB;
}
</style>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<?php
$q='';
$x=0;
 $matr =array();
if (isset($_GET['q']))
{
	 $q=explode("," , $_GET['q']);
}
try 
{
if ($q<>'')
{
	$id='';

 

 if(count($q)>1)
 {
 	$sql="select id from personal where nombres ='".$q[0]."' and apellidos='".$q[1]."' and estado = 1 ";
 	$res=mysql_query($sql,$con);
 	if(mysql_num_rows($res)>0)
	{
		 while($fila=mysql_fetch_array($res))
		 {
			 $id=$fila['id'];
		 }
 	}
	$sql="select id,sucursales_id,desdefecha,desde_hora,hasta_hora,dias  from sucursales_personal where personal_id ='".$id."'  and estado_registro = 'VIGENTE' ";

 	$res=mysql_query($sql,$con);
 	if(mysql_num_rows($res)>0)
	{
		$x=0;
		 while($fila=mysql_fetch_array($res))
		 {
			  	$matr[$x][0]=$fila['sucursales_id'];
				$aux=explode("-",$fila['desdefecha']);
			  	$matr[$x][1]=$fila['dias'];//$aux[2]."-".$aux[1]."-".$aux[0];
			  	$matr[$x][2]=$fila['desde_hora'];
			  	$matr[$x][3]=$fila['hasta_hora'];	
			  	$matr[$x][4]=$fila['id'];
			  	$matr[$x][5]='';
				$matr[$x][6]='';
				$matr[$x][7]='';
				$x=$x+1;				  		  			  			  
		 }
		 for($a=0;$a<$x;$a++)
		 {
			 $sql="select razon_sucursal,cliente_id from sucursales where id ='".$matr[$a][0]."'  ";
			 //echo $sql."<br>";
	 		 $res=mysql_query($sql,$con);
			  while($fila2=mysql_fetch_array($res))
			  {
				   $matr[$a][5]=$fila2['razon_sucursal'];
				   $matr[$a][7]=$fila2['cliente_id'];
				    $sql="select razon from cliente where id ='".$fila2['cliente_id']."'  ";
					 //echo $sql."<br>";
					 $res2=mysql_query($sql,$con);
					  while($fila3=mysql_fetch_array($res2))
					  {
						   $matr[$a][6]=$fila3['razon'];
					  }
			  }
			 
		 }
 	}
 }
}


}
 catch(Exception $e) 
 {
   echo 'Message: ' .$e->getMessage();
 }

 
try 
{
echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla1">';
echo '<tbody>';
echo '<tr class="fondo_encabezado_buscador">';
echo '<td> Cliente';
echo '</td>';
echo '<td> Sucursal';
echo '</td>';
echo '<td> Dias';
echo '</td>';
echo '<td> Desde Hora';
echo '</td>';
echo '<td> Hasta Hora';
echo '</td>';

echo '<td>';
echo '</td>';
echo '</tr>';
 if(count($q)>1 and isset($x))
 {
  for($a=0;$a<$x;$a++){
// 	font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
    echo '<tr onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);" >';
		echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$matr[$a][6]." </a> ".'</td>';

	echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$matr[$a][5]." </a> ".'</td>';
echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$matr[$a][1]." </a> ".'</td>';
echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$matr[$a][2]." </a> ".'</td>';
echo '<td >'."<a href='#' style='font-size:14px;font-weight:normal;text-decoration:none;color:#0D21F7;font:Arial;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;   >".$matr[$a][3]." </a> ".'</td>';	
	
		echo '<td align="right" >'."<input type='radio' name='radio' value='".$matr[$a][0]."' id='radio_".$matr[$a][0]."' onClick='window.parent.cargar(this.value,".'"'.$matr[$a][2].'"'.",".'"'.$matr[$a][3].'"'.") ' >".'</td>';
	echo '</tr>';
 } 
	echo '</tbody>';
	echo '</table>';
	
 }
	
	
 }
 catch(Exception $e) 
 {
   echo 'Message: ' .$e->getMessage();
 }

?>