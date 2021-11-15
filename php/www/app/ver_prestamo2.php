<?php include ("conexion/conectar.php");
$id=explode("--",$_GET['id']);
$query2="SELECT prestamos.`fecha`,prestamos.`monto`,prestamos.`plazo`,prestamos.`interes`,prestamos.`personal_id`, cuotas.`Prestamos_id`,cuotas.`numero`,cuotas.`monto` AS monto_cuota,cuotas.`estado`,cuotas.`fevtocuota` AS vencimiento  FROM prestamos,cuotas WHERE cuotas.`Prestamos_id`=prestamos.`id` AND prestamos.`id`='".$id[0]."' " ;
$mat=array();
$fila=0;
			
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$mat[$fila][0] = $query4['fecha'];
					$mat[$fila][1] = $query4['monto'];		
					$mat[$fila][2] = $query4['plazo'];
					$mat[$fila][3] = $query4['interes'];
					$mat[$fila][4] = $query4['numero'];
					$mat[$fila][5] = $query4['monto_cuota'];		
					$mat[$fila][6] = $query4['estado'];
					$mat[$fila][7] = $query4['vencimiento'];													
					$mat[$fila][8] = $query4['personal_id'];																		
					$fila=$fila+1;
				}
$query2="Select apellidos,nombres from personal where id='".$mat[0][8]."'";
$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$mat[0][8]=	 $query4['apellidos'].",".$query4['nombres'];
				}

mysql_close($con);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$_GET['nombre'].'.xls"');
header('Cache-Control: max-age=0');
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

</head>

<body>
<form id="form1" name="form1" method="post" action="ver_prestamo2.php?id=document.getElementById('textfield').value;">
  <table width="40%" border="1" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
   
      <tr>
        <td width="29%">&nbsp;Personal</td>
        <td width="71%">&nbsp;<?php echo $mat[0][8];?></td>
      
      </tr>
      <tr>
        <td>&nbsp;Monto</td>
        <td>&nbsp;<?php echo number_format($mat[0][1],'0','','.');?></td>
    
      </tr>
      <tr>
        <td>&nbsp;Fecha de emisi&oacute;n</td>
        <td>&nbsp;<?php $x=explode("-", $mat[0][0]);	echo $x[2]."-".$x[1]."-".$x[0];	?></td>
        
      </tr>
      <tr>
        <td>&nbsp;Plazo (cuotas)</td>
        <td>&nbsp;<?php echo $mat[0][2];?></td>
      
      </tr>
      <tr>
        <td>&nbsp;Inter&eacute;s</td>
        <td>&nbsp;<?php echo number_format($mat[0][3],'0','','.')."%"   ;?></td>
       
      </tr>
    </tbody>
  </table>
  
 
  <table width="40%" border="1" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr bgcolor="#B8B4B4" class="fondo_encabezado_buscador">
        <td>&nbsp;Cuota</td>
        <td align="center">&nbsp;Monto</td>        
        <td>&nbsp;Vencimiento</td>
        <td>&nbsp;Estado</td>
      </tr>
      <?php for($i=0;$i<count($mat);$i++){ ?>
      <tr>
        <td>&nbsp;<?php echo $mat[$i][4]; ?></td>
        <td align="center">&nbsp;<?php echo number_format($mat[$i][5],'0','','.') ; ?></td>
        <td>&nbsp;<?php echo $mat[$i][7]; ?></td>        
        <td>&nbsp;<?php echo $mat[$i][6]; ?></td>
      </tr>
     <?php }?>
    </tbody>
  </table>
</form>
</body>
</html>