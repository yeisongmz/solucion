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
<link href="../jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.autocomplete.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.menu.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	mitabla.style.border = "1px solid #000";
	
	
}
</style>
<script src="js/funciones.js"></script>
<script src="js/funciones2.js"></script>
<script src="js/dhtmlgoodies_calendar.js"></script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    var myInput = document.getElementById("m2");
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

<script>


$(document).ready(function() {
    src = 'search_general.php';
    $("#skills4").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term,
                    v : "SUCURSALES2",
					id:$("#textfield16").val()
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
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=PERSONAL",
		autoFocus:true
	});
  });
  $(function() {
    $( "#skills5" ).autocomplete({
		source:"search_general.php?v=CLIENTES",
		autoFocus:false
	});
  });
  

  
 	function enviar2()
	{
		if(document.getElementById('skills4').value == ''  || document.getElementById('skills3').value == ''  || document.getElementById('number2').value == ''  )
		{
			alert('Complete los campos obligatorios');
		}
		else
		{
		 document.getElementById("form1").submit();	
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
	document.getElementById('textfield17').value=dias_elegidos;
}
function Creadora2(sucursal,fecha,hora1,min1,hora2,min2,cant_horas) {
	
			var dia=document.getElementById("number2").value;
			var mes=document.getElementById("number3").value;
			var ano=document.getElementById("number4").value;
			var dia_elegido=document.getElementById("textfield17").value;
			
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
			
			var valida= validaFechaDDMMAAAA(fecha);

			if(fecha.length==10 && valida==true)
			{
				document.getElementById("textfield2").value=fecha;	
			}
			else
			{
				fecha=document.getElementById("textfield2").value;	
			}
			
	document.getElementById("textfield20").value = parseInt(document.getElementById("textfield20").value) + 1;
	document.getElementById("textfield30").value = parseInt(document.getElementById("textfield30").value) + 1;
	document.getElementById("textfield4").value = parseInt(document.getElementById("textfield4").value) + 1;
	document.getElementById("textfield5").value = parseInt(document.getElementById("textfield5").value) + 1;		
	document.getElementById("textfield6").value = parseInt(document.getElementById("textfield6").value) + 1;
	document.getElementById("textfield8").value = parseInt(document.getElementById("textfield8").value) + 1;
	document.getElementById("textfield9").value = parseInt(document.getElementById("textfield9").value) + 1;	
	document.getElementById("textfield").value = parseInt(document.getElementById("textfield").value) + 1;	
	document.getElementById("textfield18").value = parseInt(document.getElementById("textfield18").value) + 1;	

	var table = document.getElementById("mitabla");
	
    var row = table.insertRow(0);
	//row.id=document.getElementById("textfield8").value;
	//row.addEventListener("onmouseover", cambioColor(row.id),false);
	
	
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
 	var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
 	var cell4 = row.insertCell(4);
	var cell5 = row.insertCell(5);
	var cell6 = row.insertCell(6);


// CREO UN ELEMENTO DEL TIPO INPUT CON document.createElement("NOMBRE TAG HTML QUE QUIERO CREAR");

 

    var input0 = document.createElement("input");
	var input1 = document.createElement("input");
	var input2 = document.createElement("input");
	var input3 = document.createElement("input");
	var input4 = document.createElement("input");
	var input5 = document.createElement("input");
	var checkbox = document.createElement("input");
	

	
        input0.type = "text";
        input0.className = "myInput";
        input0.style.height = "20px";
        input0.style.width = "100%";
		input0.readOnly = "true";
		input0.style.border = "none";
		input0.id = document.getElementById("textfield20").value;
		input0.value =sucursal;
		
		input1.type = "text";
        input1.className = "myInput";
        input1.style.height = "20px";
        input1.style.width = "100%";
		input1.readOnly = "true";
		input1.style.border = "none";
		input1.id = document.getElementById("textfield30").value;
		input1.value =fecha;

		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "100%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.id = document.getElementById("textfield4").value;
		input2.value =hora1+":"+min1;
		

		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "100%";
		input3.readOnly = "true";
		input3.style.border = "none";
		input3.id = document.getElementById("textfield5").value;
		input3.value =hora2+":"+min2;
//		
//
//		
		input4.type = "text";
        input4.className = "myInput";
        input4.style.height = "20px";
        input4.style.width = "100%";
		input4.readOnly = "true";
		input4.style.border = "none";
		input4.id = document.getElementById("textfield6").value;
		input4.value =cant_horas;
		
		input5.type = "text";
        input5.className = "myInput";
        input5.style.height = "20px";
        input5.style.width = "100%";
		input5.readOnly = "true";
		input5.style.border = "none";
		input5.id = document.getElementById("textfield18").value;
		input5.value =dia_elegido;
//		
		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "50%";
		checkbox.style.height = "18px";

		checkbox.id =document.getElementById("textfield8").value;
 		
		checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
		
		//
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input2);   	
    	cell3.appendChild(input3);
    	cell4.appendChild(input4); 
  		cell5.appendChild(input5);
		cell6.appendChild(checkbox); 
	
	//document.getElementById(document.getElementById("textfield5").value).style.textAlign = "right";
//	document.getElementById(document.getElementById("textfield4").value).style.textAlign = "right";
//	document.getElementById(document.getElementById("textfield9").value).style.textAlign = "right";
	document.getElementById("skills4").value='';
	document.getElementById("h1").value='';
	document.getElementById("m1").value='';
	document.getElementById("h2").value='';
	document.getElementById("m2").value='';
	document.getElementById("textfield3").value='';
	document.getElementById("textfield17").value='';
	document.getElementById("checkbox").checked=false;
	document.getElementById("checkbox2").checked=false;
	document.getElementById("checkbox3").checked=false;
	document.getElementById("checkbox4").checked=false;
	document.getElementById("checkbox5").checked=false;
	document.getElementById("checkbox6").checked=false;
	document.getElementById("checkbox7").checked=false;

	document.getElementById("skills4").focus();

}
function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;
   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	document.getElementById(valor2-100).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-200).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-300).style.backgroundColor="#A9D4F0";	
	document.getElementById(valor2-400).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-500).style.backgroundColor="#A9D4F0";
	//document.getElementById(parseInt(valor2)+200).style.backgroundColor="#A9D4F0";
	var r = confirm("Desean Eliminar la Fila");
	if (r == true) {
    		BorraFila2()
			
	} 
	else
	{
			document.getElementById(valor2).checked = false;
			document.getElementById("textfield10").value="";
   			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-500).style.backgroundColor="#FFFFFF";			
	//		document.getElementById(parseInt(valor2)+200).style.backgroundColor="#FFFFFF";
	}
	
   }
   else
   {
			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-500).style.backgroundColor="#FFFFFF";			
			///document.getElementById(parseInt(valor2)+200).style.backgroundColor="#FFFFFF";	   
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
function restarHoras2(field, event) {

			var sucursal=document.getElementById('skills4').value,fecha=document.getElementById('textfield2').value,hora1=document.getElementById('h1').value,min1=document.getElementById('m1').value,hora2=document.getElementById('h2').value,min2=document.getElementById('m2').value;
	 
			if(sucursal=='' || fecha=='' || hora1=='' || min1=='' || hora2==''|| min2=='' ||  document.getElementById('skills2').value=='')
			{
				
			}
			else
			{
	
						
					
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
  					
				 if (horas.length < 2) 
				 {
					horas = "0"+horas;
				  }
				  	document.getElementById("textfield3").focus();
					document.getElementById("textfield3").value = horas+":"+minutos;
					document.getElementById("textfield7").value = horas+":"+minutos;
					if(document.getElementById("skills2").value =='' || document.getElementById("skills4").value =='' || document.getElementById("h1").value =='' || document.getElementById("m1").value =='' || document.getElementById("h2").value =='' || document.getElementById("m2").value =='' )
					{
 							alert("Complete los campos Obligatorios");
					}
					
					
					}
						break;
						
			case 9 :
			
			
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
  					
				 if (horas.length < 2) 
				 {
					horas = "0"+horas;
				  }

					document.getElementById("textfield3").value = horas+":"+minutos;
					document.getElementById("textfield7").value = horas+":"+minutos;

					if(document.getElementById("skills2").value =='' || document.getElementById("skills4").value =='' || document.getElementById("h1").value =='' || document.getElementById("m1").value =='' || document.getElementById("h2").value =='' || document.getElementById("m2").value =='' )
					{
 							alert("Complete los campos Obligatorios");
					}
						
					
					}

						break;	

						
				}
					
			}
  }
  
  
  function bajar2(field, event)
  {
	  	var sucursal=document.getElementById('skills4').value,fecha=document.getElementById('textfield2').value,hora1=document.getElementById('h1').value,min1=document.getElementById('m1').value,hora2=document.getElementById('h2').value,min2=document.getElementById('m2').value,cant_horas=document.getElementById('textfield7').value;
							
	if(document.activeElement.name=='textfield3')
	{						
						
	   switch (event.keyCode) 
  		{
	
			case 13 :

				if(sucursal==''||fecha==''||hora1==''||min1==''||hora2==''||min2==''||cant_horas==''||document.getElementById('skills2').value=='')
				{
				}
				else
				{
				Creadora2(sucursal,fecha,hora1,min1,hora2,min2,cant_horas);	  
				}	
	  }
  }
						
						
  }
  
  
  
  function preparacion2()
{

		var table = document.getElementById('mitabla');
		
		var r = 0;
		var n = table.rows.length;
		var c1=100;
		var c2=200;
		var c3=300;
		var c4=400;
		var c5=500;
		var c6=800;
		var limite =document.getElementById("textfield").value;
		document.getElementById("textfield11").value = '';			
		document.getElementById("textfield12").value = '';
		document.getElementById("textfield13").value = '';
		document.getElementById("textfield14").value = '';
		document.getElementById("textfield15").value = '';	
		document.getElementById("textfield17").value = '';			
        for (r = 0; r <= limite; r++) 
		{
			
			try {
			    
				
				document.getElementById("textfield11").value = document.getElementById("textfield11").value+document.getElementById(c1).value+"--";			
				document.getElementById("textfield12").value = document.getElementById("textfield12").value+document.getElementById(c2).value+"--";			
				document.getElementById("textfield13").value = document.getElementById("textfield13").value+document.getElementById(c3).value+"--";			
			document.getElementById("textfield14").value = document.getElementById("textfield14").value+document.getElementById(c4).value+"--";			
			document.getElementById("textfield15").value = document.getElementById("textfield15").value+document.getElementById(c5).value+"--";			
			document.getElementById("textfield17").value = document.getElementById("textfield17").value+document.getElementById(c6).value+"--";
				}
			catch(err) {
   
			}
		
		c1=parseInt(c1)+1;	
		c2=parseInt(c2)+1;	
		c3=parseInt(c3)+1;	
		c4=parseInt(c4)+1;	
		c5=parseInt(c5)+1;
		c6=parseInt(c6)+1;		
      	
        }
		if(document.getElementById("textfield11").value==''||document.getElementById("textfield12").value==''||document.getElementById("textfield13").value==''||document.getElementById("textfield14").value==''||document.getElementById("textfield15").value=='')
		{
			
		}
		else
		{
			
			document.getElementById("form1").submit();
		}
		
		
}
  </script>
  <script type="text/javascript">
   function enviar(valor)
  {
	 
	  var foco=document.activeElement.id;

			switch(foco) {
				case "skills2":
				  // document.getElementById('detalles').src='translados_iframe.php?q='+document.getElementById("skills4").value;
				//document.getElementById("skills5").focus();
					break;
				case "skills5":
				
					document.getElementById('detalles2').src='buscador_gral.php?origen=asignacion_sucursales&dato='+document.getElementById("skills5").value;
					document.getElementById("skills3").focus();
					break;
				case "skills4":
					//document.getElementById("h1").focus();
					break;	
				default:
				   
					
			}
  }
  function teclaGRAL2 (field, event,sgte) 
{

	 var foco=document.activeElement.id;
	switch (event.keyCode) {
			case 13 :
					if(foco=="skills4")
						{
					
						}
						if(foco=="skills5")
						{
							document.getElementById('detalles2').src='buscador_gral.php?origen=asignacion_sucursales&dato='+document.getElementById("skills5").value;
						}
						document.getElementById(sgte).focus();
						break;	
					
	}
}
function limpiar() 
{
	location='sucursales_personal.php';
	//document.getElementById("skills2").value='';
//	document.getElementById("skills4").value='';
//	document.getElementById("skills5").value='';
//	document.getElementById("h1").value='';
//	document.getElementById("h2").value='';
//	document.getElementById("m1").value='';
//	document.getElementById("m2").value='';
//	document.getElementById("textfield3").value='';
//	document.getElementById("textfield7").value='';
//	document.getElementById("number2").value='';
//	document.getElementById("number3").value='';
//
//	//var str = document.getElementById("mitabla").rows.length;
//		
//		var i = 0;
//		for(i = 0; i<document.getElementById("mitabla").rows.length;i++)
//			{
//				document.getElementById("mitabla").deleteRow(i);
//				//alert(i);	
//			}
//		document.getElementById("textfield10").value="";
}

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
  </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_sucursal_personal.php">
