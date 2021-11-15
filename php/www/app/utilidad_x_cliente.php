<?php
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
include ("funct_restar_horas.php");
include ("ajuste_horas.php");
//$cliente = 107;
$desde=$_GET['desde'];//'2021-01-01';
$hasta=$_GET['hasta'];//'2021-01-31';

$q1="SELECT id,razon FROM cliente WHERE  TotalCobro>0    order by razon ";
$r1 = mysql_query($q1,$con) ;
$mat=array();$fila=0;
while($q2=mysql_fetch_array($r1))
{
	


	$query2="SELECT *,sum(importe) as total_facturado FROM facturas WHERE  fecha>='$desde' and fecha<='$hasta' and idcliente='".$q2['id']."'  GROUP BY idcliente  ORDER BY dsc_cliente  ";
	$resultado = mysql_query($query2,$con) ;
	while($query4=mysql_fetch_array($resultado))
	{
		$mat[$fila][0]=$query4['id'];
		$mat[$fila][1]=$query4['fecha'];
		$mat[$fila][2]=$query4['total_facturado'];
		$mat[$fila][3]=$query4['idcliente'];
		$mat[$fila][4]=$query4['numero'];
		$mat[$fila][5]=$q2['razon'];
		
		$mat[$fila][8]=0;
		$mat[$fila][9]=0;
		
		$query2b="SELECT count(*) as t  FROM sucursales WHERE  cliente_id='".$q2['id']."' ";
		//echo $query2b.'<br>';
		$resultadob = mysql_query($query2b,$con) ;
		$query4b=mysql_fetch_array($resultadob);
		//echo $query4b['t'].'<br>';
		$fila++;
	}
}
$precio=0;$calculado=0;
for($i=0;$i<$fila;$i++)
{
	

		$query2="SELECT personal_id,SUM(hs_cantidad) AS total_horas,id_sucursal,id_cliente FROM asistencia WHERE id_cliente='".$mat[$i][3]."' and fecha_asistencia>='$desde' AND fecha_asistencia<='$hasta'   GROUP BY personal_id,id_sucursal";
	
	
		$sucursales="";
		$sucursales2="";
	$resultado = mysql_query($query2,$con) ;
	while($query4=mysql_fetch_array($resultado))
	{
		//echo $query4['total_horas'].'<br>';
		$mat[$i][6] = $query4['total_horas'];
		$query2b="SELECT *,neto AS total_sueldo FROM liquiregular WHERE desde>='$desde' AND hasta<='$hasta' and personal_id ='".$query4['personal_id']."' limit 1";
		//echo $query2b.'<br>';
		$resultadob = mysql_query($query2b,$con) ;
		$query4b=mysql_fetch_array($resultadob);
		$mat[$i][7] = $query4b['total_sueldo'];
		//$mat[$i][8] =$mat[$i][8]+($mat[$i][6]*$mat[$i][7]);
		$mat[$i][8] =$mat[$i][8]+($mat[$i][7]);
		//*****************************************************************************************************
		//					INICIO DE PARTE TRAIDA DE LIQUIDACION REGULAR PDF
		
			/*$q2="select jornalxhora,jornalxmin,sueldoreal from personal where id='".$query4['personal_id']."' and estado = 1 " ;
	//echo $query2;
			$res=mysql_query($q2,$con);
			$jornalxhora=0;
			while($QR = mysql_fetch_array($res) )
			{
	
				$jornalxhora = $QR['jornalxhora'];
				$jornalxmin = $QR['jornalxmin'];
	
			}*/
		/*// ******************************************************************************************
		//  aqui se calcula el sueldo BASE
				//$sueldoreal = $jornalxhora * $query4['canhorastraba'];;
		// ******************************************************************************************
		//
		//                       				INGRESOS
		// ******************************************************************************************
		// ******************************************************************************************



			$q2="select importe,concepto,obs from bonificacion where liquiregular_id='".$query4b['id']."' and personal_id='".$query4['personal_id']."'  " ;
		
			$res=mysql_query($q2,$con);
			$fila = 0;

			while($QR = mysql_fetch_array($res) )
				{
					
					$total_bobif=$total_bobif+$QR['importe'];
		
					$fila=$fila+1;
				}
			// PARTE DE ASISTENCIAS
			$q2="select *  from asistencia where personal_id='".$query4['personal_id']."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'  " ;

			$res=mysql_query($q2,$con);
			$total_cobro_diario=0;
			$semana_diurna=0;
			$semana_nocturna=0;
			$domingo_diurno=0;
			$domingo_nocturno=0;
		
		
			$h_entrada=0;
			$h_salida=0;
			$h_trabajadas=0;
			$h_nocturnas=0;
	
	
			while($QR = mysql_fetch_array($res) )
			{
				$fecha_asistencia=explode('-',$QR['fecha_asistencia']);
				$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $fecha_asistencia[1],$fecha_asistencia[2], $fecha_asistencia[0]),0);
						$aux=explode(':',$QR['hs_entrada']);
						$h_entrada=hora(intval($aux[0]).'.'.intval($aux[1]));
						$aux=explode(':',$QR['hs_salida']);
						$h_salida=hora(intval($aux[0]).'.'.intval($aux[1]));
						$h_trabajadas=$QR['hs_cantidad'];//intval($aux2[0]).'.'.$aux2[1];
						$h_nocturnas=$QR['horas_nocturnas'];
	
	
				//DOMINGOS
				$aux=0;
				if($dia==0)
					{
						// DIURNOS DOMINGOS
						$domingo_diurno=number_format($domingo_diurno,'2','.','')+(number_format($h_trabajadas,'2','.','')-number_format($h_nocturnas,'2','.',''));
						if($h_nocturnas>0)
						{
							$aux2=(number_format($h_nocturnas,'2','.',''))*$jornalxhora*1.3;
							$domingo_nocturno=number_format($domingo_nocturno,'2','.','')+number_format($h_nocturnas,'2','.','');
						}
	
					}
					else//LUNES A SABADOS
					{
	
						$semana_diurna=number_format($semana_diurna,'2','.','')+(number_format($h_trabajadas,'2','.','')-number_format($h_nocturnas,'2','.',''));
						if($h_nocturnas>0)
						{
							$semana_nocturna=number_format($semana_nocturna,'2','.','')+number_format($h_nocturnas,'2','.','');
						}
	
					}
				//$total_horas=number_format($total_horas,'2','.','')+number_format($h_trabajadas,'2','.','');
				$h_entrada=0;
				$h_salida=0;
				$h_trabajadas=0;
				$h_nocturnas=0;
			}
	
			$aux=$domingo_diurno*1.3;
			$aux=$aux*$jornalxhora;
			$aux2=$domingo_nocturno*1.3;
			$aux2=$aux2*$jornalxhora;
	
	
			$total_cobro_diario	=round((($semana_diurna)*$jornalxhora)+(($semana_nocturna)*$jornalxhora*1.3)+$aux+$aux2);
			//echo $total_cobro_diario.' es su cobro diario<br>';
		// ******************************************************************************************
		// ******************************************************************************************
		
		
		
		
		// ******************************************************************************************
		// ******************************************************************************************
		//
		//                       				EGRESOS
		// ******************************************************************************************
		// ******************************************************************************************
		$fila = 0;
		$total_egresos=0;
		
		
		//****************************************************************
		$q2="select importe,obs from adelantos where liquiregular_id='".$query4b['id']."' and personal_id='".$query4['personal_id']."'  " ;
		$res=mysql_query($q2,$con);

		while($QR = mysql_fetch_array($res) )
		{
			
			$total_egresos=$total_egresos+$QR['importe'];
			
		}
		$q2="select importe,concepto,obs from descuentos where liquiregular_id='".$query4b['id']."' and personal_id='".$query4['personal_id']."'  " ;
		$res=mysql_query($q2,$con);
		while($QR = mysql_fetch_array($res) )
		{
			
			$total_egresos=$total_egresos+$query4['importe'];
			
		}
		
		$q2="select * from liquidetalle where liquiregular_id='".$query4b['id']."'  and tipo='DESCUENTO' and concepto like'Ausencia injust.%'  " ;
		$res=mysql_query($q2,$con);
		while($QR = mysql_fetch_array($res) )
		{
			
			$total_egresos=$total_egresos+$query4['importe'];
		
		}

//echo $total_cobro_diario-$total_egresos.' es su cobro diario menos su egreso<br>';
//echo $mat[$i][8].'<br>';		






		
		
		//					FIN DE PARTE TRAIDA DE LIQUIDACION REGULAR PDF
		//******************************************************************************************************/
		
		$query2b="SELECT razon_sucursal from sucursales where id='".$query4['id_sucursal']."' and cliente_id='".$query4['id_cliente']."' ";
		//echo $query2b.'<br>';
		$resultadob = mysql_query($query2b,$con) ;
		
		if(mysql_num_rows($resultadob)>0)
		{
			while($query4b=mysql_fetch_array($resultadob))
			{
				
				if($query4b['razon_sucursal']!==$sucursales2)
				{
					$sucursales2=$query4b['razon_sucursal'];
					$sucursales.=$query4b['razon_sucursal'];//." \n";
				}
			}
			
		}
		
		
	}
	if($sucursales!=="")
		{
		$mat[$i][5]=$mat[$i][5]." ( ".$sucursales." )";	
		}
//exit();	
	$query2="SELECT * FROM remision WHERE destino in (  SELECT TRIM(razon_sucursal) FROM sucursales WHERE cliente_id = '".$mat[$i][3]."') and fecha>='$desde' and fecha<='$hasta' order by fecha";
	$resultado = mysql_query($query2,$con) ;
	$mat[$i][9]=0;
	$costo_por_unidad=0;
	$total_remi=0;
	$precio=0;
	$cantidad=0;
	while($query4=mysql_fetch_array($resultado))
	{
		$query2b="SELECT * FROM remisiondeta WHERE remision_id='".$query4['id']."' AND equipos_id IN(SELECT id FROM equipos  ) order by dsc_producto";
		$resultadob = mysql_query($query2b,$con) ;
		$total_remi=0;
		while($query4b=mysql_fetch_array($resultadob))
		{
		
		$equipo=$query4b['equipos_id'];
		$cantidad=$query4b['cantidad'];
		$costo=$query4b['costo_calculado'];
		$calculado=$calculado+$query4b['costo_calculado'];
		$costo_por_unidad=0;
		$query2d="SELECT * FROM mov_equipo WHERE equipos_id='".$equipo."'  ORDER BY id DESC LIMIT 1";
		$ban=0;
		if( mysql_query($query2d,$con) )
		{
			$ban=1;
			$resultadod = mysql_query($query2d,$con);
			$query4d=mysql_fetch_array($resultadod);
			
			$q="SELECT * FROM equipos WHERE id='".$equipo."' ";
			$factor="";$conversion="";
			if($rq = mysql_query($q,$con))
			{
				$q2=mysql_fetch_array($rq);
				$factor=$q2['factor'];$conversion=$q2['conversion'];
			}
			
			if(!empty($factor) and !empty($query4d['com_importe']) and !empty($query4d['cantidad']) and $query4d['cantidad']>0)
			{
				//echo $query2d.'<br>';
				$costo_por_unidad =$query4d['com_importe']/$query4d['cantidad'];
				//echo $costo_por_unidad.'<br>';
				//echo $conversion.'<br>';
				//echo $factor.'<br>';
				//if($equipo==345 or $equipo==312 or $equipo==341 or $equipo==360 or $equipo==117 or $equipo==476 or $equipo==480 or $equipo==483)
				if($equipo==312 or  $equipo==117 )
				{
					$x=($conversion/$factor*1)*($costo_por_unidad/$factor);
				}
				else
				{
					$x=($conversion/$factor*1)*$costo_por_unidad;
				}
				$costo_por_unidad=intval($x);
				//echo $costo_por_unidad.'<br>';
			}
			else
			{
				if(!empty($query4d['com_importe']) and !empty($query4d['cantidad']) and $query4d['cantidad']>0)
				{
				$costo_por_unidad =$query4d['com_importe']/$query4d['cantidad'];
				
				}
				
				//
			}
			if($q2['tipo']!=="Maquinaria" and $q2['tipo']!=="Herramienta")
			{
			$total_remi=$total_remi+($costo_por_unidad*$cantidad);
			$precio =$precio+($costo_por_unidad*$cantidad);
			}
			else
			{
				$costo_por_unidad = 0;
			}
			//echo $q2['descrip'].'  =  '.$costo_por_unidad.'*'.$cantidad.'    '.$costo_por_unidad*$cantidad.'<br>';
			$mat[$i][9]=intval($precio);
		}
		
		//if($q2['tipo']!=="Maquinaria" )
		//{
				
		/*}
		else
		{
			    $mat[$i][9]=0;
		}*/
		
		//$precio=0;
		//$costo_por_unidad=0;
		//$cantidad=0;

	}
	//echo '<br><br><br><br>';
	//$precio=0;
	
	//echo $total_remi.'<br>';
	
	//echo '<br><br><br>';
}
//$precio=0;


//echo $mat[$i][1].';'.$mat[$i][2].';'.$mat[$i][3].';'.$mat[$i][4].';'.$mat[$i][5].';'.$mat[$i][6].';'.$mat[$i][7].';'.$mat[$i][8].'<br>';	
	//echo $mat[$i][3].' --   '.$mat[$i][5].';'.number_format($mat[$i][2],'0',',','.').';'.number_format($mat[$i][8],'0',',','.').' -------------------       '.$mat[$i][9].'; '.'<br>';

	
}

