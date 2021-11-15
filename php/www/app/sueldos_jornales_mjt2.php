<?php include ("conexion/conectar.php");
include ("lib/PHPExcel.php");
$id=explode("--",$_GET['id']);
$mat=array();
$fila2=0;

 
$query2="select id  from planillamt where referencia='EMPLEADOS' and id='".$id[0]."' ";
$res=mysql_query($query2,$con);
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$id[0]=$fila['id'];										
		 }
 }
 
$query2="select *  from sueldojornales where  planillaMT_id='".$id[0]."' ";

$res=mysql_query($query2,$con);
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
	 {
					
							$mat[$fila2][0]=$fila['nropatronal'];
							$mat[$fila2][1]=$fila['nrodocumento'];	
							$mat[$fila2][2]=$fila['formapago'];	
							$mat[$fila2][3]=$fila['importeUnitario'];
					
							$mat[$fila2][10]=$fila['hs_enero'];
							$mat[$fila2][11]=$fila['sueldo_enero'];	
							$mat[$fila2][12]=$fila['hs_febrero'];
							$mat[$fila2][13]=$fila['sueldo_feb'];
							$mat[$fila2][14]=$fila['hs_marzo'];
							$mat[$fila2][15]=$fila['sueldo_mar'];	
							$mat[$fila2][16]=$fila['hs_abril'];
							$mat[$fila2][17]=$fila['sueldo_abr'];	
							$mat[$fila2][18]=$fila['hs_mayo'];
							$mat[$fila2][19]=$fila['sueldo_may'];
							$mat[$fila2][20]=$fila['hs_junio'];;
							$mat[$fila2][21]=$fila['sueldo_jun'];	
							$mat[$fila2][22]=$fila['hs_julio'];
							$mat[$fila2][23]=$fila['sueldo_jul'];	
							$mat[$fila2][24]=$fila['hs_agosto'];;
							$mat[$fila2][25]=$fila['sueldo_ago'];	
							$mat[$fila2][26]=$fila['hs_set'];
							$mat[$fila2][27]=$fila['sueldo_set'];	
							$mat[$fila2][28]=$fila['hs_oct'];
							$mat[$fila2][29]=$fila['sueldo_oct'];;	
							$mat[$fila2][30]=$fila['hs_nov'];;
							$mat[$fila2][31]=$fila['sueldo_nov'];	
							$mat[$fila2][32]=$fila['hs_dic'];
							$mat[$fila2][33]=$fila['sueldo_dic'];
							$mat[$fila2][34]=$fila['hs50'];;	
							$mat[$fila2][35]=$fila['sueldo50'];
							$mat[$fila2][36]=$fila['hs100'];
							$mat[$fila2][37]=$fila['sueldo100'];
							$mat[$fila2][38]=$fila['aguinaldo'];	
							$mat[$fila2][39]=$fila['beneficio'];
							$mat[$fila2][40]=$fila['bonificacion'];
							$mat[$fila2][41]=$fila['vacaciones'];
							$mat[$fila2][42]=$fila['total_hs'];
							$mat[$fila2][43]=$fila['total_sueldo'];				
							$fila2=$fila2+1;
							
					
	 }
 }
 //***************************************************************************
 //***************************************************************************
mysql_close($con);
$objPHPExcel = new PHPExcel();
// Establecer propiedades
$objPHPExcel->getProperties()
->setTitle("Liquidacion Regular");
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


$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Nropatronal')
->setCellValue('B1', 'Documento')
->setCellValue('C1', 'formadepago')
->setCellValue('D1', 'importeunitario')
->setCellValue('E1', 'h_ene')
->setCellValue('F1', 's_ene')
->setCellValue('G1', 'h_feb')
->setCellValue('H1', 's_feb')
->setCellValue('I1', 'h_mar')
->setCellValue('J1', 's_mar')
->setCellValue('K1', 'h_abr')
->setCellValue('L1', 's_abr')
->setCellValue('M1', 'h_may')
->setCellValue('N1', 's_may')
->setCellValue('O1', 'h_jun')
->setCellValue('P1', 's_jun')
->setCellValue('Q1', 'h_jul')
->setCellValue('R1', 's_jul')
->setCellValue('S1', 'h_ago')
->setCellValue('T1', 's_ago')

