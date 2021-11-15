
<?php include ("conexion/conectar.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<?php 
$opc = $_GET['opc'];
$id='';
if(isset($_GET['id']))
{
$id = $_GET['id'];
}
$razon='';
$obs ='';


				if ($opc=="M")
				{
					
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM cargos WHERE id = '".$buscado[0]."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$razon = $query4['cargo'];
							$obs = $query4['obs'];
						}
				
				}

 ?>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_cargos.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="38" colspan="2" align="center"><span class="titulo2" >&nbsp;Cargos</span></td>
      </tr>
      <tr>
        <td width="22%" height="41" class="eiquetas">&nbsp;Nombre del Cargo*</td>
        <td width="78%"><input name="textfield" type="text" autofocus id="textfield" maxlength="40" value="<?php echo $razon; ?>" onKeyUp="return tecla4(this, event)" autocomplete="off"></td>
      </tr>
      <tr>
        <td>Observaci&oacute;n</td>
        <td><textarea name="textarea" cols="40" rows="6" maxlength="250" id="textarea" onKeyUp="return tecla4(this, event)"  ><?php echo $obs; ?></textarea></td>
      </tr>
      <tr>
        <td height="59" colspan="2" align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="validar_campos_cargo('<?php echo $opc; ?>')">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>
    <input type="text" name="textfield2" id="textfield2" readonly value="<?php echo $opc; ?>" style="visibility:hidden">
    <input type="text" name="textfield3" id="textfield3" value="<?php echo $buscado[0]; ?>" style="visibility:hidden" readonly>
  </p>
  </div>
</form>
</body>
</html>