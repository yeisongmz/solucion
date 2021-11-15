<?php include ("conexion/conectar.php");

$mat=array();

$fila=0;
$patronal='';
$id_planilla=explode("--", $_GET['id']);
$query2="select * from empleadosobreros where planillamt_id='".$id_planilla[0]."' " ;
					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							 $mat[$fila][0]= '';
						     $mat[$fila][1]= $query4['Documento'];
						     $mat[$fila][2]= $query4['Nombre'];
 						     $mat[$fila][3]= $query4['Apellido'];
							 $mat[$fila][4]= $query4['Sexo'];
						     $mat[$fila][5]= $query4['Estadocivil'];
 						     $mat[$fila][6]= $query4['Fechanac'];
							 $mat[$fila][7]= $query4['Nacionalidad'];
							 $mat[$fila][8]= $query4['Domicilio'];
						     $mat[$fila][9]= $query4['Fechanacmenor'];
							 if($mat[$fila][9]=='2099-12-31')
							 {
								$mat[$fila][9]=''; 
							 }
							 $mat[$fila][10]= $query4['hijosmenores'];							 
						     $mat[$fila][11]= $query4['cargo'];							 
						     $mat[$fila][12]= $query4['profesion'];
						     $mat[$fila][13]= $query4['fechaentrada'];							 							 						     $mat[$fila][14]= '';
						     $mat[$fila][15]= '';							 							 						     						 $mat[$fila][16]= '';							 
						     $mat[$fila][17]= $query4['fechasalida'];
							 if($mat[$fila][17]=='2099-12-31')
							 {
								$mat[$fila][17]=''; 
							 }
 						     $mat[$fila][18]= $query4['motivosalida'];
							 $mat[$fila][19]= $query4['estado'];							 							 							 							 							 
							 $fila=$fila+1;
						}
						$query2="select nropatronal_mt from parametros " ;
						$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							$patronal= $query4['nropatronal_mt'];
						}
						for($i=0;$i<count($mat);$i++){
							$mat[$i][0]=$patronal;
							if($mat[$i][4]==1)
							{
								$mat[$i][4]="M";	
							}
							else
							{
								$mat[$i][4]="F";		
							}
							switch ($mat[$i][5]) {
								case '1':
									$mat[$i][5]="S";
									break;
								case '2':
									$mat[$i][5]="C";
									break;
								case '3':
									$mat[$i][5]="D";
									break;
								
								case '4':
									$mat[$i][5]="O";
									break;
								
								default:
								
							}
							if($mat[$i][19]==1)
							{
								$mat[$i][19]="Activo";	
							}
							else
							{
								$mat[$i][19]="Inactivo";		
							}
							
							$query2="select cargo from cargos where id='".$mat[$i][11]."' " ;
							$res=mysql_query($query2,$con);
							while($query4 = mysql_fetch_array($res) )
							{
								$mat[$i][11]=$query4['cargo'];	
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
	function ver()
	{
		location="empleados_obreros_mjt2.php?id="+document.getElementById('textfield').value;
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid_mjt_160">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr class="fondo_encabezado">
      <td height="51" align="center">Empleados y Obreros - Min. de Justicia y Trabajo</td>
    </tr>
    <tr>
      <td height="51">&nbsp;<input name="button" type="button" class="boton3" id="button" value="Excel" onClick="ver();">
       
        <input type="text" name="textfield" id="textfield" value="<?php echo $_GET['id'];?>" style="visibility:hidden"></td>
    </tr>
  </tbody>
</table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr class="fondo_encabezado_mjt">
        <td class="titulo3">Nropatronal</td>
        <td class="titulo3">Documento</td>
        <td class="titulo3">Nombre</td>
        <td class="titulo3">Apellido</td>
        <td class="titulo3">Sexo</td>
        <td class="titulo3">Estadocivil</td>
        <td class="titulo3">Fechanac</td>
        <td class="titulo3">Nacionalidad</td>
        <td class="titulo3">Domicilio</td>
        <td class="titulo3">Fechanacmenor</td>
        <td class="titulo3">hijosmenores</td>
        <td class="titulo3">cargo</td>
        <td class="titulo3">profesion</td>
        <td class="titulo3">fechaentrada</td>
        <td class="titulo3">horariotrabajo</td>
        <td class="titulo3">menorescapa</td>
        <td class="titulo3">menoresescolar</td>
        <td class="titulo3">fechasalida</td>
        <td class="titulo3">motivosalida</td>
        <td class="titulo3">Estado</td>
      </tr>
      <tr>
      <?php for($i=0;$i<count($mat);$i++){ ?>
        <td ><?php echo  $mat[0][0];?></td>
        <td ><?php echo  $mat[$i][1];?></td>
        <td ><?php echo  $mat[$i][2];?></td>
        <td ><?php echo  $mat[$i][3];?></td>
        <td ><?php echo  $mat[$i][4];?></td>
        <td ><?php echo  $mat[$i][5];?></td>
        <td ><?php echo  $mat[$i][6];?></td>
        <td ><?php echo  $mat[$i][7];?></td>
        <td ><?php echo  $mat[$i][8];?></td>
        <td ><?php echo  $mat[$i][9];?></td>
        <td ><?php echo  $mat[$i][10];?></td>
        <td ><?php echo  $mat[$i][11];?></td>
        <td ><?php echo  $mat[$i][12];?></td>
        <td ><?php echo  $mat[$i][13];?></td>
        <td ><?php echo  $mat[$i][14];?></td>
        <td ><?php echo  $mat[$i][15];?></td>
        <td ><?php echo  $mat[$i][16];?></td>
        <td ><?php echo  $mat[$i][17];?></td>
        <td ><?php echo  $mat[$i][18];?></td>
        <td ><?php echo  $mat[$i][19];?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  
  </div>
</form>
</body>
</html>