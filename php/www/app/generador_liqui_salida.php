<?php session_start();
 include ("conexion/conectar.php");

 $personal=explode(",", $_GET['personal']);
 $x=explode("-", $_GET['desde']);
 $desde=$x[2]."-".$x[1]."-".$x[0];
 $x=explode("-", $_GET['hasta']);
 $hasta=$x[2]."-".$x[1]."-".$x[0];
 $motivo=$_GET['motivo'];
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
 $concepto='';
 $adelantos=0;
 $fila=0;
 $jornalxhora=0;
 $jornalxmin=0;
 $mat = array();
 $descuentos_mat =array();
 $bonificaciones_mat =array();
 $adelantos_mat =array();
 $fe_ultmodi = date('Y-m-d');	
 $creador= $_SESSION["user"];

	$query2="select id,jornalxhora,jornalxmin from personal where apellidos='".$personal[0]."' and nombres ='".$personal[1]."' and estado = 1 " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$id_personal = $query4['id'];
			$jornalxhora = $query4['jornalxhora'];
			$jornalxmin = $query4['jornalxmin'];
		}
//*********** DESCUENTOS
	$query2="select fecha,importe,concepto,conceptos_id from descuentos where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) order by fecha asc " ;
	$res=mysql_query($query2,$con);
	$fila = 0;
	while($query4 = mysql_fetch_array($res) )
		{
			$total_descuentos=$total_descuentos+$query4['importe'];
			$descuentos_mat[$fila][0]=$query4['importe'];
			$descuentos_mat[$fila][1]=$query4['concepto'];	
			$descuentos_mat[$fila][2]='DESCUENTO';	
			$descuentos_mat[$fila][3]=$query4['conceptos_id'];					
			$fila=$fila+1;			
		}
//************ AUSENCIAS INJUSTIFICADAS

$query2="select fecha,cant_horas,motivo from ausencias where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) and tipo='Injustificada' order by fecha asc " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$importe_ausencias=$jornalxhora*$query4['cant_horas'];	
			$total_descuentos=$total_descuentos+$importe_ausencias;
			$descuentos_mat[$fila][0]=$importe_ausencias;
			$descuentos_mat[$fila][1]="Ausencia injust. ".$query4['cant_horas']."(hs)";
			$descuentos_mat[$fila][2]='DESCUENTO';	
			$descuentos_mat[$fila][3]='0';				
			$fila=$fila+1;			
		}
			
//*********** PRESTAMOS
	$query2="select id,idconcepto from prestamos where personal_id='".$id_personal."'   " ;
	$res=mysql_query($query2,$con);
	$fila =0;
	while($query4 = mysql_fetch_array($res) )
		{
			$prestamo_id = $query4['id'];
			$concepto  = $query4['idconcepto'];
			
			$query3="select monto,numero,fevtocuota from cuotas where Prestamos_id='".$prestamo_id."'  and estado='Pendiente' and (idliquidacion is null or  idliquidacion =0)   order by numero asc " ;
		//echo "<br>".$query2."<br>";
		$res2=mysql_query($query3,$con);
		
	while($query4 = mysql_fetch_array($res2) )
		{
			$mat[$fila][0] = $query4['monto'];
			$total_prestamos=$total_prestamos+$query4['monto'];
			$mat[$fila][1] = $query4['numero'];
			$mat[$fila][2] = $query4['fevtocuota'];
			$mat[$fila][3] = $concepto;		
			$mat[$fila][4] = 'PRESTAMO';			
			$mat[$fila][5] = 'CUOTA '.$query4['numero'];
			$mat[$fila][6] = $prestamo_id;					
			$fila = $fila+1;
		}		
		}
	//if (mysql_num_rows($res)>0)
//	{	
//		
//	}
//*********** ASISTENCIAS
	$query2="select hs_cantidad from asistencia where personal_id='".$id_personal."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'   " ;

	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$total_horas=$total_horas+$query4['hs_cantidad'];
		}
