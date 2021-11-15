<?php 
$ruta='<a href="#openModal"></a>';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>
  <link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
 <link rel="stylesheet" type="text/css" href="css/modal.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/dhtmlgoodies_calendar.js"></script>
  <style type="text/css">
  a:link {
	color: #0C699C;
	text-decoration: none;
}
a:visited {
	color: #0B0B0B;
	text-decoration: none;
}
a:hover {
	color: #0B0B0B;
	text-decoration: none;
}
a:active {
	color: #0B0B0B;
	text-decoration: none;
}
  a {
	font-family: Arial;
	font-weight: bold;
}
  </style>
  <script>

  $(function() {
    $( "#skills" ).autocomplete({
		source:"search_general.php?v=ADJUNTOS",
		autoFocus:true
	});
  });
  </script>
  <script type="text/javascript">
  	function enviar(valor)
	{
		
		document.getElementById('detalle').src="documentos_solucion_iframe.php?id="+valor;
	}
	function eliminar()
	{
			if(document.getElementById('textfield').value!='')
			{
				var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
					location = 'elimina_adjuntos.php?id='+document.getElementById('textfield').value
                 
               }
			}
	}
	 function enviarADJUNTO()
  {
	   	document.getElementById("form1").submit();
	 
  }
 
function abrir()
{
	document.getElementById('modal').click();
}


  </script>
  
</head>

<body>
<form id="form1" name="form1" method="post" enctype='multipart/form-data' action="guarda_elimina_adjuntos.php">




<div class="polaroid6">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" colspan="2" align="center" class="fondo_encabezado"><span class="titulo2">Documentos de la Empresa</span></td>
  </tr>
  <tr  >
  	<td colspan="2" align="center" >&nbsp;</td>
  </tr>
  <tr    >
  	<td width="53%" align="right"><div class="ui-widget" align="left">
  			<input id="skills" placeholder="Ingrese Documento a buscar..." size="37"   >
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
  	<td align="center" ><input name="button4" type="button" class="boton3" id="button4" value= "    Nuevo    " onClick="abrir();" style="width:85px">&nbsp;
<input name="button6" type="button" class="boton3" id="button6" value="Eliminar" style="width:85px;" onClick="eliminar();">&nbsp;<input name="button2" type="button" class="boton3" id="button2" value="   Todos   " onClick="document.getElementById('detalle').src='documentos_solucion_iframe.php'" style="width:85px">	  </td>
  	</tr>
    <tr>
      <td colspan="2" align="left">
        
        <p>
          <iframe  name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;" src="documentos_solucion_iframe.php"    ></iframe></p></td>
      
      
    </tr>
    </tbody>
</table>
</div>
<p>
  <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden"  >
</p>
<div id="openModal" class="modalDialog">
	<div >
		<a href="#close" title="Cerrar" id="cierre" class="close">X</a>
		<div class="modal-header">
      
      <h2>Adjuntar Documentos</h2>
    </div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1"  >
    <tbody>
    <tr>
        <td height="56" class="eiquetas">&nbsp;Fecha Documento</td>
        <td style="color:#EB1115"><input type="text" name="textfield7052" id="textfield7052" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7052,'dd-mm-yyyy',this)"></td>
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
        <td width="64%" style="color:#EB1115"><input name="textfield7050" type="text" id="textfield7050" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield7050,'dd-mm-yyyy',this)">
        
        </td>
       <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="56" class="eiquetas">&nbsp;Vigente Hasta</td>
        <td style="color:#EB1115"><input type="text" name="textfield7051" id="textfield7051" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7051,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="40" class="eiquetas">Ref</td>
        <td><input name="textfield11" type="text" id="textfield11" size="40"></td>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td height="40" colspan="3">&nbsp;
<input name='uploadedfile' type='file' id="uploadedfile"><br>
                
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Longitud max. de nombre de archivo: 25 caracteres</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="3%">&nbsp;</td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Adjuntar" onclick="enviarADJUNTO();"></td>
        <td>&nbsp;</td>
        
      </tr>
      
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        
      </tr>
    </tbody>
  </table>
  </div>
  </div>
  <a href="#openModal" id="modal">.</a>
</form>
</body>
</html>
