<?php include ("conexion/conectar.php");

$apellidos='';

$query2=mysql_query("SELECT razon FROM cliente ORDER BY razon   ");

						$apellidos = "";
						
							
						while($query4=mysql_fetch_array($query2))
						{
							$apellidos = $apellidos.$query4['razon']."-";
																				
						}
						$apellidos = $apellidos."...";
$apellidos2='';

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
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/auto-complete.css">
<title>Documento sin título</title>
<script type="text/javascript">
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
function buscar2()
{
	var x = document.activeElement.value;
	var x2 = document.activeElement.id;
	//alert(x+x2);
	
	if(x2=='textfield')
	{
			document.getElementById("detalle").src='buscador_gral.php?origen=asistencia&dato='+document.getElementById("textfield").value;
	}
	if(x2=='textfield3')
					{
						buscar_ultimo();
						//document.getElementById("textfield15").select();
						
					}
}
	function buscar( event)
{
	
	
	 switch (event.keyCode) 
  		{
	
			case 13 :
			
			var x = document.activeElement.value;
			var x2 = document.activeElement.id;
			if(x2=='textfield')
				{
					document.getElementById("detalle").src='buscador_gral.php?origen=asistencia&dato='+document.getElementById("textfield").value;
				}
			if(x2=='textfield3')
				{
						buscar_ultimo();
						document.getElementById("textfield15").select();
						return;
				}	
				
		}
}
function teclaGRAL2(field, event,sgte) {
  switch (event.keyCode) 
  {
			case 13 :
					var x2 = document.activeElement.id;
					if(x2=='textfield3')
					{
						buscar_ultimo();
						document.getElementById("textfield15").select();
						return;
					}
					if(x2=='textfield15')
					{
						document.getElementById("textfield16").select();
						return;
					}
					if(x2=='textfield16')
					{
						document.getElementById("textfield17").select();
						return;
					}
					if(x2=='textfield17')
					{
						document.getElementById("textfield18").select();
						return;
					}
	            	if(x2=='textfield18')
					{
						document.getElementById("textfield4").select();
						return;
					}
					else
					{
						if(x2=='textfield4')
						{
							document.getElementById("textfield5").select();
							return;
						}
						else
						{
							document.getElementById(sgte).select();
							document.getElementById(sgte).focus();
							return;
						}
					}
			break;
  }
}	
function buscar_ultimo()
{
	document.getElementById("detalle").src='buscador_gral.php?origen=ultimo&dato='+document.getElementById("textfield").value+'&cliente='+document.getElementById("textfield").value+'&susursal='+document.getElementById("textfield2").value+'&personal='+document.getElementById("textfield3").value;
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_asistencia_diaria.php">
  <table width="100%" border="0" cellpadding="1" cellspacing="0" class="tabla1" >
    <tbody>
      <tr align="center" class="fondo_encabezado">
        <td height="44" colspan="10">Asistencia</td>
      </tr>
      <tr>
        <td width="7%">Cliente</td>
        <td colspan="9">
        <input name="textfield" type="text" autofocus id="textfield"  onKeyUp="return teclaGRAL2(this, event,'textfield2')" size="80"></td>
      </tr>
      <tr>
        <td>Sucursal</td>
        <td colspan="9">
        <input name="textfield2" type="text" id="textfield2" size="80" onKeyUp="return teclaGRAL2(this, event,'textfield3')"></td>
      </tr>
      <tr>
        <td>Personal</td>
        <td colspan="9">
        <input name="textfield3" type="text" id="textfield3" size="80" onKeyUp="return teclaGRAL2(this, event,'textfield15');buscar_ultimo();"></td>
      </tr>
      <tr>
        <td><p>Horario</p></td>
        <td>
        <input name="textfield15" type="text" id="textfield15" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield16')" value="00" size="2" maxlength="2">
        <input name="textfield16" type="text" id="textfield16" autocomplete="off" onkeypress="return justNumbers(event);" value="00" size="2" maxlength="2" onKeyUp="return teclaGRAL2(this, event,'textfield17')"></td>
        <td colspan="2" align="left">a&nbsp;&nbsp;<input name="textfield17" type="text" id="textfield17" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield18')" value="24" size="2" maxlength="2">
        <input name="textfield18" type="text" id="textfield18" autocomplete="off" onkeypress="return justNumbers(event);" value="00" size="2" maxlength="2" onKeyUp="return teclaGRAL2(this, event,'textfield4')"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mes</td>
        <td width="10%">
        <input name="textfield4" type="text" id="textfield4" size="2" value="<?php echo date('m');?>" onKeyUp="return teclaGRAL2(this, event,'textfield5')" autocomplete="off" onkeypress="return justNumbers(event);" ></td>
        <td colspan="2">A&ntilde;o
        <input name="textfield5" type="text" id="textfield5" size="4" value="<?php echo date('Y');?>" onKeyUp="return teclaGRAL2(this, event,'textfield6')" autocomplete="off" onkeypress="return justNumbers(event);" ></td>
        <td width="12%">&nbsp;</td>
        <td width="11%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="11%">&nbsp;</td>
        <td width="9%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="11%">&nbsp;</td>
        <td width="12%">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#C1AC7F">
        <td>L-V hs. diurnas</td>
        <td>L-V hs. nocturnas</td>
        <td>Sab. hs.diurnas</td>
        <td>Sab. hs. nocturnas</td>
        <td>Dom. hs. diurnas</td>
        <td>Dom. hs. nocturnas</td>
        <td>Dias Trab. L- V</td>
        <td>Dias Trab. Sabados</td>
        <td>Dias Trab. Domingos</td>
        <td>Hs.Extras</td>
      </tr>
      <tr>
        <td>
        <input name="textfield6" type="text" id="textfield6" autocomplete="off"  onKeyUp="return teclaGRAL2(this, event,'textfield7')" value="0" size="4" maxlength="4" ></td>
        <td>
        <input name="textfield7" type="text" id="textfield7" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield8')" size="4" maxlength="4"  value="0"></td>
        <td>
        <input name="textfield8" type="text" id="textfield8" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield9')" size="4" maxlength="4"  value="0"></td>
        <td>
        <input name="textfield9" type="text" id="textfield9" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield10')" size="4" maxlength="4"  value="0"></td>
        <td>
        <input name="textfield10" type="text" id="textfield10" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield11')" size="4" maxlength="4"  value="0"></td>
        <td>
        <input name="textfield11" type="text" id="textfield11" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield12')" size="4" maxlength="4"  value="0"></td>
        <td>
        <input name="textfield12" type="text" id="textfield12" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield13')" size="2" maxlength="2"  value="0"></td>
        <td>
        <input name="textfield13" type="text" id="textfield13" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield14')" size="2" maxlength="2"  value="0"></td>
        <td>
        <input name="textfield14" type="text" id="textfield14" autocomplete="off" onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield19')" size="2" maxlength="2"  value="0"></td>
        <td>
        <input name="textfield19" type="text" id="textfield19"  onkeypress="return justNumbers(event);" onKeyUp="return teclaGRAL2(this, event,'textfield')" value="0" size="2" maxlength="10" autocomplete="off"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="document.getElementById('form1').submit();"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <textarea name="textarea2" cols="1" rows="1" id="textarea2" style="visibility:hidden"><?php echo $apellidos;?></textarea>
  <textarea name="textarea3" cols="1" rows="1" id="textarea3" style="visibility:hidden"></textarea>
  <textarea name="textarea4" cols="1" rows="1" id="textarea4" style="visibility:hidden"><?php echo $apellidos2;?></textarea>
  <iframe id="detalle" style=" visibility:hidden"></iframe>
 <div id="fb-root"></div>
<script src="js/auto-complete.js"></script>
<script>
	
      
		
		var demo1 = new autoComplete({
            selector: '#textfield',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
				var string =  document.getElementById('textarea2').value ;
				var choices = string.split("-");
			    var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
					
                suggest(suggestions);
            }
        });
		var demo1 = new autoComplete({
            selector: '#textfield2',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
				var string =  document.getElementById('textarea3').value ;
				var choices = string.split("&");
			    var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
					
                suggest(suggestions);
            }
        });
		var demo1 = new autoComplete({
            selector: '#textfield3',
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