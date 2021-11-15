<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
<script>
 $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=BANCOS",
		autoFocus:true
	});
  });
</script>

<script  type="text/javascript">
function eliminar()
{
if(document.getElementById('textfield').value!='')
			{
				var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
					location = 'eliminacion_planillas_varias.php?opc=BANCO&id='+document.getElementById('textfield').value
                 
               }
			}	
}
function enviar(valor)
{
	
	if(document.activeElement.name!=='skills2')
	{
		
	
	if(document.getElementById('textfield8').value=='' ||document.getElementById('textfield6').value=='' || document.getElementById('textfield5').value=='' || document.getElementById('textfield4').value=='')
	{
		alert('Complete todos los campos para generar el registro');		
	}
	else
	{
		var retVal = confirm("Va a generar la planilla de acreditación de pagos desde el "+document.getElementById('textfield3').value+" hasta el "+document.getElementById('textfield7').value+" con fecha de acreditación "+document.getElementById('textfield2').value+" .Desea Continuar?");
               if( retVal == true )
			   {
				 location='generador_planilla_banco2.php?desde='+document.getElementById('textfield3').value+'&hasta='+document.getElementById('textfield7').value+'&acredita='+document.getElementById('textfield2').value+'&tipo='+document.getElementById('textfield5').value+'&moneda='+document.getElementById('textfield6').value+'&notas='+document.getElementById('textfield4').value+'&numero='+document.getElementById('textfield8').value+'&banco='+document.getElementById('skills2').value;
				 
				 
				   
			   }
		}
	}
}
 function ver()
 {

	 if(document.getElementById('textfield').value!=='')
	 {
	
		location = 'planilla_banco.php?id='+document.getElementById('textfield').value;
	 }

 }

</script>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid6">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="41" colspan="5" align="center">Planilla Banco</td>
      </tr>
      <tr>
  	<td height="38" colspan="2"  align="right"><div class="ui-widget" align="left">
  	  <input id="skills2" placeholder="Ingrese banco..." size="30" name="skills2" autofocus onKeyUp="return teclaGRAL(this, event,'textfield5')" autocomplete="off" >
  	</div></td>
  	<td colspan="3"  align="left">&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td width="20%" height="39" class="eiquetas">&nbsp;Procesar desde el </td>
        <td width="18%" height="39"  class="eiquetas"><label for="textfield7">
          <input name="textfield3" type="text" id="textfield3"  value="<?php echo date('d-m-Y');?>" size="10" readonly>
          <input name="button2" type="button" class="boton_calendario" id="button2" value="" onclick="displayCalendar(document.forms[0].textfield3,'dd-mm-yyyy',this)">
        </label></td>
          <td width="13%" align="right">Hasta el&nbsp;</td>
           <td><span class="eiquetas">
             <input name="textfield7" type="text" id="textfield7" size="10" readonly value="<?php echo date("d-m-Y");?>">
             <input name="button5" type="button" class="boton_calendario" id="button5" onclick="displayCalendar(document.forms[0].textfield7,'dd-mm-yyyy',this)" value="">
           </span></td>
           <td align="right"><input name="button" type="button" class="boton3" id="button" value="Generar" onClick="enviar();" style="width:85px;">&nbsp;</td>
        </tr>
      <tr class="eiquetas">
        <td class="eiquetas" height="40">&nbsp;Fecha de Acreditaci&oacute;n&nbsp;
          <label for="textfield2"></label></td>
        <td class="eiquetas" height="40"><input name="textfield2" type="text" id="textfield2"  value="<?php echo date("d-m-Y");?>" size="10">
          <input name="button3" type="button" class="boton_calendario" id="button3" value="" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)"></td>
        <td height="40" align="right" class="eiquetas">&nbsp;
          <label for="textfield4">Tipo  liqui.*</label>&nbsp;</td>
        <td height="40" class="eiquetas"><input name="textfield5" type="text" id="textfield5" size="30" maxlength="60" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield6')"></td>
        <td height="40" align="right" class="eiquetas"><input name="button6" type="button" class="boton3" id="button6" value="Eliminar" onClick="eliminar();" style="width:85px;" >&nbsp;</td>
      </tr>
      
      <tr class="eiquetas">
        <td height="33" class="eiquetas">&nbsp;Moneda*</td>
        <td height="33" class="eiquetas"><input name="textfield6" type="text" id="textfield6" size="10" maxlength="3" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield8')"></td>
        <td height="33" align="right" class="eiquetas">N&uacute;mero*&nbsp;</td>
        <td class="eiquetas">
          <input name="textfield8" type="text" id="textfield8" size="30" maxlength="20" onKeyUp="return teclaGRAL(this, event,'textfield4')"></td>
        <td align="right" class="eiquetas"><input name="button4" type="button" class="boton3" id="button4" value="Ver" onclick = "ver();" style="width:85px">&nbsp;</td>
        </tr>
         <tr class="eiquetas">
        <td height="33" class="eiquetas"><label for="textfield4">&nbsp;Notas*</label></td>
        <td height="33" colspan="2" class="eiquetas"><input name="textfield4" type="text" id="textfield4" size="20" maxlength="80" autocomplete="off"></td>
        <td colspan="2" align="right" class="eiquetas">&nbsp;</td>
       
     
      </tbody>
      </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1" id="oculto" >
    <tbody>
    	
        
        <tr>
        	<td height="200" colspan="8" align="right"><iframe height="100%" width="100%" src="planilla_banco_iframe.php" style="border:none"></iframe>
       	    <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden"  >        	  &nbsp;</td>
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