<div class="polaroid7">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr>
        <td height="48" colspan="5" align="center" class="fondo_encabezado">Asignaci&oacute;n de Personal a Clientes</td>
      </tr>
      <tr>
        <td width="27%" height="36" class="eiquetas">Personal*</td>
        <td colspan="4"><div class="ui-widget">
          <input autofocus id="skills2" placeholder="Ingrese Nombre..." size="40" name="skills2"  onKeyUp="return teclaGRAL(this, event,'skills5')" onFocus="foco:this.id"   >
        </div></td>
        </tr>
      <tr>
        <td height="39" class="eiquetas">Cliente*</td>
        <td colspan="4">
          <div class="ui-widget">
            <input  id="skills5" placeholder="Ingrese Cliente" size="40" name="skills5"  onKeyUp="return teclaGRAL2(this, event,'skills4');" onFocus="foco:this.id"   >       
          </div></td>
      </tr>
      <tr>
        <td class="eiquetas">Sucursal*</td>
        <td colspan="4"><div class="ui-widget">
          <input  id="skills4" placeholder="Ingrese Sucursal" size="40" name="skills4"  onKeyUp="return teclaGRAL(this, event,'number2')" onFocus="foco:this.id"  >
        </div></td>
        </tr>
      <tr>
        <td height="64" valign="bottom" class="eiquetas" style="color:#6D81F4">Desde Fecha (puede elegir cualquiera de las formas de cargar)*</td>
        <td colspan="4" align="left" valign="bottom"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
            <tr>
              <td width="19%" align="center"><label for="textfield8">Dia(dd):</label>
                <input name="number2" type="number" id="number2" max="31" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number3');"></td>
              <td width="3%">&nbsp;</td>
              <td width="20%" align="center"><label for="textfield9">Mes(mm)</label>
                
                <input name="number3" type="number" id="number3" max="12" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number4');">
                <label for="textfield9"></label></td>
              <td width="3%" valign="middle">&nbsp;</td>
              <td width="24%" align="center"><label for="textfield10">A&ntilde;o(aaaa)</label>
                <label for="number4"></label>
                <input name="number4" type="number" id="number4" max="2100" min="1950" step="1" value="<?php echo date("Y"); ?>" size="4" style="text-align:center" onKeyUp="return teclaGRAL(this, event,'checkbox');">
                <label for="textfield10"></label></td>
              <td width="20%" align="right"><input name="textfield2" type="text" id="textfield2" onChange="document.getElementById('time').focus();" value="<?php echo date('d-m-Y');?>" size="10" readonly>&nbsp;</td>
              <td width="11%" align="left"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" name="button1" id="button1"></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td height="51" align="left" class="eiquetas">&nbsp;</td>
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
        </tr>
      <tr>
        <td height="39" align="left" valign="bottom" class="eiquetas">Desde Hora*</td>
        <td width="20%" align="left" valign="bottom"><span class="eiquetas">Hasta Hora*</span></td>
      
        <td width="18%" align="center" valign="bottom"><span class="eiquetas">Cantidad de Horas</span></td>
        </tr>
      <tr>
        <td height="36" align="left" class="eiquetas"><input name="h1" type="text" id="h1" max="23" min="0" step="1" onKeyUp="format(this);return teclaGRAL(this, event,'m1');" size="2" maxlength="2"  autocomplete="off">
          <strong>:</strong><input name="m1" type="text" id="m1" max="59" min="0" step="1" onKeyUp="format(this);return teclaGRAL(this, event,'h2');" size="2" maxlength="2" autocomplete="off" ></td>
        <td align="left"><input name="h2" type="text" id="h2" max="23" min="0" step="1" onKeyUp="format(this);return teclaGRAL(this, event,'m2');" size="2" maxlength="2"  autocomplete="off" >
          <strong>:</strong><input name="m2" type="text" id="m2" max="59" min="0" step="1"  size="2" maxlength="2" autocomplete="off"  onKeyDown="format(this);return restarHoras2(this, event);"   ></td>
        <td align="center"><input name="textfield3" type="text" id="textfield3"  onKeyUp="bajar2(this,event);" size="4" maxlength="3" autocomplete="off" ></td>
        <td width="35%" colspan="2" align="center"><input name="textfield7" type="text" id="textfield7" readonly style="visibility:hidden"></td>
      </tr>
       
      <tr>
        <td height="42">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right"><input name="button3" type="button" class="boton3" id="button3" value="Nuevo" onClick="limpiar(); " style="width:85px">          <input name="button2" type="button" class="boton3" id="button2" value="Guardar" onClick="preparacion2() " style="width:85px"></td>
        <td align="right">&nbsp;</td>
      </tr>
     
     
     
    </tbody>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado_buscador">
        <td  width="30%">Destino</td>
        <td  width="13%">Fecha</td>
        <td  width="10%">Desde Hora</td>
        <td  width="10%">Hasta hora</td>
        <td  width="11%">Cant. horas</td>
        <td  width="22%">Dias</td>
        <td  width="4%">&nbsp;</td>
      
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1"  cellpadding="0" cellspacing="0" class="tabla1" id="mitabla" >
    <tbody>
      <tr>
        <td  width="30%"></td>
        <td  width="13%"></td>
        <td  width="10%"></td>
        <td  width="10%"></td>
        <td  width="11%"></td>
         <td  width="22%"></td>
        <td  width="4%">&nbsp;</td>
      
      </tr>
    </tbody>
  </table>
