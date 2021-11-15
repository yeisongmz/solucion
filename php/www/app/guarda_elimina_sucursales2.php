<?php date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion

//****************   ELIMINACION         **********************
$opc2 = $_GET['opc2'];
$ban=0;
				if ($opc2=="E")
				{
						$id = explode("--",$_GET['id']);
						
						
					$query2="select sucursales_id FROM sucursales_personal  WHERE sucursales_id='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}
					$query2="select Ubicacion_dep_id FROM stock  WHERE Ubicacion_dep_id='".$id[0]."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}
						
						if($ban==0){
						
						$query2="DELETE FROM sucursales  WHERE ID='".$id[0]."' ";
						$resultado = mysql_query($query2) ;
						$id_deposito = explode("--",$_GET['deposito']);
						$query2="DELETE FROM ubicacion_dep where ubicacion='".$id_deposito[0]."' ";
						$resultado = mysql_query($query2) ;
						}
						mysql_close($con);	
						header("Location: clientes.php?opc=M&id=".$_GET['id_cliente']);
				}				
				
		

?>