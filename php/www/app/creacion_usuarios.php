<?php include ("conexion/conectar.php");?>
<?php 
$id='';
$nombre = '';
$apellido = '';
$usuario = '';
$perfil = '';
$obs = '';
$clave_actual='';
$opcion='';
if(isset($_GET['id'])){
	$id = $_GET['id'];	
}
$opc = $_GET['opc'];
$opcion=$opc;



				if ($opc=="M")
				{
					
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM usuarios WHERE id = '".$buscado[0]."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$nombre = $query4['nombre'];
							$apellido = $query4['apellido'];
							$usuario = $query4['username'];
							$perfil = $query4['perfil_id'];
							$obs = $query4['obs'];	
							$clave_actual=$query4['password_2'];						
						}
						
					$query2 = mysql_query("SELECT * FROM perfil order by perfil " );
					
					$query3=mysql_query("SELECT * FROM perfil WHERE id = '".$perfil."' " );
						
						while($query4=mysql_fetch_array($query3))
						{
							$opcion = $query4['perfil'];
							
						}
				}
				else
				{
					$query2 = mysql_query("SELECT * FROM perfil order by perfil " );
						
				}
				

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<script type="text/javascript">
	function guardar()
	{
		if (document.getElementById("textfield5").value=='A')
				{
				if (document.getElementById("textfield").value=='' || document.getElementById("textfield2").value=='' || document.getElementById("textfield3").value=='' || document.getElementById("password").value=='' || document.getElementById("password2").value=='' || document.getElementById("textfield7").value=='' )
				{
					alert('Complete los campos obligatorios para poder guardar');
				}
				else
				{	if (document.getElementById("password").value==document.getElementById("password2").value)
					{
						document.forms["form1"].submit();		
					}
					else
					{
					alert('La clave y su repetición deben ser IGUALES');	
					}
				}
		}
		if (document.getElementById("textfield5").value=='M')
				{
				if (document.getElementById("textfield").value=='' || document.getElementById("textfield2").value=='' || document.getElementById("textfield3").value==''   || document.getElementById("textfield7").value=='' )
				{
					alert('Complete los campos obligatorios para poder guardar');
				}
				else
				{	
				if (document.getElementById("password").value==document.getElementById("password2").value)
					{
						document.forms["form1"].submit();		
					}
					else
					{
					alert('La clave y su repetición deben ser IGUALES');	
					}
				
					
				}
		}
	}
	function nn()
	{

      	var valor = document.form1.select.options[document.form1.select.selectedIndex].text;
	
		if (valor!==0)
		{
	
			document.getElementById("textfield7").value=valor;
		}
		
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_usuarios.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="41" colspan="3" align="center"><span class="titulo2" >Usuarios del sistema</span></td>
      </tr>
      <tr>
        <td width="29%" height="43" class="eiquetas">&nbsp;Nombre*</td>
        <td width="41%"><input name="textfield" type="text" autofocus id="textfield" onKeyUp="return teclaGRAL(this, event,'textfield2')" value="<?php echo $nombre;  ?> " maxlength="50"></td>
        <td width="30%">&nbsp;</td>
      </tr>
      <tr>
        <td width="29%" height="43" class="eiquetas">&nbsp;Apellido*</td>
        <td width="41%"><input name="textfield2" type="text" autofocus id="textfield2" onKeyUp="return teclaGRAL(this, event,'textfield3')" maxlength="50" value="<?php echo $apellido;  ?> "></td>
        <td width="30%">&nbsp;</td>
      </tr>
       <tr>
        <td width="29%" height="43" class="eiquetas">&nbsp;Nombre de Usuario*</td>
        <td width="41%"><input name="textfield3" type="text" autofocus id="textfield3" onKeyUp="return teclaGRAL(this, event,'password')" maxlength="50" value="<?php echo $usuario;  ?> "></td>
        <td width="30%"><input type="text" name="textfield7" id="textfield7" value="<?php echo $perfil;?>" style="visibility:hidden" ></td>
      </tr>
      <tr>
        <td width="29%" height="43" class="eiquetas">&nbsp;Clave actual</td>
        <td width="41%"><input name="textfield20" type="password" autofocus id="textfield20" onKeyUp="return teclaGRAL(this, event,'textfield3')" value="<?php echo $clave_actual;  ?> " maxlength="50" readonly></td>
        <td width="30%">&nbsp;</td>
      </tr>
      <tr>
        <td height="39" class="eiquetas">&nbsp;Clave*</td>
        <td><input name="password" type="password" id="password" onKeyUp="return teclaGRAL(this, event,'password2')" maxlength="50"></td>
        <td><input type="text" name="textfield6" id="textfield6" value="<?php echo $opcion; ?>"  style="visibility:hidden"  ></td>
      </tr>
      <tr>
        <td height="46" class="eiquetas">&nbsp;Repetir Clave*</td>
        <td><input name="password2" type="password" id="password2" onKeyUp="return teclaGRAL(this, event,'select2')" maxlength="50"></td>
        <td><input name="textfield4" type="text" id="textfield4" value="<?php echo $id; ?>"   readonly style="visibility:hidden"></td>
      </tr>
      <tr>
        <td height="41" class="eiquetas">&nbsp;Perfil*</td>
        <td>
        <?php 
			echo '<select name="select" size="1" id="select" onChange="nn()" >';
        echo '<option value="0">Seleccione un Perfil</option>';
			$fila=100;
		 while($query4=mysql_fetch_array($query2))
			{
				$rperfil = $query4['perfil'];
				$perfil_id = $query4['perfil_id'];
			  	echo '<option  value="'.$rperfil.'" >'.$rperfil.'</option>';
				$fila=$fila+1;
				 }
				 echo '</select>';
				  ?>
            </td>
        <td><input name="textfield5" type="text" id="textfield5"  value="<?php echo $opc; ?>" readonly style="visibility:hidden" ></td>
      </tr>
      <tr>
        <td class="eiquetas">&nbsp;Observaci&oacute;n</td>
        <td align="left"><textarea name="textarea" cols="30" rows="4" maxlength="250" id="textarea"><?php echo $obs; ?></textarea></td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="limpiar_textos();guardar()"></td>
      </tr>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<?php
 
  if ($opc=="M"){
	  					
?>
     <script type="text/javascript">
	 	//document.getElementById("password").readOnly = true;
		//document.getElementById("password2").readOnly = true;
		document.getElementById("password").style.backgroundColor = "#9EBE81"
		document.getElementById("password2").style.backgroundColor  ="#9EBE81";
		document.getElementById("textfield20").style.backgroundColor  ="#9EBE81";
		
	 	var a=document.getElementById("select").options.length;
	   	for(i=0; i < a;i++)
		 {
		if (document.getElementById("select").options[i].value == document.getElementById("textfield6").value)
			{
			document.getElementById("select").options[i].selected= true;
			}
		 }

	</script>
						<?php	
						}
	?>