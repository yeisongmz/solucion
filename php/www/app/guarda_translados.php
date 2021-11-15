<?php session_start();
include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$personal=explode(",", $_POST['skills4']);

$destino= $_POST['skills3'];
$destinos_id='';
$desdefecha= $_POST['textfield2'];
$hastafecha= $_POST['textfield'];
$desde_hora=$_POST['h1'].":".$_POST['m1'];
$horario= $_POST['select'];
$hasta_hora=$_POST['h2'].":".$_POST['m2'];
$id_saliente = explode("--", $_POST['textfield7']);


$cant_horas= $_POST['textfield3'];
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d G:i:s');
$ban=0;	
$apellidos=$personal[0];
$nombres=$personal[1];
$personal_id='';
$cliente_id='';
$fila=0;
$fecha ='';
$estado=$_POST['select2'];
$query2="select id from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)==0)
					{
						$ban=1;	
					}
		while($query4 = mysql_fetch_array($res) )
			{
				$personal_id = $query4['id'];
			}
		$query2="select id,cliente_id from sucursales where razon_sucursal='".$destino."' " ;
			
			$res=mysql_query($query2,$con);
			if(mysql_num_rows($res)==0)
					{
						$ban=1;	
					}
			while($query4 = mysql_fetch_array($res) )
				{
					$destinos_id = $query4['id'];
					$cliente_id = $query4['cliente_id'];
				
				}
				$fecha	= explode("-" , $desdefecha);
				$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
				$horas =str_replace(":",".", $cant_horas);
				$horas2 = floatval($horas);
if($ban==0)
{				
				$query2="INSERT INTO sucursales_personal(sucursales_id,personal_id,desdefecha,fe_ultmodi,canthoras,creador,desde_hora,hasta_hora,estado_registro)  VALUES('".$destinos_id."','".$personal_id."','".$fecha2."','".$fe_ultmodi."','".$horas2."','".$creador."','".$desde_hora."','".$hasta_hora."','VIGENTE')";
			//echo $query2;
				$resultado = mysql_query($query2);
				
				$query2="update sucursales_personal set estado_registro ='NO VIGENTE' where id='".$id_saliente[0]."' ";
			//echo $query2;
				$resultado = mysql_query($query2);
				$fecha	= explode("-" , $hastafecha);
				$fecha3 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
				$query2="INSERT INTO traslados(personal_id,desdefecha,idclientedestino,idclientesucur,canthoras,horario,hastafecha,creador,fe_ultmodi)  VALUES('".$personal_id."','".$fecha2."','".$cliente_id."','".$destinos_id."','".$horas2."','".$horario."','".$fecha3."','".$creador."','".$fe_ultmodi."')";
			//echo $query2;
				$resultado = mysql_query($query2);
}
		mysql_close($con);	
echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>'; 









?>