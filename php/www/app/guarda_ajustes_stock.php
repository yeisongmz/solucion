<?php session_start();
include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');


$equipo_id='';
$origen_id='';
$tipo_operacion=$_POST['select'];
$obs=$_POST['textarea'];
$creador = $_SESSION["user"];	
$fe_ultmodi = date('Y-m-d G:i:s');	
$fecha =  explode("-",$_POST['textfield']);
$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];

$equipos= explode("--",$_POST['textfield7']);
$destinos= $_POST['skills2'];
$cantidades= explode("--",$_POST['textfield8']);

$existencia=0;
$total=0;
$fila=0;
$ban=0;
if($tipo_operacion=='SALIDA')
{
//**********************************************************
//**********************************************************
//**********************************************************
// ********* VALIDACION DE STOCK
if(count($equipos)>1)											
		{
			//for($i=0;$i<count($equipos);$i++)
//			{
//echo $equipos[$i]."<br>";	
//			}
			$descrpciones[$fila][0]=$equipos[0];
			$descrpciones[$fila][1]=$destinos;
			$descrpciones[$fila][2]=$cantidades[0];

			$ban=0;	
			// **** LOS DISTINTOS EQUIPOS
			for($i=1;$i<count($equipos);$i++)
			{
				$ban=0;	
				for($ii=0;$ii<=$fila;$ii++)
				{
					
					if($descrpciones[$ii][0]==$equipos[$i] )
					{
						$ban=1;	
						$descrpciones[$ii][0]=$equipos[$i] ;	
						$descrpciones[$ii][1]=$destinos ;
						$descrpciones[$ii][2]=$descrpciones[$ii][2]+$cantidades[$i] ;
						
					}
					
				}

				if($ban==0)
				{
						$fila=$fila+1;
						$descrpciones[$fila][0]=$equipos[$i] ;	
						$descrpciones[$fila][1]=$destinos ;
						$descrpciones[$fila][2]=$cantidades[$i] ;

				}
				
					
						
						
				
			}
			
	$ban=0;
	for($i=0;$i<=count($fila);$i++)
		{	
	
			$query2="select id from equipos where descrip='".$descrpciones[$i][0]."' " ;
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$equipo_id=$query4['id'];
				
					
				}
			$query2="select id from ubicacion_dep where ubicacion='".$descrpciones[$i][1]."' " ;
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$origen_id = $query4['id'];
					
				}	
						
				//for($ii=0;$ii<=$fila;$ii++)
				//{
				$query2="select cantidad from stock where Ubicacion_dep_id='".$origen_id."' and equipos_id='".$equipo_id."' " ;
				$res=mysql_query($query2,$con);
				while($query4 = mysql_fetch_array($res) )
					{
						$existencia = $query4['cantidad'];
					}
					
					if(intval($existencia)<intval($descrpciones[$i][2]))
					{
						$ban=1;
						echo "<table width='100%'  border='1'  cellspacing='0' cellpadding='0' style='border-width:1px'  >";
						echo "<tbody>";
						echo "<tr  id='3000' style='border-width:1px'  >";
						echo "<td width='250' style='border-width:1px'>&nbsp;".$descrpciones[$i][0]."</td>"; 
						echo "<td>&nbsp;Deposito  </td>";
						echo "<td>&nbsp;".$descrpciones[$i][1]."</td>";	
						echo "<td align='right'>&nbsp;Existencia  </td>"; 
						echo "<td align='right'>&nbsp;".$existencia."</td>"; 
						echo "<td align='right'>&nbsp; intento de envio   </td>";				
						echo "<td align='right'>&nbsp;".$descrpciones[$i][2]."</td>";	
						echo "<td bgcolor='#E40A0D'>&nbsp; Stock insuficiente   </td>";					
						echo "</tr>";
						echo "</tbody>";
						echo "</table>";
					}
				}	
					
			
		}
		
			
	}
//**********************************************************
//**********************************************************
//**********************************************************

if($ban==0)
	{
	for($i=0;$i<count($equipos)-1;$i++)
		{
			$query2="select id from equipos where descrip='".$equipos[$i]."' " ;
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$equipo_id = $query4['id'];
						
						}
			$query2="select id from ubicacion_dep where ubicacion='".$destinos."' " ;

					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$destino_id = $query4['id'];
						}	
						
//************************  STOCK *****************************

if($ban==0)
{
	if($tipo_operacion=='SALIDA')
	{
				$query2="UPDATE stock SET cantidad=cantidad-".str_replace(".","",$cantidades[$i])." where Ubicacion_dep_id='".$destino_id."' and equipos_id='".$equipo_id."'";
				$resultado = mysql_query($query2);
				
	}
	if($tipo_operacion=='ENTRADA')
	{			
				$query2="UPDATE stock SET cantidad=cantidad+".str_replace(".","",$cantidades[$i])." where Ubicacion_dep_id='".$destino_id."' and equipos_id='".$equipo_id."'";
			$resultado = mysql_query($query2);
			if (mysql_affected_rows()<1)
				{
				$query3="INSERT INTO stock (Ubicacion_dep_id,equipos_id,cantidad) VALUES('".$destino_id."','".$equipo_id."','".str_replace(".","",$cantidades[$i])."')";
					$resultado2 = mysql_query($query3);
				}
	}
	////********************    AJUSTES ***************************
				$query2="INSERT INTO ajustes(equipos_id,Ubicacion_dep_id,fecha,tipo,cantidad,obs,desc_deposito,creador,fe_ultmodi)  VALUES('".$equipo_id."','".$destino_id."','".$fecha2."','".$tipo_operacion."','".$cantidades[$i]."','".$obs."','".$destinos."','".$creador."','".$fe_ultmodi."')";
						$resultado = mysql_query($query2);	
}
	$ban=0;
						
		}
	mysql_close($con);
	$var="<script type='text/javascript' language='javascript'> window.location.replace('fondo_logo.html');</script>";
	echo $var;	
}
?>