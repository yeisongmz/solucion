<?php 
if(isset($_FILES['uploadedfile']['name']))
{
date_default_timezone_set('America/Bahia');
 include ("conexion/conectar.php");
		
		
			date_default_timezone_set('America/Bahia');
			if (!empty($_FILES['uploadedfile']['name']))
			{
			$a =  explode(".",$_FILES['uploadedfile']['name']);
			$nombre_archivo = "documentos/".$a[0]."__".str_replace(":","",date('YmdGis')).".".$a[1];
			//echo $nombre_archivo;
			if(strlen($nombre_archivo)<50)
				{
				 if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],$nombre_archivo) )
				{ 
					
					if(isset($_POST['textfield11']))
					{
						$referencia = $_POST['textfield11'];
					}
					else
					{
						$referencia = '';	
					}
					$relacion = "EMPRESA";
					$fecha_doc2 ='2016-12-31';
					if(!empty($_POST['textfield7052'])){
					$fecha_doc = explode("-",$_POST['textfield7052']);
					$fecha_doc2 = $fecha_doc[2]."-".$fecha_doc[1]."-".$fecha_doc[0];
					}
					$fecha2='2016-12-31';
					if(!empty($_POST['textfield7050']))
					{
					$fecha =  explode("-",$_POST['textfield7050']);
					$fecha2 =  $fecha[2]."-".$fecha[1]."-".$fecha[0];
					}
					$fecha_vto2 ='2016-12-31';
					if(!empty($_POST['textfield7051']))
					{
					$fecha_vto = explode("-",$_POST['textfield7051']);
					$fecha_vto2 = $fecha_vto[2]."-".$fecha_vto[1]."-".$fecha_vto[0];
					}
					$nom_archivo =$a[0]."__".str_replace(":","",date('YmdGis')).".".$a[1];
					$ruta =$nombre_archivo;
					$creador=$_SESSION["user"];
					$fe_ultmodi=date('Y-m-d G:i:s');
					$query2="INSERT INTO adjuntos(cliente_id,personal_id,equipos_id,referencia,relacion,fecha_vto,fecha,fecha_doc,nom_archivo,path_archivo,creador,fe_ultmodi)  VALUES('1','0','0','".$referencia."','".$relacion."','".$fecha_vto2."','".$fecha2."','".$fecha_doc2."','".$nom_archivo."','".$ruta."','".$creador."','".$fe_ultmodi."')";
					//echo $query2;
									$resultado = mysql_query($query2);
									mysql_close($con);	
					echo '<script type="text/javascript" language="javascript">window.location.replace("busca_adjuntos_solucion.php");</script>>'; 
					
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
?>