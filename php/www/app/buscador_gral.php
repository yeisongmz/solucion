<?php include ("conexion/conectar.php");

$origen=$_GET["origen"];
$dato=$_GET["dato"];

if($origen=="asistencia")
{
	
						$query2=mysql_query("SELECT id FROM cliente WHERE razon = '".$dato."' " );
						$id=0;
						while($query4=mysql_fetch_array($query2))
						{
							$id=$query4['id'];
						}
						$query2=mysql_query("SELECT razon_sucursal FROM sucursales WHERE cliente_id = '".$id."' " );
						$apellidos = "";
						while($query4=mysql_fetch_array($query2))
						{
							$apellidos = $apellidos.$query4['razon_sucursal']."&";
						}
						if($apellidos=='')
						{
							$apellidos = $dato."&";
						}
						$apellidos = $apellidos."...";

						echo "<script type='text/javascript'> parent.document.getElementById('textfield2').value = '';  </script>";
						echo "<script type='text/javascript'> parent.document.getElementById('textarea3').value = '".$apellidos."';  </script>";
						
}
if($origen=="compras")
{
	
	$tipo='';$x='';
						$query2=mysql_query("SELECT tipo FROM equipos WHERE descrip = '".$dato."' " );
						//echo "SELECT tipo FROM equipos WHERE descrip = '".$dato."' ";
						while($query4=mysql_fetch_array($query2))
						{
							$x=$query4['tipo'];

		  					switch ($x) 
								{
									case $x== '1':
										$tipo='Insumo';
										break;
									case $x== '2':
										$tipo='Herramienta';
										break;
									case $x== '3':
										$tipo='Maquinaria';
										break;
									case $x== '4':
										$tipo='Útiles';
										break;
									case $x== '5':
										$tipo='Otros';
										break;
									default:

								}
						}
					//echo $tipo;
						mysql_close($con);
						
						echo "<script type='text/javascript'> parent.document.getElementById('textfield16').value = '".$x."'; parent.document.getElementById('textfield17').value = $x; </script>";
}
if($origen=="traslados")
{
	//echo $origen;
	$tipo='';$x='';
						$query2=mysql_query("SELECT id FROM cliente WHERE razon = '".$dato."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$x=$query4['id'];

		  					
						}
					//echo $x;
						mysql_close($con);
						
						echo "<script type='text/javascript'> parent.document.getElementById('textfield4').value = '".$x."'; </script>";
}
if($origen=="asignacion_sucursales")
{
	//echo $origen;
	$tipo='';$x='';
						$query2=mysql_query("SELECT id FROM cliente WHERE razon = '".$dato."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$x=$query4['id'];

		  					
						}
					//echo $x;
						mysql_close($con);
						
						echo "<script type='text/javascript'> parent.document.getElementById('textfield16').value = '".$x."'; </script>";
}

