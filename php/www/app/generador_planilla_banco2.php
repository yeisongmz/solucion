<?php session_start();
 include ("conexion/conectar.php");
$mat=array();
$fila=0;
$total=0;
$x=explode("-",$_GET['desde']);
$desde=$x[2]."-".$x[1]."-".$x[0];
$x=explode("-",$_GET['hasta']);
$hasta=$x[2]."-".$x[1]."-".$x[0];
$ano=$x[2];
$mes=$x[1];	
$x=explode("-",$_GET['acredita']);
$acredita=$x[2]."-".$x[1]."-".$x[0];
$tipo=$_GET['tipo'];
$moneda=$_GET['moneda'];
$notas=$_GET['notas'];
$numero=$_GET['numero'];
$banco=$_GET['banco'];
$banco_id='';
$planilla_id='';
$fe_ultmodi = date('Y-m-d');
$creador = $_SESSION["user"];					
$query2=mysql_query("SELECT apellidos,nombres,nro_docum,jornalxhora,jornalxmin,id,tipo_docum FROM personal WHERE estado='1' and modopago='BANCO' order by apellidos" );
						
						while($query4=mysql_fetch_array($query2))
						{
							$mat[$fila][0] = $query4['id'];
							$mat[$fila][1] = $query4['apellidos'].", ".$query4['nombres'];
							$mat[$fila][2] = $query4['jornalxhora'];
							$mat[$fila][3] = $query4['jornalxmin'];
							$mat[$fila][4] = $query4['tipo_docum'];
							$mat[$fila][5] = $query4['nro_docum'];
							$fila=$fila+1;
						}
						for($i=0;$i<count($mat);$i++)
						{
							
							$query2="SELECT SUM(hs_cantidad) AS total FROM asistencia WHERE personal_id='".$mat[$i][0]."' AND fecha_asistencia>='".$desde."' AND fecha_asistencia<='".$hasta."'" ;
							$resultado = mysql_query($query2) ;
							if(mysql_num_rows($resultado)>0)
								{			
									while($query4=mysql_fetch_array($resultado))
										{
											if(is_null($query4['total']))
											{
												$mat[$i][7]='0';
											}
											else
											{
											$mat[$i][6] = $query4['total'];
											
													$x=explode(".",$query4['total']);
													$a=$x[0]*$mat[$i][2];
													if(count($x)>1)
													{
														$b=$x[1]*$mat[$i][3];	
													}
													else
													{
														$b=0;
													}
													
													
													$mat[$i][7]=intval($a+$b);
													$total=$total+$mat[$i][7];
											}
										}
								}
						}
						
						
//*****  CABECERA
$query2="SELECT id FROM banco_sueldo WHERE razon='".$banco."' " ;
							$resultado = mysql_query($query2) ;
							if(mysql_num_rows($resultado)>0)
								{			
									while($query4=mysql_fetch_array($resultado))
										{
											$banco_id=$query4['id'];
										}
								}

$query2="insert into planilla_banco(banco_sueldo_id,fecha,montototal,mescorrespon,anocorrespon,numero,fecha_credito,tipo_liquidacion,notas,moneda,creador,fe_ultmodi) values('".$banco_id."','".$hasta."','".$total."','".$mes."','".$ano."','".strtoupper($numero)."','".$acredita."','".strtoupper($tipo)."','".strtoupper($notas)."','".strtoupper($moneda)."','".$creador."','".$fe_ultmodi."')" ;

$resultado = mysql_query($query2) ;		

$query2="SELECT id FROM planilla_banco WHERE mescorrespon='".$mes."' and  anocorrespon='".$ano."' and montototal='".$total."'" ;
							$resultado = mysql_query($query2) ;
							if(mysql_num_rows($resultado)>0)
								{			
									while($query4=mysql_fetch_array($resultado))
										{
											$planilla_id=$query4['id'];
										}
								}
								

  for($i=0;$i<count($mat);$i++)
  {
		$query2="insert into detalleplanilla(personal_id,planilla_banco_id,ci,nombrepersonal,importe,nota) values('".$mat[$i][0]."','".$planilla_id."','".$mat[$i][5]."','".$mat[$i][1]."','".$mat[$i][7]."','".strtoupper($notas)."')";
		$resultado = mysql_query($query2) ;			
       
  }
      
						
mysql_close($con);
		echo'<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_banco.php");</script>'; 	

?>