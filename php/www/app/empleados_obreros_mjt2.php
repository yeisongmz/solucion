<?php include ("conexion/conectar.php");
include ("lib/PHPExcel.php");

$mat=array();
//$query2="select * from personal " ;
$fila=0;
$patronal='';

		$id_planilla=explode("--", $_GET['id']);
$query2="select * from empleadosobreros where planillamt_id='".$id_planilla[0]."' " ;
					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							 $mat[$fila][0]= '';
						     $mat[$fila][1]= $query4['Documento'];
						     $mat[$fila][2]= $query4['Nombre'];
 						     $mat[$fila][3]= $query4['Apellido'];
							 $mat[$fila][4]= $query4['Sexo'];
						     $mat[$fila][5]= $query4['Estadocivil'];
 						     $mat[$fila][6]= $query4['Fechanac'];
							 $mat[$fila][7]= $query4['Nacionalidad'];
							 $mat[$fila][8]= $query4['Domicilio'];
						     $mat[$fila][9]= $query4['Fechanacmenor'];
							  if($mat[$fila][9]=='2099-12-31')
							 {
								$mat[$fila][9]=''; 
							 }
							 $mat[$fila][10]= $query4['hijosmenores'];							 
						     $mat[$fila][11]= $query4['cargo'];							 
						     $mat[$fila][12]= $query4['profesion'];
						     $mat[$fila][13]= $query4['fechaentrada'];							 							 						     $mat[$fila][14]= '';
						     $mat[$fila][15]= '';							 							 						     						 $mat[$fila][16]= '';							 
						     $mat[$fila][17]= $query4['fechasalida'];
							  if($mat[$fila][17]=='2099-12-31')
							 {
								$mat[$fila][17]=''; 
							 }
 						     $mat[$fila][18]= $query4['motivosalida'];
							 $mat[$fila][19]= $query4['estado'];							 							 							 							 							 
							 $fila=$fila+1;
						}
						$query2="select nropatronal_mt from parametros " ;
						$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							$patronal= $query4['nropatronal_mt'];
						}
						for($i=0;$i<count($mat);$i++){
							$mat[$i][0]=$patronal;
							if($mat[$i][4]==1)
							{
								$mat[$i][4]="M";	
							}
							else
							{
								$mat[$i][4]="F";		
							}
							switch ($mat[$i][5]) {
								case '1':
									$mat[$i][5]="S";
									break;
								case '2':
									$mat[$i][5]="C";
									break;
								case '3':
									$mat[$i][5]="D";
									break;
								
								case '4':
									$mat[$i][5]="O";
									break;
								
								default:
								
							}
							if($mat[$i][19]==1)
							{
								$mat[$i][19]="Activo";	
							}
							else
							{
								$mat[$i][19]="Inactivo";		
							}
							
							$query2="select cargo from cargos where id='".$mat[$i][11]."' " ;
							$res=mysql_query($query2,$con);
							while($query4 = mysql_fetch_array($res) )
							{
								$mat[$i][11]=$query4['cargo'];	
							}

						}
			
						
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
->setCellValue('C1', 'Nombre')
->setCellValue('D1', 'Apellido')
->setCellValue('E1', 'Sexo')
->setCellValue('F1', 'Estadocivil')
->setCellValue('G1', 'Fechanac')
->setCellValue('H1', 'Nacionalidad')
->setCellValue('I1', 'Domicilio')
->setCellValue('J1', 'Fechanacmenor')
->setCellValue('K1', 'hijosmenores')
->setCellValue('L1', 'cargo')
->setCellValue('M1', 'profesion')
->setCellValue('N1', 'fechaentrada')
->setCellValue('O1', 'horariotrabajo')
->setCellValue('P1', 'menorescapa')
->setCellValue('Q1', 'menoresescolar')
->setCellValue('R1', 'fechasalida')
->setCellValue('S1', 'fechasalida')
->setCellValue('T1', 'Estado')
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


for($i=0;$i<count($mat);$i++)
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
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$fila, $mat[$i][11]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$fila, $mat[$i][12]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$fila, $mat[$i][13]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$fila, $mat[$i][14]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$fila, $mat[$i][15]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$fila, $mat[$i][16]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$fila, $mat[$i][17]);
 	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.$fila, $mat[$i][18]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$fila, $mat[$i][19]);	
}

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Empleados y Obreros.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




exit;
?>
