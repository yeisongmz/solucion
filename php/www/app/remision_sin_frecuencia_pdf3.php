<?php 
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$sucdestino_id= $_GET['sucdestino_id'];//'39';
$desde= $_GET['desde'];//"2021-06-01";
$hasta=$_GET['hasta'];//"2021-08-30";
$query2="select cliente_id from sucursales where id='$sucdestino_id'  ";
$resultado = mysql_query($query2,$con) ;
$cliente_id=0;
while($query4=mysql_fetch_array($resultado))
{
	$cliente_id=$query4['cliente_id'];
}
$horas_trabajadas=0;
$query2="select sum(hs_cantidad) as horas_trabajadas from asistencia where id_sucursal='$sucdestino_id' and id_cliente='$cliente_id' and fecha_asistencia>='$desde' and fecha_asistencia<='$hasta' ";
//echo $query2;
$resultado = mysql_query($query2,$con) ;
while($query4=mysql_fetch_array($resultado))
{
	$horas_trabajadas=$query4['horas_trabajadas'];
}

$mat2=array();$fila2=0;

//$q2="SELECT *,SUM(cantidad) AS total_equipo FROM deta_plantilla WHERE plantillas_id IN(SELECT plantilla_id FROM remision WHERE sucdestino_id='56' GROUP BY plantilla_id ORDER BY id) GROUP BY equipos_id";

$q2="SELECT *,SUM(cantidad) AS total_equipo FROM deta_plantilla WHERE plantillas_id IN(SELECT plantilla_id FROM remision WHERE sucdestino_id='56' GROUP BY plantilla_id ORDER BY id) GROUP BY equipos_id";

$re = mysql_query($q2,$con) ;
//echo $q2.'<br>';
$mat=array();$fila4=0;
$total_horas=0;
while($q4=mysql_fetch_array($re))
{
	$mat[$fila4][0]=$q4['equipos_id'];
	$mat[$fila4][1]=$q4['plantillas_id'];
	$mat[$fila4][2]=$q4['total_equipo'];
	$mat[$fila4][3]="";
	$mat[$fila4][4]="";
	$mat[$fila4][5]="";
	$q6="SELECT SUM(horas_presupuestadas) AS total_horas FROM plantillas WHERE id='".$q4['plantillas_id']."' ";
	$re6 = mysql_query($q6,$con) ;
	$q40=mysql_fetch_array($re6);
	$total_horas=$total_horas+$q40['total_horas'];
	$query2="SELECT *,SUM(cantidad) AS total FROM remisiondeta WHERE Remision_id IN(  SELECT id FROM remision WHERE sucdestino_id='$sucdestino_id' AND fecha>='$desde' AND fecha<='$hasta' ) and equipos_id='".$mat[$fila4][0]."' GROUP BY equipos_id ORDER BY dsc_producto";
$resultado = mysql_query($query2,$con) ;
	
	while($query4=mysql_fetch_array($resultado))
	{
		$mat[$fila4][3]=$query4['dsc_producto'];
		$mat[$fila4][4]=$query4['total'];
		//echo $query4['Remision_id'].'<br>';
	}
	$query2b="SELECT * FROM mov_equipo WHERE equipos_id='".$mat[$fila4][0]."' AND com_importe>0 ORDER BY id DESC LIMIT 1";
	//echo $query2b.'<br>';
	$costo_por_unidad=0;
	if( mysql_query($query2b,$con) )
	{
					
					$resultadob = mysql_query($query2b,$con);
					$query4b=mysql_fetch_array($resultadob);
					if(!empty($query4b['com_importe']) and !empty($query4b['cantidad']))
					{
						//echo $query4b['com_importe'].' ; '.$query4b['cantidad'].'<br>';
						$costo_por_unidad =$query4b['com_importe']/$query4b['cantidad'];
					}
					
					
						$q="SELECT * FROM equipos WHERE id='".$mat[$fila4][0]."' ";
						$factor="";$conversion="";
						if($rq = mysql_query($q,$con))
						{
							$q2=mysql_fetch_array($rq);
							$factor=$q2['factor'];$conversion=$q2['conversion'];
						}
						
						if(!empty($factor) and !empty($query4b['com_importe']) and !empty($query4b['cantidad']) and $query4b['cantidad']>0)
						{
							//echo $query2d.'<br>';
							$costo_por_unidad =$query4b['com_importe']/$query4b['cantidad'];
							//if($equipo==345 or $equipo==312 or $equipo==341 or $equipo==360 or $equipo==117 or $equipo==476 or $equipo==480 or $equipo==483)
							if($mat[$fila4][0]==312 or $mat[$fila4][0]==117 )
							{
								$x=($conversion/$factor*1)*($costo_por_unidad/$factor);
							}
							else
							{
								$x=($conversion/$factor*1)*$costo_por_unidad;
							}
							$costo_por_unidad=round($x);
							//echo $costo_por_unidad.'<br>';
						}
						else
						{
							if(!empty($query4b['com_importe']) and !empty($query4b['cantidad']) and $query4b['cantidad']>0)
							{
								$costo_por_unidad =$query4b['com_importe']/$query4b['cantidad'];
							
							}
				
						}
						//echo $costo_por_unidad.'<br>';
					//$mat2[$fila2][5]=$costo_por_unidad;
					
				}
	$mat[$fila4][5] =$costo_por_unidad;
	//echo $mat[$fila4][5].'<br>';
	$fila4++;
	
}

