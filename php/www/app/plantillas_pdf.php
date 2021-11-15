<?php 
 include ("conexion/conectar.php");


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>VISTA PLANTILLAS</title>
<script type="text/ecmascript">
	function ver()
	{
		if(document.getElementById('plantilla').value!==0)
		{
			document.getElementById('deta').src ="plantillas_pdf2.php?id="+document.getElementById('plantilla').value;
		}
	}

</script>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <th height="38" colspan="4" bgcolor="#A7C18C" scope="col">Plantillas</th>
      </tr>
      <tr>
        <td><label for="plantilla">Nombre de la plantilla:</label>
          <select name="plantilla" id="plantilla" style="width:120px;">
            <option value="0">:::Seleccionar</option>
             <?php
            $query2="SELECT * FROM plantillas   order by nombre";
$resultado = mysql_query($query2,$con) ;

while($query4=mysql_fetch_array($resultado))
{
			
			?>
              <option value="<?php echo $query4['id'];?>"><?php echo $query4['nombre'];?></option>
            <?php
}
			
			?>
        </select>
        <input type="button" name="button" id="button" value="Ver PDF" onClick="ver();" style="color:#FC0004; font-weight:bold; background-color:#FFFFFF; border:#FF0004 2px solid;"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><iframe style="width:100%; height:700px; border:none;" id="deta"></iframe>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>