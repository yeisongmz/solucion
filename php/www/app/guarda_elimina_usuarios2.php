<?php 
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion

//****************   ELIMINACION         **********************
if (isset($_GET['opc2']))
{
$opc2 = $_GET['opc2'];

				
//									$id = $_GET['id'];
$id = explode("--",$_GET['id']);									
									$query2="DELETE FROM usuarios  WHERE ID='".$id[0]."' ";
									
								
									$resultado = mysql_query($query2) ;
									mysql_close($con);	
									header("Location: busca_usuarios.php");
								
				
		
}
?>