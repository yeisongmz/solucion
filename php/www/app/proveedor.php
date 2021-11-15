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
$dir='';
$ruc='';
$tele='';
$rubro='';
$cont='';
$cel='';
$obs ='';

				if ($opc=="M")
				{
					
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM proveedor WHERE id = '".$buscado[0]."' " );
						while($query4=mysql_fetch_array($query2))
						{
							$razon=$query4['nombre'];
							$dir=$query4['direccion'];
							$ruc=$query4['ruc'];;
							$tele=$query4['telefono'];
							$rubro=$query4['rubro'];
							$cont=$query4['contacto'];
							$cel=$query4['telmovil'];
							$obs =$query4['obs'];
						}
				}
?>	
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_proveedores.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="33" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2">Proveedores</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33" class="eiquetas">&nbsp;Nombre*&nbsp;</td>
        <td><input name="textfield" type="text" autofocus id="textfield" onKeyUp="return teclaGRAL(this, event,'textfield2')" value="<?php echo $razon; ?>" size="50" maxlength="40" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="32" class="eiquetas">&nbsp;Direcci&oacute;n</td>
        <td><input name="textfield2" type="text" id="textfield2" maxlength="80" onKeyUp="return teclaGRAL(this, event,'textfield3')" value="<?php echo $dir; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;R.U.C.</td>
        <td><input name="textfield3" type="text" id="textfield3" maxlength="12" onKeyUp="return teclaGRAL(this, event,'textfield4')" value="<?php echo $ruc; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="33" class="eiquetas">&nbsp;Tel&eacute;fono</td>
        <td><input name="textfield4" type="text" id="textfield4" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textfield5')" value="<?php echo $tele; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="31" class="eiquetas">&nbsp;Rubro</td>
        <td><input name="textfield5" type="text" id="textfield5" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield6')" value="<?php echo $rubro; ?>" maxlength="30"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="30" class="eiquetas">&nbsp;Contacto</td>
        <td><input name="textfield6" type="text" id="textfield6" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textfield7')" value="<?php echo $cont; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="30" class="eiquetas">&nbsp;Celular</td>
        <td><input name="textfield7" type="text" id="textfield7" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textarea')" value="<?php echo $cel; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="77" class="eiquetas">&nbsp;Observaci&oacute;n</td>
        <td><textarea name="textarea" cols="30" rows="4" maxlength="250" id="textarea"><?php echo $obs; ?></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td   >&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="validar_campos_proveedores('<?php echo $opc; ?>')">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
   <p>
    <input type="text" name="textfield8" id="textfield8" readonly value="<?php echo $opc; ?>" style="visibility:hidden" >
    <input name="textfield9" type="text" id="textfield9" value="<?php echo $buscado[0]; ?>" style="visibility:hidden" readonly  >
  </p>
</form>
</body>
</html>