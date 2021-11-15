<?php include ("conexion/conectar.php");
$id=explode("--",$_GET['id']);
$query2="select *  from resumengeneral where planillamt_id='".$id[0]."' ";
$res=mysql_query($query2,$con);
$mat=array();
$fila2=0;
 for($i=0;$i<5;$i++)
 {
			$mat[$i][0]='';
			$mat[$i][1]='';
			$mat[$i][2]='';
			$mat[$i][3]='';
			$mat[$i][4]='';
			$mat[$i][5]='';
			$mat[$i][6]='';
			$mat[$i][7]='';
			$mat[$i][8]='';
			$mat[$i][9]='';
			$mat[$i][10]='';
 }
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$mat[$fila2][0]=$fila['nropatronal'];
			$mat[$fila2][1]=$fila['ano_periodo'];
			$mat[$fila2][2]=$fila['jefesvarones'];
			$mat[$fila2][3]=$fila['jefesmujeres'];
			$mat[$fila2][4]=$fila['empl_varones'];
			$mat[$fila2][5]=$fila['empl_mujeres'];
			$mat[$fila2][6]=$fila['obrero_varones'];
			$mat[$fila2][7]=$fila['obrero_mujeres'];
			$mat[$fila2][8]=$fila['menor_varon'];
			$mat[$fila2][9]=$fila['menor_mujer'];
			$mat[$fila2][10]=$fila['orden'];
			$fila2=$fila2+1;									
		 }
 }
 
mysql_close($con);
		 	 	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript">
function enviar()
{
	location='resumen_general_mjt2.php?id='+document.getElementById('textfield').value;
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid_mjt_160">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr class="fondo_encabezado">
      <td height="60">Resumen General - Min. de Justicia y Trabajo</td>
    </tr>
    <tr>
      <td height="46">&nbsp;<input name="button" type="button" class="boton3" id="button" value="Excel" onClick="enviar();" style="width:85px">
        <input type="text" name="textfield" id="textfield" value="<?php echo $id[0];?>" style="visibility:hidden"></td>
    </tr>
  </tbody>
</table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr  class="fondo_encabezado_mjt">
        <td class="titulo3">Nropatronal</td>
        <td class="titulo3">a&ntilde;o</td>
        <td class="titulo3">supjefesvarones</td>
        <td class="titulo3">supjefesmujeres</td>
        <td class="titulo3">empleadosvarones</td>
        <td class="titulo3">empleadosmujeres</td>
        <td class="titulo3">obrerosvarones</td>
        <td class="titulo3">obrerosmujeres</td>
        <td class="titulo3">menoresvarones</td>
        <td class="titulo3">menoresmujeres</td>
        <td class="titulo3">orden</td>
      </tr>
      <?php for($i=0;$i<5;$i++)
	  { ?>
      <tr>
        <td >&nbsp;<?php echo $mat[$i][0]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][1]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][2]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][3]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][4]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][5]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][6]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][7]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][8]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][9]; ?></td>
        <td >&nbsp;<?php echo $mat[$i][10]; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</form>
</body>
</html>