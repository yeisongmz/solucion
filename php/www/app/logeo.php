
<!doctype html>
<html>
<style> 
body {
	background-image: url(images/dinamicgroup-limpieza.jpg);
	background-repeat: no-repeat;
	background-size:100% 100%;
}
body,td,th {
	font-size: medium;
}
</style>
<head>
<script src="js/funciones.js"></script>
<script type="text/javascript">
function enviar()
{
	document.getElementById("form1").submit();
}
</script>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<meta charset="utf-8">
<title>Soluci&oacute;on  GPE - GESTION DE PERSONAL Y EQUIPOS</title>
</head>

<body onLoad="document.getElementById('textfield').focus();">
<form id="form1" name="form1" method="post" action="validacion_usuario.php">

  




  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div class="polaroid">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr></tr>
    </tbody>
    <tbody>
      <tr>
        <td colspan="4" align="right"><img src="images/logo.jpg" width="99" height="33" alt=""/></td>
      </tr>
      <tr>
        <td colspan="4" align="left" ><strong style="color:#A8A4A4; font-family:Arial; font-size:18px;">Iniciar sesión</strong></td>
      </tr>
      <tr>
        <td height="25" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td width="3%" align="left"><input name="textfield" type="text" autofocus id="textfield" placeholder="Usuario" onKeyUp="return tecla(this, event)" autocomplete="off"></td>
        <td width="15%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" align="left"><input name="password" type="password" id="password" placeholder="Contraseña" onKeyUp="return tecla(this, event)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><input name="button" type="button" class="boton2" id="button" onClick="enviar()" value="Iniciar Sesión"></td>
      </tr>
      <tr>
        <td height="68" colspan="3"><hr></td>
      </tr>
    </tbody>
    <tbody>
    </tbody>
    </table>
  </div>
  <p>&nbsp;</p>
</form>
