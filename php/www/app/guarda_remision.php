<?php session_start();
 include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');


$ban=0;

	//************  DATOS  ALTA *********************
				$plantilla="0";
				$numero=$_POST['textfield'];
				if (isset($_POST['select']) and !empty($_POST['select']))
				{
					$plantilla=$_POST['select'];
				}
				//$cliente=$_POST['textfield2'];
				$movil=$_POST['textfield5'];
				$aux=explode("/",$_POST['textfield3']);
				$fecha=$aux[2]."-".$aux[1]."-".$aux[0];//$_POST['textfield3'];
				$telefono=$_POST['textfield6'];
				$factura=$_POST['textfield4'];
				$observacion='';
				if(isset($_POST['textarea']))
				{
					$observacion=$_POST['textarea'];
				}
				$origen=$_POST['skills2'];
				$destino=$_POST['skills3'];
				$dir_origen='';//$_POST['textfield10'];
				
				$aux=explode("/",$_POST['textfield12']);
				$fecha_retiro=$aux[2]."-".$aux[1]."-".$aux[0];
				$aux=explode("/",$_POST['textfield13']);
				$fecha_inicio=$aux[2]."-".$aux[1]."-".$aux[0];
				$aux=explode("/",$_POST['textfield14']);
				$fecha_fin=$aux[2]."-".$aux[1]."-".$aux[0];
				$razon_transportista='';
				if(isset($_POST['textfield15']))
				{
					$razon_transportista=$_POST['textfield15'];
				}
				$ruc_transportista='';
				if(isset($_POST['textfield16']))
				{
				$ruc_transportista=$_POST['textfield16'];
				}
				$nombre_conductor=$_POST['textfield17'];
				$dir_coductor=$_POST['textfield19'];
				$cedula_coductor=$_POST['textfield18'];
				$cantidad =explode("--",$_POST['textfield110']);
				$equipos =  explode("--",$_POST['textfield120']);
				$unidad = explode("--",$_POST['textfield130']);
				//$unitario = explode("--",$_POST['textfield140']);
//				$total = explode("--",$_POST['textfield150']);
				
				$creador = $_SESSION["user"];				
				$fe_ultmodi = date('Y-m-d');	
				$mat=array();
				$fila=0;
				$query2="select id from ubicacion_dep where ubicacion='".$origen."' " ;
			
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
							$origen = $query4['id'];
							//$dir_origen=$query4['id'];
						}
					}
					
				$query2="select direccion from sucursales where razon_sucursal='".$_POST['skills2']."' " ;
			//echo $query2;
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
							
							$dir_origen=$query4['direccion'];
						}
					}
						
				$query2="select id from ubicacion_dep where ubicacion='".$destino."' " ;
			
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
							$destino = $query4['id'];
						}
					}	

				for ($x = 0; $x < count($equipos)-1; $x++) {
				$query2="select id from equipos where descrip='".$equipos[$x]."' " ;
				//echo $query2;
				$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
					$ban=1;	
					}
					else
					{
						while($query4 = mysql_fetch_array($res) )
						{
						$mat[$fila]=$query4['id'];
					
						$fila=$fila+1;
						}
					}
				}
				
