<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
  <script>
function enviar(valor)
	{
		document.getElementById('detalle').src="prestamos_iframe.php?q="+valor;
	}
	$(function() {
    $( "#skills" ).autocomplete({
		source:"search_general.php?v=PERSONAL",
		autoFocus:true
	});
  });
  function ver()
  {
	  if(document.getElementById('textfield').value!=='')
	  {
	  location='ver_prestamo.php?id='+document.getElementById('textfield').value;
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
  	<td height="40" align="center" class="fondo_encabezado"><span class="titulo2">Prestamos al Personal</span>&nbsp;</td>
  </tr>
  <tr>
  	<td align="center" >&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><div class="ui-widget" align="left">
  			<input id="skills" placeholder="Ingrese Nombre..." size="37"  >
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="button4" type="button" class="boton3" id="button4" onclick = "location = 'prestamos.php'" value="Nuevo " style="width:85px;">
      	<input name="button2" type="button" class="boton3" id="button2" value="Todos  " style="width:85px;" onClick="document.getElementById('detalle').src='prestamos_iframe.php';">
      	<input name="button6" type="button" class="boton3" id="button6" value="Ver"  style="width:85px;" onClick="ver();">
  	</div></td>
	</tr>
    <tr>
      <td width="98%" rowspan="4" align="left">
      	
        <p>
      	<iframe src="prestamos_iframe.php" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;height:350px"    ></iframe></p></td>
     
     
    </tr>
    <tr>

    </tr>
    <tr>
      
    </tr>
    
  </tbody>
</table>
</div>
<p>
  <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden"  >
</p>
</form>
</body>
</html>