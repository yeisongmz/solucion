<?php session_start();
date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<title>ENCABEZADO FIJO</title>
<style type="text/css">
body {
	background-color: #FDFBFB;	
}
</style>
<script type="text/javascript">
	function cierre()
	{
		
		window.open("cierresesion.php");
	}
	function abrir()
	{
		window.open("cambiocontrasenausuario.php","marcoprincipal");
	}
	function acerca()
	{
		window.open("acerca.html","marcoprincipal");
	}
</script>

</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid4" >
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="tabla1" >
      <tr>
        <td width="28%" height="55" rowspan="2" style="background-image: url(images/logo2.png); background-repeat:no-repeat; background-size:contain">&nbsp;</td>
        <td colspan="5" align="right" valign="top"><input name="button" type="button" class="boton4" id="button" value="Usuario: <?php echo $_SESSION["user"]; ?>">&nbsp;<input name="button" type="button" class="boton4" id="button" value="Cambio de Contraseña" onClick=" abrir()">&nbsp;<input name="button" type="button" class="boton4" id="button" value="Cerrar Sesión" onClick="window.parent.location.href ='cierresesion.php';"  >&nbsp;<input name="button" type="button" class="boton4" id="button" value="Acerca de" onClick="acerca();"></td>
      </tr>
      <tr>
        <td colspan="5" align="right" valign="top"><span class="eiquetas2">
          <input name="fecha" type="text" id="fecha" value="<?php echo date("d-m-Y"); ?>" size="10" readonly style="border:none; text-align:right; font-size:12px" />
        </span></td>
      </tr>
      
      <tr>
        <td colspan="5" rowspan="2"><strong style=" font:Arial; font-size:24px">GPE - GESTION DE PERSONAL &amp; EQUIPOS</strong>
         </td>
        <td colspan="2" align="right" class="eiquetas">&nbsp;<img src="images/valurqico.png" width="30" height="30" alt=""/>&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="right" class="eiquetas">2016&nbsp;&nbsp;</td>
      </tr>
     
   
  </table>
  </div>
</form>
</body>
</html>