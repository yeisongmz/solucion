<?php include ("conexion/conectar.php");




?>

<!doctype html>
<html>
<head>
<script type="text/ecmascript">

function buscar()
{
	var aux = document.getElementById('desde').value.split('/');
	var desde = aux[2]+'-'+aux[1]+'-'+aux[0];
	
	aux = document.getElementById('hasta').value.split('/');
	var hasta = aux[2]+'-'+aux[1]+'-'+aux[0];
	
	document.getElementById('deta').src ="movimientos_equipos_pdf2.php?id="+document.getElementById('equipo').value+"&desde="+desde+"&hasta="+hasta;
}
</script>
<meta charset="utf-8">
<title>MOVIMIENTOS DE EQUIPOS</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <th height="42" colspan="2" bgcolor="#E0DDDD" scope="col">PANEL DE MOVIMIENTOS DE EQUIPOS</th>
      </tr>
      <tr>
        <td width="56%"><label for="equipo">Equipo:</label>
          <select name="equipo" id="equipo" style="width:200px;">
            <option value="0">:::Seleccionar</option>
            <?php
            $query2="SELECT * FROM equipos where (tipo='Maquinaria' or tipo='Herramienta')  order by descrip";
$resultado = mysql_query($query2,$con) ;

while($query4=mysql_fetch_array($resultado))
{
			
			?>
              <option value="<?php echo $query4['id'];?>"><?php echo $query4['descrip'];?></option>
            <?php
}
			
			?>
        </select>
          <label for="desde">Desde:</label>
        <input name="desde" type="text" id="desde" size="10" maxlength="10" value="<?php echo date('01/m/Y')?>">
        <label for="hasta">Hasta:</label>
        <input name="hasta" type="text" id="hasta" size="10" maxlength="10" value="<?php echo date('d/m/Y')?>"></td>
        <td width="44%"><input type="button" name="button" id="button" value="Buscar" onClick="buscar();"></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p><iframe src="movimientos_equipos_pdf2.php" style="width:100%; height:500px;" id="deta"></iframe>&nbsp;</p>
</form>
</body>
</html>