<?php session_start();
//**************************************************************************
//**************************************************************************
//**************************************************************************
//**************************************************************************
//************************     ADJUNTOS   **********************************


if (isset($_POST['textfield11']) and !empty($_FILES['file']['name']))
{
		if($_POST['textfield11']=="M")
		{
			include ("conexion/conectar.php");
			date_default_timezone_set('America/Bahia');
			$a =  explode(".",$_FILES['file']['name']);
			$nombre_archivo = "documentos/"."--".$a[0].str_replace(":","",date('YmdGis')).".".$a[1];
if(strlen($nombre_archivo)<50)
		{
				 if(move_uploaded_file($_FILES["file"]["tmp_name"],$nombre_archivo) )
				{ 
					$id=$_POST['textfield12'];
					$personal_id = explode("--",$_POST['textfield12']);
					$personal_id2 = $personal_id[0];
					$referencia = $_POST['textfield'];
					$relacion = "PERSONAL";
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
					$query2="INSERT INTO adjuntos(equipos_id,cliente_id,personal_id,referencia,relacion,fecha_vto,fecha,fecha_doc,nom_archivo,path_archivo,creador,fe_ultmodi)  VALUES('0','0','".$personal_id2."','".$referencia."','".$relacion."','".$fecha_vto2."','".$fecha2."','".$fecha_doc2."','".$nom_archivo."','".$ruta."','".$creador."','".$fe_ultmodi."')";
					//echo $query2;
									$resultado = mysql_query($query2);
									mysql_close($con);	
					echo '<script type="text/javascript" language="javascript">window.location.replace("fichapersonal.php?opc=M&id='.$id.'");</script>'; 										
					//echo "<span style='color:green;'>El archivo ". basename( $_FILES['file']['name']). " ha sido subido</span><br>";
				}
				
		}
		else
		{
echo "<span style='color:red;'>El archivo ". basename( $_FILES['file']['name']). " NO ha sido subido, la longitud del nombre debe ser menor</span><br>";			
		}
	}
}

