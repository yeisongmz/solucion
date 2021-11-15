<?php
date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
 <link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
 <script src="js/dhtmlgoodies_calendar.js"></script>

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
  	function enviar(valor)
		{
			//document.getElementById("detalle").src='liquidaciones_Regulares_iframe.php?q='+document.getElementById("skills2").value;
		}
  	function enviar2()
		{
			
				var retVal = confirm("Va a generar la Planila de IPS desde la fecha "+document.getElementById('textfield4').value+" hasta la fecha "+document.getElementById('textfield3').value+" .Desea Continuar?");
               if( retVal == true ){
				location = 'generador_planilla_ips.php?fecha='+document.getElementById('textfield4').value+'&referencia='+document.getElementById('textarea').value+'&hasta='+document.getElementById('textfield3').value;
			   }
			
			
			

	}
	
	
	function eliminar()
	{
		if(document.getElementById('textfield').value!='')
		{
			var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
				location = 'eliminacion_planillas_varias.php?opc=IPS&id='+document.getElementById('textfield').value
			   }
		}
	}
	function ver()
	{
		
		if(document.getElementById('textfield').value!='')
		{
		
				location = 'planilla_ips_excel.php?id='+document.getElementById('textfield').value;
		}
	}
	function ver2()
	{
		
				//location = 'liquidacion_regular_pdf2.php?desde='+document.getElementById('textfield4').value+'&hasta='+document.getElementById('textfield3').value;
		
	}
  </script>
</head>

<body>
 <form id="form1" name="form1" method="post">
<div class="polaroid6" style="height:auto">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" colspan="7"  align="center" class="fondo_encabezado"><span class="titulo2">Planilla IPS</span>&nbsp;</td>
    </tr>
  <tr>
  	<td width="13%" align="center" >&nbsp;</td>
    <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
      
  </tr>
       </td>
        <td align="right"  class="eiquetas">&nbsp;Desde Fecha&nbsp;</td>
         <td>
           <input name="textfield4" type="text" id="textfield4" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" value="<?php echo date('d-m-Y');?>" size="8" readonly>
           <input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield4,'dd-mm-yyyy',this)" id="button"  >
         </td>
        <td align="right" ><span class="eiquetas">Observaci&oacute;n</span>&nbsp;</td>
        <td ><span class="eiquetas">
          <textarea name="textarea" cols="35" maxlength="250" id="textarea"></textarea>
        </span></td>
        <td align="right" ><span class="eiquetas">
          <input name="button" type="button" class="boton3" id="button4" value="Generar" onClick="enviar2();" style="width:85px;">
        </span>&nbsp;</td>
       
    </tr>
    <tr>
        <td width="13%" height="44" align="right" class="eiquetas">&nbsp;Hasta Fecha&nbsp;</td>
        <td width="22%" class="eiquetas" height="44">
          <input name="textfield3" type="text" id="textfield3" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" value="<?php echo date('d-m-Y');?>" size="8" readonly>
        <input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield3,'dd-mm-yyyy',this)" id="button2"  ></td>
       
        <td width="12%" align="right"   class="eiquetas">&nbsp;</td>
        <td  width="31%" align="left"  class="eiquetas">&nbsp;</td>
        <td  width="22%" align="right"  class="eiquetas"><input name="button2" type="button" class="boton3" id="button3" value="Eliminar" onClick="eliminar();" style="width:85px;">          &nbsp;</td>
        </tr>
    
   
    <tr>
		<td >&nbsp;</td>
         <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td align="right" ><input name="button5" type="button" class="boton3" id="button5" value="Ver (excel)  " style="width:85px;"  onclick = "ver();">          &nbsp;</td>
       
    </tr>
     
    
    
    <tr align="right" >
      <td colspan="7" height="200">
        
        <iframe src="planila_ips_iframe.php" name="planilla_ips_iframe.php"  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;"  height="100%"   ></iframe>
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