//  ************  CALCULO DE AGUINALDO PROPORCIONAL E INSERCION EN LA TABLA BONIFICACIONES
$ban4=0;

	$query2="select id from conceptos where concepto='AGUINALDO PROPORCIONAL' " ;

	$res=mysql_query($query2,$con);
	$aguinaldo_proporcional=0;
	$concepto_id='';
	while($query4 = mysql_fetch_array($res) )
		{
			$concepto_id=$query4['id'];
		}
		
	$query2="select sum(totalPagar) as total from liquiregular where personal_id='".$id_personal."' and year(hasta)='".$x[2]."' " ;

	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$aguinaldo_proporcional=intval($query4['total']/12);
		}
		
		$query2="insert into bonificacion(Conceptos_id,personal_id,fecha,importe,obs,concepto,creador,fe_ultmodi) values('".$concepto_id."','".$id_personal."','".$hasta."','".$aguinaldo_proporcional."','','AGUINALDO PROPORCIONAL','". $creador."','".$fe_ultmodi."') " ;
		$res=mysql_query($query2,$con);
		
		
//}

//**************************************************************************************


//*********** BONIFICACIONES
	$query2="select importe,Conceptos_id,obs,concepto from bonificacion where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) order by fecha asc " ;
//echo $query2;
	$res=mysql_query($query2,$con);
	$fila =0;
	while($query4 = mysql_fetch_array($res) )
		{
			//if($ban4==0)
			//{
					$bonificaciones=$bonificaciones+$query4['importe'];
					$bonificaciones_mat[$fila][0]=$query4['importe'];
					$bonificaciones_mat[$fila][1]=$query4['Conceptos_id'];
					$bonificaciones_mat[$fila][2]='BONIF.';						 
					$bonificaciones_mat[$fila][3]=$query4['obs'];
					$bonificaciones_mat[$fila][4]=$query4['concepto'];							 			
					$fila=$fila+1;
			
		}

//echo $bonificaciones."<br>";
//*********** ADELANTOS
	$query2="select importe,obs from adelantos where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) " ;

	$res=mysql_query($query2,$con);
	$fila =0;
	while($query4 = mysql_fetch_array($res) )
		{
			$adelantos=$adelantos+$query4['importe'];
			$adelantos_mat[$fila][0]=$query4['importe'];
			$adelantos_mat[$fila][1]="ADELANTOS";
			$adelantos_mat[$fila][2]=$query4['obs'];
			$fila=$fila+1;
		}


//******************** REGISTRO EN TABLA LIQUISALIDA
	$creador = $_SESSION["user"];	

	$x=explode(".",$total_horas);
	if($total_horas>0 or $total_a_cobrar>0 or $total_prestamos>0 or $bonificaciones>0)
	{
		$y=$jornalxhora*$x[0];
		$z=0;
		if(count($x)>1)
		{
			$z=$jornalxmin*$x[1];	
		}
		$x2=$total_descuentos+$total_prestamos+$adelantos;
		//echo $x2."<br>";
		//echo $total_descuentos." vale descuentos <br>";
		//echo $total_prestamos." vale prestamos <br>";
		//echo $adelantos." vale adelantos <br>";
		//echo $x2." vale total descuentos<br>";
		
		$total_a_cobrar =$y+$z+$bonificaciones;
		//echo $total_a_cobrar." vale totala cobrar<br>";
		
		$total_a_cobrar = $total_a_cobrar-$x2;
		//echo $total_a_cobrar." vale total a pagar<br>";
		
		$query2="INSERT INTO liquisalida(personal_id,fechaemision,fecharetiro,motivosalida,totalPagar,desde,hasta,creador)  VALUES('".$id_personal."','".$fe_ultmodi."','".$hasta."','".$motivo."','".$total_a_cobrar."','".$desde."','".$hasta."','".$creador."')";
		$resultado = mysql_query($query2);
		//echo $query2;
	}
	//******************** REGISTRO EN TABLA LIQUISALIDA-DETALLES
	$query2="select id from liquisalida where personal_id='".$id_personal."' and fechaemision='".$fe_ultmodi."' and fecharetiro='".$hasta."' and motivosalida='".$motivo."' and totalPagar='".$total_a_cobrar."'  " ;

	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$id_liquidacion=$query4['id'];
		}
		
			//************ PRESTAMOS *************
			for($i=0;$i<count($mat);$i++)
			{
				$query2="INSERT INTO salidadetalle(Conceptos_id,LiquiSalida_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('".$mat[$i][3]."','".$id_liquidacion."','".$mat[$i][0]."','".$mat[$i][4]."','".$mat[$i][5]."','".$creador."','".$fe_ultmodi."')";
				//echo $query2;
		$resultado = mysql_query($query2);
		
				
			}
			//************ DESCUENTOS *************
			for($i=0;$i<count($descuentos_mat);$i++)
			{
				$query2="INSERT INTO salidadetalle(Conceptos_id,LiquiSalida_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('".$descuentos_mat[$i][3]."','".$id_liquidacion."','".$descuentos_mat[$i][0]."','".$descuentos_mat[$i][2]."','".$descuentos_mat[$i][1]."','".$creador."','".$fe_ultmodi."')";
//				//echo $query2;
		$resultado = mysql_query($query2);
//		
//				
			}
