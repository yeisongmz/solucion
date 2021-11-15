<?php 
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$sucdestino_id= $_GET['sucdestino_id'];//'39';
$desde= $_GET['desde'];//"2021-06-01";
$hasta=$_GET['hasta'];//"2021-08-30";
/*$query2="select * from remision where sucdestino_id='$sucdestino_id' and fecha>='$desde' and fecha<='$hasta' order by fecha desc, numero desc ";
$resultado = mysql_query($query2,$con) ;
//echo $query2.'<br>';
$matriz=array();$fi=0;
$a="";$a1="";$a2="";
while($query4=mysql_fetch_array($resultado))
{
	$a=$a.$query4['id'].';';
	$a1=$a2.$query4['plantilla_id'].';';
	$a2=$a2.$query4['numero'].';';
	$matriz[$fi][0] = $a;
	$matriz[$fi][1] = $a1;
	$matriz[$fi][2] = $a2;
	$matriz[$fi][3] = $query4['fecha'];
	$matriz[$fi][4] = $query4['sucdestino_id'];
	
	$query2b="select ubicacion from ubicacion_dep where id='".$query4['sucdestino_id']."' ";
$resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	$matriz[$fi][5] = $query4b['ubicacion'];
	$fi++;	
}*/
$mat2=array();$fila2=0;

$q2="SELECT *,SUM(cantidad) AS total_equipo FROM deta_plantilla WHERE plantillas_id IN(SELECT plantilla_id FROM remision WHERE sucdestino_id='56' GROUP BY plantilla_id ORDER BY id) GROUP BY equipos_id
";
$re = mysql_query($q2,$con) ;
//echo $q2.'<br>';
$mat=array();$fila4=0;
while($q4=mysql_fetch_array($re))
{
	$mat[$fila4][0]=$q4['equipos_id'];
	$mat[$fila4][1]=$q4['plantillas_id'];
	$mat[$fila4][2]=$q4['total_equipo'];
	$mat[$fila4][3]="";
	$mat[$fila4][4]="";
	$mat[$fila4][5]="";
	
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
/*$query2="SELECT *,SUM(cantidad) AS total FROM remisiondeta WHERE Remision_id IN(  SELECT id FROM remision WHERE sucdestino_id='$sucdestino_id' AND fecha>='$desde' AND fecha<='$hasta' ) GROUP BY equipos_id ORDER BY dsc_producto";
$resultado = mysql_query($query2,$con) ;
//echo $query2.'<br>';
while($query4=mysql_fetch_array($resultado))
{
	$mat2[$fila2][0]=$query4['equipos_id'];
	$mat2[$fila2][1]=$query4['dsc_producto'];
	$mat2[$fila2][2]=$query4['total'];
	$query2b="SELECT plantilla_id FROM remision WHERE id ='".$query4['Remision_id']."' ";
	$resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	$id_plantilla=$query4b['plantilla_id'];
	$mat2[$fila2][10]=$query4b['plantilla_id'];
	$mat2[$fila2][11]=$query4['equipos_id'];
	$query2b="SELECT cantidad FROM deta_plantilla WHERE plantillas_id ='".$id_plantilla."' and equipos_id='".$query4['equipos_id']."' ";
	//echo $query2b.'<br>';
	$resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	
	//if($mat2[$fila2][3]=="")
	//{
		$mat2[$fila2][3]=0;	
	//}
	$mat2[$fila2][3]=$mat2[$fila2][3]+$query4b['cantidad'];
	$query2b="SELECT * FROM mov_equipo WHERE equipos_id='".$query4['equipos_id']."' AND com_importe>0 ORDER BY id DESC LIMIT 1";
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
													
													
														$q="SELECT * FROM equipos WHERE id='".$query4['equipos_id']."' ";
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
															if($query4['equipos_id']==312 or $query4['equipos_id']==117 )
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
													$mat2[$fila2][5]=$costo_por_unidad;
													
												}
									$mat2[$fila2][4] =$costo_por_unidad;
	//echo $mat2[$fila2][0].';'.$mat2[$fila2][1].';'.$mat2[$fila2][2].';'.$mat2[$fila2][3].';'.$mat2[$fila2][4].'<br>';
	$fila2++;
}
*/
for($n=0;$n<$fila4;$n++)
{
	
		$query2b="SELECT descrip,utilizar FROM equipos WHERE id='".$mat[$n][0]."' ";
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
        <td colspan="6"><?php $query2b="SELECT ubicacion FROM ubicacion_dep WHERE id ='".$sucdestino_id."' ";
	$resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob); echo $query4b['ubicacion']; ?></td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td>&nbsp;</td>
        <td width="13%">&nbsp;</td>
        <td width="6%">&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Numero/s Remision/es</strong></td>
        <td colspan="6"><?php
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
        <td align="left"><?php echo date('d/m/Y'); ?></td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Periodo</strong></td>
        <td colspan="3"><?php $aux1=explode("-",$desde);$aux2=explode("-",$hasta); echo $aux1[2].'/'.$aux1[1].'/'.$aux1[0].' al '.$aux2[2].'/'.$aux2[1].'/'.$aux2[0];?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #000000 solid;">
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