//echo '<br><br><br><br>'.$precio;
class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
		if($i>0 )
		{
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'R';
		}
		else
		{
        	$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		}
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
		$this->SetX(30);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

function Header()
{

				global $desde;
					global $hasta;
					$this->Image('images/logo2.png',10,8,33);
					// Arial bold 15
					$this->SetFont('Arial','B',15);
					// Movernos a la derecha
					$this->Cell(80);
					// Título
					$this->Cell(30,10,'',0,1,'C');
					// Salto de línea
					$this->Ln();
					
					
					$this->SetX(30);
					//
					$this->SetFillColor(219,219,219);
					$this->Cell(40,7,"Utilidad por Cliente/Deposito",0,1 , 'L',false);
					$this->SetFont('Times','',12);
					$this->SetX(30);
					$this->Cell(40,7,"Fecha emision : ".date('d/m/Y'),0,1 , 'L',false);
					$this->SetX(30);
					$aux= explode("-",$desde);
					$aux2= explode("-",$hasta);
					$this->Cell(40,7,"Periodo : ".$aux[2].'/'.$aux[1].'/'.$aux[0].' al '.$aux2[2].'/'.$aux2[1].'/'.$aux2[0],0,1 , 'L',false);
					$this->SetFont('Arial','',8);
					$this->SetX(30);
					$this->Cell(90,7,"Cliente",1,0 , 'L',true);
					$this->Cell(20,7,"Facturado",1,0 , 'R',true);
					$this->Cell(20,7,"Sueldos",1,0 , 'R',true);
					$this->Cell(20,7,"Insumos",1,0 , 'R',true);
					$this->Cell(20,7,"Beneficio",1,1 , 'R',true);
					$this->Ln();
			}