for($n=0;$n<$fila4;$n++)
{
	
		$query2b="SELECT descrip,utilizar FROM equipos WHERE id='".$mat[$n][0]."' ";
		//echo $query2b.'<br>';
		 $resultado=mysql_query($query2b,$con);
		
	$query4=mysql_fetch_array($resultado);
	
	if($mat[$n][3]=="")
	{
			$mat[$n][3]=$query4['descrip'];							
		
	}
	if($query4['utilizar']=="on")
	{
		$mat[$n][5]=0;
		//echo $mat[$n][3].'<br>';
	}
	if(empty($mat[$n][4]))
	{
		$mat[$n][4]=="0";	
	}
 }
 //*********ORDENACION
 $mat3=array();
 for($n=0;$n<$fila4;$n++)
{
	for($n2=$n+1;$n2<$fila4-1;$n2++)
	{
		if($mat[$n2][3]<$mat[$n][3])
		{
			 $mat3[$n][0]=$mat[$n][0];	
			 $mat3[$n][1]=$mat[$n][1];	
			 $mat3[$n][2]=$mat[$n][2];	
			 $mat3[$n][3]=$mat[$n][3];	
			 $mat3[$n][4]=$mat[$n][4];	
			 $mat3[$n][5]=$mat[$n][5];	
			 
			 $mat[$n][0]=$mat[$n2][0];	
			 $mat[$n][1]=$mat[$n2][1];	
			 $mat[$n][2]=$mat[$n2][2];	
			 $mat[$n][3]=$mat[$n2][3];	
			 $mat[$n][4]=$mat[$n2][4];	
			 $mat[$n][5]=$mat[$n2][5];	
			 
			 $mat[$n2][0]=$mat3[$n][0];	
			 $mat[$n2][1]=$mat3[$n][1];	
			 $mat[$n2][2]=$mat3[$n][2];	
			 $mat[$n2][3]=$mat3[$n][3];	
			 $mat[$n2][4]=$mat3[$n][4];	
			 $mat[$n2][5]=$mat3[$n][5];	
		}
	}
}
 
