<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/tooltips.js"></script>
<script src="js/funciones.js"></script>
<script>

$(function() {
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:true
	});
  });
 
   $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=EQUIPOS",
		autoFocus:false
	});
  });
  function bajar2(field, event)
  {
	  	var frecuencia=document.getElementById('textfield2').value;
		var producto=document.getElementById('skills2').value,cantidad=document.getElementById('textfield3').value;
							
	if(document.activeElement.name=='textfield2')
	{						
						
	   switch (event.keyCode) 
  		{
	
			case 13 :

				
				Creadora2(frecuencia,producto,cantidad);	  
					
	  }
  }
}
function Creadora2(frecuencia,producto,cantidad) {
	
			
			
	document.getElementById("textfield20").value = parseInt(document.getElementById("textfield20").value) + 1;
	document.getElementById("textfield30").value = parseInt(document.getElementById("textfield30").value) + 1;
	document.getElementById("textfield4").value = parseInt(document.getElementById("textfield4").value) + 1;
	document.getElementById("textfield5").value = parseInt(document.getElementById("textfield5").value) + 1;		
	document.getElementById("textfield6").value = parseInt(document.getElementById("textfield6").value) + 1;
	document.getElementById("textfield8").value = parseInt(document.getElementById("textfield8").value) + 1;
	document.getElementById("textfield9").value = parseInt(document.getElementById("textfield9").value) + 1;	
	document.getElementById("textfield18").value = parseInt(document.getElementById("textfield18").value) + 1;	
	document.getElementById("textfield40").value = parseInt(document.getElementById("textfield40").value) + 1;
	var table = document.getElementById("mitabla");
	
    var row = table.insertRow(0);
	
	
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
 	var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
 	//var cell4 = row.insertCell(4);
	

// CREO UN ELEMENTO DEL TIPO INPUT CON document.createElement("NOMBRE TAG HTML QUE QUIERO CREAR");

 

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
		input0.value =cantidad;
		
		input1.type = "text";
        input1.className = "myInput";
        input1.style.height = "20px";
        input1.style.width = "100%";
		input1.readOnly = "true";
		input1.style.border = "none";
		input1.id = document.getElementById("textfield30").value;
		input1.value =producto;

		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "100%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.style.textAlign="right";
		input2.id = document.getElementById("textfield4").value;
		input2.value =frecuencia;
		

		//var nn=precio.replace(/[.*+?^${}()|[\]\\]/g, ""); 
		
		//input3.type = "text";
//        input3.className = "myInput";
//        input3.style.height = "20px";
//        input3.style.width = "100%";
//		input3.readOnly = "true";
//		input3.style.border = "none";
//		input3.id = document.getElementById("textfield5").value;
//		input3.style.textAlign="right";
//		input3.value ='';//parseInt(nn)*cantidad;
		//format(input3);
			

		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "50%";
		checkbox.style.height = "18px";
		checkbox.style.textAlign="right";
		checkbox.id =document.getElementById("textfield8").value;
 		
		checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
		
		//
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input2);   	
   		//cell3.appendChild(input3);
		cell3.appendChild(checkbox); 
	
	
	document.getElementById("skills2").value='';
	document.getElementById("textfield3").value='';
document.getElementById("textfield2").value='';
	

	document.getElementById("skills2").focus();

}

function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;
   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	
	//var r = confirm("Desean Eliminar la Fila");
//	if (r == true) {
    		BorraFila2()
			
	//} 
//	else
//	{
//			document.getElementById(valor2).checked = false;
//			document.getElementById("textfield10").value="";
//   			
//	}
	
   }
   else
   {
			   
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
		var c1=100;
		var c2=200;
		var c3=300;
		//var c4=400;
		
		var limite =document.getElementById("textfield40").value;
		document.getElementById("textfield11").value = '';			
		document.getElementById("textfield12").value = '';
		document.getElementById("textfield13").value = '';
		document.getElementById("textfield14").value = '';
		document.getElementById("textfield15").value = '';	
		document.getElementById("textfield17").value = '';	
			
        for (r = 0; r <= limite; r++) 
		{
			
			try {
			    
				//alert(document.getElementById(c3).value);
				document.getElementById("textfield11").value = document.getElementById("textfield11").value+document.getElementById(c1).value+"--";			
				document.getElementById("textfield12").value = document.getElementById("textfield12").value+document.getElementById(c2).value+"--";			
				document.getElementById("textfield13").value = document.getElementById("textfield13").value+document.getElementById(c3).value+"--";			
			//document.getElementById("textfield14").value = document.getElementById("textfield14").value+document.getElementById(c4).value+"--";			
			
				}
			catch(err) {
   
			}
		
		c1=parseInt(c1)+1;	
		c2=parseInt(c2)+1;	
		c3=parseInt(c3)+1;	
		//c4=parseInt(c4)+1;	
			
      	
        }
		if(document.getElementById("textfield11").value==''||document.getElementById("textfield12").value==''||document.getElementById("textfield13").value=='')
		{
			alert('Complete todos los datos');
		}
		else
		{
			//document.getElementById("deta").src='valida_nombre.php?nombre='+document.getElementById("textfield");
			document.getElementById("form1").submit();
		}
		
		
}
  </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_plantillas.php">
