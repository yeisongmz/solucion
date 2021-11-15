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
<form id="form1" name="form1" method="post">
<div class="polaroid5">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="42" colspan="3" align="center" class="fondo_encabezado">&nbsp;<span class="titulo2">Adelantos al Personal</span></td>
      </tr>
      <tr>
        <td width="10%" height="36" class="eiquetas">&nbsp;Personal&nbsp;</td>
        <td width="59%">&nbsp;<div class="ui-widget">
  			<input autofocus id="skills2" name="skills2" placeholder="Ingrese Nombre..." size="37" onKeyUp="return teclaGRAL(this, event,'number');"  >
      	</div></td>
        <td width="31%">&nbsp;</td>
      </tr>
      <tr>
        <td height="36" class="eiquetas">&nbsp;Importe</td>
        <td>&nbsp;<input type="text" name="number" id="number" onKeyUp="format(this);return teclaGRAL(this, event,'textarea');" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="80" class="eiquetas">&nbsp;Obs.:</td>
        <td>&nbsp;<textarea name="textarea" cols="30" rows="4" id="textarea"></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31" class="eiquetas">&nbsp;Fecha</td>
        <td>&nbsp;<input type="text" name="textfield" id="textfield" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="guardar()">&nbsp;</td>
      </tr>
     
    </tbody>
  </table>
 

 </div>
 </form>
</body>
</html>
<?php
if(!empty($_POST["skills2"])  and !empty($_POST["number"]) and !empty($_POST["textfield"]) and !empty($_POST["textarea"])  )
{
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills2"]);
$apellidos=$personal[1];
$nombres=$personal[0];
$obs=$_POST["textarea"];
$ban=0;
$x=explode("-",$_POST["textfield"]);
$fecha=$x[2]."-".$x[1]."-".$x[0];
$personal_id='';
$creador = $_SESSION["user"];	
$importe=str_replace(".","",$_POST["number"]);			
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
										
if($ban==0)						
{
$query3="insert into adelantos(personal_id,importe,obs,fecha,creador,fe_ultmodi) values('".$personal_id."','".$importe."','".$obs."','".$fecha."','".$creador."','".$fe_ultmodi."')";

		$resultado = mysql_query($query3);
}
mysql_close($con);

}
?>