->setCellValue('U1', 'h_set')
->setCellValue('V1', 's_set')
->setCellValue('W1', 'h_oct')
->setCellValue('X1', 's_oct')
->setCellValue('Y1', 'h_nov')
->setCellValue('Z1', 's_nov')
->setCellValue('AA1', 'h_dic')
->setCellValue('AB1', 's_dic')
->setCellValue('AC1', 'h_50')
->setCellValue('AD1', 's_50')
->setCellValue('AE1', 'h_100')
->setCellValue('AF1', 's_100')
->setCellValue('AG1', 'Aguinaldo')
->setCellValue('AH1', 'Beneficios')
->setCellValue('AI1', 'Bonificaciones')
->setCellValue('AJ1', 'Vacaciones')
->setCellValue('AK1', 'total_h')
->setCellValue('AL1', 'total_s')
->setCellValue('AM1', 'totalgeneral')
;
cellColor('A1', '9EBE81');
cellColor('B1', '9EBE81');
cellColor('C1', '9EBE81');
cellColor('D1', '9EBE81');
cellColor('E1', '9EBE81');
cellColor('F1', '9EBE81');
cellColor('G1', '9EBE81');
cellColor('H1', '9EBE81');
cellColor('I1', '9EBE81');
cellColor('J1', '9EBE81');
cellColor('K1', '9EBE81');
cellColor('L1', '9EBE81');
cellColor('M1', '9EBE81');
cellColor('N1', '9EBE81');
cellColor('O1', '9EBE81');
cellColor('P1', '9EBE81');
cellColor('Q1', '9EBE81');
cellColor('R1', '9EBE81');
cellColor('S1', '9EBE81');
cellColor('T1', '9EBE81');


cellColor('U1', '9EBE81');
cellColor('V1', '9EBE81');
cellColor('W1', '9EBE81');
cellColor('X1', '9EBE81');
cellColor('Y1', '9EBE81');
cellColor('Z1', '9EBE81');
cellColor('AA1', '9EBE81');
cellColor('AB1', '9EBE81');
cellColor('AC1', '9EBE81');
cellColor('AD1', '9EBE81');
cellColor('AE1', '9EBE81');
cellColor('AF1', '9EBE81');
cellColor('AG1', '9EBE81');
cellColor('AH1', '9EBE81');
cellColor('AI1', '9EBE81');
cellColor('AJ1', '9EBE81');
cellColor('AK1', '9EBE81');
cellColor('AL1', '9EBE81');
cellColor('AM1', '9EBE81');



for($i=0;$i<count($mat);$i++)
{
	$fila=$i+2;
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $mat[$i][0]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $mat[$i][1]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $mat[$i][2]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $mat[$i][3]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $mat[$i][10]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $mat[$i][11]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $mat[$i][12]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $mat[$i][13]);	
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $mat[$i][14]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$fila, $mat[$i][15]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$fila, $mat[$i][16]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$fila, $mat[$i][17]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$fila, $mat[$i][18]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$fila, $mat[$i][19]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$fila, $mat[$i][20]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$fila, $mat[$i][21]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$fila, $mat[$i][22]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$fila, $mat[$i][23]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.$fila, $mat[$i][24]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$fila, $mat[$i][25]);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U'.$fila, $mat[$i][26]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$fila, $mat[$i][27]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$fila, $mat[$i][28]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$fila, $mat[$i][29]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y'.$fila, $mat[$i][30]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$fila, $mat[$i][31]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA'.$fila, $mat[$i][32]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB'.$fila, $mat[$i][33]);	
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.$fila, $mat[$i][34]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.$fila, $mat[$i][35]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE'.$fila, $mat[$i][36]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AF'.$fila, $mat[$i][37]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AG'.$fila, $mat[$i][38]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AH'.$fila, $mat[$i][39]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AI'.$fila, $mat[$i][40]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ'.$fila, $mat[$i][41]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AK'.$fila, $mat[$i][42]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AL'.$fila, $mat[$i][43]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AM'.$fila, $mat[$i][43]+$mat[$i][38]+$mat[$i][39]+$mat[$i][40]+$mat[$i][41]);	


}

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Sueldos y Jornales.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




exit;
?>