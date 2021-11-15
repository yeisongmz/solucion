function restarHoras(field, event) {

  switch (event.keyCode) 
  {
			case 13 :
		  		inicioMinutos = parseInt(document.getElementById("textfield3").value);
  				inicioHoras = parseInt(document.getElementById("textfield2").value);
  				finMinutos = parseInt(document.getElementById("textfield5").value);
			    finHoras = parseInt(document.getElementById("textfield4").value);
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
  					document.getElementById("textfield6").value = horas+"."+minutos;
				  if (horas.length < 2) {
					horas = "0"+horas;
				  }
				  
    			document.getElementById("number").value = horas+":"+minutos;

					}
						break;
						
			case 9 :
		  		inicioMinutos = parseInt(document.getElementById("textfield3").value);
  				inicioHoras = parseInt(document.getElementById("textfield2").value);
  				finMinutos = parseInt(document.getElementById("textfield5").value);
			    finHoras = parseInt(document.getElementById("textfield4").value);
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
  					document.getElementById("textfield6").value = horas+"."+minutos;
				  if (horas.length < 2) {
					horas = "0"+horas;
				  }
				  
				 // if (horas.length < 2) {
//					horas = "0"+horas;
//				  }
    			document.getElementById("number").value = horas+":"+minutos;

					}
						break;						
						
						
						
							
		}
  }
  
  
  
  
  
function  bajar(field, event){


	switch (event.keyCode) 
			{
				case 13 :
			
				if(document.getElementById("number").value == '' || document.getElementById("number2").value == '' || document.getElementById("number3").value == '' || document.getElementById("skills4").value == '' ||  document.getElementById("skills2").value == '' ||  document.getElementById("skills3").value == '')
				{
					alert('Complete todos los datos');	
				}
				else
				{
					Creadora(document.getElementById("number").value,document.getElementById("skills2").value,document.getElementById("number3").value);
					
				}
				default:

			
			}

}








function preparacion()
{

		var table = document.getElementById('mitabla');
		var cantidades = '';
		var descrip ='';
		var tot = '';
		var tipo ='';
		var r = 0;
		var n = table.rows.length;
	
		var n2 = parseInt(document.getElementById("textfield15").value);
		
		var c1=100;
		var c2=200;
		var c3=300;
		var c4=400;
		var c5=700;

        for (r = 0; r < n2; r++) 
		{
			
			try {
					cantidades = cantidades + document.getElementById(c1).value +"-";	
					descrip = descrip + document.getElementById(c2).value +";"	;
					tot = tot + document.getElementById(c4).value +"-"	;
					tipo = tipo + document.getElementById(c5).value +"-";
					document.getElementById("textfield11").value = cantidades;			
					document.getElementById("textfield12").value = descrip;
					document.getElementById("textfield13").value = tot;
					document.getElementById("textfield14").value = tipo;			
				}
				catch(err) 
				{

				}
				c1=c1+1;
				c2=c2+1;				
				c3=c3+1;				
				c4=c4+1;
				c5=c5+1;	
				
			
			
        }
		

		
		
		
}







function BorraFila()
{

		var str = document.getElementById("textfield10").value;
		var res = str.split("--");
		var i = 0;
		for(i = 0; i<res.length-1;i++)
			{
				document.getElementById("mitabla").deleteRow(res[i]);	
			}
		document.getElementById("textfield10").value="";
		GetCellValues()
}














function GetCellValues() {
        var table = document.getElementById('mitabla');
		var aux='';
		var aux2='';
		var n2 = parseInt(document.getElementById("textfield15").value);
		document.getElementById("textfield7").value =0;
		var fila = 400;
		var aux = 0;
		var aux2 = 0;
		var aux3 = 0;
		var num = 0;
		
		for (var r = 0; r < n2; r++) 
		{
				try {
					aux = document.getElementById(fila).value.replace(/[.*+?^${}()|[\]\\]/g,"");
						aux2 = document.getElementById("textfield7").value.replace(/[.*+?^${}()|[\]\\]/g,"");
						aux3 = parseInt(aux2)+parseInt(aux);
						num = aux3;
						if(!isNaN(num))
						{
							num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
							num = num.split('').reverse().join('').replace(/^[\.]/,'');
						}
							
						document.getElementById("textfield7").value=num;
				}
				catch(err) {
					//document.getElementById("demo").innerHTML = err.message;
				}

		
		fila=fila+1;
		}
		
      
    }










