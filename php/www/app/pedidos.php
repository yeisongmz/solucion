<?php include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');


						$query2="SELECT id FROM pedidos";
						$resultado = mysql_query($query2) ;
						$numero='';
					//if(mysql_num_rows($resultado)!=0)
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
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/tooltips.js"></script>
<script src="js/funciones.js"></script>
<script>


  $(function() {
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=PROVEEDOR",
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
	  	
		var precio=document.getElementById('textfield7').value,producto=document.getElementById('skills2').value,cantidad=document.getElementById('textfield3').value;
							
	if(document.activeElement.name=='textfield7')
	{						
						
	   switch (event.keyCode) 
  		{
	
			case 13 :

				if(precio==''||producto==''||cantidad=='')
				{
				}
				else
				{
				Creadora2(precio,producto,cantidad);	  
				}	
	  }
  }
}
 function bajar3()
  {
	  
		var precio=document.getElementById('textfield7').value,producto=document.getElementById('skills2').value,cantidad=document.getElementById('textfield3').value;
				
				if(precio==''||producto==''||cantidad=='')
				{
				}
				else
				{
					
				Creadora2(precio,producto,cantidad);	  
				}	
	 
  
}
function Creadora2(precio,producto,cantidad) {
	
			
			
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
 	var cell4 = row.insertCell(4);
	

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
		input2.value =precio;
		format(input2);

		var nn=precio.replace(/[.*+?^${}()|[\]\\]/g, ""); 
		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "100%";
		input3.readOnly = "true";
		input3.style.border = "none";
		input3.id = document.getElementById("textfield5").value;
		input3.style.textAlign="right";
		input3.value =parseInt(nn)*cantidad;
		//document.getElementById('textfield19').value=parseInt(document.getElementById('textfield19').value)+parseInt(input3.value);
		format(input3);
	
		
			//var aux=precio.replace(/[.*+?^${}()|[\]\\]/g, ""); 
				 

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
   		cell3.appendChild(input3);
		cell4.appendChild(checkbox); 
	
	
	document.getElementById("skills2").value='';
	document.getElementById("textfield3").value='';
	document.getElementById("textfield7").value='';
	

	document.getElementById("skills2").focus();
sumar();
}

function leer2(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;
   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	
	var r = confirm("Desean Eliminar la Fila");
	if (r == true) {
    		BorraFila2()
			
	} 
	else
	{
			document.getElementById(valor2).checked = false;
			document.getElementById("textfield10").value="";
   			
	}
	
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
		sumar();

}
function preparacion2()
{

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
			
		var table = document.getElementById('mitabla');
		
		var r = 0;
		var n = table.rows.length;
		var c1=100;
		var c2=200;
		var c3=300;
		var c4=400;
		
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
			    
				
				document.getElementById("textfield11").value = document.getElementById("textfield11").value+document.getElementById(c1).value+"--";			
				document.getElementById("textfield12").value = document.getElementById("textfield12").value+document.getElementById(c2).value+"--";			
				document.getElementById("textfield13").value = document.getElementById("textfield13").value+document.getElementById(c3).value+"--";			
			document.getElementById("textfield14").value = document.getElementById("textfield14").value+document.getElementById(c4).value+"--";			
			
				}
			catch(err) {
   
			}
		
		c1=parseInt(c1)+1;	
		c2=parseInt(c2)+1;	
		c3=parseInt(c3)+1;	
		c4=parseInt(c4)+1;	
			
      	
        }
		if(document.getElementById("textfield11").value==''||document.getElementById("textfield12").value==''||document.getElementById("textfield13").value==''||document.getElementById("textfield14").value==''||document.getElementById("skills4").value==''||document.getElementById("textfield").value=='')
		{
			alert('Complete todos los datos');
		}
		else
		{
			
			document.getElementById("form1").submit();
		}
		
		
}
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
	var str = document.getElementById("textfield10").value;
		
	document.getElementById('buscador').src='busca_plantillas.php?nombre='+strUser;
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
function sumar()
{
var table = document.getElementById('mitabla');
		
		var nn = 0;
		var total=0;
		var c4=400;
		
		var limite =document.getElementById("textfield40").value;
		document.getElementById("textfield19").value =0;
		
        for (r = 0; r <= limite; r++) 
		{

			try {
				nn=document.getElementById(c4).value.replace(/[.*+?^${}()|[\]\\]/g, ""); 
				total=parseInt(total)+parseInt(nn);
				//alert(total);
				//alert(nn);
//			document.getElementById("textfield19").value = parseInt(document.getElementById("textfield19"))+parseInt(nn);		
				
				}
			catch(err)
			 {
   				}
			c4=parseInt(c4)+1;	
		}
		document.getElementById("textfield19").value=total;
		format(document.getElementById("textfield19"));
}

  </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_pedidos.php">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr class="fondo_encabezado">
        <td height="32" colspan="4" align="center">Pedidos</td>
        </tr>
      <tr>
        <td height="33">Num.Pedido*</td>
        <td>          
          <input name="textfield" type="text" autofocus  id="textfield" value="" size="36" onKeyUp="return teclaGRAL(this, event,'number2')" autocomplete="off" ></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Fecha</td>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
          <tbody>
            <tr>
              <td width="14%" height="49" align="left"><label for="textfield8">Dia(dd):</label>
                <input name="number2" type="number" id="number2" max="31" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number3');"></td>
              
              <td width="15%" align="left"><label for="textfield9">Mes(mm)</label>
                
                <input name="number3" type="number" id="number3" max="12" min="1" step="1"  size="2" style="text-align:center" onKeyUp="format(this);return teclaGRAL(this, event,'number4');">
                <label for="textfield9"></label></td>
              
              <td width="16%" align="left"><label for="textfield10">A&ntilde;o(aaaa)</label>
                <label for="number4"></label>
                <input name="number4" type="number" id="number4" max="2100" min="1950" step="1" value="<?php echo date("Y"); ?>" size="4" style="text-align:center" onKeyUp="return teclaGRAL(this, event,'textarea');">
                <label for="textfield10"></label></td>
              <td width="15%" align="left"><input name="textfield2" type="text" id="textfield2" onChange="document.getElementById('time').focus();" value="<?php echo date('d-m-Y');?>" size="10" readonly></td>
              <td width="40%" align="left"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield2,'dd-mm-yyyy',this)" name="button1" id="button1"></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <td>Obs.:</td>
        <td><textarea name="textarea" cols="45" rows="3" maxlength="250" id="textarea"></textarea></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="40">Proveedor*</td>
        <td><div class="ui-widget">
  			<input autofocus id="skills4" placeholder="Ingrese Proveedor" size="30" name="skills4"  onKeyUp="return teclaGRAL(this, event,'skills2')"   >
      	</div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Producto*</td>
        <td><div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese Equipo/insumo" size="30" name="skills2"  onKeyUp="return teclaGRAL(this, event,'textfield3')"     >
      	    
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="29">Cantidad*</td>
        <td>
          <input name="textfield3" type="text" id="textfield3" autocomplete="off" onKeyUp="format(this);return teclaGRAL(this, event,'textfield7');" size="24"></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="31">Precio Unitario*</td>
        <td>
          <input type="text" name="textfield7" id="textfield7" onKeyUp="format(this);bajar2(this,event);" size="10" autocomplete="off"></td>
        <td align="right">&nbsp;</td>
        </tr>
        <tr>
        <td height="40">Plantilla</td>
        <td>
          <select name="select" id="select" onChange="buscar();"  style="background-color:#C1AC7F">
          <option value=""   >Seleccione una plantilla</option>
          <?php while($query4 = mysql_fetch_array($res) )
						{?>
            <option value="<?php echo $query4['id'];?>"  onClick="buscar();" ><?php echo $query4['nombre'];?></option>
         <?php } ?>
          </select></td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Guardar" onClick="preparacion2() " style="width:85px"></td>
        </tr>
    </tbody>
  </table>
  <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">

      <td width="7%">Cant.</td>
      <td width="39%">Descripci&oacute;n</td>
      <td width="18%" align="right" >Unitario&nbsp;</td>
      <td width="15%" align="right">Total</td>
      
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
          <td width="15%" align="Left" height="1px">&nbsp;</td>
		            
          <td width="9%" align="right" height="1px">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0"  style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas"  >
          <td width="7%"  height="1px">&nbsp;</td>    
          <td width="39%" height="1px">&nbsp;</td>
          <td width="18%" align="right" height="1px">&nbsp;&nbsp;</td>
          <td width="15%" align="right" height="1px">
          <input name="textfield19" type="text"  id="textfield19" value="0" size="10" style="text-align:right;border:none" readonly ></td>
		            
          <td width="9%" align="right" height="1px">&nbsp;</td>
    </tr>
  </tbody>
</table>
<input name="textfield20" type="text" id="textfield20" value="99"  readonly style="visibility:hidden" >
  <input name="textfield30" type="text" style="visibility:hidden" id="textfield30" value="199" readonly  >
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
</div><iframe  id="buscador" style="visibility:hidden"></iframe>

</form>
</body>
</html>