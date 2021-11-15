<!DOCTYPE html>
<html>
<head>
	<title>Leer Archivo Excel usando PHP</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h2>&nbsp;</h2>	
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">&nbsp;</h3>
      </div>
      <div class="panel-body">
        <div class="col-lg-12">
            
<?php
require_once 'PHPExcel/Classes/PHPExcel.php';
//$archivo = "ListaPersonal.xlsx";
$archivo = $_FILES["file"]["tmp_name"];//"Reporte-24-08-2021-16_53_17.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();?>

<table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Cargo</th>
          <th>Sede</th>
        </tr>
      </thead>
      <tbody>


<?php
$num=0;
for ($row = 2; $row <= $highestRow; $row++){ $num++;?>
       <tr>
          <th scope='row'><?php echo $num;?></th>
          <td><?php echo $sheet->getCell("A".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("B".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("C".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("D".$row)->getValue();?></td>
           <td><?php echo $sheet->getCell("F".$row)->getValue();?></td>
            <td><?php echo $sheet->getCell("G".$row)->getValue();?></td>
           <td><?php echo $sheet->getCell("H".$row)->getValue();?></td>
            <td><?php echo $sheet->getCell("I".$row)->getValue();?></td> 
        </tr>
    	
	<?php	
}
?>
          </tbody>
    </table>
  </div>	
 </div>	
</div>
</body>
</html>