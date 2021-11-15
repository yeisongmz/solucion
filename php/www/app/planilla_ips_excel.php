<?php include ("conexion/conectar.php");
include ("lib/PHPExcel.php");
$razon='';
$direccion='';
$ruc='';
$total_trabajadores=0;
$total_salario=0;
$mat=array();
$filas=0;
$razon='';
$dir='';
$ruc='';
$patronal='';
$pagina=1;
$id_planilla=explode("--",$_GET['id']);

$fe_ultmodi=date('Y-m-d');
$id='';
			//$query2="select * from parametros" ;
//			$res=mysql_query($query2,$con);
//			while($query4 = mysql_fetch_array($res) )
//				{
//					$razon=$query4['cliente'];
//					$dir=$query4['direccion'];
//					$ruc=$query4['RUC'];
//					$patronal=$query4['nropatronal_ips'];
//				}
$query2="select * from personal_planillasueldoips where  PlanillaSueldoIPS_id='".$id_planilla[0]."' order by apellido" ;


					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							$mat[$filas][0] = $query4['orden'];
							$mat[$filas][1] = $query4['apellido'];
							$mat[$filas][2] = $query4['nombre'];
							$mat[$filas][3] = $query4['nrodocumento'];
							$mat[$filas][4] = $query4['nroasegurado'];	
							$mat[$filas][5] = $query4['sal_imponible'];
							$mat[$filas][6] = $query4['diastrabajados'];
							$mat[$filas][7] = $query4['tipotraba'];
							$total_salario=$total_salario+$query4['sal_imponible'];
							$filas=$filas+1;
						}
//$total_trabajadores=$filas;		
mysql_close($con);
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
	function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}


for($i=0;$i<count($mat);$i++)
{
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $mat[$i][4]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $mat[$i][3]);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $mat[$i][1]." ".$mat[$i][2]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $mat[$i][5]);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $mat[$i][7]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $mat[$i][5]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $mat[$i][6]);

}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Planilla_Ips.xlsx"');

header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




exit;