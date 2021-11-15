<?php include ("conexion/conectar.php");




?>

<!doctype html>
<html>
<head>
<script type="text/ecmascript">

function buscar()
{
	var opcion;
	if(document.getElementById('R1_0').checked==true)
	{
		opcion=1;
	}
	if(document.getElementById('R1_1').checked==true)
	{
		opcion=2;
	}
	if(document.getElementById('R1_2').checked==true)
	{
		opcion=3;
	}
	document.getElementById('deta').src ="equipos_x_cliente_pdf.php?id="+document.getElementById('cliente').value+"&opcion="+opcion;
}
</script>
<meta charset="utf-8">
<title>EQUIPOS POR CLIENTE</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <th height="42" colspan="2" bgcolor="#E0DDDD" scope="col">PANEL DE BUSQUEDA DE EQUIPOS POR DEPOSITO</th>
      </tr>
      <tr>
        <td width="96%">
          <table width="100%">
            <tr>
              <td width="374"><label for="cliente">Cliente/Deposito:</label>
          <select name="cliente" id="cliente" style="width:200px;">
            <option value="0">:::Seleccionar</option>
            <?php
            $query2="SELECT * FROM ubicacion_dep where id in (select Ubicacion_dep_id from stock)  order by ubicacion";
$resultado = mysql_query($query2,$con) ;

while($query4=mysql_fetch_array($resultado))
{
			
			?>
              <option value="<?php echo $query4['id'];?>"><?php echo $query4['ubicacion'];?></option>
            <?php
}
			
			?>
        </select></td>
            <td width="132"><label>
              <input name="R1" type="radio" id="R1_0" value="1" checked="checked">
              Todos</label></td>
               <td width="265"><label>
              <input type="radio" name="R1" value="2" id="R1_1">
              Herramientas y Maquinarias</label></td>
              <td width="195"><label>
              <input type="radio" name="R1" value="3" id="R1_2">
              Insumos</label></td>
              <td width="221"><input type="button" name="button" id="button" value="Buscar" onClick="buscar();"></td>
            </tr>
         
           
         
      </table></td>
        <td width="4%">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p><iframe src="equipos_x_cliente_pdf.php" style="width:100%; height:500px;" id="deta"></iframe>&nbsp;</p>
</form>
</body>
</html>