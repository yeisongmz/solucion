<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid5">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1"  >
    <tbody>
    <tr>
        <td height="56" class="eiquetas">&nbsp;Fecha Documento</td>
        <td style="color:#EB1115"><input type="text" name="textfield7052" id="textfield7052" size="10" readonly><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7052,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="33%" height="36" class="eiquetas">&nbsp;Vigente Desde
        <div id="testDIV">
    <div class="container">
        <div class="hero-unit"></div>
    </div>
</div>
        </td>
        <td width="64%" style="color:#EB1115"><input name="textfield7050" type="text" id="textfield7050" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield7050,'dd-mm-yyyy',this)">
        
        </td>
       <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="56" class="eiquetas">&nbsp;Vigente Hasta</td>
        <td style="color:#EB1115"><input type="text" name="textfield7051" id="textfield7051" size="10" readonly><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7051,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="40" class="eiquetas">Ref</td>
        <td><input name="textfield" type="text" id="textfield" size="40"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
      	<td height="40" class="eiquetas">&nbsp;Relaci&oacute;n</td>
		<td><select name="select2" id="select2">
		  <option>Personal</option>
            <option>Equipos</option>
            <option>Clientes</option>
            <option>Otros</option>
        </select>          
          <label for="textfield20">:</label></td>
      	<td>&nbsp;</td>        
      </tr>
      <tr>
        <td height="40" colspan="3">&nbsp;<input name="file" type="file" class="" value="" title="LOla" />          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="3%">&nbsp;</td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Adjuntar" onclick=""></td>
        <td>&nbsp;</td>
        
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        
      </tr>
    </tbody>
  </table>
  </div>
  </form>
</body>
</html>