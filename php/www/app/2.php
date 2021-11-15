
<?php include ("HtmlPhpExcel-master/example/HtmlPhpExcel.php");
 include ("PHPExcel.php");
$inputFileType = 'HTML';
$inputFileName = '1.html';
$outputFileType = 'Excel2007';
$outputFileName = './myExcelFile6.xlsx';

$objPHPExcelReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objPHPExcelReader->load($inputFileName);

$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcel = $objPHPExcelWriter->save($outputFileName);




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>