function leer(valor,valor2)
{
	
    var row =  valor.parentNode.parentNode.rowIndex;
   if (document.getElementById(valor2).checked)
   {

	document.getElementById("textfield10").value = 	document.getElementById("textfield10").value+row+"--";
	document.getElementById(valor2-100).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-200).style.backgroundColor="#A9D4F0";
	document.getElementById(valor2-300).style.backgroundColor="#A9D4F0";	
	document.getElementById(valor2-400).style.backgroundColor="#A9D4F0";

	document.getElementById(parseInt(valor2)+200).style.backgroundColor="#A9D4F0";
	var r = confirm("Desean Eliminar la Fila");
	if (r == true) {
    		BorraFila()
	} 
	else
	{
			document.getElementById(valor2).checked = false;
			document.getElementById("textfield10").value="";
   			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";
			document.getElementById(parseInt(valor2)+200).style.backgroundColor="#FFFFFF";
	}
	
   }
   else
   {
			document.getElementById(valor2-100).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-200).style.backgroundColor="#FFFFFF";
			document.getElementById(valor2-300).style.backgroundColor="#FFFFFF";	
			document.getElementById(valor2-400).style.backgroundColor="#FFFFFF";
			document.getElementById(parseInt(valor2)+200).style.backgroundColor="#FFFFFF";	   
   }
}





function Creadora(cantidad,descrip,total) {

	document.getElementById("number").value ='';
	document.getElementById("skills2").value = '';
	document.getElementById("number3").value = '';
	document.getElementById("skills2").focus();
	var elegido = document.getElementById("textfield16").value;//document.getElementById("select").options.selectedIndex;
	
	document.getElementById("textfield2").value = parseInt(document.getElementById("textfield2").value) + 1;
	document.getElementById("textfield3").value = parseInt(document.getElementById("textfield3").value) + 1;
	document.getElementById("textfield4").value = parseInt(document.getElementById("textfield4").value) + 1;
	document.getElementById("textfield5").value = parseInt(document.getElementById("textfield5").value) + 1;		
	document.getElementById("textfield6").value = parseInt(document.getElementById("textfield6").value) + 1;
	document.getElementById("textfield8").value = parseInt(document.getElementById("textfield8").value) + 1;
	document.getElementById("textfield9").value = parseInt(document.getElementById("textfield9").value) + 1;	
	document.getElementById("textfield15").value = parseInt(document.getElementById("textfield15").value) + 1;		

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
		input0.readOnly = "true";
		input0.style.border = "none";
		input0.id = document.getElementById("textfield2").value;
		input0.value =cantidad;
		
		input1.type = "text";
        input1.className = "myInput";
        input1.style.height = "20px";
        input1.style.width = "100%";
		input1.readOnly = "true";
		input1.style.border = "none";
		input1.id = document.getElementById("textfield3").value;
		input1.value =descrip;

		input2.type = "text";
        input2.className = "myInput";
        input2.style.height = "20px";
        input2.style.width = "100%";
		input2.readOnly = "true";	
		input2.style.border = "none";	
		input2.id = document.getElementById("textfield4").value;
		var num = total.replace(/\./g,'');	
		
		
		var aux2 =	parseInt(num)/cantidad ;
		
		input2.value =parseInt(aux2);
		var num = input2.value.replace(/\./g,'');
		if(!isNaN(num)){
			num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
			num = num.split('').reverse().join('').replace(/^[\.]/,'');
			input2.value = num;
			}

		
		input3.type = "text";
        input3.className = "myInput";
        input3.style.height = "20px";
        input3.style.width = "100%";
		input3.readOnly = "true";
		input3.style.border = "none";
		input3.id = document.getElementById("textfield5").value;
		input3.value =total;
		

		
		input4.type = "text";
        input4.className = "myInput";
        input4.style.height = "20px";
        input4.style.width = "100%";
		input4.readOnly = "true";
		input4.style.border = "none";
		input4.id = document.getElementById("textfield9").value;

		input4.value =document.getElementById("textfield16").value;
		
		checkbox.type = "checkbox";
        checkbox.name = "elementos";
		checkbox.style.width = "100%";
		checkbox.style.height = "18px";

		checkbox.id =document.getElementById("textfield6").value;
 		
		checkbox.addEventListener('click', function() { leer(this,this.id);}, true);
		
		cell0.style.width="7%";
      	cell1.style.width="39%";
      	cell2.style.width="13%";
      	cell3.style.width="20%" ;
      	cell4.style.width="12%" ;
	  	cell0.style.width="9%" ;
				
    	cell0.appendChild(input0);   
    	cell1.appendChild(input1);   
    	cell2.appendChild(input2);   	
    	cell3.appendChild(input3);
    	cell4.appendChild(input4);   	
    	cell5.appendChild(checkbox);
		
	document.getElementById(document.getElementById("textfield5").value).style.textAlign = "right";
	document.getElementById(document.getElementById("textfield4").value).style.textAlign = "right";
	document.getElementById(document.getElementById("textfield9").value).style.textAlign = "right";
	 GetCellValues()
 

}






