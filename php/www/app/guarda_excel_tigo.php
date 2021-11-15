<?php include ("conexion/conectar.php");
if(isset($_GET['funcionario']))
{
$b= $_GET['funcionario'];
echo $b."<br>";
$query2="INSERT INTO prueba(funcionario,desde,hasta,horas,fecha)  VALUES('".$b."','','','','')";
								
									$resultado = mysql_query($query2);
									mysql_close($con);
	
}
//echo $_GET['prueba'];

?>