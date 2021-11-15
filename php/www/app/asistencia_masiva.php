<?php session_start();
date_default_timezone_set('America/Bahia');

?>

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
<script type="text/javascript">
 $(function() 
 {$("#skills3").autocomplete({source:"search_general.php?v=PERSONAL",autoFocus:true});});
 function cargar(valor,d,h)
		{
		
		
		document.getElementById('textfield').value=d;
		document.getElementById('textfield4').value=h;
		document.getElementById('textfield7').value= valor+'--';
		document.getElementById('detalles2').src='calcula_horas.php?q='+document.getElementById("skills3").value+'&id_sucursal='+valor+'&desde='+document.getElementById("textfield").value+'&hasta='+document.getElementById("textfield4").value+'&mes='+document.getElementById("number3").value+'&ano='+document.getElementById("number4").value;
		document.getElementById('textfield2').focus();
		}

function enviar(valor)
{
	document.getElementById('detalles').src='sucursales_personal_iframe3.php?q='+document.getElementById("skills3").value;
	document.getElementById('textfield2').focus();
}
 function guardar()
 {
	 if( document.getElementById("skills3").value=='' 
	 &&( document.getElementById("textfield2").value=='' || document.getElementById("textfield3").value=='' ||  document.getElementById("textfield7").value==''))
	 {
	 	alert('Complete todos los campos ');
	 }
	 else
	 {
		
			document.getElementById("form1").submit();	 
	 }
 }
	 
	 
	 function teclaGRAL2 (field, event,sgte) 
{

	switch (event.keyCode) {
			case 13 :
					
						document.getElementById('detalles').src='sucursales_personal_iframe.php?q='+document.getElementById("skills3").value;
						document.getElementById('textfield2').focus();
						break;	
					
	}
}


 </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_asistencia_masiva.php">
<div class="polaroid7" style="width:90%">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr>
        <td height="34" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2" >Registro de Asistencia - Masiva</span></td>
      </tr>
      <tr>
        <td width="10%" height="55" class="eiquetas">&nbsp;Personal*</td>
        <td colspan="2"><div class="ui-widget"><input id="skills3" name="skills3" placeholder="Ingrese Nombre..." size="40" onKeyUp="return teclaGRAL2(this, event);" ></div></td>
        </tr>
      <tr class="eiquetas">
      	<td height="138">Cliente*</td>
      	<td colspan="2"><iframe id="detalles" width="100%" src="" style="border:none;" height="100%"></iframe></td>
      	</tr>
      <tr class="eiquetas">
      	<td>&nbsp;</td>
      	<td width="40%">&nbsp;</td>
      	<td width="50%">&nbsp;</td>                
      </tr>
      
      <tr>
        <td height="41" align="center" valign="top" class="eiquetas" style="color:#6D81F4"></td>
        <td><table width="200" border="0" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
            <tr>
              <td align="center"><label for="textfield8"></label></td>
             
              <td align="left"><label for="textfield9">Mes(mm)</label>
                
                <input name="number3" type="number" id="number3" max="12" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number4');" value="<?php echo date("m"); ?>">
                <label for="textfield9"></label></td>
              <td valign="middle">-</td>
              <td align="left"><label for="textfield10">A&ntilde;o(aaaa)</label>
                <label for="number4"></label>
                <input name="number4" type="number" id="number4" max="2100" min="1950" step="1" value="<?php echo date("Y"); ?>" size="4" style="text-align:center" onKeyUp="return teclaGRAL(this, event,'button');">
                <label for="textfield10"></label></td>
            </tr>
          </tbody>
        </table></td>
        <td>&nbsp;</td>
      </tr>
       <tr bgcolor="#C1AC7F" class="eiquetas">
      	<td>Dias</td>
      	<td width="40%">Horas</td>
      	<td width="50%">&nbsp;</td>                
      </tr>
       <tr class="eiquetas">
      	<td height="49">Lunes a Viernes</td>
      	<td width="40%">
          <input name="textfield2" type="text" id="textfield2" size="3" maxlength="3" style="font-size:24px; color:#6D81F4; text-align:center" autocomplete="off"></td>
      	<td width="50%">&nbsp;</td>                
      </tr>
       <tr class="eiquetas">
      	<td>S&aacute;bados</td>
      	<td width="40%">
          <input name="textfield3" type="text" id="textfield3" size="3" maxlength="3" style="font-size:24px; color:#6D81F4; text-align:center" autocomplete="off"></td>
      	<td width="50%">&nbsp;</td>                
      </tr>
       
      <tr>
        <td height="48">&nbsp;</td>
        <td><input type="text" name="textfield7" id="textfield7"  style="visibility:hidden" ></td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick=" guardar()">&nbsp;</td>
      </tr>
     
    </tbody>
  </table>
  </div>
  <iframe id="detalles2" width="10" height="10" style="visibility:hidden" ></iframe>
  
  <input type="text" name="textfield" id="textfield" style="visibility:hidden">

  <input type="text" name="textfield4" id="textfield4" style="visibility:hidden">
</form>
</body>
</html>