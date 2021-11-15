<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Documento sin título</title>
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">

<script type="text/javascript">

 $(function() 
 {$("#skills2").autocomplete({source:"search_general.php?v=UBICACIONES",autoFocus:true});});
 
 $(function() 
 {$("#skills3").autocomplete({source:"search_general.php?v=EQUIPOS",autoFocus:true});});
 
 function guardar()
 {
	 if(document.getElementById("skills2").value==''  || document.getElementById("textfield").value=='' || document.getElementById("textarea").value=='' )
	 {
	 	alert('Complete todos los campos ');
	 }
	 else
	 {
			document.getElementById("form1").submit();	 
	 }
 }
 function enviar(valor)
	{
		var x = document.activeElement.name;
		if(x=="skills2")
		{
			document.getElementById('skills3').focus();
			return;
		}
			document.getElementById('detalle').src="busca_stock.php?q=" + document.getElementById("skills3").value+"&q2="+document.getElementById("skills2").value ;
			document.getElementById('textfield3').focus();
			return;
	}
function teclaGRAL2(field, event) {
  switch (event.keyCode) 
  {
			case 13 :
			Creadora2() ;
			break;
  }
}	
	
	
	
	function Creadora2() {
	if(document.getElementById("skills3").value!=='' && document.getElementById("textfield3").value!=='' && document.getElementById("skills2").value!=='')
	{
			var a = parseInt(document.getElementById("textfield3").value);
			var b = parseInt(document.getElementById("textfield2").value);
			if(a<b || a==b || document.getElementById("select").value=="ENTRADA")
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


				var input0 = document.createElement("input");
				var input2 = document.createElement("input");
				var checkbox = document.createElement("input");
				
				input0.type = "text";
				input0.className = "myInput";
				input0.style.height = "20px";
				input0.style.width = "100%";
				input0.readOnly = "true";
				input0.style.border = "none";
				input0.id = document.getElementById("textfield20").value;
				input0.value =document.getElementById("skills3").value;
		
				
		
				input2.type = "text";
				input2.className = "myInput";
				input2.style.height = "20px";
				input2.style.width = "100%";
				input2.readOnly = "true";	
				input2.style.border = "none";
				input2.style.textAlign = "right";	
				input2.id = document.getElementById("textfield30").value;
				input2.value =document.getElementById("textfield3").value;
				
				
					
				checkbox.type = "checkbox";
				checkbox.name = "elementos";
				checkbox.style.width = "50%";
				checkbox.style.height = "18px";
				checkbox.id =document.getElementById("textfield4").value;
 				checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
				cell0.appendChild(input0);   
				cell1.appendChild(input2);   
				cell2.appendChild(checkbox);
		

		
				document.getElementById("textfield2").value='';
				document.getElementById("textfield3").value='';	
				document.getElementById("skills3").value='';
				document.getElementById("skills3").focus();
	
	}
			else
			{
				
				alert("La cantidad a enviar debe ser menor o igual a su existencia");
				document.getElementById("textfield3").value='';			
				document.getElementById("textfield3").focus();
			
			}
	}
}
function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;

   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	//document.getElementById(valor2).style.backgroundColor="#A9D4F0";
//	document.getElementById(valor2-100).style.backgroundColor="#A9D4F0";
//	document.getElementById(valor2-200).style.backgroundColor="#A9D4F0";
//	document.getElementById(valor2-300).style.backgroundColor="#A9D4F0";	
//	//document.getElementById(valor2-400).style.backgroundColor="#A9D4F0";


	var r = confirm("Desean Eliminar la Fila");
	if (r == true) {
    		BorraFila2()
			
	} 
	else
	{
			document.getElementById(valor2).checked = false;
			document.getElementById("textfield10").value="";
			//document.getElementById(valor2).style.backgroundColor="#FFFFFF";			
//			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
//			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";	
//			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			//document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";

	}
	
   }
   else
   {
   			//document.getElementById(valor2).style.backgroundColor="#FFFFFF";	
//			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
//			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";	
//			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";
			//document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";			
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
		document.getElementById("skills3").value='';
		document.getElementById("skills3").focus();

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
		if(document.getElementById("textfield7").value!=='' && document.getElementById("textfield8").value!=='' )
		{
			document.forms["form1"].submit();
		}
		
		
		
}
</script>
</head>

