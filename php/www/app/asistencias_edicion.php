<?php include ("conexion/conectar.php");

$apellidos='';



$query2=mysql_query("SELECT nombres,apellidos FROM personal ORDER BY nombres   ");

						$apellidos2 = "";
						
							
						while($query4=mysql_fetch_array($query2))
						{
							$apellidos2 = $apellidos2.$query4['nombres'].', '.$query4['apellidos']."-";
																				
						}
						$apellidos2 = $apellidos2."...";						





?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>EDICION DE ASISTENCIA</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/auto-complete.css">
<script src="js/funciones.js"></script>
<script type="text/javascript">

function buscar2()
{
	
}
	function buscar( event)
{
	
	
	 switch (event.keyCode) 
  		{
	
			case 13 :
			
			
				
		}
}

function buscar()
{
	document.getElementById("detalle").src='asistencias_iframe.php?personal='+document.getElementById("textfield").value+'&mes='+document.getElementById("textfield2").value+'&ano='+document.getElementById("textfield3").value;	
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="polaroid100">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="63" colspan="4" align="center" class="fondo_encabezado">Edicion de asistencias</td>
      </tr>
      <tr>
        <td width="13%" height="29">Personal</td>
        <td colspan="3">
        <input name="textfield" type="text" autofocus id="textfield" size="60" onKeyUp="return teclaGRAL(this, event,'textfield2');"></td>
      </tr>
      <tr>
        <td height="34">Mes</td>
        <td width="65%">
        <input type="text" name="textfield2" id="textfield2" value="<?php echo date('m');?>" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield3');"></td>
        <td width="11%">&nbsp;</td>
        <td width="11%">&nbsp;</td>
      </tr>
      <tr>
        <td height="42">A&ntilde;o</td>
        <td>
        <input type="text" name="textfield3" id="textfield3" value="<?php echo date('Y');?>" autocomplete="off">
        <input name="button" type="button" class="boton3" id="button" value="Ver" onClick="buscar();" style="width:85px"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="600px" colspan="4"><iframe id="detalle" style=" width:100%; height:100%" src="asistencias_iframe.php"></iframe></td>
      </tr>
    </tbody>
  </table>
</div>
  <textarea name="textarea4" cols="1" rows="1" id="textarea4" style="visibility:hidden"><?php echo $apellidos2;?></textarea>
  <div id="fb-root"></div>
<script src="js/auto-complete.js"></script>
<script>
	
		var demo1 = new autoComplete({
            selector: '#textfield',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
				var string =  document.getElementById('textarea4').value ;
				var choices = string.split("-");
			    var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
					
                suggest(suggestions);
            }
        });
       
    </script>
</form>
</body>
</html>