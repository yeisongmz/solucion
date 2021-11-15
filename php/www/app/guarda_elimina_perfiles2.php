<?php date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion

//****************   ELIMINACION         **********************
$opc2 = $_GET['opc2'];
$ban=0;
				if ($opc2=="E")
				{
									//$id = $_GET['id'];
									$id = explode("--",$_GET['id']);
					$query2="select perfil_id FROM usuarios  WHERE perfil_id='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}				
					if($ban==0){					
									$query2="DELETE FROM opciones  WHERE perfil_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									
									$query2="DELETE FROM perfil  WHERE id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
					}
								mysql_close($con);	
									header("Location: busca_perfiles.php");
				}				
				
		

?>