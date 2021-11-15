<?php date_default_timezone_set('America/Bahia');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<link href="../jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="../jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../jquery.ui-1.10.4.autocomplete.min.js" type="text/javascript"></script>
<script type="text/javascript">

 
  $(function() {
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=EQUIPOS",
		autoFocus:false
	});
  });
  $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:false
	});
  });
  $(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:false
	});
  });
  function enviar(valor)
	{
			document.getElementById('detalle').src="busca_stock.php?q=" + document.getElementById("skills4").value+"&q2="+document.getElementById("skills2").value ;
	}
//	
//	
//	function guardar()
//	{
//		
//		if(document.getElementById("textfield3").value==''  || document.getElementById("textfield2").value==''  )
//		{
//			alert('Especifique la cantidad de equipo a transladar, deba ser MAYOR A CERO');
//		}
//		else
//		{
//			
//			var a = parseInt(document.getElementById("textfield3").value);
//			var b = parseInt(document.getElementById("textfield2").value);
//			
//			
//			if(a<b || a==b )
//			{
//				document.forms["form1"].submit();
//			}
//			else
//			{
//				
//			alert("La cantidad a enviar debe ser menor o igual a su existencia");	
//			}
//		}
//	}
	
	
	
	function Creadora2() {
	if(document.getElementById("skills3").value!=='' && document.getElementById("textfield2").value!=='' && document.getElementById("skills2").value!=='' &&  document.getElementById("skills4").value!=='' && document.getElementById("textfield3").value!=='')
	{
			var a = parseInt(document.getElementById("textfield3").value);
			var b = parseInt(document.getElementById("textfield2").value);
			if(a<b || a==b )
			{
			
			
			
	document.getElementById("textfield20").value = parseInt(document.getElementById("textfield20").value) + 1;
	document.getElementById("textfield30").value = parseInt(document.getElementById("textfield30").value) + 1;
	document.getElementById("textfield4").value = parseInt(document.getElementById("textfield4").value) + 1;
	document.getElementById("textfield5").value = parseInt(document.getElementById("textfield5").value) + 1;		
	document.getElementById("textfield6").value = parseInt(document.getElementById("textfield6").value) + 1;
	document.getElementById("textfield50").value = parseInt(document.getElementById("textfield50").value) + 1;	
	

	var table = document.getElementById("mitabla");
	
    var row = table.insertRow(0);
	
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
 	var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    var cell4 = row.insertCell(4);
    

    var input0 = document.createElement("input");
	var input1 = document.createElement("input");
	var input2 = document.createElement("input");
	var input3 = document.createElement("input");
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
		input1.value =document.getElementById("skills2").value;;

		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "100%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.id = document.getElementById("textfield4").value;
		input2.value =document.getElementById("skills3").value;
		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "100%";
		input3.readOnly = "true";	
		input3.style.border = "none";
		input3.style.textAlign = "right";
		input3.id = document.getElementById("textfield5").value;
		input3.value =document.getElementById("textfield3").value;
		
		
			
		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "50%";
		checkbox.style.height = "18px";

		checkbox.id =document.getElementById("textfield6").value;
 		
		checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
		
		//
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input2);
    	cell3.appendChild(input3);		
		cell4.appendChild(checkbox);
		
	document.getElementById("textfield2").value='';
	document.getElementById("textfield3").value='';	
	document.getElementById("skills2").value='';
	document.getElementById("skills3").value='';
	document.getElementById("skills4").value='';	
	document.getElementById("skills4").focus();
	
	}
			else
			{
				//if(document.getElementById("skills3").value=='' || document.getElementById("textfield2").value=='' || document.getElementById("skills2").value=='' ||  document.getElementById("skills4").value=='' || document.getElementById("textfield3").value=='' || parseInt(document.getElementById("textfield3").value)<parseInt(document.getElementById("textfield2").value))
//			{
				alert("La cantidad a enviar debe ser menor o igual a su existencia");		
			//}
			
			}
	}
}
function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;

   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	document.getElementById(valor2).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-100).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-200).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-300).style.backgroundColor="#A9D4F0";	
	document.getElementById(valor2-400).style.backgroundColor="#A9D4F0";


	var r = confirm("Desean Eliminar la Fila");
	if (r == true) {
    		BorraFila2()
			
	} 
	else
	{
			document.getElementById(valor2).checked = false;
			document.getElementById("textfield10").value="";
			document.getElementById(valor2).style.backgroundColor="#FFFFFF";			
			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";

	}
	
   }
   else
   {
   			document.getElementById(valor2).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";			
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
		document.getElementById("textfield2").value='';
		document.getElementById("textfield3").value='';	
		document.getElementById("skills2").value='';
		document.getElementById("skills3").value='';
		document.getElementById("skills4").value='';	
		document.getElementById("skills4").focus();

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
		var c7=500;	
		var limite =document.getElementById("textfield50").value;
		document.getElementById("textfield7").value = '';			
		document.getElementById("textfield8").value = '';
		document.getElementById("textfield9").value = '';
		document.getElementById("textfield10").value = '';
		
					
        for (r = 0; r <= limite; r++) 
		{
			
			try {
			    

						
				document.getElementById("textfield7").value = document.getElementById("textfield7").value+document.getElementById(c3).value+"--";			
			document.getElementById("textfield8").value = document.getElementById("textfield8").value+document.getElementById(c4).value+"--";			
			document.getElementById("textfield9").value = document.getElementById("textfield9").value+document.getElementById(c5).value+"--";
			document.getElementById("textfield10").value = document.getElementById("textfield10").value+document.getElementById(c6).value+"--";	
					

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
		if(document.getElementById("textfield7").value!=='' && document.getElementById("textfield8").value!=='' && document.getElementById("textfield9").value!=='' && document.getElementById("textfield10").value!=='')
		{
		document.forms["form1"].submit();
		}
		
		
		
}
function teclaGRAL2(field, event) {
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
<form id="form1" name="form1" method="post" action="guarda_mov_equipos.php">
<div class="polaroid7">
  <table width="100%" height="309" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="35" colspan="4" align="center" class="fondo_encabezado"><span class="titulo2">Movimiento de Equipos</span></td>
      </tr>
     <tr class="eiquetas">
        <td width="30%" height="30" class="eiquetas">&nbsp;Fecha</td>
        <td width="30%"><input name="textfield" type="text" id="textfield" size="10" value ="<?php echo date('d-m-Y');?>"readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
        <td width="17%" align="left">&nbsp;</td>
        <td width="23%">&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="41" class="eiquetas">&nbsp;Equipo</td>
        <td><div class="ui-widget">
  			<input autofocus id="skills4" placeholder="Ingrese Equipo a buscar..." size="25" onKeyUp="return teclaGRAL(this, event,'skills2');document.getElementById('textfield2').value='';" name="skills4"  >
      	</div></td>
        <td align="left">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr class="eiquetas">
        <td height="41" class="eiquetas">&nbsp;Origen</td>
        <td><div class="ui-widget">
  			<input  id="skills2" placeholder="Ingrese Origen..." size="25"  onKeyUp="return teclaGRAL(this, event,'skills3');" onBlur="enviar(1);"  name="skills2" >
      	</div></td>
        <td align="left">&nbsp;Existencia</td>
        <td><input name="textfield2" type="text" id="textfield2" placeholder="Stock" style="border:none; color:#0A0664; color:#E40A0D; font-size:18px; font-weight:bold" size="4" readonly></td>
      </tr>
       <tr class="eiquetas">
        <td height="41" class="eiquetas">&nbsp;Destino</td>
        <td><div class="ui-widget">
  			<input  id="skills3" placeholder="Ingrese Destino..." size="25" onKeyUp="return teclaGRAL(this, event,'textfield3');" name="skills3">
      	</div></td>
        <td align="left">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      
      <tr>
        <td height="39" class="eiquetas">&nbsp;Cantidad a Mover</td>
        <td>&nbsp;<input name="textfield3" type="text" id="textfield3" placeholder="Cant." onChange="format(this);" onKeyUp="format(this);return teclaGRAL2(this, event);" size="4" style="border:none; color:#0A0664; color:#E40A0D; font-size:18px; font-weight:bold;" autocomplete="off" ></td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="37" class="eiquetas"><iframe src="" id="detalle" width="10px" height="10px" style="visibility:hidden"  ></iframe></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td height="37">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="preparacion2();"></td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">
	  <td width="27%">Equipo&nbsp;</td>
      <td width="27%">Origen&nbsp;</td>
      <td width="29%">Destino&nbsp;</td>
      <td width="11%" align="right" >Cantidad&nbsp;</td>
      <td width="6%" align="right">&nbsp;</td>      
    </tr>
    
  </tbody>
</table>
        <table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas"  >
          <td width="27%"  height="1px">&nbsp;</td> 
          <td width="27%"  height="1px">&nbsp;</td>    
          <td width="29%" height="1px">&nbsp;</td>
          <td width="11%" align="right" height="1px">&nbsp;&nbsp;</td>
          <td width="6%" align="right" height="1px">&nbsp;</td>
		  
    </tr>
  </tbody>
</table>
  </div>
  <input name="textfield20" type="text" id="textfield20" value="99"   readonly style="visibility:hidden" >
  <input name="textfield30" type="text"  id="textfield30" value="199" readonly style="visibility:hidden">
  <input name="textfield4" type="text" id="textfield4" value="299" readonly style="visibility:hidden">
  <input name="textfield5" type="text" id="textfield5" value="399"  readonly style="visibility:hidden">
  <input name="textfield6" type="text" id="textfield6" value="499"   readonly style="visibility:hidden">
  <input type="text" name="textfield7" id="textfield7"   readonly style="visibility:hidden">
  <input type="text" name="textfield8" id="textfield8"   readonly style="visibility:hidden">
  <input type="text" name="textfield9" id="textfield9"   readonly style="visibility:hidden">
  <input type="text" name="textfield10" id="textfield10"   readonly style="visibility:hidden">
  <input name="textfield50" type="text" id="textfield50" value="0"    style="visibility:hidden">
</form>
</body>
</html>