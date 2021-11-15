<?php include ("conexion/conectar.php");?>
<?php

$query2="SELECT * FROM parametros";
$patronal_mt='';
$patronal_ips='';
$cliente='';
$ruc='';
$direccion='';
$telefono='';
$smtp='';
$puerto='';
$usuario='';
$clave='';
$dir_smtp='';
$seguridad='';
$autenticacion='';
$cantidad='1';
$id='';
$inicio='';
$fin='';
$costo='';
$aux='';
$aux2=array();
	$res=mysql_query($query2,$con);

 if(mysql_num_rows($res)>0){
	 while($fila=mysql_fetch_array($res))
		 {
				
				$patronal_mt = $fila['nropatronal_mt'];
				$patronal_ips= $fila['nropatronal_ips'];
				$cliente= $fila['cliente'];
				$ruc= $fila['RUC'];
				$direccion= $fila['direccion'];
				$telefono= $fila['telefono'];
				$smtp= $fila['smtp_server'];
				$puerto= $fila['smtp_puerto'];
				$usuario= $fila['smtp_user'];
				$clave= $fila['smtp_pass'];
				$dir_smtp= $fila['smtp_from'];
				$seguridad= $fila['smtp_ssl'];
				$autenticacion= $fila['smtp_autent'];
				$cantidad= $fila['cant_dias'];
				$id= $fila['id'];
				//echo $fila['inicio_nocturno'];
				$aux= $fila['inicio_nocturno'];
				$aux2=explode( ":", $aux);
				if(count($aux2)>1)
				{
					$inicio= $aux2[0];
				}
				else
				{
					$inicio= $fila['inicio_nocturno'];
				}
				$aux= $fila['fin_nocturno'];
				$aux2=explode( ":", $aux);
				if(count($aux2)>1)
				{
					$fin= $aux2[0];
				}
				else
				{
					$fin= $fila['fin_nocturno'];
				}	
				//$aux=explode(":",$fila['fin_nocturno']);
				//$fin=$aux(0);
				$costo=$fila['pago_nocturno'];
				
		 }
    mysql_free_result($res);
 }
 
