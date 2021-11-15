<?php include ("conexion/conectar.php");
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
			$query2="select * from parametros" ;
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$razon=$query4['cliente'];
					$dir=$query4['direccion'];
					$ruc=$query4['RUC'];
					$patronal=$query4['nropatronal_ips'];
				}
$query2="select id,nombres,apellidos,nro_docum,nro_asegurado,importeIPS from personal where estado = 1 order by apellidos" ;

					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							$mat[$filas][0] = $query4['id'];
							$mat[$filas][1] = $query4['apellidos'].", ".$query4['nombres'];
							$mat[$filas][2] = $query4['nro_docum'];
							$mat[$filas][3] = $query4['nro_asegurado'];	
							$mat[$filas][4] = $query4['importeIPS'];
							$total_salario=$total_salario+$query4['importeIPS'];
							$filas=$filas+1;
						}
$total_trabajadores=$filas;						
for($i=0;$i<count($mat);$i++)
{
$query2="SELECT COUNT(*) AS dias,fecha_asistencia FROM asistencia WHERE personal_id=".$mat[$i][0]." AND fecha_asistencia>='2016-07-01' AND fecha_asistencia<='2016-08-31'  GROUP BY DAY(fecha_asistencia)";
$res=mysql_query($query2,$con);
	$mat[$i][5]=mysql_num_rows($res);//dias trabajados
	
}

mysql_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript">
	function enviar()
	{
		document.getElementById("form1").submit();
		
	}
</script>
</head>

<body>
<form id="form1" name="roddsa" method="post" action="exportador_excel.php">
<div class="polaroid_mjt_100">
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla1" id="rosa" name="rosa"  >
  <tbody>
    <tr>
      <td height="61" align="center" class="fondo_encabezado">PLANILLA IPS</td>
    </tr>
  </tbody>
