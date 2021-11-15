<?php include ("conexion/conectar.php");
 include ("ajuste_horas.php");
 include ("funct_restar_horas.php");
 
 //$x=explode("-", $_GET['desde']);
 //$desde=$x[2]."-".$x[1]."-".$x[0];
// $x=explode("-", $_GET['hasta']);
// $hasta=$x[2]."-".$x[1]."-".$x[0];
 //$opcion=$_GET['opcion'];
 $id_personal='';
 $id_liquidacion=0;
 $total_premios=0;
 $total_descuentos=0;
 $total_prestamos=0;
 $total_salario=0;
 $total_a_cobrar=0;
 $total_horas=0;
 $total_dias=0;
 $total_ausencias=0;
 $prestamo_id='';
 $bonificaciones=0;
 $adelantos=0;
 $fila=0;
 $fila_x=0;
 $jornalxhora=0;
 $jornalxmin=0;
 
 $mat_personal= array();

 	$query2="select * from liquiregular  " ;
	$res=mysql_query($query2,$con);
	$fila=0;
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_personal[$fila][0] = $query4['personal_id'];
			$mat_personal[$fila][1] = $query4['gsxhora'];
			//$mat_personal[$fila][2] = $query4['jornalxmin'];
			$mat_personal[$fila][3]=$query4['desde'];
			$mat_personal[$fila][4]=$query4['hasta'];
			$mat_personal[$fila][5]=$query4['id'];			
			$fila=$fila+1;
		}
 
 for($fila_x=0;$fila_x<count($mat_personal);$fila_x++)
 {
	$mat = array();
 	$descuentos_mat =array();
 	$bonificaciones_mat =array();
 	$adelantos_mat =array();
	$id_personal = $mat_personal[$fila_x][0];
	$jornalxhora = $mat_personal[$fila_x][1];
	$desde= $mat_personal[$fila_x][3];
 	$hasta= $mat_personal[$fila_x][4];
	//$jornalxmin = $mat_personal[$fila_x][2];
	$neto=0;
	$query2="select *  from asistencia where personal_id='".$id_personal."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'  " ;
	echo $query2."<br>";
	$res=mysql_query($query2,$con);
	$total_cobro_diario=0;
	$semana_diurna=0;
	$semana_nocturna=0;
	$domingo_diurno=0;
	$domingo_nocturno=0;
	
	
	$h_entrada=0;
	$h_salida=0;
	$h_trabajadas=0;
	$h_nocturnas=0;
	
	while($query4 = mysql_fetch_array($res) )
		{
		$fecha_asistencia=explode('-',$query4['fecha_asistencia']);
			$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $fecha_asistencia[1],$fecha_asistencia[2], $fecha_asistencia[0]),0);
			//TOTAL HORAS TRABAJADAS...............
			//.....................................
			//.....................................
			$aux=explode(':',$query4['hs_entrada']);
			$h_entrada=hora(intval($aux[0]).'.'.intval($aux[1]));
			$aux=explode(':',$query4['hs_salida']);
			$h_salida=hora(intval($aux[0]).'.'.intval($aux[1]));
			$h_trabajadas=$query4['hs_cantidad'];//intval($aux2[0]).'.'.$aux2[1];
			$h_nocturnas=$query4['horas_nocturnas'];

		
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
			//$total_horas=number_format($total_horas,'2','.','')+number_format($h_trabajadas,'2','.','');
			$h_entrada=0;
			$h_salida=0;
			$h_trabajadas=0;
			$h_nocturnas=0;
		}
		
			$aux=$domingo_diurno*1.3;
		$aux=$aux*$jornalxhora;
		$aux2=$domingo_nocturno*1.3;
		$aux2=$aux2*$jornalxhora;
	//echo $semana_diurna.'<br>';	
//	echo $jornalxhora.'<br>';
//	echo $semana_nocturna.'<br>';
//	echo $jornalxhora.'<br>';
//	echo $aux.'<br>';
//	echo $aux2.'<br>';	
	
		//$total_cobro_diario	=round(($semana_diurna)*$jornalxhora)+($semana_nocturna)*$jornalxhora*1.3)+$aux+$aux2);
		$total_cobro_diario	=round((($semana_diurna)*$jornalxhora)+(($semana_nocturna)*$jornalxhora*1.3)+$aux+$aux2);
		$neto=$total_cobro_diario;
		$query2="update liquiregular set neto='".$neto."' where  id='".$mat_personal[$fila_x][5]."'";
		echo $query2."<br>";
		$resultado = mysql_query($query2);
		//echo $neto.'<br>';
 }