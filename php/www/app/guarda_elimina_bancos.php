<?php 
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         gravacion/ modificacion
if (isset($_POST['textfield'])) 
{
	if(!empty($_POST['textfield']) and !empty($_POST['textfield2']) and !empty($_POST['number']))
			{
				$opc = $_POST['textfield5'];
				
			
				if ($opc=="A")
				{
									$ra = trim($_POST['textfield']);
									$dir = trim($_POST['textfield2']);
									$tel = trim($_POST['number']);
									$cont='';
									if(!empty($_POST['textfield3']))
									{
										$cont = trim($_POST['textfield3']);
									}
									$mail='';
									if(!empty($_POST['textfield4']))
									{
										$mail = trim($_POST['textfield4']);
									}
											
									$query2="INSERT INTO banco_sueldo(razon,direccion,telefono,contacto,email)  VALUES('".trim($_POST['textfield'])."','".$_POST['textfield2']."','".$tel."','".$cont."','".$mail."')";
								
									$resultado = mysql_query($query2);
									unset($ra);
									unset($dir);
									unset($tel);
									unset($cont);
									unset($mail);
									
									header("Location: busca_bancos.php");
				}
				if ($opc=="M")
				{
									$id = $_POST['textfield6'];
									$ra = trim($_POST['textfield']);
									$dir = trim($_POST['textfield2']);
									$tel = trim($_POST['number']);
									$cont='';
									if(!empty($_POST['textfield3']))
									{
										$cont = trim($_POST['textfield3']);
									}
									$mail='';
									if(!empty($_POST['textfield4']))
									{
										$mail = trim($_POST['textfield4']);
									}
									//UPDATE blogEntry SET content = '$udcontent', title = '$udtitle' WHERE id = $id");		
									$query2="UPDATE banco_sueldo set razon ='".$_POST['textfield']."',direccion ='".$_POST['textfield2']."',telefono ='".$tel."',contacto ='".$cont."',email='".$mail."' WHERE ID='".$id."' ";
									
								
									$resultado = mysql_query($query2);
									unset($ra);
									unset($dir);
									unset($tel);
									unset($cont);
									unset($mail);
									mysql_close($con);	
									header("Location: busca_bancos.php");
				}
				
//****************   ELIMINACION         **********************
				
				
		}

}


?>