<?php include ("conexion/conectar.php");?>
<?php 
	 $query2="SELECT usuario FROM usuarios order by usuario";
	 $resultado = mysql_query($query2);
	
?>

<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/funciones.js"></script>

<meta charset="utf-8">
<title>Documento sin título</title>

</head>

<body >
<form id="form1" name="form1" method="post" action="usuariosNO_SE_USA.php">
  <table width="597" border="1" align="center" cellpadding="0" cellspacing="0" rules="cols" bgcolor="#B2A4F7">
    <tbody>
      <tr bgcolor="#0E036B">
        <td colspan="3" align="center" ><strong style="color:rgba(244,241,241,1.00)">Administración de Usuarios</strong></td>
      </tr>
      <tr>
        <td id="12"><label for="select">Usuario:</label>
        <?php 
			 if ($resultado)
			 ?>
               <select name="select" id="select" style="width: 100px;"  onChange="seleccion()"   >
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
        </select>
        <?php  
		
		//mysql_close($con);
		 ?>
        </td>
        <td><input type="button" name="button" id="button" value="Eliminar Usuario" onClick="enviar()" style="visibility:hidden"></td>
        <td><input type="button" name="button2" id="button2" value="Agregar Nuevo Usuario" onClick="ver();document.getElementById('button').style.visibility='hidden';document.getElementById(12).style.visibility='hidden';document.getElementById('button3').style.visibility='visible';		document.getElementById('textfield').readOnly=false;document.getElementById('textfield').focus();"></td>
      </tr>
      <tr  >
        <td height="42" id="1" style="visibility:hidden">Nombre Usuario</td>
        <td id="2" style="visibility:hidden"><input type="text" name="textfield" id="textfield" onKeyUp="return tecla2(this, event)"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr >
        <td height="40" id="3" style="visibility:hidden">Clave</td>
        <td id="4" style="visibility:hidden"><label for="password"></label>
        <input type="password" name="password" id="password" onKeyUp="return tecla2(this, event)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr  >
        <td height="40" id="5" style="visibility:hidden">Repetir Clave</td>
        <td id="6" style="visibility:hidden"><label for="password2"></label>
        <input type="password" name="password2" id="password2" onKeyUp="return tecla2(this, event)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr  >
        <td id="7" style="visibility:hidden">Perfil</td>
        <td id="8" style="visibility:hidden"><p>
            <label for="select2">Select:</label>
            <select name="select2" size="1" id="select2" onChange="seleccion2()">
              <option onClick="alert();">Perfil1</option>
              <option>Perfil 2</option>
              <option>Perfil 3</option>
              <option>Perfil 4</option>
              <option>Perfil n</option>
            </select>
           
        </p>          <label for="select2"></label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="textfield2" type="text" id="textfield2" value="1" style="visibility:hidden"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr id="5">
        <td>&nbsp;</td>
        <td><input type="button" name="button3" id="button3" value="Guardar" onClick="enviar()" style="visibility:hidden"></td>
        <td><input type="button" name="button4" id="button4" value="Cerrar" onClick="cerrar()">
         
        </td>
      </tr>
    </tbody>
  </table><label></label>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php 
		if(!empty($_POST['textfield']) and !empty($_POST['password']) and !empty($_POST['password2']))
			{
				$valor=$_POST['textfield'];
				$valor2=$_POST['textfield2'];
				
				
				$query2="delete  FROM usuarios where usuario='".$valor."'";
				//$resultado = mysql_query($query2);
				
				$encriptada2=md5($_POST['password']); 
				
				
				$query2="INSERT INTO USUARIOS(USUARIO,CLAVE,NIVEL)  VALUES('".$valor."','".$encriptada2."','".$valor2."')";
				$resultado = mysql_query($query2);
				?>
                <script type="text/javascript">
					document.getElementById(textfield).value='';
					document.getElementById(textfield2).value='';
					document.getElementById(password).value='';
					document.getElementById(password2).value=''
				</script>
                <?
			}
			//   *********   ELIMINACION    **************
			
			if(!empty($_POST['textfield']) and empty($_POST['password']) and empty($_POST['password2']))
			{
				$valor=$_POST['textfield'];
				$valor2=$_POST['textfield2'];
				
				
				$query2="delete  FROM usuarios where usuario='".$valor."'";
				$resultado = mysql_query($query2);
				
				
				
				
				?>
                <script type="text/javascript">
					document.getElementById(textfield).value='';
					document.getElementById(textfield2).value='';
					document.getElementById(password).value='';
					document.getElementById(password2).value=''
				</script>
                <?php 	} ?>