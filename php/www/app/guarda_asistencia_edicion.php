<?php include ("conexion/conectar.php");
$personal=$_POST['textfield'];
$mes=$_POST['textfield2'];
$ano=$_POST['textfield3'];
$fechas=explode('&',$_POST['textarea6']);
$entrada=explode('&',$_POST['textarea']);
$salida=explode('&',$_POST['textarea2']);
$cantidad=explode('&',$_POST['textarea3']);
$diurnas=explode('&',$_POST['textarea4']);
$nocturnas=explode('&',$_POST['textarea5']);
$identificadores=explode('&',$_POST['textarea7']);

for($i=0;$i<count($fechas)-1;$i++)
{
	$aux=explode('-',$fechas[$i]);
	$query2="update asistencia set hs_cantidad='".$cantidad[$i]."',horas_nocturnas='".$nocturnas[$i]."' where id='".$identificadores[$i]."' " ;
	
	//echo $query2."<br>";
	
$res=mysql_query($query2,$con);	
}
mysql_close($con);
header("Location: asistencias_iframe.php");
	