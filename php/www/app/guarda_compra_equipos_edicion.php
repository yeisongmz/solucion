<?php session_start();
 include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');


$ban=0;

	//************  DATOS  ALTA *********************

	
$pedido='';
if(isset($_POST['textfield18']))
{
	$pedido=$_POST['textfield18'];
}
				$proveedor_id = trim($_POST['skills4']);
				$equipo_id = '';
				$equipos =  explode(";",$_POST['textfield12']);
				$ubicacion = $_POST['skills3'];
				$fecha =  explode("-",$_POST['textfield']);
				$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
				$tipo = explode("-",$_POST['textfield14']);
				$tipo2='';
				$cantidad =explode("-",$_POST['textfield11']);
				$obs = $_POST['textarea'];
				$com_nrofact = $_POST['number2'];
				$com_importe = explode("-",$_POST['textfield13']);
				$creador = $_SESSION["user"];				
				$fe_ultmodi = date('Y-m-d G:i:s');	
				$equipos_id=array();
				//*****************************************************************
				//*****************************************************************
				//          			RETRO TRACCION
				//*****************************************************************
				//*****************************************************************
				
				$query2="SELECT * FROM mov_equipo where com_nrofact='".$_POST['textfield19']."'" ;
					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$query2="UPDATE stock SET cantidad=cantidad-".str_replace(".","",$query4['cantidad'])." where equipos_id='".$query4['equipos_id']."' and Ubicacion_dep_id='".$query4['idubic_destino']."' ";
							$resultado = mysql_query($query2);
						}
					$query2="delete FROM mov_equipo where com_nrofact='".$_POST['textfield19']."'";
					$resultado = mysql_query($query2);
				//*****************************************************************
				//*****************************************************************		

					$query2="select id from proveedor where nombre='".$proveedor_id."' " ;
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$proveedor_id = $query4['id'];
						}

						
//******* INSERCION BRUTA				EQUIPO ID *******************
				$equipo_id='';						
				$equipo_id = explode(";",$_POST['textfield12']); 
					
				for ($x = 0; $x < count($equipo_id)-1; $x++) {
					//echo  count($equipo_id).'<br>';	
						$query2="select id from equipos where descrip='".$equipos[$x]."' " ;
						//echo $query2;
						$res=mysql_query($query2,$con);
						if(mysql_num_rows($res)==0)
						{
							$ban=1;	
						}
						while($query4 = mysql_fetch_array($res) )
						{
							$equipos_id[$x] = $query4['id'];
							
						}
					}
					//echo $ban.'<br>';		
					//echo "hola";
				$query2="select id from ubicacion_dep where ubicacion='".$ubicacion."' " ;

					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$ubicacion = $query4['id'];
							$idubic_origen = $ubicacion;
							$idubic_destino = $ubicacion;
						}
//				
//					/// *********  grabacion del registro
//echo count($equipos_id).'<br>'."hola";
				for ($x = 0; $x < count($equipo_id)-1; $x++)
				 {
					//echo "hola";
						//if($ban==0)
//							{
								 //echo $ban.'<br>'."hola";
								//	for ($x = 0; $x <count($equipo_id)-1; $x++)
//								{
									//echo $x;
												$query2="INSERT INTO mov_equipo(proveedor_id,equipos_id,fecha,tipo,idubic_destino,cantidad,obs,com_nrofact,com_importe,creador,fe_ultmodi)  VALUES('".$proveedor_id."','".$equipos_id[$x]."','".$fecha2."','".$tipo[$x]."','".$idubic_destino."','".str_replace(".","",$cantidad[$x])."','".$obs."','".$com_nrofact."','".str_replace(".","",$com_importe[$x])."','".$creador."','".$fe_ultmodi."')";
						//echo $query2;
												$resultado = mysql_query($query2);
								//}
													
						//}
				
//*****  ACTUALIZACION DE STOCK    ***********	
						if($pedido!='')
						{
								$query2="select id from pedidos where numero='".$pedido."' " ;
								$res=mysql_query($query2,$con);
								while($query4 = mysql_fetch_array($res) )
									{
											$pedido = $query4['id'];
									}
						}
			
//echo $_POST['textfield12'].'<br>';
//echo count($equipo_id).'<br>';			
					//for ($x = 0; $x < count($equipo_id)-1; $x++)
//							{
								//echo $equipo_id[$x].'<br>';
							if($equipo_id[$x]!='')
							{
									$query2="UPDATE STOCK SET cantidad=cantidad+'".str_replace(".","",$cantidad[$x])."' where Ubicacion_dep_id='".$ubicacion."' and equipos_id='".$equipos_id[$x]."'";
				//echo $query2;
									$resultado = mysql_query($query2);
								if (mysql_affected_rows()<1)
								{
									$query3="INSERT INTO STOCK (Ubicacion_dep_id,equipos_id,cantidad) VALUES('".$ubicacion."','".$equipos_id[$x]."','".str_replace(".","",$cantidad[$x])."')";
									//echo $query3;
									$resultado2 = mysql_query($query3);
								}
							}
								if($pedido!='')
							{
									$query2="UPDATE ped_detalle SET cant_recibida='".str_replace(".","",$cantidad[$x])."',docnro='".$com_nrofact."',fe_recepcion='".$fecha2."' where pedidos_id='".$pedido."' and equipos_id='".$equipos_id[$x]."'";
					//echo $query2."<br>";
									$resultado = mysql_query($query2);
					
									$query2="UPDATE pedidos SET estado='RECIBIDO',nro_factura='".$com_nrofact."' where id='".$pedido."' and nro_factura is null";
					//echo $query2."<br>";
									$resultado = mysql_query($query2);
						}
			
			
		//}
	 }
mysql_close($con);	
if($ban==0)
{	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_compras.php");</script>'; 
}
else
{
echo "El registro de compra NO SE REALIZO, es posible que algunos datos como nombre de proveedor o destino no fueran correctos.";	
}
									
?>