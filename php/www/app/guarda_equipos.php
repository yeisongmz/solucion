<?php session_start();

date_default_timezone_set('America/Bahia');
 include ("conexion/conectar.php");
  $opcion ='';
  if (isset($_POST['textfield13']))
 {
 $opcion = $_POST['textfield13'];
 }
 //echo $_POST['textfield13']." es post <br>";
 // echo $_GET['textfield13']." es get <br>";
if (isset($_POST['textfield']) and !empty($_POST['textfield13']))
{
	//************  ADJUNTOS *********************
	
	if($_POST['textfield13']="M")
	{
		
		
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
					$id=$_POST['textfield14'];
					$equipo_id = explode("--",$_POST['textfield14']);
					$equipo_id2 = $equipo_id[0];
					
					if(isset($_POST['textfield11']))
					{
						$referencia = $_POST['textfield11'];
					}
					else
					{
						$referencia = '';	
					}
					$relacion = "EQUIPOS";
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
					$query2="INSERT INTO adjuntos(cliente_id,personal_id,equipos_id,referencia,relacion,fecha_vto,fecha,fecha_doc,nom_archivo,path_archivo,creador,fe_ultmodi)  VALUES('0','0','".$equipo_id2."','".$referencia."','".$relacion."','".$fecha_vto2."','".$fecha2."','".$fecha_doc2."','".$nom_archivo."','".$ruta."','".$creador."','".$fe_ultmodi."')";
					//echo $query2;
									$resultado = mysql_query($query2);
									mysql_close($con);	
					echo "<span style='color:green;'>El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido</span><br>";
					echo '<script type="text/javascript" language="javascript">window.location.replace("equipos.php?opc=M&id='.$id.'");</script>'; 
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





	//************  DATOS  ALTA *********************
if ($opcion =="A" and $_POST['textfield']!='' )
{
				
				$descrip = strtoupper(trim($_POST['textfield']));
				$tipo = $_POST['select'];
				$marca =  strtoupper(trim($_POST['textfield2']));
				$modelo = trim($_POST['textfield3']);
				$proveedor = strtoupper(trim($_POST['skills2']));
				$otrosdatos = trim($_POST['textarea']);
				$fechacompra =explode("-",($_POST['textfield4']));
				$fechacompra2 = $fechacompra[2]."-".$fechacompra[1]."-".$fechacompra[0];  
				$nrocomprob = trim($_POST['textfield5']);
				$estado = strtoupper(trim($_POST['textfield6']));
				$garantia =strtoupper(trim($_POST['textfield7']));
				$utilizar="";
				if($_POST['utilizar']=="on")
				{
					$utilizar=$_POST['utilizar'];
				}
				if(!empty($_POST['textfield8']))
				{
					$costo =str_replace(".","", trim($_POST['textfield8']));
				}
				else
				{
					$costo = 0;	
				}
				$equivalente = trim($_POST['textfield9']);
				if(!empty($_POST['number']))
				{
					$stockmin = trim($_POST['number']);	
				}
				else
				{
					$stockmin = 0;	
				}
				$origen = strtoupper(trim($_POST['textfield10']));
				$creado_2 = $_SESSION["user"];
				$peso = trim($_POST['textfield12']);
				$creador = $_SESSION["user"];				
				$fe_ultmodi = date('Y-m-d G:i:s');				
				$unidad_medida =trim($_POST['textfield122']);
							
							
							 
		  				
				switch ($tipo) {
						 case '1':
							 $tipo="Insumo";
							 break;
						 case '2':
							 $tipo="Herramienta";
							 break;
						 case '3':
							 $tipo="Maquinaria";
							 break;
						 case '4':
							 $tipo="Útiles";
							 break;
						 case '5':
							 $tipo="Otros";
							 break;

						 default:

					 } 
				
					/// *********  grabacion del registro
$ban=0;								
$query2="select id FROM proveedor  WHERE nombre='".$proveedor."' ";
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}	
if($ban==1)
{													
									$query2="INSERT INTO equipos(descrip,tipo,marca,modelo,otrosdatos,fechacompra,proveedor,nrocomprob,estado,garantia,costo,equivalente,stockmin,origen,creado_2,peso,creador,fe_ultmodi,unidadMedida,utilizar)  VALUES('".$descrip."','".$tipo."','".$marca."','".$modelo."','".$otrosdatos."','".$fechacompra2."','".$proveedor."','".$nrocomprob."','".$estado."','".$garantia."','".$costo."','".$equivalente."','".$stockmin."','".$origen."','".$creado_2."','".$peso."','".$creador."','".$fe_ultmodi."','".$unidad_medida."','".$utilizar."')";

									$resultado = mysql_query($query2);
									//echo $query2;
									mysql_close($con);
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_herramientas.php");</script>'; 
}
else
{
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_herramientas.php");</script>'; 	
}

}

//************  DATOS  MODIFICACION *********************
if (isset($_POST['textfield']))
{
if ($_POST['textfield']!=''  and  $opcion =="M" and empty($_FILES['uploadedfile']['name']) )
{
	//echo $_POST['textfield13']."<br>";
				
				$id_equipo = $_POST['textfield14'];
				$id_equipo2 =explode("--",$id_equipo);
				$descrip = strtoupper(trim($_POST['textfield']));
				$tipo = $_POST['select'];
				$marca =  strtoupper(trim($_POST['textfield2']));
				$modelo = trim($_POST['textfield3']);
				$proveedor = strtoupper(trim($_POST['skills2']));
				$otrosdatos = trim($_POST['textarea']);
				$fechacompra =explode("-",($_POST['textfield4']));
				$fechacompra2 = $fechacompra[2]."-".$fechacompra[1]."-".$fechacompra[0];  
				$nrocomprob = trim($_POST['textfield5']);
				$estado = strtoupper(trim($_POST['textfield6']));
				$garantia =strtoupper(trim($_POST['textfield7']));
				$costo = str_replace(".","", trim($_POST['textfield8']));
				$equivalente = trim($_POST['textfield9']);
				$stockmin = trim($_POST['number']);	
				$origen = strtoupper(trim($_POST['textfield10']));
				$creado_2 = $_SESSION["user"];
				$peso = trim($_POST['textfield12']);
				$creador = $_SESSION["user"];				
				$fe_ultmodi = date('Y-m-d G:i:s');				
				$unidad_medida =trim($_POST['textfield122']);
				$utilizar="";
				if($_POST['utilizar']=="on")
				{
					$utilizar=$_POST['utilizar'];
				}							
				
				switch ($tipo) {
						 case '1':
							 $tipo="Insumo";
							 break;
						 case '2':
							 $tipo="Herramienta";
							 break;
						 case '3':
							 $tipo="Maquinaria";
							 break;
						 case '4':
							 $tipo="Útiles";
							 break;
						 case '5':
							 $tipo="Otros";
							 break;

						 default:

					 } 
				
					/// *********  grabacion del registro
								
$ban=0;								
$query2="select id FROM proveedor  WHERE nombre='".$proveedor."' ";

					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
					{		
						$ban=1;
						
					}	
if($ban==1)
{										
									$query2="UPDATE  equipos SET descrip='".$descrip."',tipo='".$tipo."',marca='".$marca."',modelo='".$modelo."',otrosdatos='".$otrosdatos."',fechacompra='".$fechacompra2."',proveedor='".$proveedor."',nrocomprob='".$nrocomprob."',estado='".$estado."',garantia='".$garantia."',costo='".$costo."',equivalente='".$equivalente."',stockmin='".$stockmin."',origen='".$origen."',creado_2='".$creado_2."',peso='".$peso."',creador='".$creador."',fe_ultmodi='".$fe_ultmodi."',unidadMedida='".$unidad_medida."',utilizar='".$utilizar."' WHERE id='".$id_equipo2[0]."' ";
									

									$resultado = mysql_query($query2);
									mysql_close($con);
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_herramientas.php");</script>'; 
		}
else
{
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_herramientas.php");</script>'; 	
}							

}
}
?>