</table>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr>
        <td colspan="11" align="center" style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; font-size:14px; color:#000000"><strong>INSTITUTO DE PREVISION SOCIAL</strong></td>
      </tr>
      <tr>
        <td width="3%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="40%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="2%">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" align="center">CODIGOS</td>
      </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td colspan="3" style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">PLANILLA DE APORTES E INFORMES DE VARIACIONES CORRESPONDIENTES AL MES DE</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>R.S.A</td>
        <td colspan="3">.RECONOCIMIENTO DE SERVICIOS ANTERIORES</td>
      </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>1</td>
        <td width="17%">ENTRADA</td>
        <td width="1%">4</td>
        <td width="20%">REPOSO</td>
      </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>2</td>
        <td>SALIDA</td>
        <td>5</td>
        <td>INDEMNIZACION</td>
      </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>3</td>
        <td>VACACIONES</td>
        <td>6</td>
        <td>OTRAS CAUSAS</td>
      </tr>
      </tbody>
      </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
     
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px; border-top:none">
        <td width="30%">RAZON SOCIAL DE LA EMPRESA O NOMBRE DEL PATRONO          </td>
        <td width="31%">&nbsp;<input name="textfield3" type="text" id="textfield3" size="50" readonly value="<?php echo $razon; ?>" style="border:none"></td>
        <td width="16%">&nbsp;</td>
        <td width="10%">NRO PATRONAL</td>
        <td>&nbsp;<input name="textfield6" type="text" id="textfield6" readonly="readonly" value="<?php echo $patronal; ?>" style="border:none"></td>
        </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px; border-top:none">
        <td>DIRECCION DE LA EMPRESA          </td>
        <td>&nbsp;<input name="textfield4" type="text" id="textfield4" size="50" readonly value="<?php echo $dir; ?>" style="border:none"></td>
        <td>&nbsp;</td>
        <td>DOC DE CAJA</td>
        <td>&nbsp;</td>
      </tr>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px; border-top:none">
        <td>NUMERO DE R.U.C.          </td>
        <td>&nbsp;<input name="textfield5" type="text" id="textfield5" readonly value="<?php echo $ruc; ?>" style="border:none"></td>
        <td>IDE EMPLEADOR</td>
        <td>NUMERO DE HOJA</td>
        <td>&nbsp;</td>
      </tr>
      </tbody>
      </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td width="5%">&nbsp;</td>
        <td width="9%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="23%">&nbsp;</td>
        <td colspan="3">INFORMACION ANTERIOR</td>
        <td colspan="4">INFORMACION PRESENTE MES</td>
      </tr>
      <tr align="center" style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td>NRO DE ORDEN</td>
        <td>CEDULA DE IDENTIDAD</td>
        <td>NUMERO DE ASEGURADO</td>
        <td>APELLIDOS Y NOMBRES DEL ASEGURADO</td>
        <td width="7%">DIAS TRABAJ.</td>
        <td width="10%">SALARIOS IMPONIBLES</td>
        <td width="7%">CATEGORIA</td>
        <td width="7%">DIAS TRABAJ.</td>
        <td width="9%">SALARIOS IMPONIBLES</td>
        <td width="7%">R.S.A</td>
        <td width="6%"><p>INF.PERS</p>
        <p>VER.COD.</p></td>
      </tr>
      <?php for($i=0;$i<count($mat);$i++)
{ ?>
      <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
        <td height="28"><?php echo $i+1; ?></td>
        <td>&nbsp;<?php echo $mat[$i][2]; ?></td>
        <td>&nbsp;<?php echo $mat[$i][3]; ?></td>
        <td>&nbsp;<?php echo $mat[$i][1]; ?></td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td bgcolor="#B8B4B4">&nbsp;<?php echo $mat[$i][5]; ?></td>
        <td align="right" bgcolor="#B8B4B4">&nbsp;<?php echo number_format($mat[$i][4],0,',','.'); ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
  <tbody>
   <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td height="46" colspan="3" style="border:none">TOTAL DE TRABAJADORES
        
        <input name="textfield" type="text" id="textfield" readonly value="<?php echo $total_trabajadores;?>" style="border:none"></td>
      <td colspan="2" style="border:none">SUMA TOTAL O PARCIAL DE LOS SALARIOS GS.</td>
      <td width="26%" align="center" style="border:none"><input name="textfield2" type="text" id="textfield2" readonly value="<?php echo  number_format($total_salario,0,',','.'); ?>" style="border:none"></td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="3" style="border:none">&nbsp;</td>
      <td width="29%" style="border:none">&nbsp;</td>
      <td colspan="2">PARA EL REGISTRO DE PAGO</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="2" style="border-left:none; border-right:none; border-bottom:none">&nbsp;</td>
      <td width="10%" style="border-left:none; border-right:none; border-bottom:none">&nbsp;</td>
      <td style="border-bottom:none; border-left:none; ">&nbsp;</td>
      <td colspan="2" rowspan="5" style="border:none">&nbsp;</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="2" style="border:none">APORTE DEL EMPLEADOR Y ASEGURADO SOBRE SALARIOS IMPONIBLES</td>
      <td style="border:none">&nbsp;</td>
      <td style="border-bottom:none; border-left:none; border-top:none">GS.......................</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="2" style="border:none">APORTE DEL EMPLEADOR Y ASEGURADO SOBRE SALARIOS IMPONIBLES</td>
      <td style="border:none">&nbsp;</td>
      <td style="border-bottom:none; border-left:none; border-top:none">GS.......................</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="2" style="border:none">SUMA</td>
      <td style="border:none">&nbsp;</td>
      <td style="border-bottom:none; border-left:none; border-top:none">GS........................</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="2" style="border:none">RECARGO</td>
      <td style="border:none">&nbsp;</td>
      <td style="border-bottom:none; border-left:none; border-top:none">GS........................</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="4" style="border-right:none; border-top:none; border-left:none">TOTAL A PAGAR</td>
      <td colspan="2" style=" border-bottom:none; border-right:none; border-top:none">SELLO</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="4" style="border:none">&nbsp;</td>
      <td colspan="2" rowspan="3" style=" border-bottom:none; border-right:none; border-top:none"><hr>        FIRMA DEL FUNCIONARIO</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td colspan="2"  style="border:none">&nbsp;</td>
      <td  style="border:none">&nbsp;</td>
      <td style="border-bottom:none; border-left:none; border-top:none">&nbsp;</td>
      </tr>
    <tr style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font:Arial; color:#000000; font-size:11px">
      <td width="20%"  style="border:none">LUGAR</td>
      <td width="15%"  style="border:none">MES</td>
      <td  style="border:none">FIRMA</td>
      <td  style="border-bottom:none; border-left:none; border-top:none">&nbsp;</td>
      </tr>
  </tbody>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr>
      <td height="48" align="right">&nbsp;</td>
    </tr>
  </tbody>
</table>

</div>
</form>
</body>

</html>
