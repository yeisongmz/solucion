<?php include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
		$query2="SELECT id FROM pedidos";
						$resultado = mysql_query($query2) ;
						$numero='';
				//	if(mysql_num_rows($resultado)!=0)
//					{						
//							
//						while($query4=mysql_fetch_array($query2))
//						{
//							$numero = $query4['id']+1;
//												
//						}
//					}
//					else
//					{
//						
//						$numero='1';
//					}
					
					$query2="SELECT * FROM plantillas order by nombre asc ";
					$res=mysql_query($query2,$con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link href="../jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.autocomplete.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.menu.min.css" rel="stylesheet" type="text/css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/tooltips.js"></script>
<script src="js/funciones.js"></script>
<script src="../jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../jquery.ui-1.10.4.autocomplete.min.js" type="text/javascript"></script>
<script>
function buscar()
{
	var res = document.getElementById("mitabla").rows.length;
	
		var i = 0;
		
		for(i = 0; i<res-1;i++)
			{	
				//document.getElementById("mitabla").deleteRow(i);	
			}
	
	var e = document.getElementById("select");
	var strUser = e.options[e.selectedIndex].value;
	//var str = document.getElementById("textfield10").value;
		
	document.getElementById('buscador').src='busca_plantillas2.php?nombre='+strUser;
}
function bajar3()
  {
	  
		var precio=document.getElementById('textfield21').value,producto=document.getElementById('skills4').value,cantidad=document.getElementById('textfield20').value,unidad=document.getElementById('textfield7').value;
				
				if(precio==''||producto==''||cantidad==''||unidad=='')
				{
				}
				else
				{
					
				Creadora2(precio,producto,cantidad,unidad);	  
				}	
	 
  
}
 $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:false
	});
  });
   $(function() {
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=EQUIPOS",
		autoFocus:false
	});
  });
  function bajar2(field, event)
  {
	  	
		var precio='0',producto=document.getElementById('skills4').value,cantidad=document.getElementById('textfield20').value,unidad=document.getElementById('textfield7').value;
							
	if(document.activeElement.name=='textfield20')
	{						
						
	   switch (event.keyCode) 
  		{
	
			case 13 :

				if(precio==''||producto==''||cantidad==''||unidad=='')
				{
				}
				else
				{
				Creadora2(precio,producto,cantidad,unidad);	  
				}	
	  }
  }
}
function Creadora2(precio,producto,cantidad,unidad) {
	
			
			
	document.getElementById("textfield200").value = parseInt(document.getElementById("textfield200").value) + 1;
	document.getElementById("textfield30").value = parseInt(document.getElementById("textfield30").value) + 1;
	document.getElementById("textfield40").value = parseInt(document.getElementById("textfield40").value) + 1;
	document.getElementById("textfield50").value = parseInt(document.getElementById("textfield50").value) + 1;		
	document.getElementById("textfield60").value = parseInt(document.getElementById("textfield60").value) + 1;
	document.getElementById("textfield80").value = parseInt(document.getElementById("textfield80").value) + 1;
	document.getElementById("textfield90").value = parseInt(document.getElementById("textfield90").value) + 1;	
	document.getElementById("textfield180").value = parseInt(document.getElementById("textfield180").value) + 1;	
	document.getElementById("textfield400").value = parseInt(document.getElementById("textfield400").value) + 1;
	var table = document.getElementById("mitabla");
	
    var row = table.insertRow(0);
	
	
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
 	var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
 //	var cell4 = row.insertCell(4);
//	var cell5 = row.insertCell(5);
	

// CREO UN ELEMENTO DEL TIPO INPUT CON document.createElement("NOMBRE TAG HTML QUE QUIERO CREAR");

 

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
		//input0.readOnly = "true";
		input0.style.border = "none";
		input0.id = document.getElementById("textfield200").value;
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
		input2.id = document.getElementById("textfield40").value;
		input2.value =unidad;
		

		var nn=precio.replace(/[.*+?^${}()|[\]\\]/g, ""); 
		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "0%";
		input3.readOnly = "true";
		input3.style.border = "none";
		input3.id = document.getElementById("textfield50").value;
		input3.style.textAlign="right";
		input3.value ='0';
		input3.style.visibility="hidden";
		//format(input3);
		
		
		input4.type = "text";
        input4.className = "myInput";
        input4.style.height = "20px";
        input4.style.width = "0%";
		input4.readOnly = "true";	
		input4.style.border = "none";	
		input4.style.textAlign="right";
		input4.id = document.getElementById("textfield60").value;
		input4.value ='0';//parseInt(nn)*cantidad;
		input4.style.visibility="hidden";
		//format(input4);
			

		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "50%";
		checkbox.style.height = "18px";
		checkbox.style.textAlign="right";
		checkbox.id =document.getElementById("textfield80").value;
 		
		checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
		
		//
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input2);   	
   		cell3.appendChild(checkbox);
	//	cell4.appendChild(input4); 
