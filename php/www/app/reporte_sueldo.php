<?php 
//
//   INTERFASE PARA SOLICITUD DE PARAMETROS Y GENERACION DE INFORMES
//   MEDIANTE LLAMADO A SP EN LA BASE DE DATOS.
//

include ("conexion/conectar.php");
$host= $_SERVER["HTTP_HOST"];
$apellidos='';
$opc='';
if(isset($_GET['opc']) and !empty($_GET['opc']))
{
	$opc=$_GET['opc'];
}
 // $query2=mysql_query("SELECT banco_ctas.*,banco.`nombre` FROM banco_ctas,banco  WHERE banco_ctas.`banco_id`=banco.`id` ");

						$apellidos = "";
$host= $_SERVER["HTTP_HOST"];						
$ruta='';

	$ruta='http://localhost:8080';
?>

<!doctype html>
<html>
<head>

<script type="text/javascript">

	function enviar()
	{
		if(document.getElementById('textfield').value!=='' )
		{
		location='reporte.php?opc=S';
		document.getElementById('form1').submit();
		//document.getElementById('ver').style.visibility='visible'
		}
		else
		{
			alert('Complete año y mes para generar el reporte');	
		}
		//document.getElementById('form1').submit();
		//document.getElementById('ver').style.visibility='visible'
	}
</script>

<meta charset="utf-8">
<title>Solucion</title>
</head>

<body>
<!-- ==============================================================================-->
<!--     FORMULARIO PRINCIPAL -->
<!-- ==============================================================================-->
<form id="form1" name="form1" method="post">
  <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="25%">&nbsp;</td>
        <td width="76%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
      </tr>
	  
	  <!-- TITULO DEL REPORTE -->
      <tr>
        <td style="font-family:arial; color:white; background-color:#094475; font-weight:bold">&nbsp;Sueldos pagados - resumen</td>        
      </tr>
      <tr>
        <td>&nbsp;Ingrese año :</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
	  <!-- año -->
        <td height="31">&nbsp;
        <input name="textfield" type="text" id="textfield" size="10" maxlength="10"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;Seleccione un  mes</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
	  <!-- 	  
	  LISTA DE MESES	  
	  -->
        <td height="33">&nbsp;
          <select name="Meses" id="meses" >
			<option value="1">Enero</option>
			<option value="2">Febrero</option>
			<option value="3">Marzo</option>
			<option value="4">Abril</option>
			<option value="5">Mayo</option>
			<option value="6">Junio</option>
			<option value="7">Julio</option>
			<option value="8">Agosto</option>
			<option value="9">Setiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
		</select>
		
		</td>
		 <!-- 	  
	      FIN LISTA DE MESES	  
			-->
		
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
	  
	
	  </tr>
	  
      <tr>
        <td>&nbsp;</td>
        <td><input type="button" name="button" id="button" value="Generar" onClick="enviar();"></td>
        <td>&nbsp;</td>
      </tr>
	  
      <tr>
        <td>&nbsp;</td>             
		<td>
			<br>
              <a href="http://localhost:8080/birt/frameset?__report=Sueldosxcliente.rptdesign" id="ver" style="visibility:hidden" target="blank">Ver informe</a>     			
		</td>			
        <td>&nbsp;</td>
      </tr>
	  
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>

<!-- -->
<!--   FIN  FORMULARIO PRINCIPAL -->
<!-- -->


</body>
</html>


<?php
if(isset($_POST['textfield']) and !empty($_POST['textfield']) )
	
{ echo "<script>document.getElementById('ver').style.visibility='visible' </script>";
	//-------------------------------------------------
	// campos tomados del formulario
	//-------------------------------------------------
	$desde = $_POST["textfield"] ;
	$hasta = $_POST["Meses"] ;
	
	//-------------------------------------------------
	// se llama al stored procedure  CALL sueldo_xcli(5,2018) ; 
	//-------------------------------------------------
	$query2="CALL sueldo_xcli(".$hasta.",".$desde.")";
	$resultado = mysql_query($query2);
	mysql_close($con);	
}

?>
<script type="text/javascript">
var fecha = new Date();
var ano = fecha.getFullYear();

document.getElementById("textfield").value = ano ;

if(document.getElementById('textfield3').value=='S')
{
	document.getElementById('ver').style.visibility='visible'
}
</script>