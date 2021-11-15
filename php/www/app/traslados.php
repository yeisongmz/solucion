<?php 
date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">

<style type="text/css">
body {
	mitabla.style.border = "1px solid #000";
	
	
}
</style>
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>

<script>



$(document).ready(function() {
    src = 'search_general.php';


    $("#skills3").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term,
                    v : "SUCURSALES2",
					id:$("#textfield4").val()
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        min_length: 3,
        delay: 300
    });
});

  $(function() {
	  
	 //var lo=String.fromCharCode(34)+"Personal"+String.fromCharCode(34);
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=PERSONAL",autoFocus:false
	});
  });
 
    $(function() {
    $( "#skills5" ).autocomplete({
		source:"search_general.php?v=CLIENTES",
		autoFocus:false
	});
  });
  function enviar(valor)
  {
	  var foco=document.activeElement.id;

switch(foco) {
    case "skills4":
       document.getElementById('detalles').src='translados_iframe.php?q='+document.getElementById("skills4").value;
	document.getElementById("skills5").focus();
        break;
    case "skills5":
	
	 	document.getElementById('detalles2').src='buscador_gral.php?origen=traslados&dato='+document.getElementById("skills5").value;
        document.getElementById("skills3").focus();
        break;
	case "skills3":
        document.getElementById("h1").focus();
        break;	
    default:
       
		
}

	
  }
  function cargar(valor)
		{
		document.getElementById('textfield7').value= document.getElementById('textfield7').value+valor+'--';
		limpiarText21(valor);
		}
function limpiarText21(valor)
	{

		var str = document.getElementById('textfield7').value;
		var res = str.split("--");
		var cadena='';
		var ban=0;

		for (i = 0; i < res.length-1; i++)
		{
				if(res[i] == valor)
					{
						cadena=cadena+res[i]+'--';	
					}
			
		}
		
		if(cadena!=='')
		{
			document.getElementById('textfield7').value=cadena;
		}
		
		
			
	}		
 
 	function enviar2()
	{
		if(document.getElementById("skills3").value =='' || document.getElementById("skills4").value =='' || document.getElementById("h1").value =='' || document.getElementById("m1").value =='' || document.getElementById("h2").value =='' || document.getElementById("m2").value =='' || document.getElementById("textfield7").value =='' || document.getElementById("textfield3").value =='' )
		{
			alert('Complete los campos obligatorios,debe completar todas las horas y minutos, el personal, la sucursal de destino y elegir la sucursal de origen');
		}
		else
		{
		 document.getElementById("form1").submit();	
		}
	}



function restarHoras2(field, event) {


  switch (event.keyCode) 
  {
			case 13 :
			
		  		inicioMinutos = parseInt(document.getElementById("m1").value);
  				inicioHoras = parseInt(document.getElementById("h1").value);
  				finMinutos = parseInt(document.getElementById("m2").value);
			    finHoras = parseInt(document.getElementById("h2").value);
				transcurridoMinutos = finMinutos - inicioMinutos;
				transcurridoHoras = finHoras - inicioHoras;
				if(inicioMinutos>59 || finMinutos>59 || inicioHoras>23 || finHoras>23)
					{
						alert('Las horas deben ser valores entre 0 y 23 , los minutos entre 0 y 59');	
					}
				else
					{
  					if (transcurridoMinutos < 0) 
					{
    					transcurridoHoras--;
    					transcurridoMinutos = 60 + transcurridoMinutos;
  					}
  					horas = transcurridoHoras.toString();
  					minutos = transcurridoMinutos.toString();
  					
				  if (horas.length < 2) {
					horas = "0"+horas;
				  }
					document.getElementById("textfield3").value = horas+":"+minutos;
					if(document.getElementById("skills3").value =='' || document.getElementById("skills4").value =='' || document.getElementById("h1").value =='' || document.getElementById("m1").value =='' || document.getElementById("h2").value =='' || document.getElementById("m2").value =='' )
					{
						 alert("Complete los campos Obligatorios");
					}
					
					}
						break;	
					}
  }
  function teclaGRAL2 (field, event,sgte) 
{

	 var foco=document.activeElement.id;
	switch (event.keyCode) {
			case 13 :
					if(foco=="skills4")
						{
					document.getElementById('detalles').src='translados_iframe.php?q='+document.getElementById("skills4").value;
						}
						if(foco=="skills5")
						{
							document.getElementById('detalles2').src='buscador_gral.php?origen=traslados&dato='+document.getElementById("skills5").value;
						}
						document.getElementById(sgte).focus();
						break;	
					
	}
}
  
  </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_translados.php">
