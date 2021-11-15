<?php session_start();
include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$personal=explode("," , $_POST['skills2']);
$equipos=explode("--" , $_POST['textfield13']);
$fechas=explode("--" , $_POST['textfield14']);
//echo $_POST['textfield14'];
$hasta_fechas=explode("--" , $_POST['textfield16']);
$cant=explode("--" , $_POST['textfield15']);
$obs = explode("--" , $_POST['textfield17']);
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d');	
$apellidos=$personal[1];
$nombres=$personal[0];
$personal_id='';
$fila=0;
$fecha ='';
$equipos_id =array();
$total_equipos=0;
$total_asignados=0;
$total_libres=0;
$fecha_aux=array();
$fecha_aux2='';
$descrpciones=array();
$existencia=0;
$total=0;
$fila=0;
$ban=0;
//**********************************************************
//**********************************************************
//**********************************************************
// ********* VALIDACION DE STOCK
if(count($equipos)>1)											
		{
			
			$descrpciones[$fila][0]=$equipos[0];
			$descrpciones[$fila][1]=$cant[0];
			$descrpciones[$fila][2]=$fechas[0];

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
						$descrpciones[$ii][1]=$descrpciones[$ii][1]+$cant[$i] ;	
					}
				}
					if($ban==0)
					{
							$fila=$fila+1;
							$descrpciones[$fila][0]=$equipos[$i] ;	
							$descrpciones[$fila][1]=$cant[$i] ;
							$descrpciones[$fila][2]=$fechas[$i];
					}
				
			}


		}
$ban=0;
for($i=0;$i<$fila;$i++)
{
	//echo $descrpciones[$i][0]."  ".$descrpciones[$i][1]."<br>";
	$query2="select id from equipos where descrip='".$descrpciones[$i][0]."' " ;
	
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$equipos_id = $query4['id'];
		}
	//$query2="select sum(cantidad) as total from stock where equipos_id='".$equipos_id."' " ;
//	$res=mysql_query($query2,$con);
//	while($query4 = mysql_fetch_array($res) )
//		{
//			$total_equipos = $query4['total'];
//		}
//		$fecha_aux=explode("-",$descrpciones[$i][2]);
//		$fecha_aux2=$fecha_aux[2]."-".$fecha_aux[1]."-".$fecha_aux[0];
//	$query2="select sum(cantidad) as total from asignar_equipo where equipos_id='".$equipos_id."' and date(hastafecha)>'".$fecha_aux2."'" ;
////echo $query2;
//	$res=mysql_query($query2,$con);
//	while($query4 = mysql_fetch_array($res) )
//		{
//			$total_asignados = $query4['total'];
//		}	
//		
//		
//		$total_libres=$total_equipos-$total_asignados;
		//echo $total_libres."<br>";
		//echo $descrpciones[$i][1];
		//if(intval($total_libres)<intval($descrpciones[$i][1]))
		//{
			//$ban=1;
//						echo "<table width='100%'  border='1'  cellspacing='0' cellpadding='0' style='border-width:1px'  >";
//						echo "<tbody>";
//						echo "<tr  id='3000' style='border-width:1px'  >";
//						echo "<td width='250' style='border-width:1px'>&nbsp;".$descrpciones[$i][0]."</td>"; 
//						echo "<td width='50'>&nbsp;Disponibles  </td>";
//						echo "<td width='30'>&nbsp;".$total_libres."</td>";	
//						echo "<td align='right' width='150'>&nbsp; intento de asignaci&oacute;n   </td>";				
//						echo "<td align='right' width='30'>&nbsp;".$descrpciones[$i][1]."</td>";	
//						echo "<td bgcolor='#E40A0D'>&nbsp; Stock disponible insuficiente   </td>";					
//						echo "</tr>";
//						echo "</tbody>";
//						echo "</table>";
	//	}
		
}
if($ban==0)
{


$query2="select id from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;
		$res=mysql_query($query2,$con);
		while($query4 = mysql_fetch_array($res) )
			{
				$personal_id = $query4['id'];
			}
		$fila=0;
		for ($x = 0; $x <= count($equipos); $x++) 
		{
			
			if(!empty($equipos[$x]))
			{
			$query2="select id from equipos where descrip='".$equipos[$x]."' " ;
			//echo $query2." y hola <br>";
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					//echo  $query4['id']."<br>";
					$equipos_id[$fila] = $query4['id'];
					
					
					$fila=$fila+1;
					//echo $equipos_id[$fila]." y chau<br>";
				}
			}
		}
				
		for ($x = 0; $x<=count($equipos_id); $x++)
		{
			if($descrpciones[$x][0]!='')
			{
			$query2="select id from equipos where descrip='".$descrpciones[$x][0]."' " ;
	//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$equipos_id = $query4['id'];
		}
		//echo $equipos_id;
				$fecha	= explode("-" , $fechas[$x]);
				//echo "  <br>";
				//echo $fechas[$x];
				$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
				//echo "  <br>";
				//echo $fecha2." es la fecha <br>";
				$query2="INSERT INTO responsables(equipos_id,idpersonal,fechadesde,cantidad,obs,fe_ultmodi,creador)  VALUES('".$equipos_id."','".$personal_id."','".$fecha2."','".$cant[$x]."','".$obs[$x]."','".$fe_ultmodi."','".$creador."')";
//echo $query2."<br>";
				$resultado = mysql_query($query2);
				
				
				$fecha	= explode("-" , $hasta_fechas[$x]);
				$fecha3 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
				$query2="INSERT INTO asignar_equipo(equipos_id,personal_id,fecha,desdefecha,hastafecha,referencia,cantidad,fe_ultmodi,creador)  VALUES('".$equipos_id."','".$personal_id."','".$fe_ultmodi."','".$fecha2."','".$fecha3."','".$obs[$x]."','".$cant[$x]."','".$fe_ultmodi."','".$creador."')";
//echo $query2."<br>";
				$resultado = mysql_query($query2);

			}
		}

echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>'; 
}
mysql_close($con);	







?>