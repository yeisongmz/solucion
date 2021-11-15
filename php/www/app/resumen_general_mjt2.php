<?php include ("conexion/conectar.php");
include ("lib/PHPExcel.php");
$id=$_GET['id'];
$query2="select *  from resumengeneral where planillamt_id='".$id."' ";
$res=mysql_query($query2,$con);
$mat=array();
$fila2=0;
for($i=0;$i<5;$i++)
 {
			$mat[$i][0]='';
			$mat[$i][1]='';
			$mat[$i][2]='';
			$mat[$i][3]='';
			$mat[$i][4]='';
			$mat[$i][5]='';
			$mat[$i][6]='';
			$mat[$i][7]='';
			$mat[$i][8]='';
			$mat[$i][9]='';
			$mat[$i][10]='';
 }
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$mat[$fila2][0]=$fila['nropatronal'];
			$mat[$fila2][1]=$fila['ano_periodo'];
			$mat[$fila2][2]=$fila['jefesvarones'];
			$mat[$fila2][3]=$fila['jefesmujeres'];
			$mat[$fila2][4]=$fila['empl_varones'];
			$mat[$fila2][5]=$fila['empl_mujeres'];
			$mat[$fila2][6]=$fila['obrero_varones'];
			$mat[$fila2][7]=$fila['obrero_mujeres'];
			$mat[$fila2][8]=$fila['menor_varon'];
			$mat[$fila2][9]=$fila['menor_mujer'];
			$mat[$fila2][10]=$fila['orden'];
			$fila2=$fila2+1;									
		 }
 }
 
mysql_close($con);

//***************************************************************************
 //***************************************************************************

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
->setCellValue('B1', 'Año')
->setCellValue('C1', 'supjefesvarones')
->setCellValue('D1', 'supjefesmujeres')
->setCellValue('E1', 'empleadosvarones')
->setCellValue('F1', 'empleadosmujeres')
->setCellValue('G1', 'obrerosvarones')
->setCellValue('H1', 'obrerosmujeres')
->setCellValue('I1', 'menoresvarones')
->setCellValue('J1', 'menoresmujeres')
->setCellValue('K1', 'orden')
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




for($i=0;$i<5;$i++)
{
	$fila=$i+2;
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $mat[$i][0]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $mat[$i][1]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $mat[$i][2]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $mat[$i][3]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $mat[$i][4]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $mat[$i][5]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $mat[$i][6]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $mat[$i][7]);	
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $mat[$i][8]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$fila, $mat[$i][9]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$fila, $mat[$i][10]);
	

}

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Resumen General.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




exit;
		 	 	
?>