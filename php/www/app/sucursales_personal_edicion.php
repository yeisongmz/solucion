<?php session_start();
date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript">
    var myInput = document.getElementById("textfield5");
    if(myInput.addEventListener ) {
        myInput.addEventListener('keydown',this.keyHandler,false);
    } else if(myInput.attachEvent ) {
        myInput.attachEvent('onkeydown',this.keyHandler); /* damn IE hack */
    }
	function keyHandler(e) {
        var TABKEY = 9;
        if(e.keyCode == TABKEY) {
            this.value += "    ";
            if(e.preventDefault) {
                e.preventDefault();
            }
            return false;
        }
    }
</script>
<script type="text/javascript">
 $(function() 
 {$("#skills3").autocomplete({source:"search_general.php?v=PERSONAL",autoFocus:true});});
 
 function validaFechaDDMMAAAA(fecha){
	var dtCh= "-";
	var minYear=1900;
	var maxYear=2100;
	function isInteger(s){
		var i;
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (((c < "0") || (c > "9"))) return false;
		}
		return true;
	}
	function stripCharsInBag(s, bag){
		var i;
		var returnString = "";
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (bag.indexOf(c) == -1) returnString += c;
		}
		return returnString;
	}
	function daysInFebruary (year){
		return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
	}
	function DaysArray(n) {
		for (var i = 1; i <= n; i++) {
			this[i] = 31
			if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
			if (i==2) {this[i] = 29}
		}
		return this
	}
	function isDate(dtStr){
		var daysInMonth = DaysArray(12)
		var pos1=dtStr.indexOf(dtCh)
		var pos2=dtStr.indexOf(dtCh,pos1+1)
		var strDay=dtStr.substring(0,pos1)
		var strMonth=dtStr.substring(pos1+1,pos2)
		var strYear=dtStr.substring(pos2+1)
		strYr=strYear
		if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
		if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
		for (var i = 1; i <= 3; i++) {
			if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
		}
		month=parseInt(strMonth)
		day=parseInt(strDay)
		year=parseInt(strYr)
		if (pos1==-1 || pos2==-1){
			return false
		}
		if (strMonth.length<1 || month<1 || month>12){
			return false
		}
		if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
			return false
		}
		if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
			return false
		}
		if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
			return false
		}
		return true
	}
	if(isDate(fecha)){
		return true;
	}else{
		return false;
	}
}
 function guardar()
 {
	 if( document.getElementById("skills3").value=='' || document.getElementById("textfield2").value=='' || document.getElementById("textfield3").value=='' || document.getElementById("textfield4").value=='' || document.getElementById("textfield5").value=='' || document.getElementById("textfield6").value=='' || document.getElementById("textfield7").value=='')
	 {
	 	alert('Complete todos los campos ');
	 }
	 else
	 {
		 	var dia=document.getElementById("number2").value;
			var mes=document.getElementById("number3").value;
			var ano=document.getElementById("number4").value;
			
			
			if(dia.length==1)
			{
				dia="0"+dia	
			}
			if(mes.length==1)
			{
				mes="0"+mes	
			}
			if(ano.length!=4)
			{
				var fecha2 = new Date();
				var ano2 = fecha2.getFullYear();
				ano=ano2	
			}
			var fecha2 = new Date();


			var fecha=dia+"-"+mes+"-"+ano;
			var valida=validaFechaDDMMAAAA(fecha);

			if(fecha.length==10 && valida==true)
			{
			document.getElementById("textfield").value=fecha;	
			}
			document.getElementById("form1").submit();	 
	 }
 }
	 
	 
	 function teclaGRAL2 (field, event,sgte) 
{

	switch (event.keyCode) {
			case 13 :
					
						document.getElementById('detalles').src='sucursales_personal_iframe.php?q='+document.getElementById("skills3").value;
						document.getElementById('textfield2').focus();
						break;	
					
	}
}

function cargar(valor)
		{
		document.getElementById('textfield7').value= valor+'--';
		
		document.getElementById('detalles2').src='sucursales_personal_iframe2.php?q='+document.getElementById("skills3").value+'&sucursal='+valor;
		document.getElementById('textfield2').focus();
		}

