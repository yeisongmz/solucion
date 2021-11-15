<?php include ("conexion/conectar.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
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
$tipo='';
				if ($opc=="M")
				{
					
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM ubicacion_dep WHERE id = '".$buscado[0]."' " );
						while($query4=mysql_fetch_array($query2))
						{
							$razon = $query4['ubicacion'];
							$obs = $query4['obs'];

						}
				}
?>		
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_ubicaciones.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="36" colspan="3" align="center"><span class="titulo2">Ubicaciones de equipos-Depósitos</span></td>
      </tr>
      <tr>
        <td width="23%">&nbsp;</td>
        <td width="58%">&nbsp;</td>
        <td width="19%">&nbsp;</td>
      </tr>
      <tr>
        <td height="41" class="eiquetas">Ubicación</td>
        <td><input name="textfield" type="text" autofocus id="textfield" maxlength="40" onKeyUp="return teclaGRAL(this, event,'textarea')" value="<?php echo $razon; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="61" class="eiquetas" >Comentarios</td>
        <td><textarea name="textarea" cols="40" rows="6" maxlength="250" id="textarea"><?php echo $obs; ?></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="button" type="button" class="boton3" id="button" value="Guardar"  onClick="validar_campos_cargo('<?php echo $opc; ?>')">&nbsp;</td>
      </tr>
    </tbody>
  </table>
   <p>
    <input type="text" name="textfield2" id="textfield2" readonly value="<?php echo $opc; ?>" style="visibility:hidden">
    <input name="textfield3" type="text" id="textfield3" value="<?php echo $buscado[0]; ?>" readonly style="visibility:hidden" >
  </p>
  </div>
</form>
</body>
</html>