function FancyRow($data, $border=array(), $align=array(), $style=array(), $maxline=array())
{
		$this->SetX(30);
        //Calculate the height of the row
        $nb = 0;
        for($i=0;$i<count($data);$i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i],$data[$i]));
			$this->SetX(30);
        }
        if (count($maxline)) {
            $_maxline = max($maxline);
            if ($nb > $_maxline) {
                $nb = $_maxline;
            }
        }
        $h = 5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
		
        for($i=0;$i<count($data);$i++) {
			$this->SetX(30);
            $w=$this->widths[$i];
            // alignment
            $a = isset($align[$i]) ? $align[$i] : 'L';
            // maxline
            $m = isset($maxline[$i]) ? $maxline[$i] : false;
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            if ($border[$i]==1) {
                $this->Rect($x,$y,$w,$h);
            } else {
                $_border = strtoupper($border[$i]);
                if (strstr($_border, 'L')!==false) {
                    $this->Line($x, $y, $x, $y+$h);
                }
                if (strstr($_border, 'R')!==false) {
                    $this->Line($x+$w, $y, $x+$w, $y+$h);
                }
                if (strstr($_border, 'T')!==false) {
                    $this->Line($x, $y, $x+$w, $y);
                }
                if (strstr($_border, 'B')!==false) {
                    $this->Line($x, $y+$h, $x+$w, $y+$h);
                }
            }
            // Setting Style
            if (isset($style[$i])) {
                $this->SetFont('', $style[$i]);
            }
            $this->MultiCell($w, 5, $data[$i], 0, $a, 0, $m);
            //Put the position to the right of the cell
            $this->SetXY($x+$w, $y);
			$this->SetX(30);
        }
        //Go to the next line
        $this->Ln($h);
    }	
		