//mysql_close($con);
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
	document.getElementById("form1").submit();
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="parametros.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="45" colspan="2" align="center" class="fondo_encabezado"><span class="titulo2">Parámetros</span></td>
      </tr>
      <tr>
        <td width="26%" height="35" class="eiquetas">&nbsp;Nº Patronal (MJT)*:</td>
        <td width="74%"><input name="number" type="text" autofocus id="number" maxlength="10" onKeyUp="return teclaGRAL (this, event,'number2') " value="<?php echo $patronal_mt;?>" autocomplete="off">
          <input name="textfield13" type="text" id="textfield13" readonly value="<?php echo $id;?>" style="visibility:hidden"></td>
      </tr>
      <tr>
        <td height="35"class="eiquetas">&nbsp;Nº Patronal (IPS)*:</td>
        <td><input name="number2" type="text" id="number2" maxlength="10" onKeyUp="return teclaGRAL (this, event,'textfield') " value="<?php echo $patronal_ips;?>" autocomplete="off"></td>
      </tr>
      <tr>
        <td height="35" class="eiquetas">&nbsp;Razón</td>
        <td><input name="textfield" type="text" id="textfield" maxlength="100" onKeyUp="return teclaGRAL (this, event,'textfield2') " value="<?php echo $cliente;?>" autocomplete="off"></td>
      </tr>
      <tr>
        <td height="35" class="eiquetas">&nbsp;R.U.C.</td>
        <td><input name="textfield2" type="text" id="textfield2" maxlength="100" onKeyUp="return teclaGRAL (this, event,'textfield3') " value="<?php echo $ruc;?>" autocomplete="off"></td>
      </tr>
      <tr>
        <td height="35" class="eiquetas">&nbsp;Dirección</td>
        <td><input name="textfield3" type="text" id="textfield3" maxlength="100" onKeyUp="return teclaGRAL (this, event,'textfield4') " value="<?php echo $direccion;?>" autocomplete="off"></td>
      </tr>
      <tr>
        <td height="35" class="eiquetas">&nbsp;Teléfono</td>
        <td><input name="textfield4" type="text" id="textfield4" onKeyUp="return teclaGRAL (this, event,'textfield5') " maxlength="100" value="<?php echo $telefono;?>" autocomplete="off"></td>
      </tr>
      <tr>
        <td height="35" class="eiquetas">&nbsp;Servidor Smtp</td>
        <td><input name="textfield5" type="text" id="textfield5" maxlength="50" onKeyUp="return teclaGRAL (this, event,'textfield6') " value="<?php echo $smtp;?>" autocomplete="off"></td>
      </tr>
     
      <tr class="eiquetas">
        <td>Puerto Smtp</td>
        <td height="35"><input name="textfield6" type="text" id="textfield6" maxlength="20" onKeyUp="return teclaGRAL (this, event,'textfield7') " value="<?php echo $puerto;?>" autocomplete="off"></td>
      </tr>
      <tr class="eiquetas">
        <td>Usuario Smtp</td>
        <td height="35"><input name="textfield7" type="text" id="textfield7" maxlength="30" onKeyUp="return teclaGRAL (this, event,'textfield8') " value="<?php echo $usuario;?>" autocomplete="off"></td>
      </tr>
      <tr class="eiquetas">
        <td height="35">Clave Smtp</td>
        <td>
          <input name="textfield8" type="text" id="textfield8" maxlength="30" onKeyUp="return teclaGRAL (this, event,'textfield9') " value="<?php echo $clave;?>" autocomplete="off"></td>
      </tr>
      <tr>
      <tr class="eiquetas">
        <td height="35">Dirección Smtp</td>
        <td>
          <input name="textfield9" type="text" id="textfield9" maxlength="30" onKeyUp="return teclaGRAL (this, event,'textfield10') " value="<?php echo $dir_smtp;?>" autocomplete="off"></td>
      </tr>
      <tr class="eiquetas">
        <td height="35">Ssl </td>
        <td>
          <input name="textfield10" type="text" id="textfield10" maxlength="2" onKeyUp="return teclaGRAL (this, event,'textfield11') " value="<?php echo $seguridad;?>" autocomplete="off"></td>
      </tr>
      <tr class="eiquetas">
        <td height="35">Autenticación</td>
        <td>
          <input name="textfield11" type="text" id="textfield11" maxlength="2" onKeyUp="return teclaGRAL (this, event,'textfield12') " value="<?php echo $autenticacion;?>" autocomplete="off"></td>
      </tr>
      <tr class="eiquetas">
      <tr>
        <td height="35">Días (para alertas)</td>
        <td>
          <input type="text" name="textfield12" id="textfield12" onKeyUp="return teclaGRAL (this, event,'textfield14');format(this);" value="<?php echo $cantidad;?>" autocomplete="off" ></td>
      </tr>
      <tr>
      <tr  class="eiquetas">
        <td height="44">Inicio horario nocturno&nbsp;</td>
        <td>
          <input name="textfield14" type="text" id="textfield14" onKeyUp="format(this);return teclaGRAL (this, event,'textfield15');" maxlength="2" autocomplete="off" value="<?php echo $inicio;?>"></td>
      </tr>
      <tr>
    <tr  class="eiquetas">
        <td height="42">Fin horario nocturno&nbsp;</td>
        <td>
          <input name="textfield15" type="text" id="textfield15" onKeyUp="format(this);return teclaGRAL (this, event,'textfield16');" maxlength="2" autocomplete="off" value="<?php echo $fin;?>"></td>
      </tr>
      <tr>
    <tr  class="eiquetas">
        <td height="44">Pago por horario noctrno&nbsp;</td>
        <td>
          <input name="textfield16" type="text" id="textfield16" onKeyUp="format(this);return teclaGRAL (this, event,'button');" maxlength="7" autocomplete="off" value="<?php echo $costo;?>"></td>
      </tr>
      <tr>
    <tr  class="eiquetas">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>      
      
        <td height="37" colspan="2" align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="guardar();">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<?php 
