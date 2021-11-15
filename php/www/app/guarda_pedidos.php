<?php session_start();
 include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');


$ban=0;

	//************  DATOS  ALTA *********************

				
				$pedido_id='';
				$numpedido = trim($_POST['textfield']);
				$aux= explode("-", $_POST['textfield2']);
				//echo $_POST['textfield2'].'<br>';
				$fecha= $aux[2].'-'.$aux[1].'-'.$aux[0];
				//echo $fecha.'<br>';
				$equipos =  explode("--",$_POST['textfield12']);
				$ubicacion = $_POST['skills4'];
				
				$ubicacion_id='';
				$nombre = $_POST['textfield'];
				$cantidad =explode("--",$_POST['textfield11']);
				$obs = $_POST['textarea'];
				$unitario = explode("--",$_POST['textfield13']);
				$total = explode("--",$_POST['textfield14']);
				$precio_total=str_replace(".","",$_POST['textfield19']);
				//echo $_POST['textfield19']."<br>";
				$creador = $_SESSION["user"];				
				$fe_ultmodi = date('Y-m-d');	
				$mat=array();
				$fila=0;
				$query2="select id from proveedor where nombre='".$ubicacion."' " ;
			
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
							$ubicacion_id = $query4['id'];
						}
					}

				for ($x = 0; $x < count($equipos)-1; $x++) {
				$query2="select id from equipos where descrip='".$equipos[$x]."' " ;
				
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
						$mat[$fila]=$query4['id'];
					
						$fila=$fila+1;
						}
					}
				}
					


//					/// *********  grabacion del registro
				
					
if($ban==0)
{	
						$query2="INSERT INTO pedidos(proveedor_id,fecha,preciototal,numero,creadopor,feult_mod,obs,estado)  VALUES('".$ubicacion_id."','".$fecha."','".$precio_total."','".$numpedido."','".$creador."','".$fe_ultmodi."','".$obs."','NUEVO')";

						$resultado = mysql_query($query2);
						
						$query2="select id from pedidos where numero='".$numpedido."' and proveedor_id='".$ubicacion_id."' and fecha='".$fecha."'" ;
				$res=mysql_query($query2,$con);
					
						while($query4 = mysql_fetch_array($res) )
						{
							$pedido_id = $query4['id'];
						}
//					
						for ($x = 0; $x < count($equipos)-1; $x++)
		 				{					
		 					$query2="INSERT INTO ped_detalle(pedidos_id,equipos_id,cantidad,punitario,ptotal,obs)  VALUES('".$pedido_id."','".$mat[$x]."','".$cantidad[$x]."','".str_replace(".","",$unitario[$x])."','".str_replace(".","",$total[$x])."','".$obs."')";
//echo $query2."<br>";
						$resultado = mysql_query($query2);
		 				}
						
}

mysql_close($con);	
if($ban==0)
{	
									echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>'; 
}
else
{
echo "El registro de compra NO SE REALIZO, es posible que algunos datos no fueran correctos.";	
}
//									
?>