//**************************************************************************
//**************************************************************************
//**************************************************************************
if(isset($_POST['textfield11']))
{
	if($_POST['textfield11']=="A")
	{	
include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$apellidos2='';
$nombre2='';
$apellidos=strtoupper($_POST['textfield90']);
$nombre=strtoupper($_POST['textfield2']);
$tipo_documento= '';


		  switch ($_POST['select']) {
	
	
						 case '1':
							$tipo_documento='C:I.';
							 break;
						 case '2':
							$tipo_documento='D.N.I.';
							 break;
						 case '3':
							$tipo_documento='PASAPORTE';
							 break;
						 case '4':
							$tipo_documento='OTRO';
							 break;
						

						 default:

					 } 
		  
		  
$num_documento=$_POST['number4'];
$direccion=$_POST['textfield4'];
$num_casa=str_replace(".","",$_POST['textfield5']);
$barrio=$_POST['textfield6'];
$ciudad=$_POST['textfield7'];
$referencia_casa=$_POST['textarea'];
$celular=$_POST['number'];
$telefono=$_POST['number9'];
$fecha_ingreso=explode("-",$_POST['number2']);
$fecha_ingreso2= $fecha_ingreso[2]."-".$fecha_ingreso[1]."-".$fecha_ingreso[0];
$fecha_egreso=$_POST['number3'];
if (!empty($_POST['number3']))
{
	$fecha_egreso=explode("-",$_POST['number3']);
	$fecha_egreso2=$fecha_egreso[2]."-".$fecha_egreso[1]."-".$fecha_egreso[0];
}
else
{
	$fecha_egreso2='2099-12-31';
}
$motivo_egreso=$_POST['textarea2'];
$cargo=$_POST['skills2'];
$nom_cont1=$_POST['textfield8'];
$cel_cont1=$_POST['textfield9'];
$baja_cont1=$_POST['number5'];
$parentesco_cont1=$_POST['textfield3'];
$nom_cont2=$_POST['textfield82'];
$cel_cont2=$_POST['textfield92'];
$baja_cont2=$_POST['number52'];
$parentesco_cont2=$_POST['textfield32'];
$supervisor=$_POST['skills3'];
if (!empty($_POST['number6']))
{
$sueldo_banco=str_replace(".","",$_POST['number6']);
}
else
{
$sueldo_banco=0;	
}
$banco = str_replace(".","",$_POST['skills4']);

$aporta_ips='';
if(isset($_POST['RG1']))
{
	switch ($_POST['RG1']) {
						 case '2':
							 $aporta_ips='N';
							 break;
						 case '1':
							$aporta_ips='S';
							 break;
						

						 default:

					 } 

	
}
if(!empty($_POST['number10']))
{
$num_aseg=$_POST['number10'];
}
else
{
$num_aseg=0;	
}
if(!empty($_POST['number11']))
{
	if(strlen($_POST['number11'])>3)
	{
		$jornal_hora=str_replace(".","",$_POST['number11']);
	}
	else
	{
		$jornal_hora=$_POST['number11'];	
	}
}
else
{
$jornal_hora=0;	
}
if(!empty($_POST['number12']))
{
	if(strlen($_POST['number12'])>3)
	{
		$jornal_min=str_replace(".","",$_POST['number12']);
	}
	else
	{
		$jornal_min=$_POST['number12'];	
	}
}
else
{
$jornal_min=0;	
}
$modo_pago='';
switch ($_POST['rg2']) {
	
	
						 case '1':
							$modo_pago='BANCO';
							 break;
						 case '2':
							$modo_pago='EFECTIVO';
							 break;
						 case '3':
							$modo_pago='CHEQUE';
							 break;
						 case '4':
							$modo_pago='OTRO';
							 break;
						

						 default:

					 } 
					 
$sexo='';
switch ($_POST['RG3']) {
	
	
						 case '1':
							$sexo='M';
							 break;
						 case '2':
							$sexo='F';
							 break;
						 
						

						 default:

					 } 
$estado_civil='';

switch ($_POST['RG4']) {
	
	
						 case '1':
							$estado_civil='S';
							 break;
						 case '2':
							$estado_civil='C';
							 break;
						 case '3':
							$estado_civil='D';
							 break;
						 case '4':
							$estado_civil='O';
							 break;
						

						 default:

					 } 
					 
$fecha_nac=explode("-",$_POST['textfield10']);
$fecha_nac2=$fecha_nac[2]."-".$fecha_nac[1]."-".$fecha_nac[0];
$nacionalidad=$_POST['textfield15'];
if(!empty($_POST['textfield16']))
{
	$fecha_hijo=explode("-",$_POST['textfield16']);
	$fecha_hijo2=$fecha_hijo[2]."-".$fecha_hijo[1]."-".$fecha_hijo[0];
}
else
{
	$fecha_hijo2='2099-12-31';	
}
if (!empty($_POST['number13']))
{
$cantidad_hijos=$_POST['number13'];
}
else
{
$cantidad_hijos=0;	
}
$profesion=$_POST['textfield17'];
$situacion_hijo=$_POST['textfield18'];
if(!empty($_POST['number7']))
{
	$salario_ips=str_replace(".","",$_POST['number7']);
}
else
{
	$salario_ips=0;	
}
$salarioreal=0;
if(!empty($_POST['sala']))
{
	$salarioreal=str_replace(".","",$_POST['sala']);
}
else
{
	$salarioreal=0;	
}
$creador=$_SESSION["user"];
$fe_ultmodi=date('Y-m-d');
$banco_id = '0';
$cargo_id = '';
$supervisor_id =0;
//******* INSERCION BRUTA				BANCO ID *******************
				$query2="select id from banco_sueldo where razon='".$banco."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$banco_id = $query4['id'];
						}
//******* INSERCION BRUTA				CARGO ID *******************
				$query2="select id from cargos where cargo='".$cargo."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$cargo_id = $query4['id'];
						}	