if(isset($_POST["textfield13"]))
{
	if(empty($_POST["textfield13"])){
				$patronal_mt = $_POST["number"];
				$patronal_ips= $_POST["number2"];
				$cliente= $_POST["textfield"];
				$ruc= $_POST["textfield2"];
				$direccion= $_POST["textfield3"];
				$telefono= $_POST["textfield4"];
				$smtp= $_POST["textfield5"];
				$puerto= $_POST["textfield6"];
				$usuario= $_POST["textfield7"];
				$clave= $_POST["textfield8"];
				$dir_smtp= $_POST["textfield9"];
				$seguridad= $_POST["textfield10"];
				$autenticacion= $_POST["textfield11"];
				$cantidad= $_POST["textfield12"];
				$aux=explode(":",$_POST["textfield14"]);
				if(count($aux)>1)
				{
					$inicio= $aux(0);
				}
				else
				{
				$inicio= $_POST["textfield14"];
				}
				$aux=explode(":",$_POST["textfield15"]);
				if(count($aux)>1)
				{
					$fin= $aux(0);
				}
				else
				{
					$fin=$_POST["textfield15"];
				}
				$costo= str_replace(".","",$_POST["textfield16"]);
				$query2="INSERT INTO parametros(nropatronal_mt,nropatronal_ips,cliente,RUC,direccion,telefono,smtp_server,smtp_puerto,smtp_user,smtp_pass,smtp_ssl,smtp_autent,cant_dias,inicio_nocturno,fin_nocturno,pago_nocturno)  VALUES('".$patronal_mt."','".$patronal_ips."','".$cliente."','".$ruc."','".$direccion."','".$telefono."','".$smtp."','".$puerto."','".$usuario."','".$clave."','".$seguridad."','".$autenticacion."','".$cantidad."','".$inicio.":00','".$fin.":00','".$costo."')";
					//echo $query2;
					$resultado = mysql_query($query2);
				
	}
	else
	{
				$patronal_mt = $_POST["number"];
				$patronal_ips= $_POST["number2"];
				$cliente= $_POST["textfield"];
				$ruc= $_POST["textfield2"];
				$direccion= $_POST["textfield3"];
				$telefono= $_POST["textfield4"];
				$smtp= $_POST["textfield5"];
				$puerto= $_POST["textfield6"];
				$usuario= $_POST["textfield7"];
				$clave= $_POST["textfield8"];
				$dir_smtp= $_POST["textfield9"];
				$seguridad= $_POST["textfield10"];
				$autenticacion= $_POST["textfield11"];
				$cantidad= $_POST["textfield12"];
				$aux=explode(":",$_POST["textfield14"]);
				if(count($aux)>1)
				{
					$inicio= $aux(0);
				}
				else
				{
				$inicio= $_POST["textfield14"];
				}
				$aux=explode(":",$_POST["textfield15"]);
				if(count($aux)>1)
				{
					$fin= $aux(0);
				}
				else
				{
					$fin=$_POST["textfield15"];
				}
				$costo= str_replace(".","",$_POST["textfield16"]);
				$query2="update parametros set nropatronal_mt='".$patronal_mt."',nropatronal_ips='".$patronal_ips."',cliente='".$cliente."',RUC='".$ruc."',direccion='".$direccion."',telefono='".$telefono."',smtp_server='".$smtp."',smtp_puerto='".$puerto."',smtp_user='".$usuario."',smtp_pass='".$clave."',smtp_ssl='".$seguridad."',smtp_autent='".$autenticacion."',cant_dias='".$cantidad."',inicio_nocturno='".$inicio.":00',fin_nocturno='".$fin.":00',pago_nocturno='".$costo."'";
				//echo $query2;
				$resultado = mysql_query($query2);
				//echo mysql_affected_rows();
				if(mysql_affected_rows() > 0)
					{	
								echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>'; 
					}
					

				
				
				
				
	}
	


mysql_close($con);	
}





?>