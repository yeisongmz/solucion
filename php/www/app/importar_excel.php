 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" >
	function guardar()
	{
		
			if(document.getElementById('textfield').value=='' || document.getElementById('textfield2').value!=='')
			{
				alert('No puede guardar las asistencias si hay registros incorrectos en el archivo EXCEL');	
			}
			else
			{
				
			}
	}
	
	function sleep_until (seconds) {
   var max_sec = new Date().getTime();
   while (new Date() < max_sec + seconds * 1000) {}
    return true;
}

	
	
	
	


	function nn()
	
	{
	var funcio=document.getElementById('textarea').value;
	var res = funcio.split("--");
	
		for(ii=0;ii<res.length;ii++)
		{ 
		if(res[ii]!=='')
		{
alert(res[ii]);
				document.getElementById('detalle').src='guarda_excel_tigo.php?funcionario='+res[ii];
				
		
		}
	
 sleep_until (4); 	//document.getElementById('textarea').value+'&desde='+document.getElementById('textarea1').value+'&hasta='+document.getElementById('textarea2').value+'&fechas='+document.getElementById('textarea3').value+'&horas='+document.getElementById('textarea4').value;
		}
alert('listo');	

	}
	function enviar()
	{

		document.getElementById('form1').submit();
	}
</script>
</head>

<body>
<?php $ver= $_GET['ver'];

 ?>
<style type="text/css">
	#demos{
		width:800px;
		margin:10px auto 0 auto;
		padding:30px;
		border:1px solid #DFDFDF;
		font:normal 12px Arial, Helvetica, sans-serif
	}
	#demos h3{
		border-bottom:1px solid #DFDFDF;
		padding-bottom:7px;
		margin:10px 0
	}
	table{
		margin-top:15px;
		width:100%
	}
	table td{
		padding:7px;
		border:1px solid #CCC;
	}
	
</style>
<div id="demos" style="height:auto; width:90%">
    
    <form name="form1" method="post" action="importar_excel.php?ver=s" enctype="multipart/form-data" id="form1" >
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1" style="border:none">
          <tbody>
            <tr>
              <td height="36" colspan="3" class="fondo_encabezado">Registro de Asistencia - Tigo WEB</td>
            </tr>
            <tr>
              <td colspan="3" style="border-bottom:none" >&nbsp;</td>
            </tr>
           
            <tr>
              <td colspan="2" align="right" style="border-right:none; border-bottom:none"><input type="button" name="button2" id="button" value="Enviar2" onClick="enviar();">
                <input type="button" name="submit" id="submit" value="Enviar" onClick="nn();">
              <input type="submit" name="submit" id="50" class="boton3" value="IMPORTAR"  />&nbsp;&nbsp;</td>
              <td width="8%" style="border-left:none; border-bottom:none"><input name="button" type="button" class="boton3" id="40" value="Guardar" style="visibility:hidden" onClick="guardar();"></td>
            </tr>
            
            <tr>
              <td colspan="3" style="border-bottom:none" >&nbsp;<input name="file" type="file" accept="application/vnd.ms-excel"  /></td>
            </tr>
             <tr class="eiquetas">
              <td width="17%" height="24" style="border-bottom:none" >Total registros</td>
              <td colspan="2" style="border-bottom:none; border-left:none" >
               <input name="textfield" type="text" id="textfield" size="10" readonly></td>
            </tr>
             <tr class="eiquetas" style="border-right:none">
              <td height="23" >Registros incorrectos</td>
              <td colspan="2"  style=" border-left:none">
               <input name="textfield2" type="text" id="textfield2" size="10" readonly></td>
            </tr>
          </tbody>
        </table>
        <p><iframe id="detalle" width="400px" height="100px"></iframe>&nbsp;</p>
    </form>
</div>
</body>
</html>
<?php 
		