//******* INSERCION BRUTA				SUPERVISOR ID *******************
$aux = $supervisor;
$apellidos2='0';
$nombre2='0';
if(count($aux)>1)
{
	$aux=explode(",",$supervisor);	
	$apellidos2 =trim($aux[0]);
	$nombre2 =trim($aux[1]);

}
				$query2="select id from personal where apellidos='".$apellidos2."' and nombres='".$nombre2."'" ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$supervisor_id = $query4['id'];
						}
						
$xx = explode("-",$_POST['textfield13']);
$fechaincio=$xx[2]."-".$xx[1]."-".$xx[0];
$xx = explode("-",$_POST['textfield14']);
$fechafin=$xx[2]."-".$xx[1]."-".$xx[0];
$xx = explode("-",$_POST['textfield19']);
$fechaemision=$xx[2]."-".$xx[1]."-".$xx[0];
$tipotraba=$_POST['RG5'];							
							
$query3="insert into personal(banco_sueldo_id,cargos_id,nombres,apellidos,tipo_docum,nro_docum,idsupervisor,direccion,n_casa,barrio,ciudad,referenciacasa,telMovil,telefono,fecha_ingreso,fecha_salida,motivo_salida,c1_nombre,c1_movil,c1_linbaja,c1_parentesco,c2_nombre,c2_movil,c2_linbaja,c2_parentesco,aporta_ips,nro_asegurado,jornalxhora,jornalxmin,importeIPS,modopago,sexo,estadocivil,fechanacim,nacionalidad,fenacim_menor,cant_hijos,profesion,situ_menor,creador,fe_ultmodi,estado,sueldoreal,fechainicio,fechafin,fechaemision,tipotraba) values('".$banco_id."','".$cargo_id."','".trim($nombre)."','".trim($apellidos)."','".$tipo_documento."','".$num_documento."','".$supervisor_id."','".$direccion."','".$num_casa."','".$barrio."','".$ciudad."','".$referencia_casa."','".$celular."','".$telefono."','".$fecha_ingreso2."','".$fecha_egreso2."','".$motivo_egreso."','".$nom_cont1."','".$cel_cont1."','".$baja_cont1."','".$parentesco_cont1."','".$nom_cont2."','".$cel_cont2."','".$baja_cont2."','".$parentesco_cont2."','".$aporta_ips."','".$num_aseg."','".$jornal_hora."','".$jornal_min."','".$salario_ips."','".$modo_pago."','".$sexo."','".$estado_civil."','".$fecha_nac2."','".$nacionalidad."','".$fecha_hijo2."','".$cantidad_hijos."','".$profesion."','".$situacion_hijo."','".$creador."','".$fe_ultmodi."','1','".$salarioreal."','".$fechaincio."','".$fechafin."','".$fechaemision."','".$tipotraba."')";
//echo $query3;
		$resultado = mysql_query($query3);
		mysql_close($con);	
		echo '<script type="text/javascript" language="javascript">window.location.replace("busca_personal.php");</script>'; 									
		
	}
}
if(isset($_POST['textfield11']) and empty($_POST['textfield']) and empty($_FILES['file']['name']))
{
	if ($_POST['textfield11']=="M")
	{
	$id=explode("--",$_POST['textfield12']);
	include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$apellidos=strtoupper($_POST['textfield90']);
$nombre=strtoupper($_POST['textfield2']);
$tipo_documento= '';


		  switch ($_POST['select']) {
	
	
						 case '1':
							$tipo_documento='C:I.';
							 break;
						 case '2':
							$tipo_documento='D.N.I.';
							 break;
						 case '3':
							$tipo_documento='PASAPORTE';
							 break;
						 case '4':
							$tipo_documento='OTRO';
							 break;
						

						 default:

					 } 
$num_documento=$_POST['number4'];
$direccion=$_POST['textfield4'];
$num_casa=str_replace(".","",$_POST['textfield5']);
$barrio=$_POST['textfield6'];
$ciudad=$_POST['textfield7'];
$referencia_casa=$_POST['textarea'];
$celular=$_POST['number'];
$telefono=$_POST['number9'];
$fecha_ingreso=explode("-",$_POST['number2']);
$fecha_ingreso2= $fecha_ingreso[2]."-".$fecha_ingreso[1]."-".$fecha_ingreso[0];
$fecha_egreso=$_POST['number3'];
if (!empty($_POST['number3']))
{
	$fecha_egreso=explode("-",$_POST['number3']);
	$fecha_egreso2=$fecha_egreso[2]."-".$fecha_egreso[1]."-".$fecha_egreso[0];
}
else
{
	$fecha_egreso2='2099-12-31';
}
$motivo_egreso=$_POST['textarea2'];
$cargo=$_POST['skills2'];
$nom_cont1=$_POST['textfield8'];
$cel_cont1=$_POST['textfield9'];
$baja_cont1=$_POST['number5'];
$parentesco_cont1=$_POST['textfield3'];
$nom_cont2=$_POST['textfield82'];
$cel_cont2=$_POST['textfield92'];
$baja_cont2=$_POST['number52'];
$parentesco_cont2=$_POST['textfield32'];
$supervisor=$_POST['skills3'];
if (!empty($_POST['number6']))
{
$sueldo_banco=str_replace(".","",$_POST['number6']);
}
else
{
$sueldo_banco=0;	
}
$banco = $_POST['skills4'];


$aporta_ips='';
if(isset($_POST['RG1']))
{
	switch ($_POST['RG1']) {
						 case '2':
							 $aporta_ips='N';
							 break;
						 case '1':
							$aporta_ips='S';
							 break;
						

						 default:

					 } 

	
}



if(!empty($_POST['number10']))
{
$num_aseg=$_POST['number10'];
}
else
{
$num_aseg=0;	
}
if(!empty($_POST['number11']))
{
	if(strlen($_POST['number11'])>3)
	{
		$jornal_hora=str_replace(".","",$_POST['number11']);
	}
	else
	{
		$jornal_hora=$_POST['number11'];	
	}
}
else
{
$jornal_hora=0;	
}
if(!empty($_POST['number12']))
{
	if(strlen($_POST['number12'])>3)
	{
		$jornal_min=str_replace(".","",$_POST['number12']);
		
	}
	else
	{
		$jornal_min=$_POST['number12'];	
	}
}
else
{
$jornal_min=0;	
}




$modo_pago='';
switch ($_POST['rg2']) {
	
	
						 case '1':
							$modo_pago='BANCO';
							 break;
						 case '2':
							$modo_pago='EFECTIVO';
							 break;
						 case '3':
							$modo_pago='CHEQUE';
							 break;
						 case '4':
							$modo_pago='OTRO';
							 break;
						

						 default:

					 } 
					 
$sexo='';
switch ($_POST['RG3']) {
	
	
						 case '1':
							$sexo='M';
							 break;
						 case '2':
							$sexo='F';
							 break;
						 
						

						 default:

					 } 
$estado_civil='';

switch ($_POST['RG4']) {
	
	
						 case '1':
							$estado_civil='S';
							 break;
						 case '2':
							$estado_civil='C';
							 break;
						 case '3':
							$estado_civil='D';
							 break;
						 case '4':
							$estado_civil='O';
							 break;
						

						 default:

					 } 
					 
					 
					 
					 
					 
					 
$fecha_nac=explode("-",$_POST['textfield10']);
$fecha_nac2=$fecha_nac[2]."-".$fecha_nac[1]."-".$fecha_nac[0];
$nacionalidad=$_POST['textfield15'];
if(!empty($_POST['textfield16']))
{
	$fecha_hijo=explode("-",$_POST['textfield16']);
	$fecha_hijo2=$fecha_hijo[2]."-".$fecha_hijo[1]."-".$fecha_hijo[0];
}
else
{
	$fecha_hijo2='2099-12-31';	
}
if (!empty($_POST['number13']))
{
$cantidad_hijos=$_POST['number13'];
}
else
{
$cantidad_hijos=0;	
}
$profesion=$_POST['textfield17'];
$situacion_hijo=$_POST['textfield18'];
if(!empty($_POST['number7']))
{
	$salario_ips=str_replace(".","",$_POST['number7']);
}
else
{
	$salario_ips=0;	
}
$salarioreal=0;
if(!empty($_POST['sala']))
{
	$salarioreal=str_replace(".","",$_POST['sala']);
}
else
{
	$salarioreal=0;	
}
$creador=$_SESSION["user"];
$fe_ultmodi=date('Y-m-d');
$banco_id = '0';
$cargo_id = '';
$supervisor_id =0;
//******* INSERCION BRUTA				BANCO ID *******************
				$query2="select id from banco_sueldo where razon='".$banco."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$banco_id = $query4['id'];
						}
//******* INSERCION BRUTA				CARGO ID *******************
				$query2="select id from cargos where cargo='".$cargo."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$cargo_id = $query4['id'];
						}	