function enviar(valor)
{
	document.getElementById('detalles').src='sucursales_personal_iframe.php?q='+document.getElementById("skills3").value;
						document.getElementById('textfield2').focus();
}
 	
function eliminar()
	{
			if(document.getElementById('textfield7').value!='')
			{
				var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
					location = 'elimina_asignaciones.php?skills3='+document.getElementById('skills3').value+'&textfield7='+document.getElementById('textfield7').value;
                 
               }
			}
	}
	function dias()
{
	var dias_elegidos='';
	
	if(document.getElementById('checkbox').checked==true)
	{
		dias_elegidos=document.getElementById('checkbox').value+',';
	}
	if(document.getElementById('checkbox2').checked==true)
	{
		dias_elegidos=dias_elegidos+document.getElementById('checkbox2').value+',';
	}
	if(document.getElementById('checkbox3').checked==true)
	{
		dias_elegidos=dias_elegidos+document.getElementById('checkbox3').value+',';
	}
	if(document.getElementById('checkbox4').checked==true)
	{
		dias_elegidos=dias_elegidos+document.getElementById('checkbox4').value+',';
	}
	if(document.getElementById('checkbox5').checked==true)
	{
		dias_elegidos=dias_elegidos+document.getElementById('checkbox5').value+',';
	}
	if(document.getElementById('checkbox6').checked==true)
	{
		dias_elegidos=dias_elegidos+document.getElementById('checkbox6').value+',';
	}
	if(document.getElementById('checkbox7').checked==true)
	{
		dias_elegidos=dias_elegidos+document.getElementById('checkbox7').value+',';
	}
	document.getElementById('textfield8').value=dias_elegidos;
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_sucursal_personal_edicion.php">
<div class="polaroid7">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla2">
    <tbody>
      <tr>
        <td height="34" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2" >Editar Asignaciones</span></td>
      </tr>
      <tr>
        <td width="14%" height="55" class="eiquetas">&nbsp;Personal*</td>
        <td colspan="2"><div class="ui-widget"><input id="skills3" name="skills3" placeholder="Ingrese Nombre..." size="40" onKeyUp="return teclaGRAL2(this, event);" ></div></td>
        </tr>
      <tr class="eiquetas">
      	<td height="138">Cliente*</td>
      	<td colspan="2"><iframe id="detalles" width="100%" src="" style="border:none;" height="100%"></iframe></td>
      	</tr>
      <tr class="eiquetas">
      	<td>&nbsp;</td>
      	<td width="68%">&nbsp;</td>
      	<td width="18%">&nbsp;</td>                
      </tr>
      
          <td height="22" align="left" class="eiquetas">&nbsp;</td>
          <td colspan="4" align="left" valign="bottom"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
            <tbody>
              <tr class="ui-state-focus">
                <td align="center">Lunes</td>
                <td align="center">Martes</td>
                <td align="center">Miercoles</td>
                <td align="center">Jueves</td>
                <td align="center">Viernes</td>
                <td align="center">S&aacute;bado</td>
                <td align="center">Domingo</td>
                </tr>
              </tbody>
          </table></td>
        </tr>
      <tr>
        <td height="30" align="left" class="eiquetas">Dias</td>
        <td colspan="4" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
            <tr>
              <td width="11%" align="center"><input name="checkbox" type="checkbox" id="checkbox" value="Lun" onChange="dias();document.getElementById('checkbox2').focus();"></td>
              <td width="13%" align="center"><input name="checkbox2" type="checkbox" id="checkbox2" value="Mar" onChange="dias();document.getElementById('checkbox3').focus();"></td>
              <td width="18%" align="center"><input name="checkbox3" type="checkbox" id="checkbox3" value="Mie" onChange="dias();document.getElementById('checkbox4').focus();"></td>
              <td width="13%" align="center"><input name="checkbox4" type="checkbox" id="checkbox4" value="Jue" onChange="dias();document.getElementById('checkbox5').focus();"></td>
              <td width="14%" align="center"><input name="checkbox5" type="checkbox" id="checkbox5" value="Vie" onChange="dias();document.getElementById('checkbox6').focus();"></td>
              <td width="14%" align="center"><input name="checkbox6" type="checkbox" id="checkbox6" value="Sab" onChange="dias();document.getElementById('checkbox7').focus();"></td>
              <td width="17%" align="center"><input name="checkbox7" type="checkbox" id="checkbox7" onChange="dias();document.getElementById('h1').focus();" value="Dom"></td>
            </tr>
          </tbody>
        </table></td>
        </tr
      ><tr>
        <td height="28" class="eiquetas">&nbsp;Desde Hora*</td>
        <td colspan="2"><input name="textfield2" type="text" id="textfield2" autocomplete="off" onKeyUp="format(this);return teclaGRAL(this, event,'textfield3');" size="4" maxlength="2" >
          <strong>:</strong>          <input name="textfield3" type="text" id="textfield3" autocomplete="off" onKeyUp="format(this);return teclaGRAL(this, event,'textfield4');"  size="4" maxlength="2" ></td>
        </tr>
      <tr>
        <td height="33" class="eiquetas">&nbsp;Hasta Hora*</td>
        <td colspan="2"><input name="textfield4" type="text" id="textfield4"  onKeyUp="format(this);return teclaGRAL(this, event,'textfield5');" size="4" maxlength="2" autocomplete="off"  >
          <strong>:</strong>          <input name="textfield5" type="text" id="textfield5" autocomplete="off" onKeyDown="format(this);return restarHoras(this, event);" onKeyUp="return teclaGRAL(this, event,'number2');"  size="4" maxlength="2" ></td>
        </tr>
      <tr>
        <td height="34" class="eiquetas">&nbsp;Total Horas</td>
        <td><input name="number" type="text" id="number" size="10" readonly onChange="document.getElementById('number2').focus();" onBlur="document.getElementById('number2').focus();"></td>
        <td><input name="textfield6" type="text" id="textfield6" size="10" readonly style="visibility:hidden"  ></td>
      </tr>
      <tr>
        <td height="60" align="center" valign="top" class="eiquetas" style="color:#6D81F4">Desde Fecha (puede elegir cualquiera de las formas de cargar)</td>
        <td><table width="200" border="0" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
            <tr>
              <td align="center"><label for="textfield8">Dia(dd):</label>
                <input name="number2" type="number" id="number2" max="31" min="1" step="1"  size="2" style="text-align:center" onKeyUp="return teclaGRAL(this, event,'number3');"></td>
              <td>-</td>
              <td align="center"><label for="textfield9">Mes(mm)</label>
                
                <input name="number3" type="number" id="number3" max="12" min="1" step="1"  size="2" style="text-align:center" onKeyUp="return teclaGRAL(this, event,'number4');">
                <label for="textfield9"></label></td>
              <td valign="middle">-</td>
              <td align="center"><label for="textfield10">A&ntilde;o(aaaa)</label>
                <label for="number4"></label>
                <input name="number4" type="number" id="number4" max="2100" min="1950" step="1" value="<?php echo date("Y"); ?>" size="4" style="text-align:center" onKeyUp="return teclaGRAL(this, event,'button');">
                <label for="textfield10"></label></td>
            </tr>
          </tbody>
        </table>
         
            <input name="textfield" type="text" id="textfield" size="10"  value="<?php echo date("d-m-Y"); ?>" >
            <input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)" id="button1"  >
        </td>
        <td align="right" valign="bottom"><input type="button" name="button2" id="button2" value="Eliminar Asig." class="boton3" style="width:120px" onClick="eliminar();" >&nbsp;</td>
      </tr>
      <tr>
        <td height="62">&nbsp;</td>
        <td><input type="text" name="textfield7" id="textfield7" style="visibility:hidden"  >
          
        <input type="text" name="textfield8" id="textfield8" style="visibility:hidden"></td>
        <td align="right" valign="middle"><input name="button" type="button" class="boton3" id="button" value="Guardar Cambios" onClick=" guardar()" style="width:120px" >&nbsp;</td>
      </tr>
     
    </tbody>
  </table>
  </div><iframe id="detalles2" style="visibility:hidden"></iframe>
</form>
</body>
</html>
