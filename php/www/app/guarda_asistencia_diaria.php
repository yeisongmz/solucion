<?php session_start();
date_default_timezone_set('America/Bahia');
include ("funct_restar_horas.php");

include ("conexion/conectar.php");
$personal= explode(",", $_POST["textfield3"]);
$apellidos=trim($personal[1]);
$nombres=trim($personal[0]);
$cliente=  $_POST["textfield"];
$entrada= $_POST["textfield15"].':'.$_POST["textfield16"].':00';
$salida= $_POST["textfield17"].':'.$_POST["textfield18"].':00';
$horas_extras= $_POST["textfield19"];
$horas='';
$mes=$_POST["textfield4"];
$ano=$_POST["textfield5"];

$horas_semanas_diurnas=0;
$horas_semanas_nocturnas=0;
$horas_sabados_diurnas=0;
$horas_domingos_diurnas=0;
$horas_sabados_nocturnas=0;
$horas_domingos_nocturnas=0;
$dias_semana=0;
$dias_sabados=0;
$dias_domingo=0;
if(!empty($_POST["textfield6"]))
{
	$horas_semanas_diurnas=$_POST["textfield6"];
}
if(!empty($_POST["textfield7"]))
{
	$horas_semanas_nocturnas=$_POST["textfield7"];
}

if(!empty($_POST["textfield8"]))
{
	$horas_sabados_diurnas=$_POST["textfield8"];
}
if(!empty($_POST["textfield9"]))
{
	$horas_sabados_nocturnas=$_POST["textfield9"];
}

if(!empty($_POST["textfield10"]))
{
	$horas_domingos_diurnas=$_POST["textfield10"];
}
if(!empty($_POST["textfield11"]))
{
	$horas_domingos_nocturnas=$_POST["textfield11"];
}
if(!empty($_POST["textfield12"]))
{
	$dias_semana=$_POST["textfield12"];
}
if(!empty($_POST["textfield13"]))
{
	$dias_sabados=$_POST["textfield13"];
}
if(!empty($_POST["textfield14"]))
{
	$dias_domingo=$_POST["textfield14"];
}

//echo $horas_sabados_diurnas.'<br>';
//echo $horas_sabados_nocturnas.'<br>';
//echo $_POST["textfield9"];
//*******CREACION DE LAS FECHAS PARA DIAS LUNES A VIERNES

if(strlen($mes)==1)
{
	$mes='0'.$mes;
}
$fecha=date($_POST["textfield5"].'-'.$mes.'-01');


//*********************************
$personal_id='';
$cliente_id='';
$sucursal_id='';

$ban=0;
$matr=array();
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d ');	
$hora_final= restar_horas ($entrada,$salida);
$horas=0;
$minutos=0;
$aux=explode(":",$hora_final);
$horas=intval($aux[0]);
$minutos=intval($aux[1]);
$dia2='';
$jornalxhora=0;
if($minutos>0)
{
	$minutos=$minutos/60;	
}

$hora_final=$horas+$minutos;
$query2="select id,jornalxhora from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$personal_id = $query4['id'];
							$jornalxhora= $query4['jornalxhora'];
						}
$query2="select id from cliente where razon='".$cliente."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$cliente_id = $query4['id'];
						}	
												
$query2="select id from sucursales where cliente_id='".$cliente_id."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$sucursal_id = $query4['id'];
						}	
						
	// ***********INSERCIONES EN TABLA DE ASISTENCIA