if($origen=="ultimo")
{
	$tipo='';$x='';
						$query2=mysql_query("SELECT id FROM cliente WHERE razon = '".trim($dato)."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$x=$query4['id'];

		  					
						}
						$query2=mysql_query("SELECT id FROM sucursales WHERE razon_sucursal = '".trim($_GET['susursal'])."' and cliente_id='".$x."' " );
						//echo "SELECT id FROM sucursales WHERE razon_sucursal = '".trim($_GET['susursal'])."' and cliente_id='".$x."' ";
						$id_sucursal=0;
						while($query4=mysql_fetch_array($query2))
						{
							$id_sucursal=$query4['id'];
						}
						$aux=explode(",",$_GET['personal']);
						$query2=mysql_query("SELECT id FROM personal WHERE nombres = '".trim($aux[0])."' and apellidos='".trim($aux[1])."' " );
						//echo "SELECT id FROM personal WHERE nombres = '".trim($aux[0])."' and apellidos='".trim($aux[1])."' " ;
						$id_personal=0;
						while($query4=mysql_fetch_array($query2))
						{
							$id_personal=$query4['id'];
						}
						
					//for($i=0;$i<$dias_semana;$i++)
//{
//	for($ii=$aux;$ii<=getUltimoDiaMes($_POST["textfield5"], $mes);$ii++)
//	{	
//						$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $mes,$ii, $_POST["textfield5"]),0);
//						$hora_final=$_POST['textfield6']+$horas_semanas_nocturnas;
//						if($dia!==0 and $dia!==6)
						//$mes=date('m');
						//$mes=intval($mes)-1;
						
						$actual = date('Y-m-d');
						$nuevafecha = strtotime ( '-1 month' , strtotime ($actual ) ) ;
						$nuevafecha2 = date ( 'Y-m-d' , $nuevafecha );
						
						$mes=explode("-",$nuevafecha2);

$ban2=0;
	$query2=mysql_query("SELECT month(fecha_asistencia) as fec from asistencia where personal_id='".$id_personal."' and id_cliente='".$x."' and id_sucursal='".$id_sucursal."' GROUP BY MONTH(fecha_asistencia) ORDER BY fecha_asistencia DESC LIMIT 1" );
while($query4=mysql_fetch_array($query2))
						{
							$mes[1]= $query4['fec'];
						}
						$query2=mysql_query("SELECT * from asistencia where personal_id='".$id_personal."' and id_cliente='".$x."' and id_sucursal='".$id_sucursal."' and month(fecha_asistencia)='".$mes[1]."'" );
						//echo "SELECT * from asistencia where personal_id='".$id_personal."' and id_cliente='".$x."' and id_sucursal='".$id_sucursal."' and month(fecha_asistencia)='".$mes[1]."'".'<br>' ;
						$total_semanas=0;
						$total_sabados=0;
						$total_domingos=0;
						
						$horas_semanas_diurnas=0;
						$horas_semanas_nocturnas=0;
						
						$horas_sabados_diurnas=0;
						$horas_sabados_nocturnas=0;
						
						$horas_domingos_diurnas=0;
						$horas_domingos_nocturnas=0;
												
						while($query4=mysql_fetch_array($query2))
						{
							$aux=explode("-",$query4['fecha_asistencia']);
							$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $aux[1],$aux[2], $aux[0]),0);
//						$hora_final=$_POST['textfield6']+$horas_semanas_nocturnas;
//echo $dia.'<br>';
							if($dia!==0 and $dia!==6)
							{
								$total_semanas=$total_semanas+1;
								//echo $query4['hs_cantidad'].'-'.$query4['horas_nocturnas'].'<br>';
								if($query4['hs_cantidad']>0)
								{
									$horas_semanas_diurnas=$query4['hs_cantidad']-$query4['horas_nocturnas'];
									$horas_semanas_nocturnas=$query4['horas_nocturnas'];
								}
							}
							if($dia==0 )
							{
								$total_domingos=$total_domingos+1;
								if($query4['hs_cantidad']>0)
								{
									$horas_domingos_diurnas=$query4['hs_cantidad']-$query4['horas_nocturnas'];
									$horas_domingos_nocturnas=$query4['horas_nocturnas'];
								}
							}
							if($dia==6 )
							{
								//echo "cc"; 
								$total_sabados=$total_sabados+1;
								if($query4['hs_cantidad']>0)
								{
									//echo $horas_sabados_diurnas.'<br>';
									$horas_sabados_diurnas=$query4['hs_cantidad']-$query4['horas_nocturnas'];
									$horas_sabados_nocturnas=$query4['horas_nocturnas'];
								}
							}
						}
						mysql_close($con);
						//echo 4-0.00;
						//echo $horas_sabados_diurnas.'<br>';
						//echo $horas_semanas_diurnas;
						echo "<script type='text/javascript'> parent.document.getElementById('textfield12').value = '".$total_semanas."';parent.document.getElementById('textfield13').value = '".$total_sabados."';parent.document.getElementById('textfield14').value = '".$total_domingos."'; parent.document.getElementById('textfield6').value = '".$horas_semanas_diurnas."'; parent.document.getElementById('textfield7').value = '".$horas_semanas_nocturnas."'; parent.document.getElementById('textfield8').value = '".$horas_sabados_diurnas."'; parent.document.getElementById('textfield9').value = '".$horas_sabados_nocturnas."'; parent.document.getElementById('textfield10').value = '".$horas_domingos_diurnas."'; parent.document.getElementById('textfield11').value = '".$horas_domingos_nocturnas."';</script>";
}
?>