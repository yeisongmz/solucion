<?php include ("conexion/conectar.php");

$query2=mysql_query("SELECT nombre FROM proveedor  ORDER BY nombre   " );
						$apellidos = "";
							
							//$query4=array();
						while($query4=mysql_fetch_array($query2))
						{
							$apellidos = $apellidos.$query4['nombre'].";";
																				
						}
						$apellidos = $apellidos."......";
						
						
							
mysql_close($con);				
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>
<link rel="stylesheet" type="text/css" href="css/auto-complete.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
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
 
  <script type="text/javascript">
  function buscar2()
{
	var x = document.activeElement.value;
	var x2 = document.activeElement.id;
	//alert(x+x2);
	
	if(x2=='skills')
	{
		document.getElementById('detalle').src="compras_iframe.php?q="+x;
	}
}
	function buscar( event)
{
	
	
	 switch (event.keyCode) 
  		{
	
			case 13 :
			var x = document.activeElement.value;
				document.getElementById('detalle').src="compras_iframe.php?q="+valor;
				
		}
}
  	function enviar(valor)
	{
		document.getElementById('skills').value=valor;
		document.getElementById('detalle').src="compras_iframe.php?q="+valor;
	}
	
	function editar()
	{
		if(document.getElementById('textfield').value!='')
		{
			location = 'compras_equipos_edicion.php?id='+document.getElementById('textfield').value;
		}
	}
	function eliminar()
	{
		if(document.getElementById('textfield').value!='')
		{
			var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
				location = 'elimina_compras.php?id='+document.getElementById('textfield').value;
			   }
		}
	}
  </script>
</head>

<body>
 <form id="form1" name="form1" method="post">




<div class="polaroid6" style="height:auto">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" align="center" class="fondo_encabezado"><span class="titulo2">Compras</span>&nbsp;</td>
  </tr>
  <tr>
  	<td align="center" >&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><div class="ui-widget" align="left">
  			<input id="skills" placeholder="Proveedor..." size="37"  ></div>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="button4" type="button" class="boton3" id="button4" onclick = "location = 'compras_equipos.php'" value="Nueva" style="width:85px;">
  	  <input name="button5" type="button" class="boton3" id="button5" value="Editar  " style="width:85px;"  onclick = "editar();">
  	  <input name="button6" type="button" class="boton3" id="button6" value="Recargar" style="width:85px;" onClick="location='busca_compras.php';">
      <input type="button" name="button7" id="button7"  class="boton3" style="width:85px;" onClick="eliminar();" value="Eliminar"></td>
	</tr>
    <tr>
      <td width="98%" rowspan="4" align="left" height="1000">
      
      	<iframe src="compras_iframe.php" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;"  height="100%"   ></iframe></td>
     
     
    </tr>
    <tr>

    </tr>
    <tr>
      
    </tr>
    
  </tbody>
</table>
</div>
<p>
  <input name="textfield" type="text" id="textfield"  readonly  style="visibility:hidden">
</p>
<textarea name="textarea" rows="10" id="textarea" style="visibility:hidden"  ><?php echo $apellidos;?></textarea>
 <div id="fb-root"></div>
<script src="js/auto-complete.js"></script>
<script>
	
      
		
		var demo1 = new autoComplete({
            selector: '#skills',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
				var string =  document.getElementById('textarea').value ;
				var choices = string.split(";");
			    var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
					
                suggest(suggestions);
            }
        });

       
    </script>
</form>
</body>
</html>