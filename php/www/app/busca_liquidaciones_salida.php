<?php
date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
 <link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
 <script src="js/dhtmlgoodies_calendar.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
  
  <style type="text/css">
  a:link {
	color: #0B0B0B;
}
a:visited {
	color: #0B0B0B;
}
a:hover {
	color: #0B0B0B;
}
a:active {
	color: #0B0B0B;
}
  </style>
  <script>

  $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=PERSONAL",
		autoFocus:true
	});
  });
  </script>
  <script type="text/javascript">
  	function enviar(valor)
		{
			document.getElementById("detalle").src='liquidaciones_salida_iframe.php?q='+document.getElementById("skills2").value;
		}
		
		
  	function enviar2()
		{
			
			
			if ( document.getElementById('skills2').value!='' &&  document.getElementById('textarea').value!='')
			{
				var retVal = confirm("Va a generar la liquidación POR RETIRO de: "+document.getElementById('skills2').value+" desde el: "+document.getElementById('textfield2').value+" hasta el: "+document.getElementById('textfield3').value+".Desea Continuar?");
               if( retVal == true ){
				location = 'generador_liqui_salida.php?personal='+document.getElementById('skills2').value+'&desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value+'&motivo='+document.getElementById('textarea').value;
			   }
			}
			
			

	}
	
	
	
	function ver()
	{
		
		
		if(document.getElementById('textfield').value!='')
		{
			location = 'generador_liqui_salida_pdf.php?id='+document.getElementById('textfield').value+'&desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value+'&motivo='+document.getElementById('textarea').value;
		}
	}
	function eliminar()
	{
		if(document.getElementById('textfield').value!='')
		{
			var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
				location = 'guarda_elimina_liquisalida.php?id='+document.getElementById('textfield').value;
			   }
		}
	}
  </script>
</head>

<body>
 <form id="form1" name="form1" method="post">




<div class="polaroid6">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" colspan="7" align="center" bgcolor="#4D965C" ><span class="titulo2">Liquidación de Salarios (por retiro)</span>&nbsp;</td>
    </tr>
  <tr>
  	<td width="1%" align="center" >&nbsp;</td>
    <td width="17%">&nbsp;</td>
        <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2"  align="right"><div class="ui-widget" align="left">
  	  <input id="skills2" placeholder="Ingrese Apellido..." size="25" name="skills2" autofocus  >
  	</div></td>
  	<td width="6%"  align="left">&nbsp;Desde</td>
  	<td width="21%"  align="left">&nbsp;<input name="textfield2" type="text" id="textfield2" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" id="button1"  ></td>
  	<td width="7%"  align="right">&nbsp;Hasta </td>
  	<td width="48%" colspan="2"  align="left">&nbsp;<input name="textfield3" type="text" id="textfield3" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield3,'dd-mm-yyyy',this)" id="button1"  ></td>
      </tr>
    
		    <tr>
        <td height="28" colspan="2">&nbsp;Motivo</td>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
		<td colspan="2">
		  <textarea name="textarea" cols="25" rows="6" maxlength="250" id="textarea"></textarea></td>
        <td colspan="5">&nbsp;</td>
    </tr>
     
		
        <tr>
        <td height="42" colspan="2"><input name="button" type="button" class="boton3" id="button" value="Generar" style="width:85px;" onClick="enviar2();"></td>
        <td colspan="3" align="right" >&nbsp;</td>
        <td align="right" ><input name="button6" type="button" class="boton3" id="button6" value="Eliminar"  onClick="eliminar();" >
          <input name="button5" type="button" class="boton3" id="button5" value="Ver" style="width:85px;"  onclick = "ver();">&nbsp;</td>
                     
        </tr>
    <tr>
      <td colspan="8"  align="left">
        
        <iframe src="liquidaciones_salida_iframe.php" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;"    ></iframe>
      </td>
    </tr>
    </tbody>
</table>
</div>
<p>
  <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden" >
</p>
</form>
</body>
</html>