function format(input)
{
var num = input.value.replace(/\./g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
input.value = num;
}
  
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}
}












function validacionGRAL(valor)
{
	
		var cadena = valor.trim();
		var salida = '';
		var salida2 = '';
		var salida3 = '';
		var salida4 = '';
		var salida5 = '';
		var salida6 = '';
		var salida7 = '';
		var salida8 = '';
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');
		salida7=salida6.replace (/[$]/g, '');						
		
   	return salida7;
}










	function limpiar_textos()
	{
		
		var a = document.getElementById("textfield").value;
		var b = '';
		
		b= validacionGRAL(a);

		document.getElementById("textfield").value = b;
//		
		a = document.getElementById("textfield2").value;
		b = '';
		b= validacionGRAL(a);
		document.getElementById("textfield2").value = b;
//		
		a = document.getElementById("textfield3").value;
		b = '';
		b= validacionGRAL(a);
		document.getElementById("textfield3").value = b;
//		
		a = document.getElementById("password").value;
		b = '';
		b= validacionGRAL(a);
		document.getElementById("password").value = b;
//		
		a = document.getElementById("password2").value;
		b = '';
		b= validacionGRAL(a);
		document.getElementById("password2").value = b;
//		
		a = document.getElementById("textarea").value;
		b = '';
		b= validacionGRAL(a);
		document.getElementById("textarea").value = b;
	}
	
	
	
	
	
function teclaGRAL (field, event,sgte) 
{

	switch (event.keyCode) {
			case 13 :
					
						document.getElementById(sgte).focus();
						break;	
					
	}
}











function tecla (field, event) 
 		{
		
      
		switch (event.keyCode) {
			case 13 :
					if(field.id=='textfield')
					{
						document.getElementById('password').focus();
						break;	
					}
					if(field.id=='password')
					{
						document.forms["form1"].submit();
						
						break;	
					}
				
			
			case 38 :
				if(field.id=='textfield')
					{
						document.getElementById('password').focus();
						break;	
					}
					if(field.id=='password')
					{
						document.getElementById('textfield').focus();
						break;	
					}
			
			case 40 :
				if(field.id=='textfield')
					{
						document.getElementById('password').focus();
						break;	
					}
					if(field.id=='password')
					{
						document.getElementById('textfield').focus();
						break;	
					}
			
		}
		
	
		
	} 
	
	
	
	
	
	
	
function tecla2 (field, event) 
 		{
		
      
		switch (event.keyCode) {
			case 13 :
					if(field.id=='textfield')
					{
						document.getElementById('password').focus();
						break;	
					}
					if(field.id=='password')
					{
						document.getElementById('password2').focus();
						
						break;	
					}
				if(field.id=='password2')
					{
						document.getElementById('RadioGroup1_0').focus();
						
						break;	
					}
				if(field.id=='RadioGroup1_0')
					{
						document.getElementById('RadioGroup1_1').focus();
						
						break;	
					}	
				if(field.id=='RadioGroup1_1')
					{
						document.getElementById('button3').focus();
						
						break;	
					}		
			
			
			
		}
		
	
		
	} 
	
	
	
	
	
	
	
	
function tecla3 (field, event) 
 		{
		
      
		switch (event.keyCode) {
			case 13 :
					if(field.id=='textfield')
					{
						document.getElementById('textfield2').focus();
						break;	
					}
					if(field.id=='textfield2')
					{
						document.getElementById('number').focus();
						
						break;	
					}
				if(field.id=='number')
					{
						document.getElementById('textfield3').focus();
						
						break;	
					}
				if(field.id=='textfield3')
					{
						document.getElementById('textfield4').focus();
						
						break;	
					}	
				if(field.id=='textfield4')
					{
						document.getElementById('button').focus();
						
						break;	
					}										
				
		}
		
	
		
	}
	
	
	
	
	
	
	
	
	
	function tecla4 (field, event) 
 		{
		
      
		switch (event.keyCode) {
			case 13 :
					if(field.id=='textfield')
					{
						document.getElementById('textarea').focus();
						break;	
					}
					
												
				
		}
		
	
		
	} 	
	
	
	
	
	
	
	
		
