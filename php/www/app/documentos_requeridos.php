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
$documento='';
$obligatorio='';




				if ($opc=="M")
				{
					
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM docrequeridos WHERE id = '".$buscado[0]."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$documento = $query4['documentos'];
							$obligatorio = $query4['obligatorio'];
													
						}
				
				}

 ?>
 <script type="text/javascript">
 function guardar()
 {
	if(document.getElementById("textfield").value=='')
	{
		alert('Complete el campo obligatorio');	
	}
	else
	{
		document.getElementById("form1").submit();	
	}
 }
 </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_documentos_requeridos.php">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr>
        <td height="63" colspan="2" align="center" class="fondo_encabezado">DOCUMENTOS REQUERIDOS (para contratar personal)</td>
      </tr>
      <tr class="eiquetas">
        <td width="57%" height="34"><label for="textfield">Documento:</label>
        <input name="textfield" type="text" autofocus id="textfield" autocomplete="off" value="<?php echo $documento ; ?>" size="30" maxlength="50" onKeyUp="return teclaGRAL(this, event,'textfield2');"></td>
        <td width="43%"><input name="textfield3" type="text" id="textfield3" readonly value="<?php echo $opc ; ?>" style="visibility:hidden"></td>
      </tr>
      <tr class="eiquetas">
        <td height="34"><label for="textfield2">Obligatorio:</label>
          &nbsp;<input name="textfield2" type="text" id="textfield2" size="20" maxlength="20" autocomplete="off" value="<?php echo $obligatorio ; ?>"></td>
        <td><input name="textfield4" type="text" id="textfield4" readonly value="<?php echo $id ; ?>" style="visibility:hidden"></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="55">&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="guardar();">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>