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
			document.getElementById("detalle").src='liquidaciones_Regulares_iframe.php?q='+document.getElementById("skills2").value;
		}
  	function enviar2()
		{
			var op = 0;
			if(document.getElementById("RG1_0").checked==true)
			{
				op = 1;
			}
			else
			{
				op = 2;	
			}
			if (op==1 && document.getElementById('skills2').value!='' )
			{
				var retVal = confirm("Va a generar la liquidación de: "+document.getElementById('skills2').value+" desde el: "+document.getElementById('textfield2').value+" hasta el: "+document.getElementById('textfield3').value+".Desea Continuar?");
               if( retVal == true ){
				location = 'generador_liqui_regular.php?personal='+document.getElementById('skills2').value+'&desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value+'&opcion='+op;
			   }
			}
			
			if (op== 2 )
			{
				var retVal = confirm("Va a generar la liquidación General desde el: "+document.getElementById('textfield2').value+" hasta el: "+document.getElementById('textfield3').value+".Desea Continuar?");
               if( retVal == true ){
				location = 'generador_liqui_regular2.php?desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value+'&opcion='+op;
			   }
			}

	}
	
	
	function eliminar()
	{
		if(document.getElementById('textfield').value!='')
		{
			var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
				location = 'guarda_elimina_liqui_regular.php?id='+document.getElementById('textfield').value;
			   }
		}
	}
	function ver()
	{
		var op = 0;
			if(document.getElementById("RG2_0").checked==true)
			{
				op = 1;
			}
			else
			{
				op = 2;	
			}
		
		if(document.getElementById('textfield').value!='')
		{
			if (op== 2 )
			{
				
				location = 'liqui_regular_excel.php?id='+document.getElementById('textfield').value;
			}
			if (op== 1 )
			{
		
				location = 'liquidacion_regular_pdf.php?id='+document.getElementById('textfield').value;
			}
		}
	}
	function ver2()
	{
		
				location = 'liquidacion_regular_pdf2.php?desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value;
		
	}
	function ver3()
	{
		
				location = 'liquidacion_regular_pdf3.php?desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value;
		
	}
  </script>
</head>

<body>
 <form id="form1" name="form1" method="post">




<div class="polaroid6" style="height:auto">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" colspan="4" align="center" class="fondo_encabezado"><span class="titulo2">Liquidación de Salarios(regular)</span>&nbsp;</td>
    </tr>
  <tr>
  	<td width="10%" align="center" >&nbsp;</td>
    <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2"  align="right"><div class="ui-widget" align="left">
  	  <input id="skills2" placeholder="Ingrese Nombre..." size="37" name="skills2" autofocus  >
  	</div></td>
  	<td colspan="2"  align="left">&nbsp;</td>
      </tr>
    
		    <tr>
        <td>Generaci&oacute;n</td>
        <td width="20%"><table width="177" class="tabla1">
          <tr>
            <td><label>
              <input name="RG1" type="radio" id="RG1_0" value="1" checked="checked">
              Individual</label></td>
              <td><label>
              <input type="radio" name="RG1" value="2" id="RG1_1">
              Completa</label></td>
          </tr>
         
        </table></td>
        <td width="70%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
		<td>Desde Fecha</td>
        <td><input name="textfield2" type="text" id="textfield2" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" id="button1"  ></td>
        <td colspan="2">&nbsp;</td>
    </tr>
     <tr>
		<td>Hasta Fecha</td>
        <td><input name="textfield3" type="text" id="textfield3" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield3,'dd-mm-yyyy',this)" id="button1"  ></td>
        <td colspan="2">&nbsp;<input name="button" type="button" class="boton3" id="button" value="Generar" style="width:85px;" onClick="enviar2();"></td>
    <tr style="visibility:hidden">
		<td>Formato de Visualiazi&oacute;n</td>
        <td><table width="150" class="tabla1">
          <tr>
            <td><label>
              <input name="RG2" type="radio" id="RG2_0" value="1" checked="checked">
              PDF</label></td>
              <td><label>
              <input type="radio" name="RG2" value="2" id="RG2_1">
              Excel</label></td>
          </tr>
          
        </table></td>
        <td colspan="2">&nbsp;</td>
    </tr>
   
    
    
		<td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" align="right"></td>
    </tr>
    <tr class="eiquetas">
		<td colspan="3"><p>*Debe seleccionar un item</p>
		  <p>**Debe seleccionar el rago de fecha de la liquidaci&oacute;n</p></td>
		<td align="right"><input name="button6" type="button" class="boton3" id="button6" value="Eliminar" style="width:85px;" onClick="eliminar();">
		  &nbsp;<input name="button5" type="button" class="boton3" id="button5" value="Ver* (pdf)  " style="width:85px;"  onclick = "ver();">&nbsp;<input name="button50" type="button" class="boton3" id="button50" value="Todas**(pdf)" style="width:90px; display:none"  onclick = "ver2();" >&nbsp;<input name="button50" type="button" class="boton3" id="button500" value="Todas2**(pdf)" style="width:100px;"  onclick = "ver3();" >&nbsp;</td>
      </tr>
    <tr height="200">
      <td colspan="5"  align="left" height="250">
        
        <iframe src="liquidaciones_Regulares_iframe.php" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px; " height="100%"    ></iframe>
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