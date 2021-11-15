<?php include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
		$query2="SELECT id FROM pedidos";
		$resultado = mysql_query($query2) ;
		$numero='';					
					
		$query2="SELECT * FROM plantillas where es_con_frecuencia='NO' order by nombre asc ";
		$res=mysql_query($query2,$con);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Remision Sin frecuencia</title>
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
// array que contiene valores originales de la plantilla para comparar
// al momento de grabar y obligar al usuario a comentar.
var v_cantidad_original = new Array() ; 
var v_cantidad_user = new Array() ; 
// -----------------------------------------------------------------------------

function sortTable2(n) {
	
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("mitabla");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
	  //alert();
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("tr");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
	
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
	  if(i<3)
	  {
	  //alert(x.innerHTML.toLowerCase() );
	  
	  }
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("mitabla");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("tr");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[0];
      y = rows[i + 1].getElementsByTagName("td")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function iluminar(element)
	 {
	    //alert();
		element.style.backgroundColor  = '#A9D4F0';
	}
function apagar(element)
	 {
    	element.style.backgroundColor  =  '#FDFBFB';
	}
	
// ---------------------------------------------------------------------
// SELECCIONADOR DE OPCION EN LISTA DE PLANTILLAS	
// ---------------------------------------------------------------------
function buscar(){
	var res = document.getElementById("mitabla").rows.length;
	
	var i = 0;		
	for(i = 0; i<res-1;i++)
		{	
			//document.getElementById("mitabla").deleteRow(i);	
		}
	
	var e = document.getElementById("select");
	var strUser = e.options[e.selectedIndex].value;
	var fecha_remision = document.getElementById('textfield3').value ; 
	if (  fecha_remision==''  ){
		document.getElementById('popup').style.display="block";	
	}else{
		document.getElementById('buscador').src='busca_plantillas3.php?nombre='+strUser+'&fe_remision='+fecha_remision	;
	}
}
// ---------------------------------------------------------------------

//-------------------------------------------------------------------------------
// Funcion que carga en la grilla el articulo 
function bajar3()
  {	  
	var precio=document.getElementById('textfield21').value ;
	var	producto=document.getElementById('skills4').value ;
	var cantidad=document.getElementById('textfield20').value ;
	var unidad=document.getElementById('textfield7').value;
	var marca=document.getElementById('marca').value;
			
		if(precio==''||producto==''||cantidad==''||unidad=='')
		{
		}
		else
		{					
			Creadora2(precio,producto,cantidad,unidad,marca);	  
		}		 
}
//-------------------------------------------------------------------------------

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
					
				Creadora2(precio,producto,cantidad,unidad,"NO");	  
				}	
	  }
  }
}
function Creadora2(precio,producto,cantidad,unidad,marca) {
							
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
	//row.style.backgroundColor='red';
//	row.addEventListener("mouseover", function(){iluminar(row);}, false); 
//	row.addEventListener("mouseout", function(){apagar(row);}, false);
	
	if(marca == "SI"){
	// CAMBIO DE COLOR
		row.style.backgroundColor="red" ; 
		row.style.color="white" ; 	
	}
	
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
 	var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
	
 //	var cell4 = row.insertCell(4);
//	var cell5 = row.insertCell(5);
//	

// CREO UN ELEMENTO DEL TIPO INPUT CON document.createElement("NOMBRE TAG HTML QUE QUIERO CREAR");

    var input0 = document.createElement("input");
	var input1 = document.createElement("input");
	var input2 = document.createElement("input");
	var input3 = document.createElement("input");
	var input4 = document.createElement("input");
	var checkbox = document.createElement("input");
	
	// CANTIDAD
        input0.type = "text";
        input0.className = "myInput";
        input0.style.height = "20px";
        input0.style.width = "80%";
		//input0.readOnly = "true";
		input0.style.border = "none";
		input0.id = document.getElementById("textfield200").value;
		input0.value =cantidad;
		
	// DESCRIPCION
		input1.type = "text";
        input1.className = "myInput";
        input1.style.height = "20px";
        input1.style.width = "99%";
		input1.readOnly = "true";
		input1.style.border = "none";
		input1.id = document.getElementById("textfield30").value;
		input1.value =producto;
	
	// UNIDAD DE MEDIDA	
		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "80%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.style.textAlign="right";
		input2.id = document.getElementById("textfield40").value;
		input2.value =unidad;

		var nn=precio.replace(/[.*+?^${}()|[\]\\]/g, ""); 
		
	// 	PRECIO
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "0%";
		input3.readOnly = "true";
		input3.style.border = "none";
		input3.id = document.getElementById("textfield50").value;
		input3.style.textAlign="right";
		input3.value ='0';//precio;
		input3.style.visibility="hidden";
		//format(input3);
				
		input4.type = "text";
        input4.className = "myInput";
        input4.style.height = "20px";
        input4.style.width = "0%";
		input4.readOnly = "true";	
		input4.style.border = "none";	
		input4.style.textAlign="right";
		input4.style.visibility="hidden";
		input4.id = document.getElementById("textfield60").value;
		input4.value ='0';//parseInt(nn)*cantidad;
		//format(input4);
			
		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "50%";
		checkbox.style.height = "18px";
		checkbox.style.textAlign="right";
		checkbox.id =document.getElementById("textfield80").value;
 		
		checkbox.addEventListener('click', function() { leer2(this,this.id);}, true);
		
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input2);   	
   		cell3.appendChild(checkbox);
	
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

	document.getElementById("textfield2").value = 	document.getElementById("textfield2").value+row+"--";
	
	//var r = confirm("Desean Eliminar la Fila");