//******* INSERCION BRUTA				SUPERVISOR ID *******************
	$aux = $supervisor;
	$apellidos2='0';
	$nombre2='0';
	if(strlen($supervisor)>3)
	{
if(count($aux)>0)
{
	$aux=explode(",",$supervisor);
		
	$apellidos2 =trim($aux[0]);
	$nombre2 =trim($aux[1]);

}
	}
				$query2="select id from personal where apellidos='".$apellidos2."' and nombres='".$nombre2."'" ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$supervisor_id = $query4['id'];
						}
$xx = explode("-",$_POST['textfield13']);
$fechaincio=$xx[2]."-".$xx[1]."-".$xx[0];
$xx = explode("-",$_POST['textfield14']);
$fechafin=$xx[2]."-".$xx[1]."-".$xx[0];
$xx = explode("-",$_POST['textfield19']);
$fechaemision=$xx[2]."-".$xx[1]."-".$xx[0];
$tipotraba=$_POST['RG5'];
if($_POST['textfield11']=="M")
{
$query3="update personal set banco_sueldo_id='".$banco_id."',cargos_id='".$cargo_id."',nombres='".trim($nombre)."',apellidos='".trim($apellidos)."',tipo_docum='".$tipo_documento."',nro_docum='".$num_documento."',idsupervisor='".$supervisor_id."',direccion='".$direccion."',n_casa='".$num_casa."',barrio='".$barrio."',ciudad='".$ciudad."',referenciacasa='".$referencia_casa."',telMovil='".$celular."',telefono='".$telefono."',fecha_ingreso='".$fecha_ingreso2."',fecha_salida='".$fecha_egreso2."',motivo_salida='".$motivo_egreso."',c1_nombre='".$nom_cont1."',c1_movil='".$cel_cont1."',c1_linbaja='".$baja_cont1."',c1_parentesco='".$parentesco_cont1."',c2_nombre='".$nom_cont2."',c2_movil='".$cel_cont2."',c2_linbaja='".$baja_cont2."',c2_parentesco='".$parentesco_cont2."',aporta_ips='".$aporta_ips."',nro_asegurado='".$num_aseg."',jornalxhora='".$jornal_hora."',jornalxmin='".$jornal_min."',importeIPS='".$salario_ips."',modopago='".$modo_pago."',sexo='".$sexo."',estadocivil='".$estado_civil."',fechanacim='".$fecha_nac2."',nacionalidad='".$nacionalidad."',fenacim_menor='".$fecha_hijo2."',cant_hijos='".$cantidad_hijos."',profesion='".$profesion."',situ_menor='".$situacion_hijo."',creador='".$creador."',fe_ultmodi='".$fe_ultmodi."',estado='1',sueldoreal='".$salarioreal."',fechainicio='".$fechaincio."',fechafin='".$fechafin."',fechaemision='".$fechaemision."',tipotraba='".$tipotraba."' where id ='".$id[0]."' ";
//echo $query3;
$resultado = mysql_query($query3);
mysql_close($con);	
}
	echo '<script type="text/javascript" language="javascript">window.location.replace("busca_personal.php");</script>'; 
}
}