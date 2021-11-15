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
 $(function() 
 {$("#skills4").autocomplete({source:"search_general.php?v=SUCURSALES",autoFocus:true});});
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
	 if( document.getElementById("skills3").value==''  )
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
	 
	 
	 

function cargar(valor)
		{
		document.getElementById('textfield7').value= valor+'--';
		document.getElementById('textfield2').focus();
		}

function Creadora2() {
	if(document.getElementById("skills3").value!=='' && document.getElementById("skills4").value!=='' )
	{
	document.getElementById("textfield20").value = parseInt(document.getElementById("textfield20").value) + 1;
	document.getElementById("textfield30").value = parseInt(document.getElementById("textfield30").value) + 1;
	document.getElementById("textfield40").value = parseInt(document.getElementById("textfield40").value) + 1;
	document.getElementById("textfield50").value = parseInt(document.getElementById("textfield50").value) + 1;		
	document.getElementById("textfield60").value = parseInt(document.getElementById("textfield60").value) + 1;
	document.getElementById("textfield7").value = parseInt(document.getElementById("textfield7").value) + 1;
	document.getElementById("textfield8").value = parseInt(document.getElementById("textfield8").value) + 1;
	document.getElementById("textfield9").value = parseInt(document.getElementById("textfield9").value) + 1;	
	document.getElementById("textfield500").value = parseInt(document.getElementById("textfield500").value) + 1;	

	var table = document.getElementById("mitabla");
	
    var row = table.insertRow(0);
	
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
 	var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    var cell4 = row.insertCell(4);
 	var cell5 = row.insertCell(5);

    var input0 = document.createElement("input");
	var input1 = document.createElement("input");
	var input2 = document.createElement("input");
	var input3 = document.createElement("input");
	var input4 = document.createElement("input");	
	var checkbox = document.createElement("input");
	

	
        input0.type = "text";
        input0.className = "myInput";
        input0.style.height = "20px";
        input0.style.width = "100%";
		input0.readOnly = "true";
		input0.style.border = "none";
		input0.id = document.getElementById("textfield20").value;
		input0.value =document.getElementById("skills4").value;
		//input0.value =document.getElementById("textfield20").value;
		
		input1.type = "text";
        input1.className = "myInput";
        input1.style.height = "20px";
        input1.style.width = "100%";
		input1.readOnly = "true";
		input1.style.border = "none";
		input1.id = document.getElementById("textfield30").value;
		input1.value =document.getElementById("textfield2").value+':'+document.getElementById("textfield3").value;

		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "100%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.id = document.getElementById("textfield40").value;
		input2.value =document.getElementById("number").value;
		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "100%";
		input3.readOnly = "true";	
		input3.style.border = "none";	
		input3.id = document.getElementById("textfield50").value;
		input3.value =document.getElementById("textfield4").value+':'+document.getElementById("textfield5").value;
		
		
		input4.type = "text";
        input4.className = "myInput";
        input4.style.height = "20px";
        input4.style.width = "100%";
		input4.readOnly = "true";	
		input4.style.border = "none";	
		input4.id = document.getElementById("textfield7").value;
		input4.value =document.getElementById("number2").value+'-'+document.getElementById("number3").value+'-'+document.getElementById("number4").value;
		
			
		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "50%";
		checkbox.style.height = "18px";

		checkbox.id =document.getElementById("textfield8").value;
 		
		checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
		
		//
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input3);   	
  		cell3.appendChild(input2);
		cell4.appendChild(input4);
		cell5.appendChild(checkbox);
		
	document.getElementById("textfield2").value='';
	document.getElementById("textfield3").value='';
	document.getElementById("textfield4").value='';
	document.getElementById("textfield5").value='';
	document.getElementById("textfield6").value='';
	document.getElementById("number").value='';
	document.getElementById("skills4").value='';
	document.getElementById("skills4").focus();
	}
}
function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;

   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	document.getElementById(valor2-200).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-300).style.backgroundColor="#A9D4F0";	
	document.getElementById(valor2-400).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-500).style.backgroundColor="#A9D4F0";

	var r = confirm("Desean Eliminar la Fila");
	if (r == true) {
    		BorraFila2()
			
	} 
	else
	{
			document.getElementById(valor2).checked = false;
			document.getElementById("textfield10").value="";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-500).style.backgroundColor="#FFFFFF";			
	}
	
   }
   else
   {
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-500).style.backgroundColor="#FFFFFF";			
   }
}

