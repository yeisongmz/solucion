<?php include ("conexion/conectar.php");
$mat=array();
$fila=0;
$total=0;
$id=explode("-",$_GET['id']);


						
				$query2=mysql_query("SELECT * FROM planilla_banco WHERE id='".$id[0]."'" );
						
						while($query4=mysql_fetch_array($query2))
						{
							$mat[0][0] = $query4['numero'];
							$mat[0][1] = $query4['fecha_credito'];
							$mat[0][2] = $query4['tipo_liquidacion'];
							$mat[0][3] = $query4['notas'];
							$mat[0][4] = $query4['montototal'];
							$mat[0][5] = $query4['moneda'];							
							$fila=$fila+1;
						}
					$query2="SELECT * FROM detalleplanilla WHERE planilla_banco_id='".$id[0]."'  order by nombrepersonal" ;
					$resultado = mysql_query($query2) ;
					if(mysql_num_rows($resultado)>0)
						{			
							while($query4=mysql_fetch_array($resultado))
								{
										$mat[$fila][0] = '';
										$mat[$fila][1] = $query4['ci'];
										$mat[$fila][2] = $query4['nombrepersonal'];
										$mat[$fila][3] = $query4['importe'];
										$mat[$fila][4] = $query4['nota'];
										$fila=$fila+1;
										
								}
						}
						for($i=1;$i<count($mat);$i++)
						{
								$query2=mysql_query("SELECT tipo_docum FROM personal WHERE nro_docum='".$mat[$i][1]."'" );
								while($query4=mysql_fetch_array($query2))
								{
									$mat[$i][0] = $query4['tipo_docum'];
								}
						}
						
mysql_close($con);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/ecmascript">
 function enviar()
 {
	location = 'generador_planilla_banco_excel.php?id='+document.getElementById('textfield').value;
	  
 }
</script>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid6" style="height:auto">
  <p>
    <input type="button" class="boton3" value="Excel" onClick="enviar();">
    <input name="textfield" type="text" id="textfield" readonly="readonly" style="visibility:hidden" value="<?php echo $id[0]; ?>">
  </p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr class="titulo1">
        <td class="td2">Número</td>
        <td class="td2">Fecha de Acreditación</td>
        <td class="td2">Tipo de Liquidación</td>
        <td class="td2">Nota</td>
        <td class="td2">Total</td>
        <td class="td2">Moneda</td>
      </tr>
      <tr class="eiquetas">
        <td class="td2"><?php echo $mat[0][0]?></td>
        <td class="td2"><?php echo $mat[0][1];?></td>
        <td class="td2"><?php echo $mat[0][2];?></td>
        <td class="td2"><?php echo $mat[0][3];?></td>
        <td class="td2"><?php echo $mat[0][4];?></td>
        <td class="td2"><?php echo $mat[0][5];?></td>
      </tr>
      <tr>
        <td class="titulo1">Tipo de Documento</td>
        <td class="titulo1">Nro. de Documento</td>
        <td class="titulo1">Nombre</td>
        <td class="titulo1">Monto</td>
        <td class="titulo1">Notas</td>
        <td class="td2">&nbsp;</td>
      </tr>
      <?php for($i=1;$i<count($mat);$i++){?>
      <tr class="eiquetas">
        <td class="td2"><?php echo $mat[$i][0];?></td>
        <td class="td2"><?php echo $mat[$i][1];?></td>
        <td class="td2"><?php echo $mat[$i][2];?></td>
        <td class="td2"><?php echo $mat[$i][3];?></td>
        <td class="td2"><?php echo $mat[$i][4];?></td>
        <td class="td2">&nbsp;</td>
      </tr>
      <?php }?>
      
    </tbody>
</table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
  <p>&nbsp;</p>
</form>
</body>
</html>