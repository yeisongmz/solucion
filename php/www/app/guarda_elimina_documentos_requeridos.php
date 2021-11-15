<?php 
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion
if (isset($_POST['textfield'])) 
{
	
	if(isset($_POST['textfield2']) and isset($_POST['textfield3']))
			{
				$opc = $_POST['textfield3'];
				
			
				if ($opc=="A")
				{
									
											
									$query2="INSERT INTO docrequeridos(documentos,obligatorio)  VALUES('".trim($_POST['textfield'])."','".$_POST['textfield2']."')";
								
									$resultado = mysql_query($query2);
									mysql_close($con);	
									
									header("Location: busca_documentos_requeridos.php");
				}
				if ($opc=="M")
				{
									$id = explode("--", $_POST['textfield4']);
									
									$query2="UPDATE docrequeridos set documentos ='".$_POST['textfield']."',obligatorio ='".$_POST['textfield2']."' WHERE ID='".$id[0]."' ";
									
								
									$resultado = mysql_query($query2);
									mysql_close($con);	
									
									header("Location: busca_documentos_requeridos.php");
				}
				


				
				
		}
		
		
		

}
//****************   ELIMINACION         **********************

if(isset($_GET['opc']) )
			{
				
				$opc = $_GET['opc'];
				if ($opc=="E")
				{
									$id = explode("--", $_GET['id']);
									
									$query2="delete from docrequeridos  WHERE id='".$id[0]."' ";
									
								
									$resultado = mysql_query($query2);
									
									
									header("Location: busca_documentos_requeridos.php");
				}
				
			}

?>