function BorraFila2()
{

		var str = document.getElementById("textfield10").value;
		var res = str.split("--");
		var i = 0;
		for(i = 0; i<res.length-1;i++)
			{
				document.getElementById("mitabla").deleteRow(res[i]);	
			}
		document.getElementById("textfield10").value="";

}

  function preparacion2()
{

		var table = document.getElementById('mitabla');
		
		var r = 0;
		var n = table.rows.length;
		var c3=100;
		var c4=200;
		var c5=300;
		var c6=400;
		var c7=800;	
		var limite =document.getElementById("textfield500").value;
		document.getElementById("textfield11").value = '';			
		document.getElementById("textfield12").value = '';
		document.getElementById("textfield13").value = '';
		document.getElementById("textfield14").value = '';
		document.getElementById("textfield15").value = '';	
		document.getElementById("textfield16").value = '';
		document.getElementById("textfield17").value = '';			
					
        for (r = 0; r <= limite; r++) 
		{
			
			try {
			    

						
				document.getElementById("textfield13").value = document.getElementById("textfield13").value+document.getElementById(c3).value+"--";			
			document.getElementById("textfield14").value = document.getElementById("textfield14").value+document.getElementById(c4).value+"--";			
			document.getElementById("textfield15").value = document.getElementById("textfield15").value+document.getElementById(c6).value+"--";
			document.getElementById("textfield16").value = document.getElementById("textfield16").value+document.getElementById(c5).value+"--";	
			document.getElementById("textfield17").value = document.getElementById("textfield17").value+document.getElementById(c7).value+"--";			

				}
			catch(err) {
   
			}
		
		//
		c3=parseInt(c3)+1;	
		c4=parseInt(c4)+1;	
		c5=parseInt(c5)+1;
		c6=parseInt(c6)+1;	
		c7=parseInt(c7)+1;	
      	
        }
		guardar();
		
		
		
		
}
 
 function xx(event) {
  switch (event.keyCode) 
  {
			case 13 :
			Creadora2() ;
			break;
  }
}	

