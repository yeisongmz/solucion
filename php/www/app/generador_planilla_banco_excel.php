<?php include ("conexion/conectar.php");
include ("lib/PHPExcel.php");

$mat=array();
$fila=0;
$total=0;
$id=explode("-",$_GET['id']);


						
				$query2=mysql_query("SELECT * FROM planilla_banco WHERE id='".$id[0]."'" );
						
						while($query4=mysql_fetch_array($query2))
						{
							$mat[0][0] = $query4['numero'];
							$mat[0][1] = $query4['fecha_credito'];
							$mat[0][2] = $query4['tipo_liquidacion'];
							$mat[0][3] = $query4['notas'];
							$mat[0][4] = $query4['montototal'];
							$mat[0][5] = $query4['moneda'];							
							$fila=$fila+1;
						}
					$query2="SELECT * FROM detalleplanilla WHERE planilla_banco_id='".$id[0]."'  order by nombrepersonal" ;
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
						{			
							while($query4=mysql_fetch_array($resultado))
								{
									if($query4['importe']>0)
									{
										$mat[$fila][0] = '';
										$mat[$fila][1] = $query4['ci'];
										$mat[$fila][2] = $query4['nombrepersonal'];
										//$mat[$fila][3] = number_format(trim($query4['importe']),'0','.',',');
										$mat[$fila][3] = $query4['importe'];
										$mat[$fila][4] = $query4['nota'];
										$fila=$fila+1;
									}
										
								}
						}
						for($i=1;$i<count($mat);$i++)
						{
								$query2=mysql_query("SELECT tipo_docum FROM personal WHERE nro_docum='".$mat[$i][1]."'" );
								while($query4=mysql_fetch_array($query2))
								{
									$mat[$i][0] = "CI";//$query4['tipo_docum'];
								}
						}
						
mysql_close($con);


$currencyFormat = '_-* #.##0 _€_-;-* #.##0 _€_-;_-* "-"?? _€_-;_-@_-';
//$textFormat='@';//'General','0.00','@'
//$excel->getActiveSheet()->getStyle('B1')->getNumberFormat()->setFormatCode($currencyFormat);
//$excel->getActiveSheet()->getStyle('C1')->getNumberFormat()->setFormatCode($textFormat);`


$objPHPExcel = new PHPExcel();
// Establecer propiedades
$objPHPExcel->getProperties()
->setTitle("planilla_banco")
->setSubject("planilla_banco")
->setKeywords("planilla_banco")
->setCategory("planilla_banco");
$estilo1 = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 18,
        'name'  => 'Arial'
    ));
$estilo2 = array(
    'font'  => array(
        'normal'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 12,
        'name'  => 'Arial'
    ));	
$estilo3 = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 15,
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
 $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
              )
          )
      );
$estiloTituloReporte = array(
    'font' => array(
        'name'      => 'Verdana',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>16,
        'color'     => array(
            'rgb' => 'FFFFFF'
        )
    ),
       'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);
 $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
//$objPHPExcel->getDefaultStyle()->applyFromArray($styleArray);
//$objPHPExcel->getDefaultStyle()
//    ->getBorders()
//    ->getLeft()
//        ->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B1', 'PLANILLA DE PAGOS DE SALARIO')
->setCellValue('B3', 'Empresa:')
->setCellValue('A5', 'Número:')
->setCellValue('B5', 'Fecha de Acreditación:')
->setCellValue('C5', 'Tipo de Liquidación:')
->setCellValue('D5', 'Nota:')
->setCellValue('E5','Total:')
->setCellValue('F5', 'Moneda')
->setCellValue('A6', $mat[0][0])
->setCellValue('B6', $mat[0][1])
->setCellValue('C6', $mat[0][2])
->setCellValue('D6', $mat[0][3])
->setCellValue('E6', $mat[0][4])
->setCellValue('F6', $mat[0][5])
->setCellValue('A7', 'Tipo de Documento')
->setCellValue('B7', 'Nro. de Documento')
->setCellValue('C7', 'Nombre')
->setCellValue('D7', 'Monto')
->setCellValue('E7', 'Notas')
->setCellValue('F7', '')

;
$objPHPExcel->getActiveSheet()->getStyle('E6')->getNumberFormat()->setFormatCode('#,##0');
$objPHPExcel->getActiveSheet()->mergeCells('B1:F1');
$objPHPExcel->getActiveSheet()->mergeCells('B3:F3');
$objPHPExcel->getActiveSheet()->getStyle("B1:F1")->applyFromArray($style);
$objPHPExcel->getActiveSheet()->getStyle("B3:F3")->applyFromArray($style);

$objPHPExcel->getActiveSheet()->getStyle('A5')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('D5')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('E5')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('F5')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

$objPHPExcel->getActiveSheet()->getStyle('A6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('D6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('E6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('F6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);


$fila=0;
for($i=1;$i<count($mat);$i++)
{
	

	$ii=$i+6;
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $mat[$i][0]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$ii, $mat[$i][1]);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$ii, $mat[$i][2]);
	$objPHPExcel->getActiveSheet()->getStyle('D'.$ii)->getNumberFormat()->setFormatCode('#,##0');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$ii, $mat[$i][3]);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$ii, $mat[$i][4]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$ii,'');
	
	$objPHPExcel->getActiveSheet()->getStyle('A'.$ii)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	$objPHPExcel->getActiveSheet()->getStyle('B'.$ii)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$ii)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	$objPHPExcel->getActiveSheet()->getStyle('D'.$ii)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	$objPHPExcel->getActiveSheet()->getStyle('E'.$ii)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	//$objPHPExcel->getActiveSheet()->getStyle('F'.$ii)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

	$fila=$ii;
}
$fila2=$fila+3;
$fila3=$fila+4;
$fila=$fila+2;
$fila='B'.$fila;
$fila2='B'.$fila2;
$fila3='B'.$fila3;

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue($fila, 'Autorizamos a Banco Familiar S.A.E.C.A. a debitar de nuestra cuenta corriente Nro. xx-xxxxxxx, la suma')
->setCellValue($fila2, 'de Gs. ...............(Son Guaranies:  -------------------------------------), y acreditar a las cuentas según detalle, en ')
->setCellValue($fila3, 'concepto de ….Pagos de Salarios, Horas extras, Bonificación, u otros.)…….')
;
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo1);
$objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($estilo3);
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Planilla_banco.xlsx"');

header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




exit;
?>