<body>
<form name="form1" method="post" action="guarda_ajustes_stock.php">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="eiquetas">
        <td width="13%" height="37">Fecha</td>
        <td width="87%" colspan="2"><input type="text" name="textfield" id="textfield" readonly value="<?php echo date("d-m-Y"); ?>">
          <input name="button" type="button" class="boton_calendario" id="button" onClick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)"></td>
      </tr>
      <tr class="eiquetas">
        <td height="32">Tipo</td>
        <td colspan="2"><select name="select" id="select">
          <option value="ENTRADA">Entrada</option>
          <option value="SALIDA">Salida</option>
        </select></td>
      </tr>
      <tr class="eiquetas">
        <td height="63">Obs.:</td>
        <td colspan="2"><textarea name="textarea" cols="40" rows="3" maxlength="200" id="textarea"></textarea></td>
      </tr>
      <tr class="eiquetas">
        <td height="28">Dep&oacute;sito</td>
        <td colspan="2"><div class="ui-widget"><input autofocus id="skills2" name="skills2" placeholder="Ingrese depósito..." size="35" onKeyUp="return teclaGRAL(this, event,'skills3');"  >
      	</div></td>
      </tr>
      
      <tr class="eiquetas">
        <td height="40">Equipo</td>
        <td colspan="2"><div class="ui-widget"><input autofocus id="skills3" name="skills3" placeholder="Ingrese equipo..." size="35" onKeyUp="return teclaGRAL(this, event,'textfield3');" onBlur="enviar(1);" >&nbsp;Existencia&nbsp;<input name="textfield2" type="text" id="textfield2" size="4" readonly style="border:none; color:#0A0664; color:#E40A0D; font-size:18px; font-weight:bold" ></div></td>
      </tr>
      <tr class="eiquetas">
        <td height="33">Cantidad</td>
        <td><input type="text" name="textfield3" id="textfield3" onKeyUp="format(this);return teclaGRAL2(this, event);" autocomplete="off"></td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Guardar" onClick="preparacion2();"></td>
      </tr>
      </tbody>
  </table>
  <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">
	  <td width="27%">Equipo&nbsp;</td>
      <td width="11%" align="right" >Cantidad&nbsp;</td>
      <td width="6%" align="right">&nbsp;</td>      
    </tr>
  </tbody>
</table>
<table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas"  >
          <td width="27%"  height="1px">&nbsp;</td> 
          <td width="11%" align="right" height="1px">&nbsp;&nbsp;</td>
          <td width="6%" align="right" height="1px">&nbsp;</td>
		  
    </tr>
  </tbody>
</table>
  </div>
  <iframe id="detalle" style="visibility:hidden"></iframe>
  <input name="textfield20" type="text" id="textfield20" value="99"   readonly  style="visibility:hidden">
  <input name="textfield30" type="text"  id="textfield30" value="199" readonly style="visibility:hidden">
  <input name="textfield4" type="text" id="textfield4" value="299" readonly style="visibility:hidden">
  <input name="textfield5" type="text" id="textfield5" value="399"  readonly style="visibility:hidden">
  <input name="textfield6" type="text" id="textfield6" value="499"   readonly style="visibility:hidden">
  <input type="text" name="textfield7" id="textfield7"  readonly style="visibility:hidden">
  <input type="text" name="textfield8" id="textfield8"   readonly style="visibility:hidden">
  <input type="text" name="textfield9" id="textfield9"   readonly style="visibility:hidden">
  <input type="text" name="textfield10" id="textfield10"   readonly style="visibility:hidden">
  <input name="textfield50" type="text" id="textfield50" value="0"  style="visibility:hidden">
</form>
</body>
</html>