function Footer()
{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Pag. '.$this->PageNo(),0,0,'C');
	}	
}

function GenerateWord()
{
    //Get a random word
    $nb=rand(3,10);
    $w='';
    for($i=1;$i<=$nb;$i++)
        $w.=chr(rand(ord('a'),ord('z')));
    return $w;
}

function GenerateSentence()
{
    //Get a random sentence
    $nb=rand(1,10);
    $s='';
    for($i=1;$i<=$nb;$i++)
        $s.=GenerateWord().' ';
    return substr($s,0,-1);
}

$pdf=new PDF_MC_Table();
$pdf->AddPage('P');
$pdf->SetFont('Arial','',8);
$pdf->SetWidths(array(90,20,20,20,20,30));
	
/*class PDF extends FPDF
			{
			// Cabecera de página
			function Header()
				{
					global $desde;
					global $hasta;
					$this->Image('images/logo2.png',10,8,33);
					// Arial bold 15
					$this->SetFont('Arial','B',15);
					// Movernos a la derecha
					$this->Cell(80);
					// Título
					$this->Cell(30,10,'',0,1,'C');
					// Salto de línea
					$this->Ln();
					
					
					$this->SetX(30);
					//
					$this->SetFillColor(219,219,219);
					$this->Cell(40,7,"Utilidad por Cliente/Deposito",0,1 , 'L',false);
					$this->SetFont('Times','',12);
					$this->SetX(30);
					$this->Cell(40,7,"Fecha emision : ".date('d/m/Y'),0,1 , 'L',false);
					$this->SetX(30);
					$aux= explode("-",$desde);
					$aux2= explode("-",$hasta);
					$this->Cell(40,7,"Periodo : ".$aux[2].'/'.$aux[1].'/'.$aux[0].' al '.$aux2[2].'/'.$aux2[1].'/'.$aux2[0],0,1 , 'L',false);
					$this->SetFont('Arial','',8);
					$this->SetX(30);
					$this->Cell(90,7,"Cliente",1,0 , 'L',true);
					$this->Cell(20,7,"Facturado",1,0 , 'R',true);
					$this->Cell(20,7,"Sueldos",1,0 , 'R',true);
					$this->Cell(20,7,"Insumos",1,0 , 'R',true);
					$this->Cell(20,7,"Beneficio",1,1 , 'R',true);
					$this->Ln();
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
			$pdf->AddPage('P','A4');
			*/
			
			