<div class="polaroid5">
  <table width="100%" height="237" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr class="fondo_encabezado">
      <td height="36" colspan="3" align="center">Plantillas</td>
      </tr>
      <tr>
        <td width="58%" height="36">Nombre de la plantilla*</td>
        <td width="58%">
        <input name="textfield" type="text" autofocus id="textfield" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'skills4')" size="24" maxlength="100"></td>
        <td width="18%">&nbsp;</td>
        </tr>
      <tr>
        <td height="43">Sucursal/Cliente*</td>
        <td><div class="ui-widget">
  			<input autofocus id="skills4" placeholder="Ingrese Destino" size="38" style="width:200px; font-size:18px" name="skills4" onKeyUp="return teclaGRAL(this, event,'skills2')">
      	    
        </div></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td bgcolor="#C1AC7F">Producto/equipo*</td>
        <td bgcolor="#C1AC7F">
  			<input autofocus id="skills2" placeholder="Ingrese Equipo" size="38" name="skills2" style="width:200px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'textfield3')" >
      	    
        </td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="29" bgcolor="#C1AC7F">Cantidad*</td>
        <td bgcolor="#C1AC7F">
          <input name="textfield3" type="text" id="textfield3" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield2')" size="24" ></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="34" bgcolor="#C1AC7F">Frecuencia de reposici&oacute;n(dias)*</td>
        <td bgcolor="#C1AC7F"><input name="textfield2" type="text" id="textfield2" autocomplete="off" onKeyUp="bajar2(this,event);" size="24" maxlength="10"></td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Guardar" onClick="preparacion2() " style="width:85px"></td>
        </tr>
    </tbody>
  </table>
  <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">

      <td width="7%">Cant.</td>
      <td width="39%">Descripci&oacute;n</td>
      <td width="18%" align="right" >Frec.reposici&oacute;n&nbsp;</td>
      <td width="9%" align="right">&nbsp;</td>      
    </tr>
    
  </tbody>
</table>
<table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas"  >
          <td width="7%"  height="1px">&nbsp;</td>    
          <td width="39%" height="1px">&nbsp;</td>
          <td width="18%" align="right" height="1px">&nbsp;&nbsp;</td>
          <td width="9%" align="right" height="1px">&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>
<input name="textfield20" type="text" id="textfield20" value="99"  readonly style="visibility:hidden" >
  <input name="textfield30" type="text" style="visibility:hidden" id="textfield30" value="199" readonly >
  <input name="textfield4" type="text" id="textfield4" value="299" readonly style="visibility:hidden">
  <input name="textfield5" type="text" id="textfield5" value="399"  readonly style="visibility:hidden">
  <input name="textfield6" type="text" id="textfield6" value="499" readonly style="visibility:hidden">
  <input name="textfield8" type="text" id="textfield8" value="599"  style="visibility:hidden">
 <input name="textfield9" type="text" id="textfield9" value="699"  readonly style="visibility:hidden">
  <input name="textfield10" type="text" id="textfield10"  style="visibility:hidden">
  <input type="text" name="textfield11" id="textfield11"   style="visibility:hidden">
  <input type="text" name="textfield12" id="textfield12"   style="visibility:hidden">
  <input type="text" name="textfield13" id="textfield13"   style="visibility:hidden">
  <input type="text" name="textfield14" id="textfield14"   style="visibility:hidden">
  <input type="text" name="textfield15" id="textfield15"   style="visibility:hidden">
  <input name="textfield40" type="text" id="textfield40" value="0" style="visibility:hidden">
  <input name="textfield16" type="text" id="textfield16" value="0" style="visibility:hidden">
  <input type="text" name="textfield17" id="textfield17"  style="visibility:hidden">
  <input name="textfield18" type="text" id="textfield18" value="799"  style="visibility:hidden">
</form>
</body>
</html>