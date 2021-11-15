<?php 

 include ("PHPExcel/Classes/PHPExcel.php"); //include ("HtmlPhpExcel-master/example/HtmlPhpExcel.php");
// include ("PHPExcel/Reader/HTML.php"); include ("PHPExcel/Writer/HTML.php");
//$objPHPExcel = PHPExcel_IOFactory::load("planilla_ips.xml");
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('covertedXml2Xlsx.xlsx');
//include ("lib/PHPExcel.php");
// include ("HtmlPhpExcel/lib/HtmlPhpExcel/HtmlPhpExcel.php");
$inputFileType = 'HTML';
$inputFileName = '1.html';
$outputFileType = 'Excel2007';
$outputFileName = 'nn.xlsx';

$objPHPExcelReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objPHPExcelReader->load($inputFileName);

$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcel = $objPHPExcelWriter->save($outputFileName);

//$filename = "DownloadReport";
//$table    = $_GET['rosa'];
//
//// save $table inside temporary file that will be deleted later
//$tmpfile = tempnam(sys_get_temp_dir(), 'html');
//file_put_contents($tmpfile, $table);
//
//// insert $table into $objPHPExcel's Active Sheet through $excelHTMLReader
//$objPHPExcel     = new PHPExcel();
//$excelHTMLReader = PHPExcel_IOFactory::createReader('HTML');
//$excelHTMLReader->loadIntoExisting($tmpfile, $objPHPExcel);
//$objPHPExcel->getActiveSheet()->setTitle('any name you want'); // Change sheet's title if you want
//
//unlink($tmpfile); // delete temporary file because it isn't needed anymore
//
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // header for .xlxs file
//header('Content-Disposition: attachment;filename='.$filename); // specify the download file name
//header('Cache-Control: max-age=0');
//
//// Creates a writer to output the $objPHPExcel's content
//$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$writer->save('php://output');
//exit;