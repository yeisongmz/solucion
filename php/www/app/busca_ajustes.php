
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
  
  <style type="text/css">
  a:link {
	color: #0B0B0B;
}
a:visited {
	color: #0B0B0B;
}
a:hover {
	color: #0B0B0B;
}
a:active {
	color: #0B0B0B;
}
  </style>
  <script>

  $(function() {
    $( "#skills" ).autocomplete({
		source:"search.php",
		autoFocus:true
	});
  });
  </script>
  <script type="text/javascript">
  	function enviar(valor)
	{
		
		document.getElementById('skills').value=valor;
		document.getElementById('detalle').src= "ajustes_iframe.php?q=" + valor + '&opc=' + document.getElementById('textfield2').value+'&mes='+document.getElementById('select').value;;
	}
	
	
	function eliminar()
	{
		if(document.getElementById('textfield').value!='')
		{
			var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
				location = 'guarda_elimina_ajustes.php?id='+document.getElementById('textfield').value+"&opc="+document.getElementById('textfield2').value;
			   }
		}
	}
	
	function eliminar_todo()
	{
		var tipo='';
		var aux = document.getElementById('textfield4').value;
		//document.getElementById('skills').value='';
			switch(aux) {
				 case  '1':
				 	tipo='Descuentos';
				 	
				 break;
				  case  '2':
				  	tipo='Bonificaciones';
				  
				 break;
				  case  '3':
				  	tipo='Ausencias';
				  
				 break;
				  case  '4':
				  	tipo='Adelantos';
				  
				 break;
				  case  '5':
				  	tipo='Asistencias';
				 break;
			}
			var a=document.getElementById('select').selectedIndex;
			var b =document.getElementById('select').options[a].text;
			
		if(document.getElementById('skills').value!='' && document.getElementById('select').value!=='0')
		{
			var retVal = confirm("Esta seguro de querer eliminar los Registros de  "+document.getElementById('skills').value+" de "+b+" de "+document.getElementById('textfield3').value);
               if( retVal == true ){
				location = 'guarda_elimina_ajustes2.php?personal='+document.getElementById('skills').value+"&mes="+document.getElementById('select').value+'&ano='+document.getElementById('textfield3').value;
			   }
		}
	}
	function elejir_opcion(id)
	{
		var aux = document.getElementById(id).value;
		
		//document.getElementById('skills').value='';
			switch(aux) {
				 case  '1':
				 	  document.getElementById('textfield2').value = '1';
					  document.getElementById('textfield4').value='1';
		
					  document.getElementById("detalle").src="ajustes_iframe.php?opc=1&mes="+document.getElementById('select').value+'&ano=' + document.getElementById('textfield3').value+'&q='+ document.getElementById('skills').value;
					break;
				 case '2':
    			 	 document.getElementById('textfield2').value = '2';
					  document.getElementById('textfield4').value='2';
					 document.getElementById("detalle").src="ajustes_iframe.php?opc=2&mes="+document.getElementById('select').value+'&ano=' + document.getElementById('textfield3').value+'&q='+ document.getElementById('skills').value;;
					break;
				 case '3':
    				 document.getElementById('textfield2').value = '3';
					  document.getElementById('textfield4').value='3';
					 document.getElementById("detalle").src="ajustes_iframe.php?opc=3&mes="+document.getElementById('select').value+'&ano=' + document.getElementById('textfield3').value+'&q='+ document.getElementById('skills').value;;
					break;	
				 case '4':
				 	 document.getElementById('textfield2').value = '4';
					  document.getElementById('textfield4').value='4';
					 document.getElementById("detalle").src="ajustes_iframe.php?opc=4&mes="+document.getElementById('select').value+'&ano=' + document.getElementById('textfield3').value+'&q='+ document.getElementById('skills').value;;
					break;		
				 case '5':
				 	  //document.getElementById('RG1_4').checked=false;	
				 	 document.getElementById('textfield2').value = '5';
					  document.getElementById('textfield4').value='5';
					 document.getElementById("detalle").src="ajustes_iframe.php?opc=5&mes="+document.getElementById('select').value+'&ano='+document.getElementById('textfield3').value+'&q='+ document.getElementById('skills').value;;
					break;			
				 default:
				 
					 document.getElementById("detalle").src="";
					break;
 			} 
	}
  </script>
