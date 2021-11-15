<?php session_start();
date_default_timezone_set('America/Bahia');
 include ("conexion/conectar.php");?>
<?php 
$opcion = $_POST['textfield5'];



				$razon =trim($_POST['textfield']);
				$direccion = trim($_POST['textfield3']);
				$telefono = trim($_POST['number']);
				$telmovil =  trim($_POST['number2']);
				$website = trim($_POST['number4']);
				$email = trim($_POST['number5']);
				$contacto1 =trim($_POST['number6']);
				$contacto2 =trim($_POST['textfield4']);
				$ruc = trim($_POST['textfield2']);
				$creador = $_SESSION["user"];	
				$rubro = trim($_POST['number3']);			
				$fe_ultmodi = date('Y-m-d G:i:s');	
					/// *********  grabacion del registro
if ($opcion=="A")
{									
$query3="insert into cliente(razon,direccion,telefono,telmovil,website,email,contacto1,contacto2,ruc,creador,rubro,fe_ultmodi)   values('".$razon."','".$direccion."','".$telefono."','".$telmovil."','".$website."','".$email."','".$contacto1."','".$contacto2."','".$ruc."','".$creador."','".$rubro."','".$fe_ultmodi."')";

									$resultado = mysql_query($query3);
									//echo $query3;
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_clientes.php");</script>'; 
}
if ($opcion=="M")
{
	$id = explode("--",$_POST['textfield6']);  
	
	$query3="update cliente set razon='".$razon."',direccion='".$direccion."',telefono='".$telefono."',telmovil='".$telmovil."',website='".$website."',email='".$email."',contacto1='".$contacto1."',contacto2='".$contacto2."',ruc='".$ruc."',creador='".$creador."',rubro='".$rubro."',fe_ultmodi='".$fe_ultmodi."'  where id ='".$id[0]."'";

									$resultado = mysql_query($query3);
									//echo $query3;
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_clientes.php");<script>'; 
	
}
?>