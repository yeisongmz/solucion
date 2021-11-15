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
	function ver()
	{
		if(document.getElementById('desde').value.trim()!=='' &&  document.getElementById('hasta').value.trim()!=='')
		{
			var aux = document.getElementById('desde').value.split('/');
			var desde =aux[2]+'-'+aux[1]+'-'+aux[0];
			aux = document.getElementById('hasta').value.split('/');
			var hasta =aux[2]+'-'+aux[1]+'-'+aux[0];
			
			window.open("utilidad_x_cliente.php?desde="+desde+"&hasta="+hasta,"_blank");
		}
		
	}
	
	function ver2()
	{
		if(document.getElementById('desde2').value.trim()!=='' &&  document.getElementById('hasta2').value.trim()!=='' && document.getElementById('cliente').value!==0)
		{
			var aux = document.getElementById('desde2').value.split('/');
			var desde =aux[2]+'-'+aux[1]+'-'+aux[0];
			aux = document.getElementById('hasta2').value.split('/');
			var hasta =aux[2]+'-'+aux[1]+'-'+aux[0];
			
			window.open("remision_sin_frecuencia_pdf2.php?desde="+desde+"&hasta="+hasta+"&sucdestino_id="+document.getElementById('cliente').value,"_blank");
		}
		
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
        <td width="23%">&nbsp;</td>
        <td width="8%">&nbsp;</td>
        <td width="69%">&nbsp;</td>
      </tr>
	  
	  <!-- TITULO DEL REPORTE -->
      <tr>
        <td style="font-family:arial; color:white; background-color:#094475; font-weight:bold">&nbsp;Margen de utilidad por cliente</td>        
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
        <td>&nbsp;Ingrese mes</td>
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
        <td>&nbsp;</td>
        <td colspan="2"><input type="button" name="button" id="button" value="Generar" onClick="enviar();"></td>
      </tr>
	  
      <tr>
        <td>&nbsp;</td>             
		<td colspan="2">
              <a href="http://rrhh-pc:8080/birt/frameset?__report=Costoxcli_remision.rptdesign" id="ver" style="visibility:hidden" target="blank">Ver informe</a>     			
		</td>			
      </tr>
	  
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><label for="desde">Desde:</label>
          <input name="desde" type="text" id="desde" size="10"  maxlength="10" value="<?php echo date('01/m/Y');?>">
          <label for="hasta">Hasta:</label>
        <input name="hasta" type="text" id="hasta" size="10" maxlength="10" value="<?php echo date('d/m/Y');?>"></td>
        <td><input type="button" name="button2" id="button2" value="Generar" onClick="ver();"></td>
      </tr>
      <tr>
        <td height="36" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><label for="cliente"><strong>Deposito(cliente):</strong></label>
          <select name="cliente" id="cliente" style="width:120px;">
            <option value="0">:::Seleccionar</option>
            <?php
            $query2="SELECT * from ubicacion_dep order by ubicacion";
			$resultado = mysql_query($query2,$con) ;
			while($query4=mysql_fetch_array($resultado))
			{
			?>
            <option value="<?php echo $query4['id'];?>"><?php echo $query4['ubicacion'];?></option>
            <?php
			}
			
			?>
        </select>
          <label for="desde2"><strong>Desde:</strong></label>
        <input name="desde2" type="text" id="desde2" size="10" maxlength="10" value="<?php echo date('01/m/Y');?>" >
        <label for="hasta2"><strong>Hasta:</strong></label>
        <input name="hasta2" type="text" id="hasta2" size="10" maxlength="10" value="<?php echo date('d/m/Y');?>" >
        <input type="button" name="button3" id="button3" value="Ver" onClick="ver2();"></td>
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
	// CALL costo_xcli(1,2018) ;
	$desde = $_POST["textfield"] ;
	$hasta = $_POST["Meses"] ;
	
	$query2="CALL costo_xcli(".$hasta.",".$desde.")";
	// echo $query2 ;
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