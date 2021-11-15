	 <?php session_start();
 				include ("conexion/conectar.php");
     			include ("ajuste_horas.php");
 				include ("funct_restar_horas.php");
				 $creador = $_SESSION["user"];	
				 $ano=$_GET['ano'];
				 $personal=explode(',',$_GET['personal']);
				 $id_personal=null;
				$sql="select id from personal where nombres='".trim($personal[1])."' and apellidos='".trim($personal[0])."'   and estado = 1 " ;
	//echo $sql;
				$res=mysql_query($sql,$con)or die('Tabla personal : '.$query2 . mysql_error());;
				 while($fila=mysql_fetch_array($res))
					{
		  				$id_personal=$fila['id'];
		  				
					}
				$total_cobro_diario=0;
				$semana_diurna=0;
				$semana_nocturna=0;
				$domingo_diurno=0;
				$domingo_nocturno=0;
				$total_horas=0;
				
				$h_entrada=0;
				$h_salida=0;
				$h_trabajadas=0;
				$h_nocturnas=0;
				$neto=0;
				$jornalxhora=0;
				$total_ausencias=0;
				$neto_ausencias=0;
				$query2="select *  from liquiregular where personal_id='$id_personal' and year(desde)='$ano'  " ;
				$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$id_personal=$query4['personal_id'];
					$desde=$query4['desde'];
					$hasta=$query4['hasta'];
					$jornalxhora=$query4['gsxhora'];
					$query20="select *  from asistencia where personal_id='".$id_personal."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'  " ;
					$total_cobro_diario=0;
					$semana_diurna=0;
					$semana_nocturna=0;
					$domingo_diurno=0;
					$domingo_nocturno=0;
					$total_horas=0;
					
					$h_entrada=0;
					$h_salida=0;
					$h_trabajadas=0;
					$h_nocturnas=0;
					$total_ausencias=0;
					$bonificacion=0;
					$res2=mysql_query($query20,$con);
					while($query40 = mysql_fetch_array($res2) )
					{
						$fecha_asistencia=explode('-',$query40['fecha_asistencia']);
						$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $fecha_asistencia[1],$fecha_asistencia[2], $fecha_asistencia[0]),0);
						$aux=explode(':',$query40['hs_entrada']);
						$h_entrada=hora(intval($aux[0]).'.'.intval($aux[1]));
						$aux=explode(':',$query40['hs_salida']);
						$h_salida=hora(intval($aux[0]).'.'.intval($aux[1]));
						$h_trabajadas=$query40['hs_cantidad'];//intval($aux2[0]).'.'.$aux2[1];
						$h_nocturnas=$query40['horas_nocturnas'];

			
						//DOMINGOS
						$aux=0;
						if($dia==0)
							{
								// DIURNOS DOMINGOS
								$domingo_diurno=number_format($domingo_diurno,'2','.','')+(number_format($h_trabajadas,'2','.','')-number_format($h_nocturnas,'2','.',''));
								if($h_nocturnas>0)
								{
									$aux2=(number_format($h_nocturnas,'2','.',''))*$jornalxhora*1.3;
									$domingo_nocturno=number_format($domingo_nocturno,'2','.','')+number_format($h_nocturnas,'2','.','');
								}	
													
							}
						else//LUNES A SABADOS
						{
							
							$semana_diurna=number_format($semana_diurna,'2','.','')+(number_format($h_trabajadas,'2','.','')-number_format($h_nocturnas,'2','.',''));
							if($h_nocturnas>0)
							{
								$semana_nocturna=number_format($semana_nocturna,'2','.','')+number_format($h_nocturnas,'2','.','');
							}
							
						}
						$total_horas=number_format($total_horas,'2','.','')+number_format($h_trabajadas,'2','.','');
						$h_entrada=0;
						$h_salida=0;
						$h_trabajadas=0;
						$h_nocturnas=0;
				}
	
					$aux=$domingo_diurno*1.3;
					$aux=$aux*$jornalxhora;
					$aux2=$domingo_nocturno*1.3;
					$aux2=$aux2*$jornalxhora;
				
					$total_cobro_diario	=round((($semana_diurna)*$jornalxhora)+(($semana_nocturna)*$jornalxhora*1.3)+$aux+$aux2);
					$neto=$neto+$total_cobro_diario;
					$query20="select *  from ausencias where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."'  and tipo='Injustificada'" ;
					$res2=mysql_query($query20,$con);
					//echo $query20.'<br>';
						while($query40 = mysql_fetch_array($res2) )
						{
							$total_ausencias=$total_ausencias+$query40['cant_horas'];	
						}
						$query20="select *  from bonificacion where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."'  and concepto='HORAS EXTRAS'" ;
					$res2=mysql_query($query20,$con);
					//echo $query20.'<br>';
						
						while($query40 = mysql_fetch_array($res2) )
						{
							$bonificacion=$bonificacion+$query40['importe'];	
						}
						
						
						
						
						$total_ausencias=$total_ausencias*$jornalxhora;
						//echo $total_ausencias.'<br>';
						$neto_ausencias=$neto_ausencias+$total_ausencias;
					}
					//************************************
					
					
					//echo $total_ausencias.'<br>';
					//echo intval($neto-$neto_ausencias).'<br>';
					$a_cobrar=intval(($neto+$bonificacion)-$neto_ausencias)/12;
					//echo $a_cobrar;
					 $fe_ultmodi=date('Y-m-d');
					 $query2="INSERT INTO liquiregular(personal_id,fecha,desde,hasta,totalPagar,canhorastraba,creador,fe_ultmodi)  VALUES('".$id_personal."','".$fe_ultmodi."','".$fe_ultmodi."','".$fe_ultmodi."','".$a_cobrar."','0','".$creador."','".$fe_ultmodi."')";
$resultado = mysql_query($query2)or die('Tabla liquiregular : '.$query2 . mysql_error());;

 $id_liquidacion=null;
 $total_adelantos=0;
$sql="select id from liquiregular where personal_id='".$id_personal."' and fecha='".$fe_ultmodi."'  ";	
 $res=mysql_query($sql,$con)or die('Tabla liquiregular : '.$sql . mysql_error());;
 while($fila=mysql_fetch_array($res)){
	 $id_liquidacion=$fila['id'];
 }
 $query2="insert into liquidetalle(Conceptos_id,Liquiregular_id,importe,tipo,concepto,creador,fe_ultmodi) values('0','".$id_liquidacion."','".str_replace('.','',$total_adelantos)."','Egreso','ADELANTOS','".$creador."','".$fe_ultmodi."')";
 //echo $query2;
					$res2=mysql_query($query2,$con)or die('Tabla liquidetalle : '.$query2 . mysql_error());;
mysql_close($con);									
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_liquidaciones_aguinaldo.php");</script>'; 														