$aux=1;	
$dia2='';
//echo $dias_semana.'<br>';
for($i=0;$i<$dias_semana;$i++)
{
	if($dia2=='')
	{
	for($ii=$aux;$ii<=getUltimoDiaMes($_POST["textfield5"], $mes);$ii++)
	{	
			$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $mes,$ii, $_POST["textfield5"]),0);
			if($dia!==0 and $dia!==6)
				{
					
					if(strlen($ii)==1)
					{
						$dia2="0".$ii;
					}
					else
					{
						$dia2=$ii;
					}
					break;
					
				}
		}
	}
						$hora_final=$_POST['textfield6']+$horas_semanas_nocturnas;
						
								$fecha=$_POST["textfield5"]."-".$mes."-".$dia2;
								$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal, horas_nocturnas) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["textfield5"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$sucursal_id."','".$horas_semanas_nocturnas."')";
								//echo $query3.'<br>';
								$resultado = mysql_query($query3);
								$aux=$aux+1;
								//break;
								
							
	
}

$aux=1;	
$dia2='';
for($i=0;$i<$dias_sabados;$i++)
{
	if($dia2=='')
	{
		for($ii=$aux;$ii<=getUltimoDiaMes($_POST["textfield5"], $mes);$ii++)
			{	
				$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $mes,$ii, $_POST["textfield5"]),0);
				$hora_final=$_POST['textfield8']+$horas_sabados_nocturnas;
				if($dia==6)
					{
						
						if(strlen($ii)==1)
						{
							$dia2="0".$ii;
						}
						else
						{
							$dia2=$ii;
						}
						break;
						
					}
			}
	}
								$fecha=$_POST["textfield5"]."-".$mes."-".$dia2;
								$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal, horas_nocturnas) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["textfield5"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$sucursal_id."','".$horas_sabados_nocturnas."')";
								//echo $query3;
								$resultado = mysql_query($query3);
								$aux=$aux+1;
								//break;
								
							//}
//							else
//							{
//							$aux=$aux+1;	
//							}
//	}
}



$aux=1;	
$dia2='';
for($i=0;$i<$dias_domingo;$i++)
{
	if($dia2=='')
	{
		for($ii=$aux;$ii<=getUltimoDiaMes($_POST["textfield5"], $mes);$ii++)
		{	
				$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $mes,$ii, $_POST["textfield5"]),0);
				$hora_final=$_POST['textfield10']+$horas_domingos_nocturnas;
				if($dia==0)
					{
						if(strlen($ii)==1)
						{
							$dia2="0".$ii;
						}
						else
						{
							$dia2=$ii;
						}
						break;
					}
		}
	}
								$fecha=$_POST["textfield5"]."-".$mes."-".$dia2;
								//echo $fecha.'<br>';
								$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal, horas_nocturnas) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["textfield5"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$sucursal_id."','".$horas_domingos_nocturnas."')";
								//echo $query3;
								$resultado = mysql_query($query3);
								$aux=$aux+1;
								//break;
								
							//}
//							else
//							{
//							$aux=$aux+1;	
//							}
//	}
}				
// BONIFICACION
if(!empty($horas_extras) and intval($horas_extras)>0)
{
													
$query2="select id,concepto from conceptos where concepto like'%EXTRAS' " ;
$res=mysql_query($query2,$con);
$concepto='';
$concepto2='';
	while($query4 = mysql_fetch_array($res) )
		{
			$concepto = $query4['id'];
			$concepto2 = $query4['concepto'];
		}	
if(strlen($mes)==1)
{
$mes='0'.$mes;	
}
//echo $horas_extras.'  *  '.$jornalxhora.'<br>';
$aux=$horas_extras*$jornalxhora;
$query3="insert into bonificacion(Conceptos_id,personal_id,fecha,importe,concepto,creador,fe_ultmodi,obs) values('".$concepto."','".$personal_id."','".$ano.'-'.$mes.'-20'."','".intval($aux)."','".$concepto2."','".$creador."','".$fe_ultmodi."','CARGADA VIA PLANILLA')";
//echo $query3;
$resultado = mysql_query($query3);	
}

mysql_close($con);
						
			echo '<script type="text/javascript" language="javascript">window.location.replace("asistencia_diaria.php");</script>';
		
		


function getUltimoDiaMes($elAnio,$elMes) {
  return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
}
 
