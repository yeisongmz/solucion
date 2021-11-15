<?php date_default_timezone_set('America/Bahia');
//include ("conexion/conectar.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script >
  $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=PERSONAL",
		autoFocus:true
	});
  });
  $(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=CONCEPTOSC",
		autoFocus:false
	});
  });
  </script>
 <script type="text/javascript"> 
	function enviar2()
	{
		if(document.getElementById("skills2").value=='' || document.getElementById("skills3").value=='' || document.getElementById("number").value=='' || document.getElementById("number2").value=='' || document.getElementById("number3").value=='' || document.getElementById("textarea").value=='' ||  document.getElementById("number").value==0 || document.getElementById("number2").value==0 )
		{
		alert('Complete todos los campos, todos los valores se deben cargar.');	
		}
		else
		{
				document.getElementById("form1").submit();
		}
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_prestamos.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="41" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2">Prestamos</span></td>
      </tr>
      <tr>
        <td width="32%" height="35" class="eiquetas">&nbsp;Personal*</td>
        <td width="46%">&nbsp;<div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese Apellido ..." size="37" name="skills2" onKeyUp="return teclaGRAL(this, event,'skills3');" autocomplete="off" >
      	</div></td>
        <td width="22%">&nbsp;</td>
      </tr>
       <tr>
        <td width="32%" height="35" class="eiquetas">&nbsp;Concepto*</td>
        <td width="46%">&nbsp;<div class="ui-widget">
  			<input autofocus id="skills3" placeholder="Ingrese Concepto..." size="37" name="skills3" onKeyUp="return teclaGRAL(this, event,'number');" >
      	</div></td>
        <td width="22%">&nbsp;</td>
      </tr>
      <tr>
        <td height="28" class="eiquetas">&nbsp;Fecha*</td>
        <td><input name="textfield" type="text" id="textfield" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34" class="eiquetas">&nbsp;Monto*</td>
        <td><input name="number" type="text" id="number" maxlength="10" onKeyUp="format(this);return teclaGRAL(this, event,'number2');" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="43" class="eiquetas">&nbsp;Plazo (Cant.Cuotas)*</td>
        <td><input name="number2" type="text" id="number2" maxlength="2" onKeyUp="format(this);return teclaGRAL(this, event,'number3');" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33" class="eiquetas">&nbsp;Interés*</td>
        <td><input name="number3" type="text" id="number3" maxlength="3" onKeyUp="format(this);return teclaGRAL(this, event,'textarea');" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="26" class="eiquetas">&nbsp;Motivo*</td>
        <td><textarea name="textarea" cols="30" rows="4" maxlength="250" id="textarea"></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="eiquetas">&nbsp;Fecha Vencimiento 1ra. Cuota*</td>
        <td><input name="textfield3" type="text" id="textfield3" size="10" readonly value="<?php echo date('d-m-Y');?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield3,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="enviar2();">&nbsp;</td>
      </tr>
    
      
    </tbody>
  </table>
  </div>
</form>
</body>
</html>

