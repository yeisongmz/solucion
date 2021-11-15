<?php include ("conexion/conectar.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">


<script src="js/funciones.js"></script>
<?php 
$opc = $_GET['opc'];

$razon='';
$obs ='';
$tipo='';
				if ($opc=="M")
				{
					$id = $_GET['id'];
					$buscado= explode('--',$id);
					$query2=mysql_query("SELECT * FROM conceptos WHERE id = '".$buscado[0]."' " );
						while($query4=mysql_fetch_array($query2))
						{
							$razon = $query4['concepto'];
							$obs = $query4['obs'];
							$tipo = $query4['tipo'];
						}
				}
?>						
</head>
<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_conceptos.php">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="50" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2" >Conceptos para Descuentos y Bonificaciones</span></td>
      </tr>
      <tr>
        <td height="38" class="eiquetas">Concepto</td>
        <td colspan="2"><input name="textfield" type="text" autofocus id="textfield" maxlength="100" onKeyUp="return tecla4(this, event)" value="<?php echo $razon; ?>" autocomplete="off"></td>
      </tr>
      <tr>
      <tr>
        <td height="45" class="eiquetas">Observaci&oacute;n</td>
        <td colspan="2"><textarea name="textarea" cols="30" rows="4" maxlength="250" id="textarea"><?php echo $obs; ?></textarea></td>
      </tr>
      <tr>
        <td height="36" class="eiquetas">Tipo</td>
        <td colspan="2"><select name="select" id="select" onChange=" nn()"   >
          <option   value="Bonif" id="0" >Bonif</option>
          <option  value="Desc" id="1" >Desc</option>
        </select></td>
      </tr>
      <tr>
        <td height="36" colspan="3" align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="validar_campos_cargo('<?php echo $opc; ?>')">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>
    <input type="text" name="textfield2" id="textfield2" readonly value="<?php echo $opc; ?>" style="visibility:hidden">
    <input name="textfield3" type="text" id="textfield3" value="<?php echo $buscado[0]; ?>" readonly style="visibility:hidden" >
  </p>
  </div>
 </form>
</body>
</html>
 <?php
 
  if($tipo=='Bonif'){
							 ?>
                        <script type="text/javascript">
							document.getElementById("select").options[0].selected= true;
						</script>
						<?php	
						}
	 if($tipo=='Desc')
						{
						?>
                        <script type="text/javascript">
							document.getElementById("select").options[1].selected= true;
						</script>
                        <?php	
						}
						
				
				

 ?>