<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="41" colspan="5" align="center">Translados</td>
        </tr>
      <tr>
        <td colspan="5" class="eiquetas">Desde&nbsp;<input type="text" name="textfield" id="textfield" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
        </tr>
      <tr>
        <td height="54" colspan="5" class="eiquetas">Hasta&nbsp;<input type="text" name="textfield" id="textfield" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
        </tr>
      <tr>
        <td colspan="3">&nbsp;<div class="ui-widget">
  			<input autofocus id="skills" placeholder="Ingrese Apellido o C.I a buscar..." size="37"  >
        </div></td>
        <td colspan="2" align="right"><span class="ui-widget">
          <input name="button" type="button" class="boton3" id="button" value="Todos">
        </span>&nbsp;<input name="button" type="button" class="boton3" id="button" value="Imp">&nbsp;</td>
        </tr>
      <tr>
        <td width="30%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="25%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="15%">&nbsp;</td>
      </tr>
      <tr class="fondo_encabezado_buscador">
        <td height="25">Personal</td>
        <td>Fecha</td>
        <td colspan="2" align="left">Origen&nbsp;</td>
        <td>Destino&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td>Personal 1</td>
        <td>12-05-2016</td>
        <td colspan="2" align="left">Origen &nbsp;</td>
        <td>Destino&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td>Personal 2</td>
        <td>15-05-2016</td>
        <td colspan="2" align="left">Origen &nbsp;</td>
        <td>Destino&nbsp;</td>        
      </tr>
      <tr class="eiquetas">
        <td>Personal 3</td>
        <td>18-05-2016</td>
        <td colspan="2" align="left">Origen &nbsp;</td>
        <td>Destino&nbsp;</td>        
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>