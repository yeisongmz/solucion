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
<div class="polaroid6">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td height="29" colspan="3" align="center" class="fondo_encabezado" ><strong>Documentos Adjuntos de Personal</strong></td>
      </tr>
      <tr>
        <td height="29" colspan="3">&nbsp;<input name="textfield" type="text" autofocus id="textfield" placeholder="Ingrese Apellido o Nùmero de Cèdula del Personal" size="50"></td>
      </tr>
      <tr>
        <td width="14%" height="36"><strong>&nbsp;Apellido y Nombre</strong></td>
        <td width="76%"><input name="textfield2" type="text" id="textfield2" size="80"></td>
        <td width="10%">&nbsp;</td>
      </tr>
      <tr>
        <td height="32"><strong>&nbsp;Supervisor</strong></td>
        <td><input name="textfield3" type="text" id="textfield3" size="80"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31"><strong>&nbsp;Cliente</strong></td>
        <td><input name="textfield4" type="text" id="textfield4" size="80"></td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#C6C6C6">
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0"  >
    <tbody>
      <tr class="fondo_encabezado2" >
        <td width="8%"><strong>C.I.</strong></td>
        <td width="9%"><strong>Contrato</strong></td>
        <td width="9%"><strong>Antecedentes Policiales</strong></td>
        <td width="9%"><strong>Antecedentes Judiciales</strong></td>
        <td width="9%"><strong>Buena Conducta</strong></td>
        <td width="9%"><strong>Otro</strong></td>
        <td width="9%"><strong>Otro</strong></td>
        <td width="9%"><strong>Otro</strong></td>
        <td width="9%"><strong>Otro</strong></td>
        <td width="20%"><strong>Otro</strong></td>
      </tr>
      <tr>
        <td height="51" class="eiquetas">&nbsp;Vigente Desde</td>
        <td style="color:#EB1115"><input name="textfield5" type="text" id="textfield5" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield5,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield7" id="textfield7" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield7,'dd-mm-yyyy',this)"></td>
        <td style="color:#EB1115"><input type="text" name="textfield9" id="textfield9" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield9,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield11" id="textfield11" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield11,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield13" id="textfield13" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield13,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield15" id="textfield15" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield15,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield17" id="textfield17" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield17,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield19" id="textfield19" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield19,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield21" id="textfield21" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield21,'dd-mm-yyyy',this)"></td>
      </tr>
      <tr>
        <td height="56" class="eiquetas">&nbsp;Vigente Hasta</td>
        <td style="color:#EB1115"><input type="text" name="textfield6" id="textfield6" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield6,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield8" id="textfield8" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield8,'dd-mm-yyyy',this)"></td>
        <td style="color:#EB1115"><input type="text" name="textfield10" id="textfield10" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield10,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield12" id="textfield12" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield12,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield14" id="textfield14" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield14,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield16" id="textfield16" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield16,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield18" id="textfield18" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield18,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield20" id="textfield20" size="6" readonly><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield20,'dd-mm-yyyy',this)"></td>
        <td><input type="text" name="textfield22" id="textfield22" size="6" readonly ><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].textfield22,'dd-mm-yyyy',this)"></td>
      </tr>
      <tr>
        <td height="40">&nbsp;<input type="button" name="button" id="button" value="Examinar..."></td>
        <td><input type="button" name="button2" id="button2" value="Examinar..."></td>
        <td><input type="button" name="button3" id="button3" value="Examinar..."></td>
        <td><input type="button" name="button4" id="button4" value="Examinar..."></td>
        <td><input type="button" name="button5" id="button5" value="Examinar..."></td>
        <td><input type="button" name="button6" id="button6" value="Examinar..."></td>
        <td><input type="button" name="button7" id="button7" value="Examinar..."></td>
        <td><input type="button" name="button8" id="button8" value="Examinar..."></td>
        <td><input type="button" name="button9" id="button9" value="Examinar..."></td>
        <td><input type="button" name="button10" id="button10" value="Examinar..."></td>
      </tr>
      <tr>
        <td>&nbsp;<img src="images/lunas-de-saturno-dione_727_485_1270764.jpg" width="71" height="63" alt=""/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input type="button" name="button11" id="button11" value="Guardar" class="boton"  >&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>