﻿<?php session_start();
date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Descuentos</title>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript">
 $(function() 
 {$("#skills3").autocomplete({source:"search_general.php?v=CONCEPTOSC",autoFocus:true});});
 
 $(function() 
 {$("#skills2").autocomplete({source:"search_general.php?v=PERSONAL",autoFocus:true});});
 

 
 function guardar()
 {
	 if(document.getElementById("skills2").value=='' || document.getElementById("skills3").value=='' || document.getElementById("number").value=='' )
	 {
	 	alert('Complete todos los campos ');
	 }
	 else
	 {
			document.getElementById("form1").submit();	 
	 }
 }
	




 	

</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="descuentos.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="44" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2" >Descuentos al Personal</span></td>
      </tr>
      <tr>
        <td width="22%">&nbsp;</td>
        <td width="50%">&nbsp;</td>
        <td width="28%">&nbsp;</td>
      </tr>
      <tr>
        <td height="48" class="eiquetas">&nbsp;Personal*</td>
        <td>&nbsp;<div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese Nombre..." size="37" name="skills2" onKeyUp="return teclaGRAL(this, event,'skills3');"  >
      	</div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29" class="eiquetas">&nbsp;Concepto*</td>
        <td><input autofocus id="skills3" placeholder="Ingrese Concepto..." size="37" name="skills3" onKeyUp="return teclaGRAL(this, event,'number');"  ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28" class="eiquetas">&nbsp;Fecha</td>
        <td><input name="textfield" type="text" id="textfield" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28" class="eiquetas">&nbsp;Importe*</td>
        <td><input type="text" name="number" id="number" onKeyUp="format(this);return teclaGRAL(this, event,'textarea');" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="eiquetas">&nbsp;Observaci&oacute;n</td>
        <td><textarea name="textarea" cols="30" rows="6" id="textarea"></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="guardar()" >&nbsp;</td>
      </tr>
     
      
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<?php 

if(!empty($_POST["skills2"]) and !empty($_POST["skills3"]) and !empty($_POST["number"])  )
{
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills2"]);
$apellidos=$personal[1];
$nombres=$personal[0];
$concepto= $_POST["skills3"];
$importe=str_replace(".","",$_POST["number"]);
$x=explode("-",$_POST["textfield"]);
$fecha=$x[2]."-".$x[1]."-".$x[0];
$ban=0;
$obs=$_POST["textarea"];
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d G:i:s');	
$query2="select id from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;

					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
						$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$personal_id = $query4['id'];
						}
$query2="select id from conceptos where concepto='".$concepto."' " ;
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
						$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$concepto_id = $query4['id'];
						}	
if(abs($importe)<=0)
{
	$ban=1;	
}
						
if($ban==0)
{
$query3="insert into  descuentos(Conceptos_id,personal_id,fecha,importe,obs,concepto,creador,fe_ultmodi) values('".$concepto_id."','".$personal_id."','".$fecha."','".$importe."','".$obs."','".$concepto."','".$creador."','".$fe_ultmodi."')";

		$resultado = mysql_query($query3);
}
else
{
 echo "<script type='text/ecmascript'>alert('La cantidad debe ser mayor a 0 (cero).');</script>";	
}
mysql_close($con);
}
?>