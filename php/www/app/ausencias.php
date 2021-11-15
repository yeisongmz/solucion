<?php session_start();
date_default_timezone_set('America/Bahia');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript">

 $(function() 
 {$("#skills2").autocomplete({source:"search_general.php?v=PERSONAL",autoFocus:true});});
 
 
 function guardar()
 {
	 if(document.getElementById("skills2").value==''  || document.getElementById("textfield").value=='' || document.getElementById("textarea").value=='' )
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
<form id="form1" name="form1" method="post" action="ausencias.php">
<div class="polaroid5">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr>
      <td height="50" colspan="2" align="center" class="fondo_encabezado"><span class="titulo2" >Ausencias de Personal</span></td>
    </tr>
    <tr>
      <td width="12%" height="32" class="eiquetas">Personal</td>
      <td width="88%">&nbsp;<div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese Nombre ..." size="37" name="skills2" onKeyUp="return teclaGRAL(this, event,'button');" >
      	</div></td>
    </tr>
    <tr>
      <td height="47" class="eiquetas">Fecha</td>
      <td><input name="textfield2" type="text" id="textfield2" value="<?php echo date("d-m-Y"); ?>" readonly onChange="document.getElementById('textarea').focus();"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" id="button"></td>
    </tr>
    <tr>
      <td height="90" class="eiquetas">Motivo</td>
      <td><textarea name="textarea" cols="40" rows="4" id="textarea"></textarea></td>
    </tr>
    <tr>
      <td height="34" class="eiquetas">Tipo</td>
      <td><select name="select" id="select" onChange="document.getElementById('textfield').focus();">
        <option value="Justificada">Justificada</option>
        <option value="Injustificada">Injustificada</option>
      </select></td>
    </tr>
    <tr>
      <td height="34" class="eiquetas">Cantidad de Horas</td>
      <td><input name="textfield" type="text" id="textfield" maxlength="10"  autocomplete="off"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Guardar" onClick="guardar()">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  </tbody>
</table>
</div>
</form>
</body>
</html>
<?php
if(!empty($_POST["skills2"])  and !empty($_POST["textfield2"]) and !empty($_POST["textfield"]) and !empty($_POST["textarea"])  )
{
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills2"]);
$apellidos=$personal[1];
$nombres=$personal[0];
$horas=$_POST["textfield"];
$motivo=$_POST["textarea"];
$tipo=$_POST["select"];
$x=explode("-",$_POST["textfield2"]);
$fecha=$x[2]."-".$x[1]."-".$x[0];
$personal_id='';
$creador = $_SESSION["user"];	
$ban=0;			
$fe_ultmodi = date('Y-m-d G:i:s');	
$query2="select id from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;
//echo $query2;
					$res=mysql_query($query2,$con);
					if(mysql_num_rows($res)==0)
					{
						$ban=1;	
					}
					while($query4 = mysql_fetch_array($res) )
						{
							$personal_id = $query4['id'];
						}
										
						
if($ban==0)
{
$query3="insert into ausencias(personal_id,fecha,motivo,tipo,cant_horas,creador,fe_ultmodi) values('".$personal_id."','".$fecha."','".$motivo."','".$tipo."','".$horas."','".$creador."','".$fe_ultmodi."')";
//echo $query3;
		$resultado = mysql_query($query3);
}
		mysql_close($con);

}
?>