$fila=0;				
if(count($equipos)>1)											
		{
			
			//for($i=0;$i<count($equipos);$i++)
//			{
//echo $equipos[$i]."<br>";	
//			}
			$descrpciones[$fila][0]=$equipos[0];
			$descrpciones[$fila][2]=$cantidad[0];
			//$descrpciones[$fila][3]=$destinos[0];
			$ban=0;	
			// **** LOS DISTINTOS EQUIPOS
			//echo count($equipos);
			for($i=1;$i<count($equipos);$i++)
			{
				//echo $equipos[$i]."<br>";
				$ban=0;	
				for($ii=0;$ii<$fila;$ii++)
				{
					
					if($descrpciones[$ii][0]==$equipos[$i] )
					{
						$ban=1;	
						$descrpciones[$ii][0]=$equipos[$i] ;	
						
						$descrpciones[$ii][2]=$descrpciones[$ii][2]+$cantidad[$i] ;	
					}
					//if($descrpciones[$ii][0]==$equipos[$i] and $descrpciones[$ii][1]!==$origenes[$i] )
//					{
//						$ban=1;	
//						$fila=$fila+1;
//						$descrpciones[$fila][0]=$equipos[$i] ;	
//						$descrpciones[$fila][1]=$origenes[$i] ;
//						$descrpciones[$fila][2]=$cantidades[$i] ;
//						$descrpciones[$fila][3]=$destinos[$i];
//					}
				}
				//echo $ban." vale ban <br>";
				if($ban==0)
				{
						$fila=$fila+1;
						$descrpciones[$fila][0]=$equipos[$i] ;	
					//	$descrpciones[$fila][1]=$origenes[$i] ;
						$descrpciones[$fila][2]=$cantidad[$i] ;
						//$descrpciones[$fila][3]=$destinos[$i];
				}
				
					
						
						
				
			}
			
			
$ban=0;
	for($i=0;$i<=count($fila);$i++)
		{	
		if($descrpciones[$i][0]!='')
		{
			
		
			$equipo_id='';
			$query2="select id from equipos where descrip='".$descrpciones[$i][0]."' " ;
			//echo $query2;
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$equipo_id=$query4['id'];
				
					
				}
			
						
				//for($ii=0;$ii<=$fila;$ii++)
				//{
				$query2="select sum(cantidad)  AS cantidad from stock where  equipos_id='".$equipo_id."' group by cantidad" ;
				//echo $query2;
				$res=mysql_query($query2,$con);
				$existencia=0;
				while($query4 = mysql_fetch_array($res) )
					{
						$existencia = $query4['cantidad'];
					}
					//echo $existencia.'  existencia';
					if(intval($existencia)<intval($descrpciones[$i][2]))
					{
						$ban=1;
						echo "<table width='100%'  border='1'  cellspacing='0' cellpadding='0' style='border-width:1px'  >";
						echo "<tbody>";
						echo "<tr  id='3000' style='border-width:1px'  >";
						echo "<td width='250' style='border-width:1px'>&nbsp;".$descrpciones[$i][0]."</td>"; 
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
										


//					/// *********  grabacion del registro
				
					
if($ban==0)
{	
						$query2="INSERT INTO remision(sucursales_id,numero,fecha,creador,fe_ultmodi,refererencia,destino,fe_retiro,movil,dir_salida,fe_iniciotras,fe_fintras,razon_tras,ruc_tras,ci_conductor,dir_conductor,comp_vta,nrofactura,tipo_remision,conductor,plantilla_id,sucdestino_id)  VALUES('".$origen."','".$numero."','".$fecha."','".$creador."','".$fe_ultmodi."','".$observacion."','".$_POST['skills3']."','".$fecha_retiro."','".$movil."','".$dir_origen."','".$fecha_inicio."','".$fecha_fin."','".$razon_transportista."','".$ruc_transportista."','".$cedula_coductor."','".$dir_coductor."','FACTURA','".$factura."','TIMBRADO','".$nombre_conductor."','".$plantilla."','".$destino."')";
//echo $nombre_conductor;."','".$plantilla."','".$destino."')";
						$resultado = mysql_query($query2);
//						
						$query2="select id from remision where numero='".$numero."' and nrofactura='".$factura."' and fecha='".$fecha."'" ;
						//echo $query2;
				$res=mysql_query($query2,$con);
						$remision_id=0;
						while($query4 = mysql_fetch_array($res) )
						{
							$remision_id = $query4['id'];
						}
////					
						for ($x = 0; $x < count($equipos)-1; $x++)
		 				{					
		 					$query2="INSERT INTO remisiondeta(Remision_id,equipos_id,dsc_producto,cantidad,unidadMed)  VALUES('".$remision_id."','".$mat[$x]."','".$equipos[$x]."','".$cantidad[$x]."','".$unidad[$x]."')";
//echo $query2."<br>";
						$resultado = mysql_query($query2);
						$query2="update stock set cantidad=cantidad-'".$cantidad[$x]."' where Ubicacion_dep_id='".$origen."' and equipos_id='".$mat[$x]."'";
						$resultado = mysql_query($query2);
						
						
						
						
						//$query2="UPDATE STOCK SET cantidad=cantidad+".$cantidad[$x]." where Ubicacion_dep_id='".$$_POST['skills3']."' and equipos_id='".$equipo_id."'";
////echo $query2."<br>";
//				$resultado = mysql_query($query2);
				if (mysql_affected_rows()<1)
				{
				//	$query3="INSERT INTO STOCK (Ubicacion_dep_id,equipos_id,cantidad) VALUES('".$destino."','".$mat[$x]."','".$cantidad[$x]."')";
////					echo $query2."<br>";
//
//					$resultado2 = mysql_query($query3);
				}
						
						
						
						
		 				}
//						
}
//
mysql_close($con);	
if($ban==0)
{	
									echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>'; 
}
else
{
echo "El registro de remision NO SE REALIZO, es posible que algunos datos  no fueran correctos.";	
}
//									
?>