if(isset($_POST['submit']))
{
	//echo $query2;
	$filename = 'Utilidades.xls';

		header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
        header('Content-Disposition: attachment; filename=Utilidades.xls');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PRESUPUESTO vs REMISIONES</title>
<style>

tr.resaltar {
    background-color: #F9E800;
    cursor: pointer;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="100%" border="0" cellspacing="4" cellpadding="0">
    <tbody>
      <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><?php if(!isset($_POST['submit']))
            {?><input type="submit" name="submit" id="submit" value="Excel" style="color:#4BC74E; background-color:#FFFFFF; font-weight:bold; border:3px #68C85D solid"><?php }?></td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #000000 solid;">
    <tbody>
      
     
      
      <tr  bgcolor="B7CD7B">
        <td width="15%"><strong>Destino</strong></td>
        <td colspan="4"><?php $query2b="SELECT ubicacion FROM ubicacion_dep WHERE id ='".$sucdestino_id."' ";
	$resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob); echo $query4b['ubicacion']; ?></td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Numero/s Remision/es</strong></td>
        <td colspan="4"><?php
		$query2="SELECT numero FROM remision WHERE sucdestino_id='$sucdestino_id' AND fecha>='$desde' AND fecha<='$hasta'";
$resultado = mysql_query($query2,$con) ;
	$a2="";
	while($query4=mysql_fetch_array($resultado))
	{
		$a2.= $query4['numero'].' , '; 
	}
		 echo $a2; ?></td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Fecha emisi&oacute;n</strong></td>
        <td colspan="4" align="left"><?php echo date('d/m/Y'); ?></td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Periodo</strong></td>
        <td colspan="3"><?php $aux1=explode("-",$desde);$aux2=explode("-",$hasta); echo $aux1[2].'/'.$aux1[1].'/'.$aux1[0].' al '.$aux2[2].'/'.$aux2[1].'/'.$aux2[0];?></td>
        <td width="60%"></td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td>Horas Presupuestadas</td>
        <td width="5%"><?php echo $total_horas;?></td>
        <td width="12%">Horas Trabajadas</td>
        <td width="8%"><?php echo $horas_trabajadas;?></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #000000 solid;">
          <tbody>
           <tr bgcolor="#C5C5C5">
                <th width="24%" height="38" scope="col">Producto</th>
                <th width="15%" align="right" scope="col">Costo Unitario</th>
                <th width="15%" scope="col">Cantidad Presupuestada</th>
                <th width="19%" scope="col">Cantidad Remitida</th>
                <th width="9%" scope="col">Diferencia en cantidad</th>
                <th width="18%" align="right" scope="col">Beneficio</th>
              </tr>
              <?php
             
			  if($fila4>0)
			  {
				  $utilidad=0;
				  for($n=0;$n<$fila4;$n++)
				  {
					  if($mat[$n][4]=="")
					  {
						 $mat[$n][2]=0; 
						 $mat[$n][5]=0;
					  }
			  ?>
            <tr style="color:#0A2BAC; font-weight:bold;" onmouseover="this.className = 'resaltar'" onmouseout="this.className = null" >
              <td><?php echo $mat[$n][3];?></td>
              <td align="right"><?php echo number_format($mat[$n][5],'0',',','.');?></td>
              <td align="center"><?php echo number_format($mat[$n][2],'0','','.');?></td>
              <td align="center"><?php if($mat[$n][4]==""){ echo "0";}else{echo $mat[$n][4];}?></td>
              <td align="center"><?php echo number_format($mat[$n][2]-$mat[$n][4],'0','','.');?></td>
              <td align="right"><?php if($mat[$n][4]>=0){$utilidad=$utilidad+($mat[$n][2]-$mat[$n][4])*$mat[$n][5];echo number_format((($mat[$n][2]-$mat[$n][4])*$mat[$n][5]),'0','','.');}?></td>
            </tr>
            
            <?php 
				  }
				  ?>
                  
            <tr style="color:#0A2BAC; font-weight:bold;">
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td colspan="2" align="right">Utilidad</td>
              <td align="right" bgcolor="B7CD7B"><?php echo number_format($utilidad,'0','','.');$utilidad=0;?></td>
            </tr>      
            
          </tbody>
        </table></td>
      </tr>
      
      <?php }?>
    </tbody>
  </table>
  
</form>
</body>
</html>