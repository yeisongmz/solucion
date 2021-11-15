<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
   </script>
  
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
    $( "#skills" ).autocomplete({
		source:"search_general.php?v=PLANTILLA",
		autoFocus:true
	});
  });
  </script>
  <script type="text/javascript">
  	function enviar(valor)
	{
		
		document.getElementById('detalle').src="plantillas_iframe.php?q="+valor;
	}
	function eliminar()
	{
			if(document.getElementById('textfield').value!='')
			{
				var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
					location = 'guarda_elimina_plantillas2.php?id='+document.getElementById('textfield').value
                  //return true;
               }
			}
	}
  </script>
</head>

<body>
 <form id="form1" name="form1" method="post">




<div class="polaroid6" style="height:620px">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" align="center" class="fondo_encabezado"><span class="titulo2">Plantillas</span></td>
  </tr>
  <tr>
  	<td align="center" >&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><div class="ui-widget" align="left">
  			<input id="skills" placeholder="Plantilla..." size="37"  >
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="button4" type="button" class="boton3" id="button4" onclick = "location = 'plantillas.php';" value="Nuevo " style="width:85px;">
  	  <input name="button5" type="button" class="boton3" id="button5" value="Editar  " style="width:85px;" onClick="location = 'plantilla_edicion.php?id='+document.getElementById('textfield').value;">
  	  <input name="button6" type="button" class="boton3" id="button6" value="Eliminar" style="width:85px;" onClick="eliminar()">
  	  <input name="button2" type="button" class="boton3" id="button2" value="Todos  " style="width:85px;" onClick="document.getElementById('detalle').src='plantillas_iframe.php';"></div></td>
	</tr>
    <tr>
      <td width="98%" rowspan="4" align="left" height="550">
     
      	<iframe src="plantillas_iframe.php" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;"  height="100%"  ></iframe></td>
     
    
    </tr>
    <tr>

    </tr>
    <tr>
      
    </tr>
    
  </tbody>
</table>
</div>
<p>
  <input name="textfield"  type="text" id="textfield"  readonly  style="visibility:hidden" >
</p>
</form>
</body>
</html>