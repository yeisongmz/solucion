<?php session_start();
include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');

$equipo=$_POST['skills4'];
$equipo_id='';
$origen=$_POST['skills2'];
$origen_id='';
$destino=$_POST['skills3'];
$destino_id='';
$cantidad=$_POST['textfield3'];
$noimporta=$_POST['textfield2'];
$tipo_equipo ='';
$proveedor ='';
$proveedor_id ='';
$creador = $_SESSION["user"];	
$fe_ultmodi = date('Y-m-d G:i:s');	
$fecha =  explode("-",$_POST['textfield']);
$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];

$equipos= explode("--",$_POST['textfield7']);
$origenes= explode("--",$_POST['textfield8']);
$destinos= explode("--",$_POST['textfield9']);
$cantidades= explode("--",$_POST['textfield10']);


$equipos2= $_POST['textfield7'];
$origenes2= $_POST['textfield8'];
$destinos2= $_POST['textfield9'];
$cantidades2= $_POST['textfield10'];


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
			//for($i=0;$i<count($equipos);$i++)
//			{
//echo $equipos[$i]."<br>";	
//			}
			$descrpciones[$fila][0]=$equipos[0];
			$descrpciones[$fila][1]=$origenes[0];
			$descrpciones[$fila][2]=$cantidades[0];
			$descrpciones[$fila][3]=$destinos[0];
			$ban=0;	
			// **** LOS DISTINTOS EQUIPOS
			for($i=1;$i<count($equipos);$i++)
			{
				$ban=0;	
				for($ii=0;$ii<=$fila;$ii++)
				{
					
					if($descrpciones[$ii][0]==$equipos[$i] and $descrpciones[$ii][1]==$origenes[$i] )
					{
						$ban=1;	
						$descrpciones[$ii][0]=$equipos[$i] ;	
						$descrpciones[$ii][1]=$origenes[$i] ;
						$descrpciones[$ii][2]=$descrpciones[$ii][2]+$cantidades[$i] ;	
					}
					if($descrpciones[$ii][0]==$equipos[$i] and $descrpciones[$ii][1]!==$origenes[$i] )
					{
						$ban=1;	
						$fila=$fila+1;
						$descrpciones[$fila][0]=$equipos[$i] ;	
						$descrpciones[$fila][1]=$origenes[$i] ;
						$descrpciones[$fila][2]=$cantidades[$i] ;
						$descrpciones[$fila][3]=$destinos[$i];
					}
				}
				//echo $ban." vale ban <br>";
				if($ban==0)
				{
						$fila=$fila+1;
						$descrpciones[$fila][0]=$equipos[$i] ;	
						$descrpciones[$fila][1]=$origenes[$i] ;
						$descrpciones[$fila][2]=$cantidades[$i] ;
						$descrpciones[$fila][3]=$destinos[$i];
				}
				
					
						
						
				
			}
			//for($i=0;$i<=count($fila);$i++)
//			{
//			echo $descrpciones[$i][0]."    ".$descrpciones[$i][1]."  ".$descrpciones[$i][2]."<br>";	
//			}
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
		
			
		
//**********************************************************
//**********************************************************
//**********************************************************

if($ban==0)
	{
		//echo count($equipos);
	for($i=0;$i<count($equipos);$i++)
		{
$query2="select id,tipo,proveedor from equipos where descrip='".$equipos[$i]."' " ;
//echo $query2."<br>";
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$equipo_id = $query4['id'];
							$tipo_equipo = $query4['tipo'];
							$proveedor = $query4['proveedor'];
						
						}

$query2="select id from proveedor where nombre='".$proveedor."' " ;
//echo $query2."<br>";
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$proveedor_id = $query4['id'];
						}						
						
$query2="select id from ubicacion_dep where ubicacion='".$origenes[$i]."' " ;
//echo $query2."<br>";
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$origen_id = $query4['id'];
						}	
$query2="select id from ubicacion_dep where ubicacion='".$destinos[$i]."' " ;
//echo $query2."<br>";
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
$query2="UPDATE stock SET cantidad=cantidad+".$cantidades[$i]." where Ubicacion_dep_id='".$destino_id."' and equipos_id='".$equipo_id."'";
//echo $query2."<br>";
				$resultado = mysql_query($query2);
				if (mysql_affected_rows()<1)
				{
					$query3="INSERT INTO stock (Ubicacion_dep_id,equipos_id,cantidad) VALUES('".$destino_id."','".$equipo_id."','".$cantidades[$i]."')";
//					echo $query2."<br>";

					$resultado2 = mysql_query($query3);
				}
$query2="UPDATE stock SET cantidad=cantidad-".$cantidades[$i]." where Ubicacion_dep_id='".$origen_id."' and equipos_id='".$equipo_id."'";
//echo $query2."<br>";
$resultado = mysql_query($query2);
//********************    MOVIMIENTOS ***************************
$query2="INSERT INTO mov_equipo(proveedor_id,equipos_id,fecha,tipo,idubic_origen,idubic_destino,cantidad,creador,fe_ultmodi)  VALUES('0','".$equipo_id."','".$fecha2."','".$tipo_equipo."','".$origen_id."','".$destino_id."','".$cantidades[$i]."','".$creador."','".$fe_ultmodi."')";
//echo $query2."<br>";
						$resultado = mysql_query($query2);	
						
}
$ban=0;
						
		}
								mysql_close($con);	
								

								
						$var="<script type='text/javascript' language='javascript'> var retVal = confirm('Desea ver los traslados realizados?'); if( retVal == true ){ window.location.replace('movimientos_equipos_pdf.php?equipos=$equipos2&origenes=$origenes2&destinos=$destinos2&cantidades=$cantidades2');}else{window.location.replace('fondo_logo.html');}</script>";
echo $var;
											


}
?>