</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_asistencia_comodines.php">
<div class="polaroid7">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td width="30%" height="28">&nbsp;Personal*</td>
        <td width="68%"><input id="skills3" name="skills3" placeholder="Ingrese Apellido..." size="40" onKeyUp="return teclaGRAL(this, event,'skills4');" autofocus ></td>
        <td width="2%">&nbsp;</td>
      </tr>
      <tr>
        <td height="27">&nbsp;Cliente*</td>
        <td><input id="skills4" name="skills4" placeholder="Sucursal cliente..." size="40" onKeyUp="return teclaGRAL(this, event,'textfield2');" ></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="27">&nbsp;Hora Entrada*</td>
        <td><input name="textfield2" type="text" id="textfield2" autocomplete="off" onKeyUp="format(this);return teclaGRAL(this, event,'textfield3');" size="4" maxlength="2" >
          <strong>:</strong><input name="textfield3" type="text" id="textfield3" autocomplete="off" onKeyUp="format(this);return teclaGRAL(this, event,'textfield4');"  size="4" maxlength="2" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;Hora Salida*</td>
        <td><input name="textfield4" type="text" id="textfield4"  onKeyUp="format(this);return teclaGRAL(this, event,'textfield5');" size="4" maxlength="2" autocomplete="off"  >
          <strong>:</strong><input name="textfield5" type="text" id="textfield5" autocomplete="off" onKeyDown="format(this);return restarHoras(this, event);" onKeyUp="return teclaGRAL(this, event,'number2');"  size="4" maxlength="2" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">&nbsp;Horas Trabajadas</td>
        <td><input name="number" type="text" id="number" size="10" readonly onChange="document.getElementById('number2').focus();" onBlur="document.getElementById('number2').focus();"></td>
        <td>&nbsp;<input name="textfield6" type="text" id="textfield6" size="10" readonly style="visibility:hidden" ></td>
      </tr>
      <tr>
        <td style="color:#6D81F4">&nbsp;Fecha de Asistencia (puede elegir cualquiera de las formas de cargar)</td>
        <td><table width="200" border="0" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
            <tr>
              <td align="center"><label for="textfield8">Dia(dd):</label>
                <input name="number2" type="number" id="number2" max="31" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number3');" value="<?php echo date("d"); ?>"></td>
              <td>-</td>
              <td align="center"><label for="textfield9">Mes(mm)</label>
                
                <input name="number3" type="number" id="number3" max="12" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number4');" value="<?php echo date("m"); ?>">
                <label for="textfield9"></label></td>
              <td valign="middle">-</td>
              <td align="center"><label for="textfield10">A&ntilde;o(aaaa)</label>
                <label for="number4"></label>
                <input name="number4" type="number" id="number4" max="2100" min="1950" step="1" value="<?php echo date("Y"); ?>" size="4" style="text-align:center" onKeyUp="return xx(event);">
                <label for="textfield10"></label></td>
            </tr>
          </tbody>
        </table><input name="textfield" type="text" id="textfield" size="10"  value="<?php echo date("d-m-Y"); ?>" ><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)" id="button1"  ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="42">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="preparacion2();"></td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">

      <td width="54%">Cliente</td>
      <td width="11%">Entrada</td>
      <td width="8%" align="right" >Salida</td>
      <td width="8%" align="right">Total Horas</td>
      <td width="10%" align="right">Fecha</td>
	  <td width="9%" align="right">&nbsp;</td>      
    </tr>
    
  </tbody>
</table>
        <table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas"  >
          <td width="54%"  height="1px">&nbsp;</td>    
          <td width="11%" height="1px">&nbsp;</td>
          <td width="8%" align="right" height="1px">&nbsp;&nbsp;</td>
          <td width="8%" align="right" height="1px">&nbsp;</td>
		  <td width="10%" align="right" height="1px">&nbsp;</td>          
          <td width="9%" align="right" height="1px">&nbsp;</td>
    </tr>
  </tbody>
</table>
<input name="textfield20" type="text" id="textfield20" value="99"  readonly  style="visibility:hidden"  >
  <input name="textfield30" type="text"  id="textfield30" value="199" readonly     style="visibility:hidden">
  <input name="textfield40" type="text" id="textfield40" value="299" readonly     style="visibility:hidden">
  <input name="textfield50" type="text" id="textfield50" value="399"  readonly    style="visibility:hidden">
  <input name="textfield60" type="text" id="textfield60" value="499" readonly     style="visibility:hidden">
  <input name="textfield8" type="text" id="textfield8" value="599"  readonly   style="visibility:hidden">
 <input name="textfield9" type="text" id="textfield9" value="699"   readonly   style="visibility:hidden">
  <input name="textfield7" type="text" id="textfield7" value="799"   readonly    style="visibility:hidden">
  <input name="textfield10" type="text" id="textfield10"  readonly    style="visibility:hidden">
  <input type="text" name="textfield11" id="textfield11"  readonly   style="visibility:hidden">
  <input type="text" name="textfield12" id="textfield12"  readonly   style="visibility:hidden">
  <input type="text" name="textfield13" id="textfield13" readonly     style="visibility:hidden">
  <input type="text" name="textfield14" id="textfield14"  readonly    style="visibility:hidden">
  <input type="text" name="textfield15" id="textfield15"   readonly    style="visibility:hidden">
    <input type="text" name="textfield16" id="textfield16"  readonly    style="visibility:hidden">
    <input type="text" name="textfield17" id="textfield17"  readonly    style="visibility:hidden">
  <input name="textfield500" type="text" id="textfield500" value="0"    style="visibility:hidden">
  </div>
</form>
</body>
</html>