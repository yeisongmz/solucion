<?php 

include ("conexion/conectar.php");?>
<?php 
// ***********         grabacion/ modificacion
if (isset($_GET['id'])) 
{
$x=explode("--", $_GET['id'])	;
$id_luiquidacion =$x[0];									
									
									//$query2="select personal_id from luiquiregular where id='".$id_luiquidacion."'";
//									$resultado = mysql_query($query2);
									
									$query2="UPDATE cuotas set estado='Pendiente',idliquidacion='0' where idliquidacion='".$id_luiquidacion."' ";
						//			echo $query2."<br>";
									$resultado = mysql_query($query2);
									$query2="UPDATE adelantos set liquiregular_id='0' where liquiregular_id='".$id_luiquidacion."' ";
						
									
									$resultado = mysql_query($query2);
									$query2="UPDATE descuentos set liquiregular_id='0' where liquiregular_id='".$id_luiquidacion."' ";
									
									
									$resultado = mysql_query($query2);
									$query2="UPDATE ausencias set liquiregular_id='0' where liquiregular_id='".$id_luiquidacion."' ";
									$resultado = mysql_query($query2);
									
									
									$query2="select personal_id from liquisalida where id='".$id_luiquidacion."' " ;
									//echo $query2."<br>";
									$res=mysql_query($query2,$con);
									$personal_id='';
									while($query4 = mysql_fetch_array($res) )
									{
										$personal_id=$query4['personal_id'];
									}
									$query2="UPDATE personal set estado='1' where id='".$personal_id."' ";
									//echo $query2."<br>";
									$resultado = mysql_query($query2);
									
									$query2="delete  from bonificacion where liquiregular_id='".$id_luiquidacion."' and personal_id='".$personal_id."' and concepto='AGUINALDO PROPORCIONAL' ";
									$resultado = mysql_query($query2);
						
						
								
									$query2="UPDATE bonificacion set liquiregular_id='0' where liquiregular_id='".$id_luiquidacion."' ";
							$resultado = mysql_query($query2);
									
									
									
									$query2="delete  from liquisalida where id='".$id_luiquidacion."' ";
									$resultado = mysql_query($query2);
									
									$query2="delete  from salidadetalle where LiquiSalida_id='".$id_luiquidacion."' ";									
									$resultado = mysql_query($query2);									
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_liquidaciones_salida.php");</script>'; 
								
				
									
				
				
//****************   ELIMINACION         **********************
				
				
	}

?>