<input name="textfield20" type="text" id="textfield20" value="99"  readonly style="visibility:hidden">
  <input name="textfield30" type="text" style="visibility:hidden" id="textfield30" value="199" readonly >
  <input name="textfield4" type="text" id="textfield4" value="299" readonly style="visibility:hidden">
  <input name="textfield5" type="text" id="textfield5" value="399"  readonly style="visibility:hidden">
  <input name="textfield6" type="text" id="textfield6" value="499" readonly style="visibility:hidden">
  <input name="textfield8" type="text" id="textfield8" value="599"  style="visibility:hidden">
 <input name="textfield9" type="text" id="textfield9" value="699"  readonly style="visibility:hidden">
  <input name="textfield10" type="text" id="textfield10"  style="visibility:hidden">
  <input type="text" name="textfield11" id="textfield11"   style="visibility:hidden">
  <input type="text" name="textfield12" id="textfield12"    style="visibility:hidden">
  <input type="text" name="textfield13" id="textfield13"   style="visibility:hidden">
  <input type="text" name="textfield14" id="textfield14"    style="visibility:hidden">
  <input type="text" name="textfield15" id="textfield15"    style="visibility:hidden">
  <input name="textfield" type="text" id="textfield" value="0" style="visibility:hidden">
  <input name="textfield16" type="text" id="textfield16" value="0" style="visibility:hidden">
  <input type="text" name="textfield17" id="textfield17"  style="visibility:hidden">
  <input name="textfield18" type="text" id="textfield18" value="799"  style="visibility:hidden">

<p><iframe id="detalles2" height="1" width="1"  style="visibility:hidden"></iframe>&nbsp;</p>







  <p>&nbsp;</p>
  </div>
</form>
</body>
</html>