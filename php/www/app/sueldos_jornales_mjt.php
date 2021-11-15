<?php include ("conexion/conectar.php");

$id=explode("-",$_GET['id']);
$mat=array();
$fila2=0;

 
$query2="select id  from planillamt where referencia='EMPLEADOS' and id='".$id[0]."' ";
$res=mysql_query($query2,$con);
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$id[0]=$fila['id'];										
		 }
 }
 
$query2="select *  from sueldojornales where  planillaMT_id='".$id[0]."' ";

$res=mysql_query($query2,$con);
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
	 {
					
							$mat[$fila2][0]=$fila['nropatronal'];
							$mat[$fila2][1]=$fila['nrodocumento'];	
							$mat[$fila2][2]=$fila['formapago'];	
							$mat[$fila2][3]=$fila['importeUnitario'];
					
							$mat[$fila2][10]=$fila['hs_enero'];
							$mat[$fila2][11]=$fila['sueldo_enero'];	
							$mat[$fila2][12]=$fila['hs_febrero'];
							$mat[$fila2][13]=$fila['sueldo_feb'];
							$mat[$fila2][14]=$fila['hs_marzo'];
							$mat[$fila2][15]=$fila['sueldo_mar'];	
							$mat[$fila2][16]=$fila['hs_abril'];
							$mat[$fila2][17]=$fila['sueldo_abr'];	
							$mat[$fila2][18]=$fila['hs_mayo'];
							$mat[$fila2][19]=$fila['sueldo_may'];
							$mat[$fila2][20]=$fila['hs_junio'];;
							$mat[$fila2][21]=$fila['sueldo_jun'];	
							$mat[$fila2][22]=$fila['hs_julio'];
							$mat[$fila2][23]=$fila['sueldo_jul'];	
							$mat[$fila2][24]=$fila['hs_agosto'];;
							$mat[$fila2][25]=$fila['sueldo_ago'];	
							$mat[$fila2][26]=$fila['hs_set'];
							$mat[$fila2][27]=$fila['sueldo_set'];	
							$mat[$fila2][28]=$fila['hs_oct'];
							$mat[$fila2][29]=$fila['sueldo_oct'];;	
							$mat[$fila2][30]=$fila['hs_nov'];;
							$mat[$fila2][31]=$fila['sueldo_nov'];	
							$mat[$fila2][32]=$fila['hs_dic'];
							$mat[$fila2][33]=$fila['sueldo_dic'];
							$mat[$fila2][34]=$fila['hs50'];;	
							$mat[$fila2][35]=$fila['sueldo50'];
							$mat[$fila2][36]=$fila['hs100'];
							$mat[$fila2][37]=$fila['sueldo100'];
							$mat[$fila2][38]=$fila['aguinaldo'];	
							$mat[$fila2][39]=$fila['beneficio'];
							$mat[$fila2][40]=$fila['bonificacion'];
							$mat[$fila2][41]=$fila['vacaciones'];
							$mat[$fila2][42]=$fila['total_hs'];
							$mat[$fila2][43]=$fila['total_sueldo'];				
							$fila2=$fila2+1;
							
					
	 }
 }
 //***************************************************************************
 //***************************************************************************