if(isset($_POST['submit'])){
	$funcionarios='';
	$desde='';
	$hasta='';
	$total='';
	$fechas='';
		if($_FILES['file']['name'] != '')
		{

			require_once 'reader/Classes/PHPExcel/IOFactory.php';

			//Funciones extras
			
			function get_cell($cell, $objPHPExcel){
				//select one cell
				$objCell = ($objPHPExcel->getActiveSheet()->getCell($cell));
				//get cell value
				return $objCell->getvalue();
			}
			
			function pp(&$var){
				$var = chr(ord($var)+1);
				return true;
			}
	
			$name	  = $_FILES['file']['name'];
			$tname 	  = $_FILES['file']['tmp_name'];
			$type 	  = $_FILES['file']['type'];
				
			if($type == 'application/vnd.ms-excel')
			{
				// Extension excel 97
				$ext = 'xls';
			}
			else if($type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
			{
				// Extension excel 2007 y 2010
				$ext = 'xlsx';
			}else{
				// Extension no valida
				echo -1;
				exit();
			}
		
			$xlsx = 'Excel2007';
			$xls  = 'Excel5';
	
			//creando el lector
			$objReader = PHPExcel_IOFactory::createReader($$ext);
			
			//cargamos el archivo
			ini_set('memory_limit', '-1');
			$objPHPExcel = $objReader->load($tname);
		
			$dim = $objPHPExcel->getActiveSheet()->calculateWorksheetDimension();
		
			// list coloca en array $start y $end
			list($start, $end) = explode(':', $dim);
				
			if(!preg_match('#([A-Z]+)([0-9]+)#', $start, $rslt)){
				return false;
			}
			list($start, $start_h, $start_v) = $rslt;
			if(!preg_match('#([A-Z]+)([0-9]+)#', $end, $rslt)){
				return false;
			}
			list($end, $end_h, $end_v) = $rslt;
			
			
			
			
		

			//empieza  lectura vertical
			$fin='';
			$inicio='';
			$fin2='';
			$inicio2='';	
			$funcionario='';	
			$mat=array();
			$errores=0;
			$total_filas=0;	
			$table = "<table  border='0'  cellpadding='0' cellspacing='0'  class='tabla1'> ";
			$fila=0;
//			for($v=$start_v; $v<=$end_v; $v++){
				for($v=9; $v<=10; $v++){
				
				//empieza lectura horizontal
				$table .= "<tr>";
				//echo  $v."<br>";
						for($h=$start_h; ord($h)<=ord($end_h); pp($h))
						{
							
							if($h=='D' or $h=='F' or $h=='G' )
							{
								//$fila=$v-8;
									$cellValue =get_cell($h.$v, $objPHPExcel);
									
									if($cellValue !== null)
										{
											
											if($cellValue=='' )
											{
											
											$table .= "<td style='background-color:red' >";
											$errores=$errores+1;
											}
											else
											{
												if($h=='D' and $cellValue!=='')
												{
												$funcionario=$cellValue;
												}
												if($h=='F' and $cellValue!=='')
												{
													$inicio=$cellValue;
												}
												if($h=='G' and $cellValue!=='' )
												{
													$fin=$cellValue;
												
												}
												if($inicio!=='' and $fin!=='')
												{
													$inicio2=explode(" ",$inicio);
													$fin2=explode(" ",$fin);
													$tResult = round(abs(strtotime($fin2[1]) - strtotime($inicio2[1])));
													//echo $funcionario." -- ".gmdate("G:i", $tResult)."<br>";
													$mat[$fila][0]=$funcionario;
													$mat[$fila][1]=gmdate("G:i", $tResult);
													$mat[$fila][2]=$inicio2[1];//entrada
													$mat[$fila][3]=$fin2[1];//salida
													$mat[$fila][4]=$inicio2[0];//fehca
													$fila=$fila+1;
													$funcionario='';
													$inicio='';
													$fin='';
													$inicio2='';
													$fin2='';	
												}
												
												

											$table .= "<td >";	
											}
											$table .= utf8_decode($cellValue);
											if ($v==5 and $h=="B")
											{
												
											//echo  $cellValue."<br>";
											}
											if ($h==5 and $v==2)
											{
												
											//echo  $cellValue."<br>";
											}
										}
								
									$table .= "</td>";
							}
						}
				
				$table .= "</tr>";
			}

			$table .= "</table>";
			
			echo $table;
			$funcionario='';
			$total_horas='';
			//echo $fila."<br>";
			for($i=0;$i<$fila;$i++)
			{
				$funcionario=$funcionario.$mat[$i][0]."--";
				$total_horas=$total_horas."--".$mat[$i][1];
				$desde=$desde."--".$mat[$i][2];//entrada
				$hasta=$hasta."--".$mat[$i][3];//salida
				$fechas=$fechas."--".$mat[$i][4];
			}
			echo  "<textarea name='textarea'  id='textarea'>".$funcionario."</textarea>";
			echo  "<textarea name='textarea1'  id='textarea1'>".$total_horas."</textarea>";
			echo  "<textarea name='textarea2'  id='textarea2'>".$desde."</textarea>";
			echo  "<textarea name='textarea3'  id='textarea3'>".$hasta."</textarea>";
			echo  "<textarea name='textarea4'  id='textarea4'>".$fechas."</textarea>";
			echo "<script type='text/javascript'>document.getElementById('textfield').value=".$fila.";document.getElementById('textfield2').value='".$errores."';</script>";
		}
		
		if($ver=='s')
	{
		
		if(isset($_POST['textarea4']))
		{
			echo $_POST['textarea4'];
		}
		
		?>
		<script type="text/javascript">

						document.getElementById(40).style.visibility='visible';
 			
 		</script>	
 <?php
	}
}
 ?>