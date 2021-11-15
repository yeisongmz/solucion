<?php 

date_default_timezone_set('America/Bahia');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script>


  $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=PERSONAL"
	});
  });
  $(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=EQUIPOS",
		autoFocus:false
	});
  });
 	function enviar2()
	{
		if(document.getElementById('skills2').value == ''  || document.getElementById('textfield13').value == ''   )
		{
			alert('Complete los campos obligatorios');
		}
		else
		{
		 document.getElementById("form1").submit();	
		}
	}


function Creadora2() {
	if(document.getElementById("skills3").value!=='' && document.getElementById("textfield2").value!=='' )
	{
	document.getElementById("textfield20").value = parseInt(document.getElementById("textfield20").value) + 1;
	document.getElementById("textfield30").value = parseInt(document.getElementById("textfield30").value) + 1;
	document.getElementById("textfield4").value = parseInt(document.getElementById("textfield4").value) + 1;
	document.getElementById("textfield5").value = parseInt(document.getElementById("textfield5").value) + 1;		
	document.getElementById("textfield6").value = parseInt(document.getElementById("textfield6").value) + 1;
	document.getElementById("textfield7").value = parseInt(document.getElementById("textfield7").value) + 1;
	document.getElementById("textfield8").value = parseInt(document.getElementById("textfield8").value) + 1;
	document.getElementById("textfield9").value = parseInt(document.getElementById("textfield9").value) + 1;	
	document.getElementById("textfield50").value = parseInt(document.getElementById("textfield50").value) + 1;	

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
		input0.value =document.getElementById("skills3").value;
		//input0.value =document.getElementById("textfield20").value;
		
		input1.type = "text";
        input1.className = "myInput";
        input1.style.height = "20px";
        input1.style.width = "100%";
		input1.readOnly = "true";
		input1.style.border = "none";
		input1.id = document.getElementById("textfield30").value;
		input1.value =document.getElementById("textfield").value;;

		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "100%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.id = document.getElementById("textfield4").value;
		input2.value =document.getElementById("textfield2").value;
		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "100%";
		input3.readOnly = "true";	
		input3.style.border = "none";	
		input3.id = document.getElementById("textfield5").value;
		input3.value =document.getElementById("hastafecha").value;
		
		
		input4.type = "text";
        input4.className = "myInput";
        input4.style.height = "20px";
        input4.style.width = "100%";
		input4.readOnly = "true";	
		input4.style.border = "none";	
		input4.id = document.getElementById("textfield7").value;
		input4.value =document.getElementById("textarea").value;
		
			
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
	document.getElementById("skills3").value='';
	document.getElementById("skills3").focus();
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
		var limite =document.getElementById("textfield50").value;
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
			document.getElementById("textfield15").value = document.getElementById("textfield15").value+document.getElementById(c5).value+"--";
			document.getElementById("textfield16").value = document.getElementById("textfield16").value+document.getElementById(c6).value+"--";	
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
		enviar2();
		
		
		
		
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
<form id="form1" name="form1" method="post" action="guarda_asignacion_equipos.php">
<div class="polaroid7">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="52" colspan="3" align="center" class="fondo_encabezado"><span class="titulo2" >Asignación de Equipos</span></td>
      </tr>
      <tr>
      	<td height="59" class="eiquetas">&nbsp;Desde fecha</td>
      	<td><input name="textfield" type="text" id="textfield" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
      	<td width="42%" valign="middle">Obs.:<textarea name="textarea" cols="30" rows="2" maxlength="250" id="textarea"></textarea></td>                
      </tr>
       <tr>
      	<td class="eiquetas">&nbsp;Hasta fecha</td>
      	<td><input name="hastafecha" type="text" id="hastafecha" value="<?php echo date('d-m-Y');?>" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].hastafecha,'dd-mm-yyyy',this)"></td>
      	<td width="42%" valign="top">&nbsp;</td>
      	               
       </tr>
      <tr>
        <td height="43" class="eiquetas">&nbsp;Personal</td>
        <td><div class="ui-widget">
          <input autofocus id="skills2" placeholder="Ingrese Apellido..." size="30" name="skills2" onKeyUp="return teclaGRAL(this, event,'skills3');"  ></div></td>
        <td width="42%" valign="top">&nbsp;</td>
        </tr>
      <tr>
        <td width="13%" height="36"><span class="eiquetas">&nbsp;Equipo</span></td>
        <td width="45%"><div class="ui-widget">
          <input autofocus id="skills3" placeholder="Ingrese Equipo a buscar..." size="30"   name="skills3" onKeyUp="return teclaGRAL(this, event,'textfield2');"></div></td>
        <td width="42%" valign="top">&nbsp;</td>
        </tr>
      <tr>
      	<td height="39" class="eiquetas">&nbsp;Cantidad</td>
      	<td><input name="textfield2" type="text" id="textfield2" autocomplete="off" onKeyUp="format(this);return teclaGRAL2(this, event);" size="4" maxlength="10"></td>
      	</tr>
     
    
      
      <tr>
        <td height="43">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="preparacion2();"></td>
      </tr>
     
     
    </tbody>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado_buscador">
        <td  width="44%">Equipo</td>
        <td  width="14%">Desde fecha</td>
        <td  width="14%">Hasta fecha</td>        
        <td  width="11%">Cantidad</td>
		<td  width="11%">Obs.</td>        
        <td  width="3%">&nbsp;</td>
      
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1"  cellpadding="0" cellspacing="0" class="tabla1" id="mitabla" >
    <tbody>
      <tr>
        <td  width="44%"></td>
        <td  width="14%"></td>
        <td  width="14%"></td>        
        <td  width="11%"></td>
        <td  width="11%"></td>        
        <td  width="3%">&nbsp;</td>
      
      </tr>
    </tbody>
  </table>
<input name="textfield20" type="text" id="textfield20" value="99"  readonly style="visibility:hidden"   >
  <input name="textfield30" type="text"  id="textfield30" value="199" readonly  style="visibility:hidden"   >
  <input name="textfield4" type="text" id="textfield4" value="299" readonly    style="visibility:hidden" >
  <input name="textfield5" type="text" id="textfield5" value="399"  readonly   style="visibility:hidden"  >
  <input name="textfield6" type="text" id="textfield6" value="499" readonly  style="visibility:hidden"   >
  <input name="textfield8" type="text" id="textfield8" value="599"  readonly  style="visibility:hidden"  >
 <input name="textfield9" type="text" id="textfield9" value="699"   readonly style="visibility:hidden"  >
  <input name="textfield7" type="text" id="textfield7" value="799"   readonly  style="visibility:hidden"  >
  <input name="textfield10" type="text" id="textfield10"  readonly   style="visibility:hidden" >
  <input type="text" name="textfield11" id="textfield11"  readonly  style="visibility:hidden" >
  <input type="text" name="textfield12" id="textfield12"  readonly  style="visibility:hidden"  >
  <input type="text" name="textfield13" id="textfield13" readonly    style="visibility:hidden" >
  <input type="text" name="textfield14" id="textfield14"  readonly   style="visibility:hidden" >
  <input type="text" name="textfield15" id="textfield15"   readonly  style="visibility:hidden"  >
    <input type="text" name="textfield16" id="textfield16"  readonly  style="visibility:hidden"  >
    <input type="text" name="textfield17" id="textfield17"  readonly  style="visibility:hidden"  >
  <input name="textfield50" type="text" id="textfield50" value="0"   style="visibility:hidden"  >
  </div>
</form>
</body>
</html>