<?php include ("conexion/conectar.php");
include ("lib/PHPExcel.php");
session_start();
$mat=array();
$query2="select * from personal " ;
$fila=0;
$patronal='';

$mes=explode("-",$_POST['textfield2']);
$obs=$_POST['textarea'];
$id='';


					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							 $mat[$fila][0]= $query4['id'];
						     $mat[$fila][1]= $query4['nro_docum'];
						     $mat[$fila][2]= $query4['nombres'];
 						     $mat[$fila][3]= $query4['apellidos'];
							 $mat[$fila][4]= $query4['sexo'];
						     $mat[$fila][5]= $query4['estadocivil'];
 						     $mat[$fila][6]= $query4['fechanacim'];
							 $mat[$fila][7]= $query4['nacionalidad'];
							 $mat[$fila][8]= $query4['direccion'];
						     $mat[$fila][9]= $query4['fenacim_menor'];
							 $mat[$fila][10]= $query4['cant_hijos'];							 
						     $mat[$fila][11]= $query4['cargos_id'];							 
						     $mat[$fila][12]= $query4['profesion'];
						     $mat[$fila][13]= $query4['fecha_ingreso'];							 							 						     $mat[$fila][14]= '';
						     $mat[$fila][15]= '';							 							 						     						 $mat[$fila][16]= '';							 
							 $mat[$fila][17]= $query4['fecha_salida'];
							 $mat[$fila][18]= $query4['motivo_salida'];
							 $mat[$fila][19]= $query4['estado'];							 							 							 							 							 
							 $fila=$fila+1;
						}
						
						$creador = $_SESSION["user"];	
						$fe_ultmodi = date('Y-m-d');	
						$x=explode("-",$fe_ultmodi);
						$query2="insert into planillamt(periodo,REFERENCIA,mes,creador,fe_ultmodi,obs)values('".$x[0]."','EMPLEADOS','".$mes[1]."','".$creador."','".$fe_ultmodi."','".$obs."')" ;
						$res=mysql_query($query2,$con);
						
						$query2="select id from planillamt where periodo='".$x[0]."' and REFERENCIA='EMPLEADOS' and mes='".$mes[1]."' " ;
							echo $query2."<br>";
						$res=mysql_query($query2,$con);
						while($query4 = mysql_fetch_array($res) )
							{
								$id=$query4['id'];	
							}
						for($i=0;$i<count($mat);$i++){
							$query2="insert into empleadosobreros(personal_id,PlanillaMT_id,documento,nombre,apellido,sexo,estadocivil,fechanac,nacionalidad,domicilio,fechanacmenor,hijosmenores,cargo,profesion,fechaentrada,horariotrabajo,menoresescolar,fechasalida,motivosalida,estado) values('".$mat[$i][0]."','".$id."','".$mat[$i][1]."','".$mat[$i][2]."','".$mat[$i][3]."','".$mat[$i][4]."','".$mat[$i][5]."','".$mat[$i][6]."','".$mat[$i][7]."','".$mat[$i][8]."','".$mat[$i][9]."','".$mat[$i][10]."','".$mat[$i][11]."','".$mat[$i][12]."','".$mat[$i][13]."','".$mat[$i][14]."','".$mat[$i][15]."','".$mat[$i][17]."','".$mat[$i][18]."','".$mat[$i][19]."')";
							//echo $query2."<br>";
							$res=mysql_query($query2,$con);
						}
			
			echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_general_mjt.php");</script>'; 			
mysql_close($con);	