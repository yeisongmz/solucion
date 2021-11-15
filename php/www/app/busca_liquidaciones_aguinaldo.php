<?php 
date_default_timezone_set('America/Bahia');
 include ("conexion/conectar.php");
$apellidos='';

$query2=mysql_query("SELECT nombres,apellidos FROM personal where estado = 1 ORDER BY apellidos   ");

						$apellidos = "";
						
							
						while($query4=mysql_fetch_array($query2))
						{
							$apellidos = $apellidos.$query4['apellidos'].", ".$query4['nombres']."-";
																				
						}
						$apellidos = $apellidos."...";
						
				
							

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Busqueda</title>

 <link rel="stylesheet" type="text/css" href="css/estilos.css">
 <link rel="stylesheet" type="text/css" href="css/auto-complete.css">
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
  
  <script type="text/javascript">
   function teclaGRAL2(field, event,sgte) {
  switch (event.keyCode) 
  {
			case 13 :
					var x = document.activeElement.value;
					var x2 = document.activeElement.id;
	            	if(x2=='skills2')
					{
						document.getElementById("textfield2").focus();
						return;
					}
					if(x2=='textfield2')
					{
						document.getElementById("textfield3").focus();
						return;
					}
				
			break;
  }
}	
  	function enviar(valor)
		{
			//document.getElementById("detalle").src='liquidaciones_Regulares_iframe.php?q='+document.getElementById("skills2").value;
		}
  	function enviar2()
		{
			if(document.getElementById('skills2').value!='')
		{
			
				
				//location = 'liquidacion_aguinaldo.php?personal='+document.getElementById('skills2').value+'&ano='+document.getElementById('textfield2').value;
				location = 'genera_aguinaldo.php?personal='+document.getElementById('skills2').value+'&ano='+document.getElementById('textfield2').value;
		}
			
			
			

	}
	
	
	function eliminar()
	{
		if(document.getElementById('textfield').value!='')
		{
			var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
				location = 'guarda_elimina_liquidaciones_aguinaldo.php?id='+document.getElementById('textfield').value;
			   }
		}
	}
	function ver()
	{
				
		if(document.getElementById('textfield').value!='')
		{
				location = 'liqui_aguinaldo_pdf.php?id='+document.getElementById('textfield').value;
		}
	}
	function ver2()
	{
		if(document.getElementById('textfield').value!='')
		{
		
				//location = 'liquidacion_regular_pdf2.php?desde='+document.getElementById('textfield2').value+'&hasta='+document.getElementById('textfield3').value;
		}
		
	}
	function buscar2()
{
	var x = document.activeElement.value;
	var x2 = document.activeElement.id;
	//alert(x+x2);
	
	if(x2=='skills2')
	{
		//document.getElementById("textfield2").focus();
			document.getElementById("detalle").src='liquidaciones_aguinaldo_iframe.php?q='+document.getElementById("skills2").value;
			
		
	}
}
	function buscar( event)
{
	
	
	 switch (event.keyCode) 
  		{
	
			case 13 :
			document.getElementById("detalle").src='liquidaciones_aguinaldo_iframe.php?q='+document.getElementById("skills2").value;
			var x = document.activeElement.value;
			var x2 = document.activeElement.id;
			//alert(x+x2);
			
			if(x2=='skills2')
			{
				//document.getElementById("textfield2").focus();
			}
			//document.getElementById("textfield2").focus();	
				
		}
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
 <form id="form1" name="form1" method="post">




<div class="polaroid6" style="height:auto">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
  <tr>
  	<td height="40" colspan="4" align="center" class="fondo_encabezado"><span class="titulo2">Liquidación de aguinaldo</span>&nbsp;</td>
    </tr>
  
  <tr>
  	<td height="27" colspan="4"  align="left">
  	  <input id="skills2" placeholder="Ingrese Apellido..." size="37" name="skills2" autofocus  type="text"  onKeyUp="return teclaGRAL2(this, event,'textfield2')" >
	  </td>
  	</tr>
    
		
    <tr>
		<td width="3%">Año</td>
        <td width="16%"><input name="textfield2" type="text" id="textfield2" style="font:Arial; font-size:16px; font-weight:bold; color:#4D965C" onKeyUp="return teclaGRAL2(this, event,'textfield3')" value="<?php echo date('Y');?>" size="10" maxlength="4"></td>
        <td colspan="2"><input name="button" type="button" class="boton3" id="button" value="Generar" style="width:85px;" onClick="enviar2();"></td>
    </tr>
     <tr>
		<td height="40">&nbsp;</td>
        <td>&nbsp;</td>
       
    
   
    
		<td width="27%">&nbsp;</td>
        <td width="53%" align="right"><input name="button6" type="button" class="boton3" id="button6" value="Eliminar" style="width:85px;" onClick="eliminar();">
		  &nbsp;<input name="button5" type="button" class="boton3" id="button5" value="Ver (pdf)  " style="width:85px;"  onclick = "ver();">
		  <input name="button2" type="button" class="boton3" id="button2" value="Recargar" onClick="location='busca_liquidaciones_aguinaldo.php'">		  &nbsp;&nbsp;</td>
        <td width="1%" ></td>
    </tr>
    
    <tr height="200">
      <td colspan="5"  align="left" height="250">
        
        <iframe src="liquidaciones_aguinaldo_iframe.php" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px; " height="100%"    ></iframe>
        </td>
    </tr>
    </tbody>
</table>
</div>
  <input name="textfield" type="text" id="textfield"  readonly style="visibility:hidden">
<textarea name="textarea2" cols="1" rows="1" id="textarea2" style="visibility:hidden"><?php echo $apellidos;?></textarea>
 <div id="fb-root"></div>
<script src="js/auto-complete.js"></script>
<script>
	
      
		
		var demo1 = new autoComplete({
            selector: '#skills2',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
				var string =  document.getElementById('textarea2').value ;
				var choices = string.split("-");
			    var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
					
                suggest(suggestions);
            }
        });


       
    </script>
</form>
</body>
</html>