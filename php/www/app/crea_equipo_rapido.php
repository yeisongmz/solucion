<?php include ("conexion/conectar.php");
$descrip=$_GET['equipo'];
$x=explode("-", $_GET['fecha']);
$fechacompra=$x[2]."-".$x[1]."-".$x[0];
$ban=0;

$creador = $_SESSION["user"];	
$fe_ultmodi = date('Y-m-d');
$query2="select id from equipos where descrip='".$descrip."' " ;

					$res=mysql_query($query2,$con);

					while($query4 = mysql_fetch_array($res) )
						{
							$ban=1;
						
						}
						if($ban==0)
						{
							$query2="INSERT INTO equipos(descrip,tipo,creador,fe_ultmodi,fechacompra)  VALUES('".strtoupper(trim ($descrip))."','Otros','".$creador."','".$fe_ultmodi."','".$fechacompra."')";

							$resultado = mysql_query($query2);
							echo "<script type='text/javascript'> parent.document.getElementById('textfield16').value = 'Otros';parent.document.getElementById('textfield17').value = '5' </script>";
						}
									mysql_close($con);


?>