//		cell5.appendChild(checkbox); 
	
	
	document.getElementById("skills4").value='';
	document.getElementById("textfield20").value='';
	document.getElementById("textfield21").value='';	
	document.getElementById("textfield7").value='';
	

	document.getElementById("skills4").focus();

}

function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;
   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield8").value = 	document.getElementById("textfield8").value+row+"--";
	
	//var r = confirm("Desean Eliminar la Fila");
//	if (r == true) {
    		BorraFila2()
			
	//} 
//	else
//	{
//			document.getElementById(valor2).checked = false;
//			document.getElementById("textfield8").value="";
//   			
//	}
	
   }
   else
   {
			   
   }
}

function BorraFila2()
{

		var str = document.getElementById("textfield8").value;
		var res = str.split("--");
		var i = 0;
		for(i = 0; i<res.length-1;i++)
			{
				document.getElementById("mitabla").deleteRow(res[i]);	
			}
		document.getElementById("textfield8").value="";

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
//		var c5=500;
		
		var limite =document.getElementById("textfield400").value;
		document.getElementById("textfield110").value = '';			
		document.getElementById("textfield120").value = '';
		document.getElementById("textfield130").value = '';
		document.getElementById("textfield140").value = '';
		document.getElementById("textfield150").value = '';	
		
			
        for (r = 0; r <= limite; r++) 
		{
			
			//alert(document.getElementById(c3).value);
			//alert(document.getElementById(c4).value);
			//alert(document.getElementById(c5).value);
			try {
			    
				
				document.getElementById("textfield110").value = document.getElementById("textfield110").value+document.getElementById(c1).value+"--";			
				document.getElementById("textfield120").value = document.getElementById("textfield120").value+document.getElementById(c2).value+"--";			
				document.getElementById("textfield130").value = document.getElementById("textfield130").value+document.getElementById(c3).value+"--";			
			//document.getElementById("textfield140").value = document.getElementById("textfield140").value+document.getElementById(c4).value+"--";	
//			document.getElementById("textfield150").value = document.getElementById("textfield150").value+document.getElementById(c5).value+"--";			
			
				}
			catch(err) {
   
			}
		
		c1=parseInt(c1)+1;	
		c2=parseInt(c2)+1;	
		c3=parseInt(c3)+1;	
		//c4=parseInt(c4)+1;	
//		c5=parseInt(c5)+1;		
      	
        }
		if(document.getElementById("textfield110").value==''||document.getElementById("textfield120").value==''||document.getElementById("textfield130").value==''||document.getElementById("textfield").value==''||document.getElementById("textfield3").value==''||document.getElementById("textfield4").value=='' ||document.getElementById("textfield5").value=='' ||document.getElementById("textfield6").value==''||document.getElementById("textfield12").value==''||document.getElementById("textfield13").value==''||document.getElementById("textfield14").value==''||document.getElementById("textfield17").value==''||document.getElementById("textfield18").value==''||document.getElementById("textfield19").value=='' ||document.getElementById("skills2").value==''||document.getElementById("skills3").value=='')
		{
			alert('Complete todos los datos');
		}
		else
		{
			if(validaFechaDDMMAAAA(document.getElementById("textfield3").value)==false || validaFechaDDMMAAAA(document.getElementById("textfield12").value)==false || validaFechaDDMMAAAA(document.getElementById("textfield13").value)==false || validaFechaDDMMAAAA(document.getElementById("textfield14").value)==false)
			{
				alert('Verfique las fechas. El formato es : DD/MM/AAAA, y deben ser fechas válidas.');
			}
			else
			{
				document.getElementById("form1").submit();
			}
		}
		
		
}
function validaFechaDDMMAAAA(fecha){
	
	var dtCh= "/";
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
function busca_unidad()
{
	
	document.getElementById("detalles").src='busca_unidad_medida.php?q='+document.getElementById("skills4").value;
	
}
  </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_remision.php">
<div class="polaroid5" style="width:90%">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr align="center" class="fondo_encabezado">
        <td height="32" colspan="6">Remisi&oacute;n con timbrado</td>
        </tr>
      <tr class="eiquetas">
        <td width="6%" height="30" align="right">Numero*&nbsp;</td>
        <td width="31%">
        <input name="textfield" type="text" autofocus id="textfield" onKeyUp="return teclaGRAL(this, event,'textfield5');" autocomplete="off"></td>
        <td width="18%" align="right">Fecha(dd/mm/aaaa)*&nbsp;</td>
        <td width="17%">
        <input type="text" name="textfield3" id="textfield3" onKeyUp="return teclaGRAL(this, event,'textfield6');" value="<?php echo date('d/m/Y');?>" autocomplete="off"></td>
        <td width="10%" align="right">Nro.Factura*&nbsp;</td>
        <td width="18%">
        <input type="text" name="textfield4" id="textfield4" onKeyUp="return teclaGRAL(this, event,'skills2');"></td>
      </tr>
      <tr class="eiquetas">
        <td height="28" align="right">Movil*&nbsp;</td>
        <td><input type="text" name="textfield5" id="textfield5" onKeyUp="return teclaGRAL(this, event,'textfield3');" autocomplete="off"></td>
        <td align="right">Tel:*&nbsp;</td>
        <td><input type="text" name="textfield6" id="textfield6" onKeyUp="return teclaGRAL(this, event,'textfield4');" autocomplete="off"></td>
        <td align="right">Obs.:&nbsp;</td>
        <td rowspan="3">
        <textarea name="textarea" cols="22" rows="4" maxlength="250" id="textarea"></textarea></td>
      </tr>
      <tr class="eiquetas">
        <td height="29" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="26">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#C1AC7F" class="eiquetas">
        <td colspan="4" align="center" bgcolor="#C1AC7F">Datos del traslado</td>
        <td colspan="2" align="center" bgcolor="#DFD5BE">Trasportista</td>
        </tr>
      <tr bgcolor="#C2C1C1" class="eiquetas">
        <td height="29" align="right">Origen*&nbsp;</td>
        <td bgcolor="#C2C1C1">
        <div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese origen"  name="skills2" style="width:300px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'skills3')" >
      	    
        </div></td>
        <td align="right" bgcolor="#C2C1C1">Fecha de retiro(dd/mm/aaaa)*&nbsp;</td>
        <td bgcolor="#C2C1C1">
        <input type="text" name="textfield12" id="textfield12" onKeyUp="return teclaGRAL(this, event,'textfield13');" value="<?php echo date('d/m/Y');?>" autocomplete="off"></td>
        <td align="right" bgcolor="#D7D7D7">Razon&nbsp;</td>
        <td bgcolor="#D7D7D7"><input name="textfield15" type="text" id="textfield15" onKeyUp="return teclaGRAL(this, event,'textfield16');" size="30" autocomplete="off"></td>
      </tr>
      <tr bgcolor="#C2C1C1" class="eiquetas">
        <td height="29" align="right">Destino*&nbsp;</td>
        <td bgcolor="#C2C1C1"><input autofocus id="skills3" placeholder="Ingrese destino"  name="skills3" style="width:300px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'textfield12')" >
        </td>
        <td align="right" bgcolor="#C2C1C1">Fecha inicio del traslado(dd/mm/aaaa)*&nbsp;</td>
        <td bgcolor="#C2C1C1">
        <input type="text" name="textfield13" id="textfield13" onKeyUp="return teclaGRAL(this, event,'textfield14');" autocomplete="off"></td>
        <td align="right" bgcolor="#D7D7D7">Ruc&nbsp;</td>
        <td bgcolor="#D7D7D7"><input name="textfield16" type="text" id="textfield16" onKeyUp="return teclaGRAL(this, event,'textfield17');" size="30" autocomplete="off"></td>
      </tr>
      <tr bgcolor="#C2C1C1" class="eiquetas">
        <td height="29" align="right">&nbsp;</td>
        <td bgcolor="#C2C1C1">&nbsp;</td>
        <td align="right" bgcolor="#C2C1C1">Fecha fin del traslado(dd/mm/aaaa)*&nbsp;</td>
        <td bgcolor="#C2C1C1">
        <input type="text" name="textfield14" id="textfield14" onKeyUp="return teclaGRAL(this, event,'textfield15');" autocomplete="off"></td>
        <td align="right" bgcolor="#D7D7D7">Nombre conductor*&nbsp;</td>
        <td bgcolor="#D7D7D7"><input name="textfield17" type="text" id="textfield17" onKeyUp="return teclaGRAL(this, event,'textfield18');" size="30" autocomplete="off"></td>
      </tr>
       <tr bgcolor="#C2C1C1" class="eiquetas">
        <td height="26" align="right">&nbsp;</td>
        <td bgcolor="#C2C1C1">&nbsp;</td>
        <td bgcolor="#C2C1C1">&nbsp;</td>
        <td bgcolor="#C2C1C1">&nbsp;</td>
        <td align="right" bgcolor="#D7D7D7">C.I. conductor*&nbsp;</td>
        <td bgcolor="#D7D7D7"><input name="textfield18" type="text" id="textfield18" onKeyUp="return teclaGRAL(this, event,'textfield19');" size="30" autocomplete="off"></td>
      </tr>
      <tr bgcolor="#C2C1C1" class="eiquetas">
        <td height="29">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" bgcolor="#D7D7D7">Dir.conductor*&nbsp;</td>
        <td bgcolor="#D7D7D7"><input name="textfield19" type="text" id="textfield19" onKeyUp="return teclaGRAL(this, event,'skills4');" size="30" autocomplete="off"></td>
      </tr>
      
      
      <tr class="eiquetas">
        <td height="34">Plantilla</td>
        <td> <select name="select" id="select" onChange="buscar();" style="background-color:#C1AC7F">
         <option value=""   >Seleccione una plantilla</option>
          <?php while($query4 = mysql_fetch_array($res) )
						{?>
            <option value="<?php echo $query4['id'];?>"  ><?php echo $query4['nombre'];?></option>
         <?php } ?>
          </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="39">Producto</td>
        <td colspan="3"><div class="ui-widget">
  			<input autofocus id="skills4" placeholder="Ingrese Equipo/producto"   onBlur="busca_unidad();" name="skills4" style="width:300px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'textfield20');" >
      	    
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="39">Cantidad</td>
        <td>
        <input type="text" name="textfield20" id="textfield20" onKeyUp="bajar2(this,event);" onBlur="busca_unidad();" autocomplete="off">&nbsp;&nbsp;<label for="textfield7">Unid.med:</label>
          <input name="textfield7" type="text" id="textfield7" size="4" readonly></td>
        <td align="left"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="46">&nbsp;</td>
        <td>
        <input type="text" name="textfield21" id="textfield21" onKeyUp="format(this);bajar2(this,event);" autocomplete="off" style="visibility:hidden"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;
          <input name="button" type="button" class="boton3" id="button" value="Guardar" style="width:85px
        " onClick="preparacion2() ">
          <input name="button2" type="button" class="boton3" id="button2" value="Nuevo" style="width:85px
        " onClick="location='remision_timbrada.php';">&nbsp;</td>
        </tr>
    </tbody>
  </table>
  <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">

       <td width="6%">Cant.</td>
      <td width="36%">Descripci&oacute;n</td>
       <td width="46%" align="right" >Undidad de medida&nbsp;</td>
     
       <td width="12%" align="right">&nbsp;</td>
	   
    </tr>
    
  </tbody>