//	if (r == true) {
    		BorraFila2()
			
	//} 
	//else
//	{
//			document.getElementById(valor2).checked = false;
//			document.getElementById("textfield2").value="";
//   			
//	}
	
   }
   else
   {
			   
   }
}

function BorraFila2()
{

		var str = document.getElementById("textfield2").value;
		var res = str.split("--");
		var i = 0;
		for(i = 0; i<res.length-1;i++)
			{
				document.getElementById("mitabla").deleteRow(res[i]);	
			}
		document.getElementById("textfield2").value="";

}
function verdato()
{
	var dato = document.getElementById("v_cantidad_original").value ; 
	alert(dato) ; 
	
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

			v_cantidad_user.push(document.getElementById(c1).value) ;
				}
			catch(err) {
   
			}
		
		c1=parseInt(c1)+1;	
		c2=parseInt(c2)+1;	
		c3=parseInt(c3)+1;	
		//alert(c1) ; 
		//c4=parseInt(c4)+1;	
//		c5=parseInt(c5)+1;		
      	
        }
		// invierte el orden de los elementos en el array.----
		v_cantidad_user.reverse() ; 
		
		if(document.getElementById("textfield").value==''||document.getElementById("textfield3").value==''||document.getElementById("skills2").value=='' ||document.getElementById("textfield110").value==''||document.getElementById("textfield120").value==''||document.getElementById("textfield130").value==''||document.getElementById("skills3").value=='')
		{
			alert('Complete todos los datos');
		}
		else
		{
			//if(validaFechaDDMMAAAA(document.getElementById("textfield3").value)==false )
			//{
				//alert(document.getElementById("textfield3").value) ; 
				//alert('Verfique las fechas. El formato es : DD/MM/AAAA, y deben ser fechas válidas.');
			//}
			//else
			//{
//===========================================================================================
// validacion para obligar al usuario a cargar comentario, si difieren cantidades
			v_cantidad_original = (document.getElementById('v_cantidad_original').value).split('*') ;
			var bandera = 0; 
			var i = 0 ; 
			for (i=0; i<v_cantidad_user.length;i++){
				if (v_cantidad_original[i] != v_cantidad_user[i] ){
					bandera = 1 ;
				}
				
			}
//===========================================================================================
			if (bandera == 1 && document.getElementById("textarea").value == ''  ) {
				document.getElementById("popup1").style.display="block" ; 				
			}else{
				
				document.getElementById("detalles").src='valida_nombre.php?nombre='+document.getElementById("textfield").value;				
			}
				

		//	}
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

function cerrar(){
		
			document.getElementById('popup').style.display="none" ;
			document.getElementById('popup1').style.display="none"			
		
	}
	
  </script>
  
  <style type="text/css">
	/*----------Text Styles----------*/
	.ws6 {font-size: 8px;}
	.ws7 {font-size: 9.3px;}
	.ws8 {font-size: 11px;}
	.ws9 {font-size: 12px;}
	.ws10 {font-size: 13px;}
	.ws11 {font-size: 15px;}
	.ws12 {font-size: 16px;}
	.ws14 {font-size: 19px;}
	.ws16 {font-size: 21px;}
	.ws18 {font-size: 24px;}
	.ws20 {font-size: 27px;}
	.ws22 {font-size: 29px;}
	.ws24 {font-size: 32px;}
	.ws26 {font-size: 35px;}
	.ws28 {font-size: 37px;}
	.ws36 {font-size: 48px;}
	.ws48 {font-size: 64px;}
	.ws72 {font-size: 96px;}
	.wpmd {font-size: 13px;font-family: Arial,Helvetica,Sans-Serif;font-style: normal;font-weight: normal;}
	/*----------Para Styles----------*/
	DIV,UL,OL /* Left */
	{
	 margin-top: 0px;
	 margin-bottom: 0px;
	}
	
		.cuadrado-2 {
     width: 350px; 
     height: 40px; 
     border: 2px solid red;
	}
		.form-popup{
			padding:10px 20px 10px 20px;
			border:solid 1px black;
			border-radius: 20px 0px;
			width:30%;
			height:90px;
			position: absolute;
			display: none;
			top: 50px;
			margin-left: 30%;
			z-index: 20;
			background-color: yellow;
		}
		
		.cerrar-form{
			font-size: 16pt;
			background-color: red;
			position: absolute;
			right: 0px;
			top: 0px;
			color:white;
			padding: 2px 5px 2px 5px;
		}
		.cerrar-form:hover{
			cursor: pointer;
			color:black;
		}
		
	</style>
	
</head>

<body>
	<!-- MENSAJE DE VALIDACION-->
	<div id="popup" class="form-popup">
		<div class="cerrar-form" onclick="cerrar()"> X </div>
		<br>
		<h3>Complete la fecha para seleccionar la plantilla</h3>
	</div>
	<!-- MENSAJE DE VALIDACION-->
	<div id="popup1" class="form-popup">
		<div class="cerrar-form" onclick="cerrar()"> X </div>
		<br>
		<h3>Justifique la diferencia de cantidades, en OBS.</h3>
	</div>
	<!-- =================================================== -->
	
	<!-- CAMPO OCULTO PARA MARCAR COMO BANDERA DE CAMBIO DE COLOR--->
	<input type="hidden" id="marca" name="marca" />
	<input type="hidden" id="v_cantidad_original" name="v_cantidad_original" />

	
	<!-- MARCO DE DATO PARA ULTIMO ENVIO --><!-- FORMULARIO -->
<form id="form1" name="form1" method="post" action="guarda_remision_simple3.php">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1" align="center">
    <tbody>
    <tr align="center"  bgcolor="#80BD6E">
        <td height="32" colspan="6">Remisi&oacute;n simple</td>
        </tr>
      <tr class="eiquetas">
        <td width="7%" height="30" align="right">Numero*&nbsp;</td>
        <td width="34%">
        <input name="textfield" type="text" autofocus id="textfield" onKeyUp="return teclaGRAL(this, event,'textfield3');" autocomplete="off"></td>
       
	   <td width="15%" align="right">Fecha(dd/mm/aaaa)*&nbsp;</td>
        <td width="33%">
        <input type="date" name="textfield3" id="textfield3" onKeyUp="return teclaGRAL(this, event,'skills2');" value="<?php echo date('d/m/Y');?>" autocomplete="off"></td>
        <td width="1%" align="right">&nbsp;</td>
        <td width="10%">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="26">Obs.:</td>
        <td> <textarea name="textarea" cols="45" rows="4" maxlength="250" id="textarea"></textarea>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#80BD6E" class="eiquetas">
        <td colspan="4" align="center" bgcolor="#80BD6E">Datos del traslado</td>
        <td colspan="2" align="center" >&nbsp;</td>
        </tr>
      <tr bgcolor="#C2C1C1" class="eiquetas">
        <td height="39" align="right">Origen*&nbsp;</td>
        <td bgcolor="#C2C1C1">
        <div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese origen"  name="skills2" style="width:300px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'skills3')" >
      	    
        </div></td>
        <td align="right" bgcolor="#C2C1C1">Destino*</td>
        <td colspan="3"  bgcolor="#C2C1C1"><div class="ui-widget"><input autofocus id="skills3" placeholder="Ingrese destino"  name="skills3" style="width:300px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'skills4')" ></div></td>
        </tr>
      
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="25">Plantilla</td>
		<!--LISTA DE PLANTILLAS -->
		<!--================================================================== -->		
        <td> <select name="select" id="select" onChange="buscar();" style=" width:290px;background-color:#80BD6E">
         <option value=""   >Seleccione una plantilla</option>
          <?php while($query4 = mysql_fetch_array($res) )
						{?>
            <option value="<?php echo $query4['id'];?>"  ><?php echo $query4['nombre'];?></option>
         <?php } ?>
          </select></td>
					  
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;</td>
		
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  <!-- zona de carga de datos a grilla-->
	  <!-- ==========================================================-->
      <tr class="eiquetas">
        <td>Producto</td>
        <td colspan="3"><div class="ui-widget">
  			<input autofocus id="skills4" placeholder="Ingrese Equipo/producto"   onBlur="busca_unidad();" name="skills4" style="width:300px; font-size:18px"  onKeyUp="return teclaGRAL(this, event,'textfield20');" >
      	    
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
      <tr class="eiquetas">
        <td height="29">Cantidad</td>
		
        <td>
        <input type="text" name="textfield20" id="textfield20" onKeyUp="bajar2(this,event);" onBlur="busca_unidad();" autocomplete="off">&nbsp;&nbsp;<label for="textfield7">Unid.med:</label>
          <input name="textfield7" type="text" id="textfield7" size="4" readonly></td>
		  
        <td align="left"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <!-- ==========================================================-->
	  
	  
      <tr class="eiquetas">
        <td height="46">&nbsp;</td>
        <td><input type="text" name="textfield21" id="textfield21" onKeyUp="format(this);bajar2(this,event);" autocomplete="off" style="visibility:hidden"></td>
        <td>&nbsp;</td>
		
        <td colspan="3" align="right"><input name="button" type="button" class="boton3" id="button" value="Guardar" style="width:85px" onClick="preparacion2() ">&nbsp;<input name="button2" type="button" class="boton3" id="button2" value="Nuevo" style="width:85px
        " onClick="location='remision_simple.php';">&nbsp;</td>
		
        </tr>
		
    </tbody>
  </table>
  
  <!--Titulo de grilla de detalle================================= -->		
  <table width="100%" border="0"  bgcolor="#80BD6E" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#80BD6E">

      <td width="6%">Cant.</td>
      <td width="36%" >Descripci&oacute;n</td>
       <td width="46%" align="right" >Undidad de medida&nbsp;</td>
     
       <td width="12%" align="right">&nbsp;</td>
	   
    </tr>
    
  </tbody>
</table>
<!--================================================================== -->		

<table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
      <tr  id="3000" class="eiquetas" style="visibility:hidden" onMouseOver="highlightBG(this);" onMouseOut="highlightBG2(this);"  >
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
  <input type="text" name="textfield17" id="textfield170"  style="visibility:hidden">
  <input name="textfield180" type="text" id="textfield180" value="799"  style="visibility:hidden">
  <input type="text" name="textfield2" id="textfield2" style="visibility:hidden">
  
<p><iframe id="detalles" style="visibility:hidden"></iframe>&nbsp;</p> 



<iframe  id="buscador" style="visibility:hidden"></iframe>

</form>
<!-- FIN FORMULARIO -->

</body>
</html>