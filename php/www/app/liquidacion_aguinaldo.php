<?php 
date_default_timezone_set('America/Bahia');
 include ("conexion/conectar.php");
 $funcionario='';
 $salario='';
 $gratificaciones=0;
 $acumulado=0;
 
 $ano=$_GET['ano'];
 $id_personal=0;
 $fila2=99;
 $fila3=199;
 $fila4=299;
 $fila5=399;
 $total_gral=0;
 $sub_total1=0;
 $sub_total2=0;
 $sub_total3=0;
 $sub_total4=0;
 $personal=explode(',',$_GET['personal']);
 $sql="select id,apellidos,nombres,sueldoreal from personal where nombres='".trim($personal[1])."' and apellidos='".trim($personal[0])."'   ";	
 //echo  $sql;
 $res=mysql_query($sql,$con);
 while($fila=mysql_fetch_array($res)){
	 $funcionario=$fila['apellidos'].', '.$fila['nombres'];
	 $salario=$fila['sueldoreal'];
	
     $id_personal=$fila['id'];

 }
 
 $acumulado=0;
  $sql="select * from adelantos where personal_id='".$id_personal."'    and (liquiregular_id is null or liquiregular_id=0)";
  $res=mysql_query($sql,$con);
 while($fila=mysql_fetch_array($res)){
	  $acumulado=$acumulado+$fila['importe'];
 }
 ?>
<!doctype html>
<html>
<head>
<script type="text/javascript">

function procesar()
{
		document.getElementById('form1').submit();
}
</script>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>

</head>

<body>
<form id="form1" name="form1" method="post" action="generador_liqui_aguinaldo.php">
<div class="polaroid7">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="45" colspan="4" align="center"><span class="titulo2">Liquidación de aguinaldo</span></td>
      </tr>
      
      <tr>
        <td height="24" class="eiquetas">Funcionario</td>
        <td colspan="3"><input name="personal" type="text" style="border:none" value="<?php echo $funcionario;?>" size="100" readonly></td>
      </tr>
      <tr>
        <td width="23%" height="24" class="eiquetas">&nbsp;Fecha </td>
        <td colspan="3"><input type="text" name="textfield" id="textfield" readonly value="<?php echo date('d/m/Y');?>" style="border:none"></td>
      </tr>
      <tr>
        <td height="26" class="eiquetas">&nbsp;Periodo</td>
        <td colspan="3"><input type="text" name="textfield6" id="textfield6" readonly style="border:none" value="<?php echo $ano;?>"></td>
      </tr>
      <tr>
        <td height="25" class="eiquetas">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><hr></td>
      
      <tr class="fondo_encabezado">
        <td height="39" colspan="4" align="center">&nbsp;<span class="titulo2">Ingresos (salarios percibidos)</span></td>
      </tr>
      <tr>
        <td height="28" class="eiquetas">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">Salarios</td>
        <td colspan="3"><table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
              <tr class="fondo_encabezado_mjt">
                <td>Desde</td>
                 <td>Hasta</td>
                <td>Monto</td>
                </tr>
              <tr>
              <?php $sql="select * from liquiregular where personal_id='".$id_personal."' and year(date(desde))='".$ano."' and year(date(hasta))='".$ano."'   ";	
			
			 $sub_total1=0;
 $res=mysql_query($sql,$con);
 while($fila=mysql_fetch_array($res)){
	 $aux=explode('-',$fila['desde']);
	 $fecha=$aux[2].'/'.$aux[1].'/'.$aux[0];
	  $aux=explode('-',$fila['hasta']);
	 $fecha2=$aux[2].'/'.$aux[1].'/'.$aux[0];
	 $sub_total1=$sub_total1+$fila['totalPagar'];
	 ?>
                <td><?php echo $fecha;?></td>
                <td><?php echo $fecha2;?></td>
                <td><?php echo number_format($fila['totalPagar'],'0','','.'); ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table></td>
      </tr>
      
      <tr>
        <td height="33" >&nbsp;</td>
        <td width="51%" align="right" ><label for="textfield4">Total salarios:</label></td>
        <td width="26%" align="right" ><input name="textfield4" type="text" id="textfield4" readonly style="border:none; font-size:18px; text-align:right" value="<?php echo number_format($sub_total1,'0','','.');?>"></td>
      </tr>
      <tr >
        <td height="39"  >&nbsp;</td>
        <td align="right" ><label for="textfield5">Salarios/12:</label></td>
        <td align="right" ><input name="textfield20" type="text" id="textfield20" readonly style="border:none; font-size:18px; text-align:right" value="<?php echo number_format($sub_total1/12,'0','','.');?>"></td>
      </tr>
      
      <tr>
        <td height="42" class="eiquetas">&nbsp;</td>
        <td colspan="3">
          <input type="text" name="textfield9" id="textfield9" style="border:none; color:#E50E12; font-size:18px;visibility:hidden" readonly value="<?php echo number_format($acumulado,'0','','.');?>"></td>
      </tr>
      
      <tr>
        <td height="32" class="eiquetas">&nbsp;</td>
        <td colspan="3" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td height="32" class="eiquetas">&nbsp;</td>
        <td colspan="3" align="right"><input name="textfield21" type="text" id="textfield21" style=" font-size:18px; text-align:right; color:#4651C7;visibility:hidden " value="<?php echo number_format($acumulado+$sub_total3+$sub_total4,'0','','.');?>" size="10" readonly ></td>
      </tr>
      
        <tr>
          <td height="42">&nbsp;</td>
          <td colspan="2" align="right"><strong>NETO A RECIBIR&nbsp;</strong><input name="textfield12" type="text" id="textfield12" style=" color:#620406; font-size:18px; text-align:right" size="10" value="<?php echo number_format(($sub_total1/12),'0','','.'); ?>"></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        
        <td align="right">&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Procesar" onClick="procesar();">&nbsp;</td>
        </tr>
    </tbody>
  </table>
  </div>
  <input type="text" name="adelantos" id="1000" style="visibility:hidden">
  <input type="text" name="descuentos" id="2000" style="visibility:hidden">
  <input type="text" name="idprestamos" id="3000" style="visibility:hidden">
  <input name="cuotas" type="text" id="4000" style="visibility:hidden">
</form>
</body>
</html>