</table>
<table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas"  style="visibility:hidden" >
           <td width="6%"  height="1px" >&nbsp;</td>    
          <td width="36%" height="1px">&nbsp;</td>
          <td width="46%" align="right" height="1px">&nbsp;&nbsp;</td>
      
		  <td width="9%" align="right" height="1px">&nbsp;</td>    
         
    </tr>
  </tbody>
</table> 
<input name="textfield200" type="text" id="textfield200" value="99"  readonly style="visibility:hidden" >
  <input name="textfield30" type="text"  id="textfield30" value="199" readonly  style="visibility:hidden">
  <input name="textfield40" type="text" id="textfield40" value="299" readonly style="visibility:hidden">
  <input name="textfield50" type="text" id="textfield50" value="399"  readonly style="visibility:hidden">
  <input name="textfield60" type="text" id="textfield60" value="499" readonly style="visibility:hidden">
  <input name="textfield80" type="text" id="textfield80" value="599"  style="visibility:hidden">
  <input name="textfield90" type="text" id="textfield90" value="699"  readonly style="visibility:hidden">
  <input name="textfield100" type="text" id="textfield100"  style="visibility:hidden">
  <input type="text" name="textfield110" id="textfield110"   style="visibility:hidden">
  <input type="text" name="textfield120" id="textfield120"  style="visibility:hidden">
  <input type="text" name="textfield130" id="textfield130"   style="visibility:hidden">
  <input type="text" name="textfield140" id="textfield140"   style="visibility:hidden">
  <input type="text" name="textfield150" id="textfield150"   style="visibility:hidden">
  <input name="textfield400" type="text" id="textfield400" value="0" style="visibility:hidden">
  <input name="textfield160" type="text" id="textfield160" value="0" style="visibility:hidden">
  <input type="text" name="textfield170" id="textfield170"  style="visibility:hidden">
  <input name="textfield180" type="text" id="textfield180" value="799"  style="visibility:hidden">
 
  <input type="text" name="textfield8" id="textfield8" style="visibility:hidden">
<p><iframe id="detalles" style="visibility:hidden"></iframe>&nbsp;</p> 
</div>
<iframe  id="buscador" style="visibility:hidden"></iframe>
</form>
<script type="text/javascript">
$(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:false
	});
  });
</script>
</body>
</html>