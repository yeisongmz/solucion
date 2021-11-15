<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script  type="text/javascript">
function eliminar()
{
if(document.getElementById('textfield').value!='')
			{
				var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
					location = 'eliminacion_planillas_varias.php?opc=RESUMEN&id='+document.getElementById('textfield').value
                 
               }
			}	
}
 function ver()
 {
	 if(document.getElementById('textfield').value!=='')
	 {
	location = 'resumen_general_mjt.php?id='+document.getElementById('textfield').value;
	 }
 }
 function enviar()
 {
	
			document.getElementById('form1').submit();
	
 }
 
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="resumen_general_mjt3.php">
<div class="polaroid6">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="41" colspan="5" align="center">Planilla MJT (Resumen)</td>
      </tr>
     <tr>
        <td class="eiquetas" height="44" width="15%">Fecha (periodo y mes)</td>
        <td width="17%" class="eiquetas" height="44"><input name="textfield2" type="text" id="textfield2" size="10" value="<?php echo date('d-m-Y'); ?>" readonly>
          <input name="button2" type="button"  id="button2" value="" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)">&nbsp;</td>
        <td width="10%" height="44" align="right" class="eiquetas"><label for="select"> Observaci&oacute;n</label>&nbsp;</td>
        <td width="32%"   class="eiquetas"><textarea name="textarea" cols="30" maxlength="250" id="textarea"></textarea></td>
        <td  width="26%" align="right"  class="eiquetas"><input name="button" type="button" class="boton3" id="button" value="Generar" onClick="enviar();" style="width:85px;">&nbsp;</td>
        </tr>
      <tr>
      
     
     
      </tbody>
      </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1" id="oculto" >
    <tbody>
    <tr>
        	<td height="50" colspan="8" align="right"><input name="button4" type="button" class="boton3" id="button4" value="Eliminar" onclick = "eliminar();" style="width:85px;">&nbsp;</td>
       	</tr>
    	<tr>
        	<td height="50" colspan="8" align="right"><input name="button4" type="button" class="boton3" id="button4" value="Ver" onclick = "ver();" style="width:85px;">&nbsp;</td>
       	</tr>
        
        <tr>
        	<td height="260" colspan="8" align="right"><iframe height="100%" width="100%" style="border:none" src="resumen_mjt_iframe.php"></iframe>
       	    <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden" >        	  &nbsp;</td>
       	</tr>
      
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<body>
</body>
</html>

<body>
</body>
</html>