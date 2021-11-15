<?php include ("conexion/conectar.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<?php 
$opc = $_GET['opc'];
$id='';
if(isset($_GET['id']))
{
$id = $_GET['id'];
}
$razon='';
$dir='';
$tel='';
$contacto='';
$email='';



				if ($opc=="M")
				{
					
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM banco_sueldo WHERE id = '".$buscado[0]."' " );
						
						while($query4=mysql_fetch_array($query2))
						{
							$razon = $query4['razon'];
							$dir = $query4['direccion'];
							$tel = $query4['telefono'];
							$contacto = $query4['contacto'];
							$email = $query4['email'];							
						}
				
				}

 ?>
</head>

<body >
<form id="form1" name="form1" method="post" action="guarda_elimina_bancos.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="38" colspan="2" align="center"><span class="titulo2" >&nbsp;Bancos</span></td>
      </tr>
      <tr class="eiquetas">
        <td width="20%" height="58" class="eiquetas">&nbsp;Razón*</td>
        <td width="80%"><input name="textfield" type="text" autofocus id="textfield" onKeyUp="return tecla3(this, event)" value="<?php echo $razon;  ?> " maxlength="40" autocomplete="off"></td>
      </tr>
      <tr class="eiquetas">
        <td height="31">Direcci&oacute;n*</td>
        <td><input name="textfield2" type="text" id="textfield2" onKeyUp="return tecla3(this, event)" value="<?php echo $dir;  ?>" maxlength="40" autocomplete="off"></td>
      </tr >
       <tr class="eiquetas">
        <td height="30">Tel&eacute;fono*&nbsp;</td>
        <td><input name="number" type="text"  id="number"  onKeyUp="return tecla3(this, event)" value="<?php echo $tel;  ?>" maxlength="20" autocomplete="off"></td>
      </tr>
       <tr class="eiquetas" >
        <td height="35">Contacto&nbsp;</td>
        <td><input name="textfield3" type="text" id="textfield3" onKeyUp="return tecla3(this, event)" value="<?php echo $contacto;  ?>" maxlength="40" autocomplete="off"></td>
      </tr>
       <tr class="eiquetas">
        <td height="35">Email&nbsp;</td>
        <td><input name="textfield4" type="text" id="textfield4" onKeyUp="return tecla3(this, event)" value="<?php echo $email;  ?>" maxlength="60" autocomplete="off"></td>
      </tr>
      <tr>
        <td height="36" colspan="2" align="right"><input name="textfield6" type="text" id="textfield6"  value="<?php echo $buscado[0]; ?>" readonly style="visibility:hidden">
          <input name="textfield5" type="text" id="textfield5" readonly value="<?php echo $opc; ?>" style="visibility:hidden;">
          <input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="validar_campos_banco('<?php echo $opc; ?>')" >&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
  <?php 
				if ($opc=="M")
				{
					?>
                    <script type="text/javascript">
					  // document.getElementById('textfield').readOnly = true;
	
					</script>
                    
                    
					
				<?php	
				}

 ?>
</form>
</body>
</html>