function ver()
{
	
	document.getElementById('1').style.visibility='visible';
	document.getElementById('2').style.visibility='visible';
	document.getElementById('3').style.visibility='visible';
	document.getElementById('4').style.visibility='visible';
	document.getElementById('5').style.visibility='visible';
	document.getElementById('6').style.visibility='visible';
	document.getElementById('7').style.visibility='visible';
	document.getElementById('8').style.visibility='visible';
}








function enviar()
{
	if (document.getElementById('password').value==document.getElementById('password2').value)
		{
			document.forms["form1"].submit();	
		}
		else
		{
			alert("Las clave y la repeticiòn de clave no son iguales. VERIFIQUE !!");	
		}
}











function seleccion()
	{
		var indice = document.form1.select.selectedIndex;
      	var valor = document.form1.select.options[document.form1.select.selectedIndex].text;
	  	document.getElementById('button').style.visibility='visible';
		document.getElementById(1).style.visibility='visible';
		document.getElementById('textfield').style.visibility='visible';
 		document.getElementById('textfield').value=valor;
		document.getElementById('textfield').readOnly=true;

	}
	
	
	
	
	
	
function cerrar()
{
	close();
}











function uno(src)
{

	with(document)
	{
		var cel = getElementById(src);
		with(cel)
		{
		 	style.backgroundColor="yellow";
			style.cursor='hand';
		}
		if (src != 1)
		{
			getElementById('1').style.backgroundColor="white";
		}
	}
}





function dos(src)
{
	with(document)
	{
		var cel = getElementById(src);
		with(cel)
		{
			style.backgroundColor="white";
			style.cursor='default';
		}
	}
}








function limpiar(item)
{
	
	//style="visibility:hidden"datos
	$('#50').val(item);
	$('#miDiv').hide();
	//getElementById('datos').hide();
}







//************ busqueda incremental personal
function cargar(valor)
		{
			document.getElementById('textfield').value= document.getElementById('textfield').value+valor+'--';
			limpiarText(valor);
		}









	function limpiarText(valor)
	{
		//var estado = window.frames[0].document.getElementById(valor).checked;
//		var estado2 = estado.toString();
//		var str = document.getElementById('textfield').value;
//		var res = str.split("--");
//		var cadena='';
//		var ban=0;
//		
//		for (i = 0; i < res.length-1; i++)
//		{
//			if (estado2 == 'false')
//			{
//				if(res[i] != valor)
//					{
//						cadena=cadena+res[i]+'--';
//					}
//			}
//			
//		}
//		
//		if(cadena!='')
//		{
//			document.getElementById('textfield').value=cadena;
//		}
//		if (estado2 == 'false' )
//			{
//				
//				if( res.length == 3)
//				{ 
//				
//					document.getElementById('textfield').value='';
//				}
//			}
	var str = document.getElementById('textfield').value;
		var res = str.split("--");
		var cadena='';
		var ban=0;

		for (i = 0; i < res.length-1; i++)
		{
				if(res[i] == valor)
					{
						cadena=cadena+res[i]+'--';	
					}
			
		}
		
		if(cadena!=='')
		{
			document.getElementById('textfield').value=cadena;
		}
	}
	
	function limpiarText20(valor,valor2)
	{

		//var estado = window.frames[0].document.getElementById(valor).checked;
//		var estado2 = estado.toString();
//		var str = document.getElementById('textfield7').value;
//		var res = str.split("--");
//		var str2 = document.getElementById('textfield8').value;
//		var res2 = str2.split("--");
//		var cadena='';
//		var cadena2='';		
//		var ban=0;
//
//		for (i = 0; i < res.length-1; i++)
//		{
//			if (estado2 == 'false')
//			{
//				if(res[i] != valor)
//					{
//						cadena=cadena+res[i]+'--';
//											
//					}
//			}
//			
//		}
//		
//		for (i = 0; i < res2.length-1; i++)
//		{
//			if (estado2 == 'false')
//			{
//				if(res2[i] != valor2)
//					{
//						
//						cadena2=cadena2+res2[i]+'--';						
//					}
//			}
//			
//		}
		
		
		
			document.getElementById('textfield7').value=valor+'--';
			
			
			document.getElementById('textfield8').value=valor2+'--';
		
			
	}