<div class="polaroid7">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr>
        <td height="48" colspan="5" align="center" class="fondo_encabezado">Translados de Personal</td>
      </tr>
      <tr>
        <td width="21%" height="36" class="eiquetas">Personal*</td>
        <td colspan="4"><div class="ui-widget">
          <input  id="skills4" placeholder="Ingrese Nombre..." size="40" name="skills4" autofocus  onKeyUp="return teclaGRAL2(this, event,'skills5')"   >
        </div></td>
        </tr>
     <tr>
     <td valign="top" class="eiquetas">Desde Sucursal*</td>
     <td colspan="3"><iframe id="detalles" width="100%" src="" style="border:none;" height="100px"></iframe>&nbsp;</td>
     </tr>
     <tr>
     <td colspan="4"><hr></td>
     </tr>
      <tr>
        <td height="37" class="eiquetas">Cliente*</td>
        <td colspan="4"><div class="ui-widget">
          <input  id="skills5" placeholder="Ingrese Cliente" size="40" name="skills5"  onKeyUp="return teclaGRAL2(this, event,'skills3');" onFocus="foco:this.id"   >
        </div></td>
        </tr>
       <tr>
        <td class="eiquetas">Hasta Sucursal*</td>
        <td colspan="4"><div class="ui-widget">
          <input  id="skills3" placeholder="Ingrese Sucursal" size="40" name="skills3"  onKeyUp="return teclaGRAL(this, event,'h1');" ></div>
          <input name="textfield7" type="text" id="textfield7"  size="4" style="visibility:hidden"  >
          <input name="textfield4" type="text" id="textfield4" value="0" size="4" style="visibility:hidden">
        </td>
        </tr>
        <tr class="eiquetas">
        <td height="29">Horario</td>
        <td colspan="2"><select name="select" id="select">
          <option value="D">Diurno</option>
            <option value="N">Nocturno</option>
        </select></td>
        <td colspan="2">&nbsp;</td>
      </tr>
       <tr class="eiquetas" style="visibility:hidden">
        <td height="29">Estado</td>
        <td colspan="2"><select name="select2" id="select2">
          <option value="VIGENTE">Vigente</option>
            <option value="NO VIGENTE">No vigente</option>
        </select></td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" class="eiquetas">Desde Fecha*</td>
        <td width="22%"><input name="textfield2" type="text" id="textfield2" onChange="document.getElementById('time').focus();" value="<?php echo date('d-m-Y');?>" size="10" readonly ><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" name="button1" id="button1"></td>
        <td width="18%" align="right">Hasta Fecha*&nbsp;</td>
        <td colspan="2" valign="bottom"><input name="textfield" type="text" id="textfield" size="10" readonly value="<?php echo date('d-m-Y');?>">&nbsp;
          <input type="button" name="button" id="button" value="" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
      </tr>
      <tr>
        <td height="16" class="eiquetas">Desde Hora*</td>
        <td colspan="2" align="left"><span class="eiquetas">Hasta Hora*</span></td>
      
        <td width="39%" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="36" class="eiquetas"><input name="h1" type="number" id="h1" max="23" min="0" step="1" onKeyUp="return teclaGRAL(this, event,'m1');" size="4" >
          <strong>:</strong>          <input name="m1" type="number" id="m1" max="59" min="0" step="1" size="4" onKeyUp="return teclaGRAL(this, event,'h2');" ></td>
        <td colspan="2" align="left"><input name="h2" type="number" id="h2" max="23" min="0" step="1" onKeyUp="return teclaGRAL(this, event,'m2');" size="4" maxlength="2"  >
          <strong>:</strong>          <input name="m2" type="number" id="m2" max="59" min="0" step="1" size="4" onKeyUp="return restarHoras2(this, event)" ></td>
        <td colspan="2" align="left">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="34"><span class="eiquetas">Cantidad de Horas</span></td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td><input name="textfield3" type="text" id="textfield3"  onKeyUp="format(this);" size="6" maxlength="3" readonly></td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
     <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2" align="right"><input name="button2" type="button" class="boton3" id="button2" value="Guardar" onClick="enviar2()">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  
  </div>
  <iframe id="detalles2" height="1" width="1" ></iframe>
</form>
</body>
</html>