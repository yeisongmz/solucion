<?php 
if(!empty($_REQUEST['submit']))
{
	
	include ("conexion/conectar.php");
	
	$query3="update personal set importeIPS='".$_POST['textfield2']."' where  importeIPS='".$_POST['textfield']."'";
	
	$resultado = mysql_query($query3);
	
								
	echo "El salario  IPS de todos los que ganaban: ".$_POST['textfield']." ahora es de : ".$_POST['textfield2']; 
	mysql_close($con);
	exit();
	
}



?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="50%" border="0" cellpadding="4" cellspacing="0">
    <tbody>
      <tr bgcolor="#F57C04" style="color: #F9F008; font-weight: bold;" >
        <td height="54" colspan="6" align="center">Ajuste de IPS</td>
      </tr>
      <tr>
        <td width="44%">Salario IPS ANTERIOR</td>
        <td width="39%">
        <input name="textfield" type="text" autofocus="autofocus" id="textfield" value="0"></td>
        <td width="4%">&nbsp;</td>
        <td width="4%">&nbsp;</td>
        <td width="4%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
      </tr>
      <tr>
        <td>Salario IPS NUEVO</td>
        <td>
        <input name="textfield2" type="text" id="textfield2" value="0"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="Guardar"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>