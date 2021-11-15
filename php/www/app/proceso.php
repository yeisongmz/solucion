<?php session_start();
date_default_timezone_set('America/Bahia');
?>

<!doctype html>
<html>

<head>
<meta charset="utf-8">

<title>Proceso SOLUCION SRL</title>

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
	 if(  document.getElementById("number").value==''  )
	 {
	 	alert('Complete el campo Gs. x hora');
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
        <td height="42" colspan="3" align="center" class="fondo_encabezado">&nbsp;<span class="titulo2">FICHA DE PERSONAL - CAMBIO DE VALORES</span></td>
      </tr>
     
      <tr>
        <td height="36" class="eiquetas">&nbsp;Gs. x hora:</td>
        <td>&nbsp;<input type="text" name="number" id="number" onKeyUp="format(this);return teclaGRAL(this, event,'textarea');" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
        <td height="36" class="eiquetas">&nbsp;Gs. x MINUTO:</td>
        <td>&nbsp;<input type="text" name="xminuto" id="xminuto" readonly  autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
     
	 <tr>
        <td height="36" class="eiquetas">&nbsp;Sueldo real:</td>
        <td>&nbsp;<input type="text" name="sreal" id="sreal"readonly onKeyUp="format(this);return teclaGRAL(this, event,'textarea');" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
	  
      <tr>
        <td height="36" class="eiquetas">&nbsp;Importe IPS:</td>
        <td>&nbsp;<input type="text" name="IPS" id="IPS" readonly onKeyUp="format(this);return teclaGRAL(this, event,'textarea');" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
	 
	 
	  <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="calculo" type="button" class="boton3" id="calculo" value="Validar" onClick="validar()">&nbsp;</td>
      </tr>
	  
	 
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Procesar" onClick="guardar()">&nbsp;</td>
      </tr>

	  <tr>
        <td  colspan="3" align="center" >&nbsp;<span >Nota: Solo se aplica a personal con cargo = LIMPIADOR/A</span></td>
      </tr>
    </tbody>
  </table>
 

 </div>
 </form>
</body>

<script type="text/javascript">
 function validar()
 {
	 
	 document.getElementById("xminuto").value = Math.round(  (document.getElementById("number").value / 60) * 1000 );
	 document.getElementById("sreal").value = (document.getElementById("number").value * 8 * 26) * 1000  ;
	 document.getElementById("IPS").value = (document.getElementById("number").value * 8 * 18) * 1000 ;	 
	 
 }	 

</script>

</html>


<?php
if( !empty($_POST["number"])   )
{
include ("conexion/conectar.php");
$ban=0; 
$personal_id='';
$creador = $_SESSION["user"];	
$importe=str_replace(".","",$_POST["number"]);			
$fe_ultmodi = date('Y-m-d G:i:s');	

$gsxminuto = $importe / 60 ;
$sueldo_real = $importe * 8 * 26 ;
$sueldo_ips = $importe * 8 * 18 ; 

/*Actualiza valores a personal CON IPS*/
$query2="update personal set jornalxhora=".$importe.",jornalxmin=".$gsxminuto
		.",importeips=".$sueldo_ips.",sueldoreal=".$sueldo_real." where cargos_id = 1 and importeips>0" ;
$res=mysql_query($query2,$con);

/*Actualiza valores a personal SIN IPS*/
$query2="update personal set jornalxhora=".$importe.",jornalxmin=".$gsxminuto
		.",sueldoreal=".$sueldo_real." where cargos_id = 1 and importeips=0" ;
$res=mysql_query($query2,$con);
					
mysql_close($con);

}
?>