$facturado=0;
$sueldos=0;
$insumos=0;
$beneficios=0;	
$pdf->SetX(30);
for($i=0;$i<$fila;$i++)
{
	
	$facturado=$facturado+$mat[$i][2];
	$sueldos=$sueldos+$mat[$i][8];
	$insumos=$insumos+$mat[$i][9];
	$beneficios=$beneficios+($mat[$i][2]-($mat[$i][9]+$mat[$i][8]));
	$pdf->SetX(30);
	$pdf->Row(array(utf8_decode($mat[$i][5]),number_format($mat[$i][2],'0','','.'),number_format($mat[$i][8],'0',',','.'),number_format($mat[$i][9],'0',',','.'),number_format($mat[$i][2]-($mat[$i][9]+$mat[$i][8]),'0',',','.')));
	//$pdf->MultiCell( 90, 5, $mat[$i][5]);
	/*$pdf->Cell(90,7,$mat[$i][5],0,0 , 'L',false);
	$pdf->Cell(20,7,number_format($mat[$i][2],'0',',','.'),0,0 , 'R',false);
	$pdf->Cell(20,7,number_format($mat[$i][8],'0',',','.'),0,0 , 'R',false);
	$pdf->Cell(20,7,number_format($mat[$i][9],'0',',','.'),0,0 , 'R',false);
	$pdf->Cell(20,7,number_format($mat[$i][2]-($mat[$i][9]+$mat[$i][8]),'0',',','.'),0,1 , 'R',false);*/
	$pdf->SetX(30);
	
	
	
	
	
}
$pdf->SetX(30);
$pdf->SetFillColor(219,219,219);
	$pdf->SetX(30);
	$pdf->Cell(90,7,"",0,0 , 'L',false);
	$pdf->Cell(20,7,number_format($facturado,'0',',','.'),1,0 , 'R',true);
	$pdf->Cell(20,7,number_format($sueldos,'0',',','.'),1,0 , 'R',true);
	$pdf->Cell(20,7,number_format($insumos,'0',',','.'),1,0 , 'R',true);
	$pdf->Cell(20,7,number_format($beneficios,'0',',','.'),1,1 , 'R',true);
$pdf->Output();
?>