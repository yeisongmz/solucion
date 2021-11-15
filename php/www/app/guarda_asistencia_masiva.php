<?php session_start();
date_default_timezone_set('America/Bahia');
include ("funct_restar_horas.php");
if( !empty($_POST["skills3"])   and !empty($_POST["number3"]) and !empty($_POST["number4"]) and !empty($_POST["textfield7"]) )
{
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills3"]);
$apellidos=$personal[1];
$nombres=$personal[0];
$cliente= explode("--", $_POST["textfield7"]);
$entrada='';//$_POST["textfield2"].":".$_POST["textfield3"];
$salida='';//$_POST["textfield4"].":".$_POST["textfield5"];
$horas='';//$_POST["textfield6"];
//$x=explode("-",$_POST["textfield"]);
//$fecha=$x[2]."-".$x[1]."-".$x[0];
$mes=$_POST["number3"];
$ano=$_POST["number4"];
$desde=$_POST["textfield"];
$hasta=$_POST["textfield4"];
$horas_semanas=0;
$horas_sabados=0;
if(!empty($_POST["textfield2"]))
{
	$horas_semanas=$_POST["textfield2"];
}
if(!empty($_POST["textfield3"]))
{
	$horas_sabados=$_POST["textfield3"];
}
//*******CREACION DE LAS FECHAS PARA DIAS LUNES A VIERNES

if(strlen($mes)==1)
{
	$mes='0'.$mes;
}
$fecha=date($_POST["number4"].'-'.$mes.'-01');
$entre_semana=0;
$fin_semana=0;
for($i=1;$i<=getUltimoDiaMes($_POST["number4"], $mes);$i++)
{
	$dia=jddayofweek ( cal_to_jd(CAL_GREGORIAN, $mes,$i, $_POST["number4"]) , 0 );
	if($dia<6 and $dia>0)
	{
		$entre_semana=$entre_semana+1;
	}
	if($dia==6)
	{
		$fin_semana=$fin_semana+1;
	}
	
}
$total_entre_semana=intval($horas_semanas/$entre_semana);
$total_fin_semana=0;
if($horas_sabados>0)
{
	$total_fin_semana=intval($horas_sabados/$fin_semana);
}

//*********************************
$personal_id='';
$cliente_id='';
$sucursal_id='';
$entrada='';
$salida='';
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
$query2="select cliente_id from sucursales where id='".$cliente[0]."' " ;

					$res=mysql_query($query2,$con);
						if(mysql_num_rows($res)==0)
					{
						echo "";
						$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$cliente_id = $query4['cliente_id'];
						}	
						
$query2="select desde_hora,hasta_hora,dias from sucursales_personal where sucursales_id='".$cliente[0]."' and personal_id='".$personal_id."' and estado_registro='VIGENTE' and desde_hora='".$desde."' and hasta_hora='".$hasta."'" ;

					$res=mysql_query($query2,$con);
						
					while($query4 = mysql_fetch_array($res) )
						{
							$entrada= $query4['desde_hora'];
							$salida= $query4['hasta_hora'];
							$matr[0]=$query4['dias'];
							
						}							
										
//************* VALIDACION *************************
$ban=1;
$dias_asignados=explode(",",$matr[0]);
$hora_final= restar_horas ($entrada,$salida);
$horas=0;
$minutos=0;
$aux=explode(":",$hora_final);
$horas=intval($aux[0]);
$minutos=intval($aux[1]);
$dia2='';
if($minutos>0)
{
	$minutos=$minutos/60;	
}

$hora_final=$horas+$minutos;


	for($i=1;$i<=getUltimoDiaMes($_POST["number4"], $mes);$i++)
	{	
		
//$fecha=$_POST["number4"]."-".$mes."-".$i;
//$query2="select id from  asistencia where personal_id='".$personal_id."' and fecha_asistencia='".$fecha."' and id_cliente='".$cliente_id."' and id_sucursal='".$cliente[0]."' " ;

					//$res=mysql_query($query2,$con);
					//if(mysql_num_rows($res)==0)
					//{
						$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $mes,$i, $_POST["number4"]),0);
						
						if($dia!==7 )
							{
								
								for($ii=0;$ii<count($dias_asignados);$ii++)
								{	
								$dia2='';
								$query3='';
								//echo $dia."   ".$dias_asignados[$ii]."<br>";
													if($dia==1 and $dias_asignados[$ii]=='Lun')
													{
														//$entre_semana=$entre_semana+$hora_final;
														if(strlen($i)==1)
														{
															$dia2="0".$i;
														}
														else
														{
															$dia2=$i;
														}
														$fecha=$_POST["number4"]."-".$mes."-".$dia2;
														$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["number4"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$cliente[0]."')";
														$resultado = mysql_query($query3);
														$ban=0;
														//break;
													}
													if($dia==2 and $dias_asignados[$ii]=='Mar')
													{
														if(strlen($i)==1)
														{
															$dia2="0".$i;
														}
														else
														{
															$dia2=$i;
														}
														$fecha=$_POST["number4"]."-".$mes."-".$dia2;
														$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["number4"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$cliente[0]."')";
														$resultado = mysql_query($query3);
														$ban=0;
														//break;
													}
													if($dia==3 and $dias_asignados[$ii]=='Mie')
													{
														if(strlen($i)==1)
														{
															$dia2="0".$i;
														}
														else
														{
															$dia2=$i;
														}
														$fecha=$_POST["number4"]."-".$mes."-".$dia2;
														$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["number4"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$cliente[0]."')";
														$resultado = mysql_query($query3);
														$ban=0;
														//break;
													}
													if($dia==4 and $dias_asignados[$ii]=='Jue')
													{
														if(strlen($i)==1)
														{
															$dia2="0".$i;
														}
														else
														{
															$dia2=$i;
														}
														$fecha=$_POST["number4"]."-".$mes."-".$dia2;
														$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["number4"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$cliente[0]."')";
														$resultado = mysql_query($query3);
														$ban=0;
														//break;
													}
													if($dia==5 and $dias_asignados[$ii]=='Vie')
													{
														if(strlen($i)==1)
														{
															$dia2="0".$i;
														}
														else
														{
															$dia2=$i;
														}
														$fecha=$_POST["number4"]."-".$mes."-".$dia2;
														$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$hora_final."','".$mes."','".$_POST["number4"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$cliente[0]."')";
														$resultado = mysql_query($query3);
														$ban=0;
														//break;
													}
													if($dia==6 and $dias_asignados[$ii]=='Sab')
													{
														if(strlen($i)==1)
																	{
																		$dia2="0".$i;
																	}
																	else
																	{
																		$dia2=$i;
																	}
														$fecha=$_POST["number4"]."-".$mes."-".$dia2;
														$query3="insert into asistencia(personal_id,fecha,hs_entrada,hs_salida,hs_cantidad,mes,ano,fecha_asistencia,creador,fe_ultmodi,id_cliente,id_sucursal) values('".$personal_id."','".$fe_ultmodi."','".$entrada."','".$salida."','".$total_fin_semana."','".$mes."','".$_POST["number4"]."','".$fecha."','".$creador."','".$fe_ultmodi."','".$cliente_id."','".$cliente[0]."')";
														$resultado = mysql_query($query3);
														$ban=0;
														//break;
													}
													//echo $query3."<br>";
										
											}
								
							}
							
					//}
					
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
function getUltimoDiaMes($elAnio,$elMes) {
  return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
}
 
