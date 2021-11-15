<?php session_start();?>
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
	 if(document.getElementById("skills2").value==''  || document.getElementById("textfield").value=='' || document.getElementById("textfield2").value=='' || document.getElementById("textfield3").value=='' || document.getElementById("number").value=='' || document.getElementById("number2").value=='')
	 {
	 	alert('Complete todos los campos ');
	 }
	 else
	 {
			document.getElementById("form1").submit();	 
	 }
 }
	
function calcular_vacaciones()
{
	if (document.getElementById("textfield").value!=='' && document.getElementById("textfield2").value!=='')
	{
	var x1=document.getElementById("textfield").value;
	var x2=document.getElementById("textfield2").value;
	var y1=x1.split("-");
	var y2=x2.split("-");
	var z1=new Date(y1[1]+'/'+y1[0]+'/'+y1[2]);
	var z2=new Date(y2[1]+'/'+y2[0]+'/'+y2[2]);	
	var t2 = z1.getTime();
    var t1 = z2.getTime();
	var re = parseInt((t1-t2)/(24*3600*1000));
	document.getElementById("number").value=re+1;
	}

}



 	

</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="vacaciones.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="42" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2">Vacaciones</span></td>
      </tr>
      <tr>
        <td width="44%">&nbsp;</td>
        <td width="54%">&nbsp;</td>
        <td width="2%">&nbsp;</td>
      </tr>
      <tr>
        <td height="32" class="eiquetas">&nbsp;Personal*</td>
        <td><div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese Nombre ..." size="37" onKeyUp="return teclaGRAL(this, event,'button');" name="skills2"  >
      	</div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29" class="eiquetas">&nbsp;Desde Fecha*</td>
        <td><input name="textfield" type="text" id="textfield" onChange="document.getElementById('button2').focus();" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)" id="button" name="button"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29" class="eiquetas">&nbsp;Hasta Fecha*</td>
        <td><input name="textfield2" type="text" id="textfield2" onChange="document.getElementById('button3').focus(); calcular_vacaciones()" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" id="button2" name="button2"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Fecha Retorno*</td>
        <td><input name="textfield3" type="text" id="textfield3" onChange="document.getElementById('number').focus();" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield3,'dd-mm-yyyy',this)" id="button3" name="button3"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="39" class="eiquetas">&nbsp;Cant.Dias de Vacaciones*</td>
        <td><input name="number" type="text" id="number" onKeyUp="format(this);return teclaGRAL(this, event,'number2');" size="4" readonly style="color:#4D965C; font-size:14px" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="eiquetas">&nbsp;Periodo Correspondiente*</td>
        <td><input name="number2" type="text" id="number2" maxlength="20" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="right"><input name="button4" type="button" class="boton3" id="button4" value="Guardar" onClick="guardar()">&nbsp;</td>
      </tr>
     
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<?php 

if(!empty($_POST["skills2"]) and !empty($_POST["textfield2"]) and !empty($_POST["textfield3"]) and !empty($_POST["textfield"]) and !empty($_POST["number"]) and !empty($_POST["number2"]) )
{
date_default_timezone_set('America/Bahia');	
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills2"]);
$apellidos=$personal[1];
$nombres=$personal[0];
$x=explode("-",$_POST["textfield"]);
$desdefecha=$x[2]."-".$x[1]."-".$x[0];
$x=explode("-",$_POST["textfield2"]);
$hastafecha=$x[2]."-".$x[1]."-".$x[0];
$x=explode("-",$_POST["textfield3"]);
$retorno=$x[2]."-".$x[1]."-".$x[0];
$dias = $_POST["number"];
$periodo= $_POST["number2"];
$personal_id='';
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d G:i:s');	
$ban=0;
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
$query3="insert into vacaciones(personal_id,desdefecha,hastafecha,fecharetorno,cant_dias,periodo,creador,fe_ultmodi) values('".$personal_id."','".$desdefecha."','".$hastafecha."','".$retorno."','".$dias."','".$periodo."','".$creador."','".$fe_ultmodi."')";
}
//echo $query3;
		$resultado = mysql_query($query3);

}
?>