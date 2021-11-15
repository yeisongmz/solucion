<?php include ("conexion/conectar.php");
include ("fpdf181/fpdf.php");
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
			$query2="select * from parametros" ;
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$razon=$query4['cliente'];
					$dir=$query4['direccion'];
					$ruc=$query4['RUC'];
					$patronal=$query4['nropatronal_ips'];
				}
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
							$total_salario=$total_salario+$query4['sal_imponible'];
							$filas=$filas+1;
						}
$total_trabajadores=$filas;		



$pdf = new FPDF();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','',12);



class PDF extends FPDF
			{
			// Cabecera de página
			function Header()
			{

				
				$this->SetFont('Arial','B',12);
				$this->Ln(3);
				
				// Título
				
			
							
			}
			
			// Pie de página
			function Footer()
			{
				// Posición: a 1,5 cm del final
				$this->SetY(-15);
				// Arial italic 8
				$this->SetFont('Arial','I',8);
				// Número de página
				$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
			}
			}
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Legal');
			$pdf->SetFont('Times','',14);

			
				$string = "PLANILLA IPS";
				$converted = html_entity_decode($string , ENT_COMPAT, 'UTF-8');
				$pdf->Cell(321,7,$converted,0,1,'C');
				$pdf->Cell(321,7,"INSTITUTO DE PREVISION SOCIAL",0,1,'C');				
				$pdf->SetFont('Times','',8);
			$pdf->SetFillColor(220,220,220);
			
			$pdf->Cell(165,5,"CODIGOS",0,1, 'R',false);
			$pdf->Cell(70,5,"PLANILLA DE APORTES E INFORMES DE ",0,0, 'L',false);
			$pdf->Cell(130,5,"R.S.A. RECONOCIMIENTO DE SERVICIOS ANTERIORES",0,1, 'R',false);
			$pdf->Cell(70,5,"VARIACIONES  CORRESPONDIENTES AL MES DE",0,0, 'L',false);
			$pdf->Cell(40,5,"La fecha",0,0 , 'L',false);
			$pdf->Cell(19,5,"1",0,0, 'R',false);
			$pdf->Cell(10,5,"ENTRADA",0,0, 'L',false);
			$pdf->Cell(20,5,"4",0,0, 'R',false);
			$pdf->Cell(15,5,"REPOSO",0,1, 'L',false);
			$pdf->Cell(129,5,"2",0,0, 'R',false);
			$pdf->Cell(15,5,"SALIDA",0,0, 'l',false);
			$pdf->Cell(15,5,"5",0,0, 'R',false);
			$pdf->Cell(20,5,"INDEMNIZACION",0,1, 'l',false);
			$pdf->Cell(129,5,"3",0,0, 'R',false);
			$pdf->Cell(15,5,"VACACIONES",0,0, 'l',false);
			$pdf->Cell(15,5,"6",0,0, 'R',false);
			$pdf->Cell(20,5,"OTRAS CAUSAS",0,1, 'l',false);
			$pdf->Ln(10);
			$pdf->Cell(80,5,"RAZON SOCIAL DE LA EMPRESA O NOMBRE DEL PATRONO",1,0, 'R',false);
			$pdf->Cell(50,5,$razon,1,0, 'l',false);
			$pdf->Cell(25,5,"NRO PATRONAL",1,0, 'l',false);
			$pdf->Cell(50,5,$patronal,1,1, 'l',false);
			$pdf->Cell(80,5,"DIRECCION DE LA EMPRESA",1,0, 'l',false);
			$pdf->Cell(50,5,$dir,1,0, 'l',false);
			$pdf->Cell(25,5,"DOC DE CAJA",1,0, 'l',false);          
			$pdf->Cell(50,5,"",1,1, 'l',false);	
			$pdf->Cell(80,5,"NUMERO DE R.U.C",1,0, 'l',false);
			$pdf->Cell(50,5,$ruc,1,0, 'l',false);
			$pdf->Cell(25,5,"IDE EMPLEADOR",1,0, 'l',false);
			$pdf->Cell(25,5,$patronal,1,0, 'l',false);			
			$pdf->Cell(10,5,"HOJA",1,0, 'l',false); 
			$pdf->Cell(15,5,$pagina,1,1,'C');	
			$pdf->Ln(10);
			$pdf->Cell(215,5,"INFORMACION ANTERIOR",0,0 , 'R',false);
			$pdf->Cell(68,5,"INFORMACION PRESENTE MES",0,1 , 'R',false);
			$pagina=$pagina+1;
			$pdf->Cell(25,5,"NRO DE ORDEN",1,0 , 'L',false);
			$pdf->Cell(35,5,"CEDULA DE IDENTIDAD",1,0 , 'L',false);
			$pdf->Cell(38,5,"NUMERO DE ASEGURADO",1,0 , 'L',false);
			$pdf->Cell(60,5,"APELLIDOS Y NOMBRES DEL ASEGURADO",1,0 , 'L',false);
			$pdf->Cell(20,5,"DIAS TRABAJ.",1,0 , 'L',false);
			$pdf->Cell(35,5,"SALARIOS IMPONIBLES",1,0 , 'L',false);
			$pdf->Cell(20,5,"CATEGORIA",1,0 , 'L',false);
			$pdf->Cell(20,5,"DIAS TRABAJ",1,0 , 'L',false);
			$pdf->Cell(35,5,"SALARIOS IMPONIBLES",1,0 , 'L',false);
			$pdf->Cell(15,5,"R.S.A",1,0 , 'L',false);
			$pdf->Cell(15,5,"VER.COD",1,1 , 'L',false);
						
				
							
				for($i=0;$i<count($mat);$i++)
				
				{
					$pdf->Cell(25,7,$mat[$i][0],1,0 , 'L',false);
					$pdf->Cell(35,7,$mat[$i][3],1,0 , 'L',false);
					$pdf->Cell(38,7,$mat[$i][4],1,0 , 'L',false);
					$pdf->Cell(60,7,$mat[$i][1].", ".$mat[$i][2],1,0 , 'L',false);					
					$pdf->Cell(20,7,"" ,1,0,'L',false);
					$pdf->Cell(35,7,"" ,1,0,'L',false);
					$pdf->Cell(20,7,"" ,1,0,'L',false);
					$pdf->Cell(20,7,$mat[$i][6],1,0,'C',true);
					$pdf->Cell(35,7,number_format($mat[$i][5],0,'','.'),1,0,'R',true);
					$pdf->Cell(15,7,"" ,1,0,'L',false);
					$pdf->Cell(15,7,"" ,1,1,'L',false);
					
				}				
$pdf->Output();