//			//************ BONIFICACIONES *************
			for($i=0;$i<count($bonificaciones_mat);$i++)
			{
				$query2="INSERT INTO salidadetalle(Conceptos_id,LiquiSalida_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('".$bonificaciones_mat[$i][1]."','".$id_liquidacion."','".$bonificaciones_mat[$i][0]."','".$bonificaciones_mat[$i][2]."','".$bonificaciones_mat[$i][4]."','".$creador."','".$fe_ultmodi."')";
//				//echo $query2;
		$resultado = mysql_query($query2);
//		
//				
			}	
//		//************ ADELANTOS *************
			for($i=0;$i<count($adelantos_mat);$i++)
			{
				$query2="INSERT INTO salidadetalle(Conceptos_id,LiquiSalida_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('0','".$id_liquidacion."','".$adelantos_mat[$i][0]."','".$adelantos_mat[$i][1]."','".$adelantos_mat[$i][2]."','".$creador."','".$fe_ultmodi."')";
//				//echo $query2;
		$resultado = mysql_query($query2);
//		
//				
			}						
////*************************************************************************************************			
////*************************************************************************************************			
////
////                             		ACTUALIZACIONES
////
////*************************************************************************************************			
////*************************************************************************************************	
//
////                                		CUOTAS		
//
if($total_horas>0 or count($mat)>0 or  $total_a_cobrar>0 or $total_prestamos>0 or $bonificaciones>0)
	{
for($i=0;$i<count($mat);$i++)
			{
		$query2="update cuotas set idliquidacion='".$id_liquidacion."',estado='Pagado' where Prestamos_id='".$mat[$i][6]."'     and estado='Pendiente' and (idliquidacion is null or  idliquidacion =0)";
		//echo $query2."<br>";
		$resultado = mysql_query($query2);
			}
//		
//		
////										ADELANTOS		
//
		$query2="update adelantos set liquiregular_id='".$id_liquidacion."' where  personal_id='".$id_personal."' and fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0)";
		$resultado = mysql_query($query2);		
//		
////										BONIFICACION		
//
		$query2="update bonificacion set liquiregular_id='".$id_liquidacion."' where  personal_id='".$id_personal."' and fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0)";
		$resultado = mysql_query($query2);		
//				
////										DESCUENTOS		
//
		$query2="update descuentos set liquiregular_id='".$id_liquidacion."' where  personal_id='".$id_personal."' and fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0)";
		$resultado = mysql_query($query2);	
		
//										AUSENCIAS INJUSTIFICADAS		

		$query2="update ausencias set liquiregular_id='".$id_liquidacion."' where fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0) and tipo='Injustificada' ";
		$resultado = mysql_query($query2);			
		
////                                        PERSONAL

		$query2="update personal set estado='0',fecha_salida='".$hasta."',motivo_salida='".$motivo."' where  id='".$id_personal."' ";
		$resultado = mysql_query($query2);		
//echo $query2;		
//		
		mysql_close($con);
	}
		echo'<script type="text/javascript" language="javascript">window.location.replace("busca_liquidaciones_salida.php");</script>'; 										
 
?>