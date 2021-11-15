<?php session_start();

 include ("conexion/conectar.php");?>
<?php 

date_default_timezone_set('America/Bahia');
if (isset($_POST['textfield5']))
{
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
				$total_cobro= str_replace(".","",trim($_POST['textfield9']));
					/// *********  grabacion del registro
if ($opcion=="A")
{									
$query3="insert into cliente(razon,direccion,telefono,telmovil,website,email,contacto1,contacto2,ruc,creador,rubro,fe_ultmodi,totalcobro)   values('".strtoupper($razon)."','".$direccion."','".$telefono."','".$telmovil."','".$website."','".$email."','".$contacto1."','".$contacto2."','".$ruc."','".$creador."','".$rubro."','".$fe_ultmodi."','".$total_cobro."')";
//echo $query3;
									$resultado = mysql_query($query3);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_clientes.php");</script>'; 
}
if ($opcion=="M")
{
	if ($_POST['textfield20']==''   and empty ($_FILES['uploadedfile']['name']))
{
	$id = explode("--",$_POST['textfield6']);  
	
	$query3="update cliente set razon='".strtoupper($razon)."',direccion='".$direccion."',telefono='".$telefono."',telmovil='".$telmovil."',website='".$website."',email='".$email."',contacto1='".$contacto1."',contacto2='".$contacto2."',ruc='".$ruc."',creador='".$creador."',rubro='".$rubro."',fe_ultmodi='".$fe_ultmodi."',totalcobro='".$total_cobro."'  where id ='".$id[0]."'";

									$resultado = mysql_query($query3);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_clientes.php");</script>'; 
}

//              **************** ADJUNTOS   *****************
if (isset($_POST['textfield20']) and !empty($_FILES['uploadedfile']['name']))
{
	
			date_default_timezone_set('America/Bahia');
			$a =  explode(".",$_FILES['uploadedfile']['name']);
			$nombre_archivo = "documentos/"."__".$a[0].str_replace(":","",date('YmdGis')).".".$a[1];
			if(strlen($nombre_archivo)<50)
			{
				 if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],$nombre_archivo) )
				{ 
					$id=$_POST['textfield6'];
					$cliente = explode("--",$_POST['textfield6']);
					$cliente_id = $cliente[0];
					$referencia = $_POST['textfield20'];
					$relacion = "CLIENTE";
					$fecha_doc = explode("-",$_POST['textfield7052']);
					$fecha =  explode("-",$_POST['textfield7050']);
					$fecha_vto = explode("-",$_POST['textfield7051']);
					$fecha_doc2 = $fecha_doc[2]."-".$fecha_doc[1]."-".$fecha_doc[0];
					$fecha2 =  $fecha[2]."-".$fecha[1]."-".$fecha[0];
					$fecha_vto2 = $fecha_vto[2]."-".$fecha_vto[1]."-".$fecha_vto[0];
					$nom_archivo =$a[0]."__".str_replace(":","",date('YmdGis')).".".$a[1];
					$ruta =$nombre_archivo;
					$creador=$_SESSION["user"];
					$fe_ultmodi=date('Y-m-d G:i:s');
					$query2="INSERT INTO adjuntos(equipos_id,personal_id,cliente_id,referencia,relacion,fecha_vto,fecha,fecha_doc,nom_archivo,path_archivo,creador,fe_ultmodi)  VALUES('0','0','".$cliente_id."','".$referencia."','".$relacion."','".$fecha_vto2."','".$fecha2."','".$fecha_doc2."','".$nom_archivo."','".$ruta."','".$creador."','".$fe_ultmodi."')";
					//echo $query2;
									$resultado = mysql_query($query2);
									mysql_close($con);	
					echo '<script type="text/javascript" language="javascript">window.location.replace("clientes.php?opc=M&id='.$id.'");</script>'; 										
					
				}
				else
				{
					echo "Ha ocurrido un error, trate de nuevo!";
				} 
				
			}
			else
			{
					echo "<span style='color:red;'>El archivo ". basename( $_FILES['uploadedfile']['name']). " NO ha sido subido, la longitud del nombre debe ser menor</span><br>";					
			}
			
	}
}	
}
?>