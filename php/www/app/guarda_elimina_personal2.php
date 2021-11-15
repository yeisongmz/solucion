<?php 
include ("conexion/conectar.php");?>
<?php 
					$id = explode("--",$_GET['id']);
					$ban=0;
					$query2="select id FROM prestamos  WHERE personal_id='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		

						while($query4=mysql_fetch_array($resultado))
							{
							$query3="select Prestamos_id FROM cuotas  WHERE Prestamos_id='".$query4['id']."' and estado='Pendiente' ";
									$resultado2 = mysql_query($query3) ;
									if(mysql_num_rows($resultado2)>0)
									{		
										$ban=1;
									}
							}
					}
					if($ban==0)
					{
					$query2="update personal set estado = 0  WHERE ID='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					}
					mysql_close($con);	
					header("Location: busca_personal.php");
				
?>