//****************************************










	function validar_campos_banco(tipo)
	{
		
	 if(document.getElementById('textfield').value=='' || document.getElementById('textfield2').value=='' || document.getElementById('number').value==''){
		 alert("Complete los campos Requeridos para grabar el registro");
	 }
	 else
	 {
		
		var cadena = document.getElementById('textfield').value;
		var salida = '';
		var salida2 = '';
		var salida3 = '';
		var salida4 = '';
		var salida5 = '';
		var salida6 = '';
		var salida7 = '';
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');
		salida7=salida6.replace (/[$]/g, '');						
		document.getElementById('textfield').value=salida7.toUpperCase();
    	cadena = document.getElementById('textfield2').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';		
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');											
		document.getElementById('textfield2').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield3').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');
		salida7=salida6.replace (/[$]/g, '');														
		document.getElementById('textfield3').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield4').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');													
		document.getElementById('textfield4').value=salida7.toUpperCase();
		
		cadena = document.getElementById('number').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');			
		salida7=salida6.replace (/[$]/g, '');											
		document.getElementById('number').value=salida7.toUpperCase();
		document.getElementById("form1").submit();
    
	 }

	}
	
	
	
	
	
	
	
	
	
	function validar_campos_cargo(tipo)
	{
		
	 if(document.getElementById('textfield').value=='' ){
		 alert("Complete los campos Requeridos para grabar el registro");
	 }
	 else
	 {
		
		var cadena = document.getElementById('textfield').value;
		var salida = '';
		var salida2 = '';
		var salida3 = '';
		var salida4 = '';
		var salida5 = '';
		var salida6 = '';
		var salida7 = '';
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');
		salida7=salida6.replace (/[$]/g, '');						
		document.getElementById('textfield').value=salida7.toUpperCase();
    	cadena = document.getElementById('textarea').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';		
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');											
		document.getElementById('textarea').value=salida7.toUpperCase();
		document.getElementById("form1").submit();
	 }
	}
	
	
	
	
	
	
	
	
	
	
function validar_campos_proveedores(tipo)
	{
		
	 if(document.getElementById('textfield').value=='' ){
		 alert("Complete los campos Requeridos para grabar el registro");
	 }
	 else
	 {
		
		var cadena = document.getElementById('textfield').value;
		var salida = '';
		var salida2 = '';
		var salida3 = '';
		var salida4 = '';
		var salida5 = '';
		var salida6 = '';
		var salida7 = '';
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');
		salida7=salida6.replace (/[$]/g, '');						
		document.getElementById('textfield').value=salida7.toUpperCase();
    	cadena = document.getElementById('textfield2').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';		
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');											
		document.getElementById('textfield2').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield3').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');
		salida7=salida6.replace (/[$]/g, '');														
		document.getElementById('textfield3').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield4').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');													
		document.getElementById('textfield4').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield5').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');													
		document.getElementById('textfield5').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield6').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');													
		document.getElementById('textfield6').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textfield7').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');													
		document.getElementById('textfield7').value=salida7.toUpperCase();
		
		cadena = document.getElementById('textarea').value;
		salida = '';
		salida2 = '';
		salida3 = '';
		salida4 = '';
		salida5 = '';
		salida6 = '';
		salida7 = '';				
		salida=cadena.replace (/"/g, '');
		salida2=salida.replace (/'/g, '');
		salida3=salida2.replace (/[(]/g, '');
		salida4=salida3.replace (/[)]/g, '');		
		salida5=salida4.replace (/[%]/g, '');		
		salida6=salida5.replace (/[&]/g, '');	
		salida7=salida6.replace (/[$]/g, '');													
		document.getElementById('textarea').value=salida7.toUpperCase();
		
		document.getElementById("form1").submit();
    
	 }

	}	
	
	
	
	
	
	
	
	function highlightBG(element)
	 {
	
    element.style.backgroundColor  = '#A9D4F0';
}




function highlightBG2(element)
	 {
	
    element.style.backgroundColor  =  '#FDFBFB';
}
	
	
	