</head>

<body>
<form id="form1" name="form1" method="post">




<div class="polaroid6" style="height:auto">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" colspan="2"  align="center" class="fondo_encabezado"><span class="titulo2">Ajustes (eliminaci&oacute;n de descuentos,bonificaciones,ausencias y adelantos)</span>&nbsp;</td>
    </tr>
     <tr>
  	<td height="43" colspan="2"  align="left">A&ntilde;o (aaaa)&nbsp;&nbsp;
  	  
  	  <input name="textfield3" type="text" id="textfield3" value="<?php echo date('Y');?>" size="4">      
  	  &nbsp;&nbsp;mes
  	  
  	  <select name="select" id="select" title="Seleccionar">
  	    <option value="0">Seleccionar</option>
  	    <option value="01">Enero</option>
  	    <option value="02">Febrero</option>
  	    <option value="03">Marzo</option>
  	    <option value="04">Abril</option>
  	    <option value="05">Mayo</option>
  	    <option value="06">Junio</option>
  	    <option value="07">Julio</option>
  	    <option value="08">Agosto</option>
  	    <option value="09">Septiembre</option>
  	    <option value="10">Octubre</option>
  	    <option value="11">Noviembre</option>
  	    <option value="12">Diciembre</option>
  	    </select>&nbsp;&nbsp;<label>&nbsp;<input type="radio" name="RG1" value="5" id="RG1_4" onClick="elejir_opcion(this.id)">
  	      Asistencias( seleccione a&ntilde;o y mes)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="button6" type="button" class="boton3" id="button6" value="Eliminar" style="width:85px;" onClick="eliminar();">
  	      <input name="button" type="button" class="boton3" id="button" value="Eliminar TODOS*" onClick="eliminar_todo();"  >
  	      <strong style="color:#FC0004; font-weight:bold; ">*Elija a&ntilde;o,mes y personal</strong></td>
</tr>
  <tr>
  	<td align="center" >
		  <input id="skills" placeholder="Ingrese Apellido o C.I a buscar..." size="37"  ></td>
  	<td align="right" >
    
    
    <table width="100%" class="tabla1">
  	  <tr>
  	    <td width="217" height="43" align="left">
  	      <input name="RG1" type="radio" id="RG1_0" value="1" checked="checked" onClick="elejir_opcion(this.id)">
  	      Descuentos</td>
	  	    <td width="152" align="left">
  	      <input type="radio" name="RG1" value="2" id="RG1_1" onClick="elejir_opcion(this.id)">
  	      Bonificaciones</td>
	    <td width="146" align="left">
  	      <input type="radio" name="RG1" value="3" id="RG1_2" onClick="elejir_opcion(this.id)">
  	      Ausencias</td>
	    <td width="114" align="left">
  	      <input type="radio" name="RG1" value="4" id="RG1_3" onClick="elejir_opcion(this.id)">
  	      Adelantos</td>
        <td width="199">
          <input name="textfield4" type="text" id="textfield4" value="1" readonly="readonly" style="visibility:hidden"></td>  
	    </tr>
	  </table>
      
      
      </td>
  	<td align="center" >&nbsp;</td>
  </tr>
 
    <tr>
      <td width="98%" colspan="3" align="left">
        
        <p>
          <iframe src="ajustes_iframe.php?opc=1" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px; height:600px"    ></iframe></p></td>
      
      
    </tr>
    </tbody>
</table>
</div>
<p>
  <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden"  >
  
  <input name="textfield2" type="text" id="textfield2" value="1" readonly style="visibility:hidden">
</p>
</form>
</body>
</html>