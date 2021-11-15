<?php	session_start();?>
<?php include ("conexion/conectar.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<script type="text/javascript">
	function verif()
	{
		if(document.getElementById("password2").value==document.getElementById("password3").value)
		{
			document.getElementById("form1").submit();	
		}
		else
		{
		alert('La Clave y su Repetición NO COINCIDEN')	
		}
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="cambiocontrasenausuario.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="41" colspan="3" align="center"><span class="titulo2" >Cambio de Contrase&ntilde;a</span></td>
      </tr>
      <tr>
        <td width="31%" height="32" class="eiquetas">&nbsp;Nombre Usuario</td>
        <td width="45%"><input name="textfield" type="text" id="textfield" value="<?php echo $_SESSION["user"];?>" maxlength="50" readonly></td>
        <td width="24%">&nbsp;</td>
      </tr>
      <tr>
        <td height="33" class="eiquetas">&nbsp;Clave Actual</td>
        <td><input name="password" type="password" autofocus id="password" onKeyUp="return teclaGRAL(this, event,'password2')" maxlength="50"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="42" class="eiquetas">&nbsp;Clave Nueva</td>
        <td><input name="password2" type="password" id="password2" maxlength="50" onKeyUp="return teclaGRAL(this, event,'password3')"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="42" class="eiquetas">&nbsp;Repetir Clave</td>
        <td><input name="password3" type="password" id="password3" maxlength="50"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td class="eiquetas">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="verif()"></td>
      </tr>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<?php 
		if(!empty($_POST['textfield']) and !empty($_POST['password']) and !empty($_POST['password2']))
			{
				$valor=$_POST['textfield'];
				$valor2=$_POST['password'];
				$encriptada2=md5($_POST['password2']); 
				$timestamp = date('Y-m-d G:i:s');
				$query2=mysql_query("SELECT id FROM usuarios WHERE username = '".$valor."' and password_2 ='".md5($valor2)."' " );
						
						$ban=0;
						$id='';
						while($query4=mysql_fetch_array($query2))
						{
							$ban=1;	
							$id=$query4['id'];
						}
						
						if($ban==1)
						{
							$query2="update USUARIOS set username='".$valor."',fe_ultmodi='".$timestamp."',password_2='".$encriptada2."' where id='".$id."'";
							
							$resultado = mysql_query($query2);
						}
			}
?>