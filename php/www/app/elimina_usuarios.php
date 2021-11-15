<?php include ("conexion/conectar.php");?>
<?php header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 ?>
<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<form id="form1" name="form1" method="post"  action="elimina_usuarios2.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="40" colspan="3" align="center"><span class="titulo2" >Eliminación de Usuarios del Sistema</span></td>
      </tr>
      <tr>
        <td width="26%">&nbsp;</td>
        <td width="15%">&nbsp;</td>
        <td width="59%">&nbsp;</td>
      </tr>
      <tr>
        <td>Seleccionar Usuario</td>
        <td colspan="2"><?php 
			 $query2="SELECT usuario FROM usuarios order by usuario";
			 $resultado = mysql_query($query2);
			 if ($resultado)
			 ?>
          <select name="select" size="1" autofocus id="select" onChange="seleccion2()">
         <?php
				 while($renglon = mysql_fetch_array($resultado))
				 {
	 				$valor=$renglon['usuario']
	 		?>
          <OPTION onClick="alert();"    >
          <?php
		  echo $valor;
		  }
		  ?>
          </OPTION>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="textfield" id="textfield" readonly style="visibility:hidden"></td>
        <td align="right">&nbsp;</td>
        <td align="center"><input name="button" type="button" class="boton3" id="button" onClick="enviar2()" value="Eliminar"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
   
  </table>
  </div>
</form>
</body>
</html>

