<?php 
if(!empty($_REQUEST['submit']))
{
	
	include ("conexion/conectar.php");
	$aux= ($_POST['textfield4']/26)/8;
	$query3="update personal set jornalxhora='".intval($aux)."',sueldoreal='".$_POST['textfield4']."' where  sueldoreal='".$_POST['textfield3']."'";
	if(intval($aux)>0)
	{
	$resultado = mysql_query($query3);
	}
								
	echo "El salario para todos los que ganaban: ".$_POST['textfield3']." ahora es de : ".$_POST['textfield4']; 
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
<form id="form1" name="form1" method="post" action="ajusta_salarios.php">
  <table width="50%" border="0" cellpadding="4" cellspacing="0">
    <tbody>
      <tr bgcolor="#6E5B5B" style="color: #F9F008; font-weight: bold;" >
        <td height="54" colspan="2" align="center">Ajuste de salarios (y jornal)</td>
      </tr>
     
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Salario REAL ANTERIOR</td>
        <td>
        <input name="textfield3" type="text" id="textfield3" value="0"></td>
      </tr>
      <tr>
        <td>Salario REAL NUEVO</td>
        <td>
        <input name="textfield4" type="text" id="textfield4" value="0"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td align="center"><input type="submit" name="submit" id="submit" value="Guardar"></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>