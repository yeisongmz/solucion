<?php include ("lib/PHPExcel.php");

include ("conexion/conectar.php");
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Establecer propiedades
$objPHPExcel->getProperties()
->setTitle("Liquidacion Regular")
->setSubject("Liquidacion Regular")
->setKeywords("Liquidacion Regular")
->setCategory("Liquidacion Regular");
$estilo1 = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 16,
        'name'  => 'Arial'
    ));
$estilo2 = array(
    'font'  => array(
        'normal'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 12,
        'name'  => 'Arial'
    ));	
// *************************************************************************************************
$id=explode("--", $_GET['id']);
	$fila = 0;
	$fecha='';
	$desde='';
	$hasta='';
	$total_a_pagar='';
	$total_horas='';
	$total_minutos='';
	$total_bobif=0;
	$total_egresos=0;
	$personal_id='';
	$jornalxhora='';
	$jornalxmin='';
	$nro_docum='';
	$aux='';
	$personal='';
	$prestamo_id='';
	$mat_cabecera =array();
	$mat_detalle =array();
	$mat_detalle2 =array();	
	$query2="select * from liquiregular where id='".$id[0]."' " ;
	$personal='';
//	echo $query2;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_cabecera[$fila][0]=$query4['fecha'];
			$mat_cabecera[$fila][1]=$query4['desde'];	
			$mat_cabecera[$fila][2]=$query4['hasta'];						
			$mat_cabecera[$fila][3]=$query4['totalPagar'];
			$mat_cabecera[$fila][4]=$query4['canhorastraba'];	
			$personal_id=$query4['personal_id'];
			$fila=$fila+1;			
		}
// ******************************************************************************************
// ******************************************************************************************
//
//                       				INGRESOS
// ******************************************************************************************
// ******************************************************************************************



	$query2="select importe,concepto,obs from bonificacion where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;

	$res=mysql_query($query2,$con);
	$fila = 0;
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle[$fila][0]=$query4['importe'];
			$mat_detalle[$fila][1]="Bonif.: ".$query4['obs'];	
			$mat_detalle[$fila][2]=$query4['concepto'];
			$total_bobif=$total_bobif+$query4['importe'];
			$fila=$fila+1;			
		}	
// ******************************************************************************************
// ******************************************************************************************
		
		
		
		
// ******************************************************************************************
// ******************************************************************************************
//
//                       				EGRESOS
// ******************************************************************************************
// ******************************************************************************************
	$fila = 0;	
	$query2="select importe,obs from adelantos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Adelanto:'.$query4['obs'];	
			$mat_detalle2[$fila][2]='Adelanto';
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila=$fila+1;			
		}	
$query2="select importe,concepto,obs from descuentos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Descuento:'.$query4['obs'];	
			$mat_detalle2[$fila][2]=$query4['concepto'];
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila=$fila+1;			
		}
		
			
$query2="select id from prestamos where  personal_id='".$personal_id."'  " ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$prestamo_id = $query4['id'];
			//$mat_detalle2[$fila][0]=$query4['monto'];
//			$mat_detalle2[$fila][1]='Cuota '.$query4['numero'];	
//			$mat_detalle2[$fila][2]=$query4['Prestamos_id'];
//			$total_egresos=$total_egresos+	$query4['monto'];					
//			$fila=$fila+1;			
		}	
		
		
		
				
