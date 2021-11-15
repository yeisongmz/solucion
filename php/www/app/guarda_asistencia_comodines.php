<?php session_start();
date_default_timezone_set('America/Bahia');
include ("funct_restar_horas.php");
if( !empty($_POST["skills3"])   and !empty($_POST["number3"]) and !empty($_POST["number4"]) and !empty($_POST["textfield7"]) )
{
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills3"]);
$apellidos=$personal[0];
$nombres=$personal[1];
$cliente= explode("--", $_POST["textfield13"]);
$entrada=explode("--", $_POST["textfield14"]);
$salida=explode("--", $_POST["textfield15"]);
$horas=explode("--", $_POST["textfield16"]);
$fecha_asistencia=explode("--", $_POST["textfield17"]);
//*******CREACION DE LAS FECHAS PARA DIAS LUNES A VIERNES

//*********************************
$personal_id='';
$cliente_id=array();
$sucursal_id=array();
$ban=0;
$matr=array();
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d ');	
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
				$fila=0;		
				for($i=0;$i<count($cliente)-1;$i++)
				{		
					$query2="select cliente_id,id from sucursales where razon_sucursal='".$cliente[$i]."' " ;
					echo $query2."<br>";
					$res=mysql_query($query2,$con);
						if(mysql_num_rows($res)==0)
					{
						$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$matr[$i][0] = $query4['cliente_id'];
							$matr[$i][1] = $query4['id'];
							$matr[$i][2] = $entrada[$i];
							$matr[$i][3] = $salida[$i];
							$matr[$i][4] = $horas[$i];
							$matr[$i][5] = $fecha_asistencia[$i];
							
						}	
				}
						
										


	for($i=0;$i<count($cliente)-1;$i++)
	{	
		$aux=explode("-",$fecha_asistencia[$i]);
		$fecha=$aux[2]."-".$aux[1]."-".$aux[0];
		$aux2=explode(":",$matr[$i][4]);
		$aux3='';
		
		if (intval($aux2[1])>0)
		{
			$aux3=intval($aux2[0]).'.'.intval($aux2[1]);
		}
		else
		{
			$aux3=intval($aux2[0]);	
		}
		$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$matr[$i][2]."','".$matr[$i][3]."','".$aux3."','".$aux[1]."','".$aux[2]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$matr[$i][0]."','".$matr[$i][1]."')";
		//echo $query3;
		$resultado = mysql_query($query3);
		$ban=0;
				
	}
//***************************************************
//***************************************************

		if($ban==0)
		{				
			echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>';
		}
		if($ban==1)
		{				
			echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo2.html");</script>';
		}
		
		mysql_close($con);


}