mysql_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript">
	function ver()
	{
		location="sueldos_jornales_mjt2.php?id="+document.getElementById('textfield').value;
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" style="width:auto">
<div class="polaroid_mjt_210">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr class="fondo_encabezado">
      <td height="60">Sueldos y Jornales - Min. de Justicia y Trabajo</td>
    </tr>
   <tr>
      <td height="51">&nbsp;<input name="button" type="button" class="boton3" id="button" value="Excel" onClick="ver();">
       
        <input type="text" name="textfield" id="textfield" value="<?php echo $_GET['id'];?>" style="visibility:hidden" ></td>
    </tr>
  </tbody>
</table>

  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr class="fondo_encabezado_mjt">
        <td class="titulo3">Nropatronal</td>
        <td class="titulo3">documento</td>
        <td class="titulo3">formadepago</td>
        <td class="titulo3">importeunitario</td>
        <td class="titulo3">h_ene</td>
        <td class="titulo3">s_ene</td>
        <td class="titulo3">h_feb</td>
        <td class="titulo3">s_feb</td>
        <td class="titulo3">h_mar</td>
        <td class="titulo3">s_mar</td>
        <td class="titulo3">h_abr</td>
        <td class="titulo3">s_abr</td>
        <td class="titulo3">h_may</td>
        <td class="titulo3">s_may</td>
        <td class="titulo3">h_jun</td>
        <td class="titulo3">s_jun</td>
        <td class="titulo3">h_jul</td>
        <td class="titulo3">s_jul</td>
        <td class="titulo3">h_ago</td>
        <td class="titulo3">s_ago</td>
        <td class="titulo3">h_set</td>
        <td class="titulo3">s_set</td>
        <td class="titulo3">h_oct</td>
        <td class="titulo3">s_oct</td>
        <td class="titulo3">h_nov</td>
        <td class="titulo3">s_nov</td>
        <td class="titulo3">h_dic</td>
        <td class="titulo3">s_dic</td>
        <td class="titulo3">h_50</td>
        <td class="titulo3">s_50</td>
        <td class="titulo3">h_100</td>
        <td class="titulo3">s_100</td>
        <td class="titulo3">Aguinaldo</td>
        <td class="titulo3">Beneficios</td>
        <td class="titulo3">Bonificaciones</td>
        <td class="titulo3">Vacaciones</td>
        <td class="titulo3">total_h</td>
        <td class="titulo3">total_s</td>
        <td class="titulo3">totalgeneral</td>
     
      </tr>
      <tr>
      <?php for($i=0;$i<count($mat);$i++)
 { ?>
        <td ><?php echo $mat[$i][0]; ?></td>
        <td ><?php echo $mat[$i][1]; ?></td>
        <td ><?php echo $mat[$i][2]; ?></td>
        <td ><?php echo $mat[$i][3]; ?></td>
        <td ><?php echo intval($mat[$i][10]); 	?></td>
        <td ><?php echo $mat[$i][11]; ?></td>
        <td ><?php echo intval($mat[$i][12]); ?></td>
        <td ><?php echo $mat[$i][13];  ?></td>
        <td ><?php echo intval($mat[$i][14]); ?></td>
        <td ><?php echo $mat[$i][15];  ?></td>
        <td ><?php echo intval($mat[$i][16]); ?></td>
        <td ><?php echo $mat[$i][17];  ?></td>
        <td ><?php echo intval($mat[$i][18]); ?></td>
        <td ><?php echo $mat[$i][19];  ?></td>
        <td ><?php echo intval($mat[$i][20]); ?></td>
        <td ><?php echo $mat[$i][21];  ?></td>
        <td ><?php echo intval($mat[$i][22]);  ?></td>
        <td ><?php echo $mat[$i][23]; 	?></td>
        <td ><?php echo intval($mat[$i][24]); ?></td>
        <td ><?php echo $mat[$i][25]; 		?></td>
        <td ><?php echo intval($mat[$i][26]); ?></td>
        <td ><?php echo $mat[$i][27]; ?></td>
        <td ><?php echo intval($mat[$i][28]); ?></td>
        <td ><?php echo $mat[$i][29];  ?></td>
        <td ><?php echo intval($mat[$i][30]); ?></td>
        <td ><?php echo $mat[$i][31];  ?></td>
        <td ><?php echo intval($mat[$i][32]); ?></td>
        <td ><?php echo $mat[$i][33];  ?></td>
        <td ><?php echo $mat[$i][34];  ?></td>
        <td ><?php echo $mat[$i][35]; ?></td>
        <td ><?php echo $mat[$i][36]; ?></td>
        <td ><?php echo $mat[$i][37]; ?></td>
        <td ><?php echo $mat[$i][38]; ?></td>
        <td ><?php echo $mat[$i][39]; ?></td>
        <td ><?php echo $mat[$i][40]; ?></td>
        <td ><?php echo $mat[$i][41]; ?></td>
        <td ><?php echo $mat[$i][42]; ?></td>
        <td ><?php echo $mat[$i][43]; ?></td>
        <td ><?php echo intval($mat[$i][43]+$mat[$i][38]+$mat[$i][39]+$mat[$i][40]+$mat[$i][41]) ?></td>
      
      </tr>
     <?php }?>
    </tbody>
  </table>
</div>
</form>
</body>
</html>