$query2="select monto,numero,Prestamos_id from cuotas where Prestamos_id='".$prestamo_id."' and estado='Pagado' " ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['monto'];
			$mat_detalle2[$fila][1]='Cuota '.$query4['numero'];	
			$mat_detalle2[$fila][2]=$query4['Prestamos_id'];
			$total_egresos=$total_egresos+	$query4['monto'];					
			$fila=$fila+1;			
		}	
		for($i=0;$i<$fila;$i++)
		{
			if(is_numeric($mat_detalle2[$i][2]))
			{
			$query2="select plazo,motivo from prestamos where id='".$mat_detalle2[$i][2]."' and personal_id='".$personal_id."'  " ;
			//echo $query2."<br>";
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$mat_detalle2[$i][1] =$mat_detalle2[$i][1]."/".$query4['plazo']."  - ".$query4['motivo'];
				}
			
			}
		}
				
	$query2="select apellidos,nombres,jornalxhora,jornalxmin,nro_docum from personal where id='".$personal_id."' and estado=1 " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$personal = $query4['apellidos'].", ".$query4['nombres'];
			$jornalxhora = $query4['jornalxhora'];
			$jornalxmin= $query4['jornalxmin'];
			$nro_docum=$query4['nro_docum'];
		}

//**************************************************************************************************
function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

// Agregar Informacion
	//#B8B4B4
$aux =explode(".", $mat_cabecera[0][4]);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C1', 'Liquidación Regular')
->setCellValue('A4', 'Personal')
->setCellValue('C4', $personal)
->setCellValue('A5', 'Fecha de Emisión')
->setCellValue('C5', $mat_cabecera[0][0])
->setCellValue('A6', 'Periodo')
->setCellValue('C6', $mat_cabecera[0][2]." -- ".$mat_cabecera[0][2])
->setCellValue('D4', 'Hs.Trab.:')
->setCellValue('E4', $aux[0])
->setCellValue('D5', 'Min.Trab.:')
->setCellValue('E5', $aux[1])
->setCellValue('A8', 'Ingresos')
->setCellValue('C9', 'Concepto')
->setCellValue('D9', 'Monto')
;
$total_a_pagar = $jornalxhora *$aux[0] ;
$total_a_pagar = $total_a_pagar+($jornalxmin*$aux[1]);
 $total_bobif =  $total_bobif+$total_a_pagar;
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C9', "Sueldo Básico");
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D9', $total_a_pagar);
for($i=10;$i<count($mat_detalle)+10;$i++)
{
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $mat_detalle[$i-10][1]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $mat_detalle[$i-10][0]);
}
$fila=count($mat_detalle)+10;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila,"Total");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $total_bobif);

cellColor('C'.$fila, 'B8B4B4');
cellColor('D'.$fila, 'B8B4B4');

$fila=$fila+2;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila,"Egresos");
$objPHPExcel->getActiveSheet()->getStyle("A".$fila)->applyFromArray($estilo1);
$fila=$fila+1;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila,"Concepto");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila,"Monto");
for($i=$fila+1;$i<count($mat_detalle2)+1+$fila;$i++)
{
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $mat_detalle2[$i-$fila-1][1]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $mat_detalle2[$i-$fila-1][0]);
}
$fila=$fila+2+count($mat_detalle2);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila,"Total");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila,$total_egresos);
cellColor('C'.$fila, 'B8B4B4');
cellColor('D'.$fila, 'B8B4B4');
$fila=$fila+2;
$tt=$total_bobif-$total_egresos;

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila,"Total a Pagar");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila,$tt);
cellColor('C'.$fila, 'B8B4B4');
cellColor('D'.$fila, 'B8B4B4');
$objPHPExcel->getActiveSheet()->getStyle("C1:C1")->applyFromArray($estilo1);
$objPHPExcel->getActiveSheet()->getStyle("A4")->applyFromArray($estilo2);
$objPHPExcel->getActiveSheet()->getStyle("A5")->applyFromArray($estilo2);
$objPHPExcel->getActiveSheet()->getStyle("A6")->applyFromArray($estilo2);
$objPHPExcel->getActiveSheet()->getStyle("H4")->applyFromArray($estilo2);
$objPHPExcel->getActiveSheet()->getStyle("H5")->applyFromArray($estilo2);
$objPHPExcel->getActiveSheet()->getStyle("A8")->applyFromArray($estilo1);
$objPHPExcel->getActiveSheet()->getStyle("C".$fila)->applyFromArray($estilo1);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(1);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Liquidacion Regular.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




exit;



?>