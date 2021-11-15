<?php 
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$sucdestino_id= $_GET['sucdestino_id'];//'39';
$desde= $_GET['desde'];//"2021-06-01";
$hasta=$_GET['hasta'];//"2021-08-30";
$query2="select * from remision where sucdestino_id='$sucdestino_id' and fecha>='$desde' and fecha<='$hasta' order by fecha desc, numero desc ";
$resultado = mysql_query($query2,$con) ;
//echo $query2.'<br>';
$matriz=array();$fi=0;
while($query4=mysql_fetch_array($resultado))
{
	$matriz[$fi][0] = $query4['id'];
	$matriz[$fi][1] = $query4['plantilla_id'];
	$matriz[$fi][2] = $query4['numero'];
	$matriz[$fi][3] = $query4['fecha'];
	$matriz[$fi][4] = $query4['sucdestino_id'];
	
	$query2b="select ubicacion from ubicacion_dep where id='".$query4['sucdestino_id']."' ";
$resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	$matriz[$fi][5] = $query4b['ubicacion'];
	$fi++;	
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
      
      <?php for($i=0;$i<$fi;$i++){?>
      
      <tr  bgcolor="B7CD7B">
        <td width="15%"><strong>Destino</strong></td>
        <td colspan="6"><?php echo $matriz[$i][5]; ?></td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td>&nbsp;</td>
        <td width="13%">&nbsp;</td>
        <td width="6%">&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Numero Remision</strong></td>
        <td><?php echo $matriz[$i][2]; ?></td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr bgcolor="B7CD7B">
        <td><strong>Fecha</strong></td>
        <td><?php $aux = explode("-",$matriz[$i][3]);echo $aux[2].'/'.$aux[1].'/'.$aux[0]; ?></td>
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
              $mat=array();$fila=0;
			  if($matriz[$i][1]!=="0")
			  {
				  
				  //********************************
				 
							$query2c="select * from remisiondeta where Remision_id='".$matriz[$i][0]."' order by dsc_producto ";
							//echo $query2c.'<br>';
							$resultadoc = mysql_query($query2c,$con) ;
							while($query4c=mysql_fetch_array($resultadoc))
							{
								$equipo=$query4c['equipos_id'];
								$cantidad=$query4c['cantidad'];
								//echo $cantidad.'<br>';
							//$equipo=$resultadob['equipos_id'];
							
							
							
								
									
								
									//$mat[$i][2] =$query4['dsc_producto'];
									
				  //********************************
								$query2="select * from deta_plantilla where plantillas_id='".$matriz[$i][1]."' and equipos_id='$equipo' ";
								$resultado = mysql_query($query2,$con) ;
								
								//$mat=array();$fila=0;
								while($query4=mysql_fetch_array($resultado))
								{
									//echo $query2.'<br>';
									$mat[$fila][0] =$query4['equipos_id'];
									$mat[$fila][7] =$query4['cantidad'];
									$mat[$fila][3] =$cantidad;//$query4c['cantidad'];
									$mat[$fila][2] ="";
									//$mat[$fila][3] ="0";
									$mat[$fila][4] ="";
									$mat[$fila][5] ="";
									$query2b="select descrip from equipos where id='".$query4['equipos_id']."' ";
									$resultadob = mysql_query($query2b,$con) ;
									$query4b=mysql_fetch_array($resultadob);
									$mat[$fila][2] =$query4b['descrip'];
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
													$mat[$fila][5]=$costo_por_unidad;
													
												}
									$mat[$fila][6] =$costo_por_unidad;
									$fila++;	
								}
							}
					
					/*for($a=0;$a<$fila-1;$a++)
						{
							$query2="select * from remisiondeta where Remision_id='".$mat[$a][0]."' and dsc_producto='".$mat[$a][2]."' ";
							$resultado = mysql_query($query2,$con) ;
							//echo $query2.'<br>';
							
							while($query4=mysql_fetch_array($resultado))
							{
								
									
								
									//$mat[$i][2] =$query4['dsc_producto'];
									$mat[$a][3] =$query4['cantidad'];
									
									//echo  $mat[$i][0].';'.$mat[$i][1].';'.$mat[$i][3].'<br>';
									//$mat[$i][4] =$query4['unidadMed'];
								//$fila++;
							}
							
						}*/
			  }
			  else
			  {
				   
							$query2="select * from remisiondeta where Remision_id='".$matriz[$i][0]."'  ";
							//echo $query2.'<br>';
							$resultado = mysql_query($query2,$con) ;
							
							while($query4=mysql_fetch_array($resultado))
							{
									$mat[$fila][2] =$query4['dsc_producto'];
									$mat[$fila][3] =$query4['cantidad'];
									$mat[$fila][4] =$query4['unidadMed'];
									$mat[$fila][5] =$query4['equipos_id'];
									
									
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
															$costo_por_unidad=intval($x);
															//echo $costo_por_unidad.'<br>';
														}
														else
														{
															if(!empty($query4b['com_importe']) and !empty($query4b['cantidad']) and $query4b['cantidad']>0)
															{
																$costo_por_unidad =$query4b['com_importe']/$query4b['cantidad'];
															
															}
												
														}
													$mat[$fila][5]=$costo_por_unidad;
													
												}
									$mat[$fila][6] =$costo_por_unidad;
									$mat[$fila][7] =0;
									$fila++;
							}
							
						
			  }
			//echo $fila;  
			  if($fila>0)
			  {
				  $utilidad=0;
				  for($n=0;$n<$fila;$n++)
				  {
			  ?>
            <tr style="color:#0A2BAC; font-weight:bold;" onmouseover="this.className = 'resaltar'" onmouseout="this.className = null" >
              <td><?php echo $mat[$n][2];?></td>
              <td align="right"><?php echo number_format($mat[$n][6],'0',',','.');?></td>
              <td align="center"><?php echo number_format($mat[$n][7],'0','','.');?></td>
              <td align="center"><?php echo $mat[$n][3];?></td>
              <td align="center"><?php echo number_format($mat[$n][7]-$mat[$n][3],'0','','.');?></td>
              <td align="right"><?php if($mat[$n][6]>0){$utilidad=$utilidad+($mat[$n][7]-$mat[$n][3])*$mat[$n][6];echo number_format((($mat[$n][7]-$mat[$n][3])*$mat[$n][6]),'0','','.');}?></td>
            </tr>
            
            <?php 
				  }
				  ?>
                  
            <tr style="color:#0A2BAC; font-weight:bold;">
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td colspan="2" align="right">Utilidad por remision</td>
              <td align="right" bgcolor="B7CD7B"><?php echo number_format($utilidad,'0','','.');$utilidad=0;?></td>
            </tr>      
                  <?php
			}?>
          </tbody>
        </table></td>
      </tr>
      <tr style=" visibility:hidden;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="17%">&nbsp;</td>
        <td width="17%">&nbsp;</td>
        <td width="23%">&nbsp;</td>
        <td width="9%" align="right">&nbsp;</td>
      </tr>
      <tr style=" visibility:hidden;">
        <td colspan="7">&nbsp;</td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</form>
</body>
</html>