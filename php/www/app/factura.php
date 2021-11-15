<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<!--================================-->
<!--JS y CSS  para autocompletar-->

<script src="auto-complete.js"></script>
<link rel="stylesheet" type="text/css" href="css/auto-complete.css">
<!--================================-->


<head>
	<title>Solucion</title>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="generator" content="Web Page Maker">
	
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

	<?php
	// conexion a base de datos
	 include ("conexion/conectar.php") ; 
	 
	 //===============================================================
	 // DATOS PARA LA BUSQUEDA
	 //===============================================================
	$query2=mysql_query("SELECT razon FROM cliente" );
	
	 $art;
	while($query4=mysql_fetch_array($query2))
		{
			@$art = $art.$query4['0']."-";
		}
		
	?>


</head>
<body>

<!--==================================================================================-->	
<!--AREA DE TEXTO DONDE SE GUARDAN LOS DATOS DE LA CONSULTA PARA AUTOCOMPLETE-->
	<textarea name="textarea4" cols="1" rows="1" id="textarea4" style="visibility:hidden;position: absolute;"><?php echo $art;?></textarea>
<!--==================================================================================-->	

	<form name="form1" id="form1" method="post" style="margin:0px;z-index:5;height:150px;">
		<!-- ============================================================= -->
		<!-- 			 CAMPOS		 -->
		<!-- ============================================================= -->
		<input name="numero" id="numero" type="text"  style="position:absolute;width:200px;left:335px;top:157px;z-index:1">
		<input name="fecha" id="fecha" type="date" style="position:absolute;width:200px;left:335px;top:197px;z-index:3">
		<!-- <input name="importe" id="importe" type="text" onkeyup="format(this)" onchange="format(this)" style="position:absolute;width:200px;left:335px;top:240px;z-index:5"> -->
		<input name="importe" id="importe" type="text" style="position:absolute;width:200px;left:335px;top:240px;z-index:5">		
		
		<!-- =================== Cliente ========================= -->
		<input type="text" id="arti" name=arti size=55 onkeyup="procesa(this)" style="position:absolute;width:280px;left:335px;top:104px;z-index:9">
		
	    <input type="button" name="button" id="button" value="Grabar" onClick="enviar();" style="position:absolute;left:426px;top:365px;z-index:10">
		<input name="id_cliente" type="text" style="visibility:hidden; position:absolute;width:85px;left:103px;top:322px;z-index:15">

		<select name="tipofactura" style="position:absolute;left:332px;top:288px;width:200px;z-index:18">
			<option value="CONTADO">CONTADO</option>
			<option value="CREDITO">CREDITO</option>				
		</select>
		
		<input name="refe" id="refe" type="text"  style="position:absolute;width:400px;left:330px;top:330px;z-index:5">		
		
		<div style="position:absolute;left:50px;top:380px;z-index:18" > * Todos los campos son de carga obligatoria.- </div>
	</form>

	<!-- ============================================================= -->
	<!-- 			 ETIQUETAS		 -->
	<!-- ============================================================= -->
	<div id="text1" style="position:absolute; overflow:hidden; left:106px; top:156px; width:242px; height:27px; z-index:2">
	<div class="wpmd">
	<div><font class="ws16">Numero de factura</font></div>
	</div></div>

	<div id="text2" style="position:absolute; overflow:hidden; left:106px; top:196px; width:242px; height:27px; z-index:4">
	<div class="wpmd">
	<div><font class="ws16">Fecha de factura</font></div>
	</div></div>

	<div id="text3" style="position:absolute; overflow:hidden; left:106px; top:239px; width:242px; height:27px; z-index:6">
	<div class="wpmd">
	<div><font class="ws16">Importe </font></div>
	</div></div>

	<div id="text6" style="position:absolute; overflow:hidden; left:106px; top:279px; width:242px; height:27px; z-index:7">
	<div class="wpmd">
	<div><font class="ws16">Tipo de factura </font></div>
	</div></div>
	
	<div id="text6" style="position:absolute; overflow:hidden; left:106px; top:330px; width:242px; height:27px; z-index:7">
	<div class="wpmd">
	<div><font class="ws16">Referencia </font></div>
	</div></div>
	
	
	<div id="text7" style="position:absolute; overflow:hidden; left:106px; top:106px; width:242px; height:27px; z-index:8">
	<div class="wpmd">
	<div><font class="ws16">Cliente</font></div>
	</div></div>
	
	<div id="msg1" style="position:absolute; overflow:hidden;visibility:hidden; left:110px; top:50px; width:242px; height:27px; z-index:30">
	<div class="wpmd">
	<div><font class="ws16">Registro grabado correctamente</font></div>
	</div></div>
	

	<!-- ============================================================= -->
	<!-- 			 LINEAS HORIZONTALES		 -->
	<!-- ============================================================= -->
	<div id="hr1" style="position:absolute; overflow:hidden; left:101px; top:128px; width:467px; height:17px; z-index:11">
	<hr size=2 width=467>
	</div>

	<div id="hr2" style="position:absolute; overflow:hidden; left:101px; top:182px; width:467px; height:17px; z-index:12">
	<hr size=2 width=467>
	</div>

	<div id="hr3" style="position:absolute; overflow:hidden; left:101px; top:223px; width:467px; height:17px; z-index:13">
	<hr size=2 width=467>
	</div>

	<div id="hr4" style="position:absolute; overflow:hidden; left:101px; top:264px; width:467px; height:17px; z-index:14">
	<hr size=2 width=467>
	</div>
	
	<div id="hr4" style="position:absolute; overflow:hidden; left:101px; top:310px; width:467px; height:17px; z-index:14">
	<hr size=2 width=467>
	</div>

	<div id="roundrect1" style="position:absolute; overflow:hidden; left:120px; top:3px; width:447px; height:50px; z-index:16"><img border=0 width="100%" height="100%" alt="" src="images/roundrect602808578.png"></div>

	<!-- ============================================================= -->
	<!-- 			 TITULO DEL FORMULARIO				 -->
	<!-- ============================================================= -->
	<div id="text8" style="position:absolute; overflow:hidden; left:249px; top:15px; width:233px; height:23px; z-index:17">
	<div class="wpmd">
	<div><font class="ws14">Registro de facturas</font></div>
	</div></div>
	
<!-- ============================================================= -->	
<!-- bloque de mensajes que se muestran en validaciones -->
<!-- ============================================================= -->	
	<div id="popup" class="form-popup">
		<div class="cerrar-form" onclick="cerrar()"> X </div>
		<br>
		<h3>Complete el formulario con los datos necesarios</h3>
	</div>
	
	<div id="popup2" class="form-popup">
		<div class="cerrar-form" onclick="cerrar()"> X </div>
		<br>
		<h3>La factura ya fue ingresada anteriormente</h3>
	</div>
<!-- FIN  bloque de mensajes que se muestran en validaciones -->

</body>

<script type="text/javascript">
//================================================================
// codigo autocomplete
//================================================================
	var demo1 = new autoComplete({
            selector: '#arti',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
				var string =  document.getElementById('textarea4').value ;
				var choices = string.split("-");
			    var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
					
                suggest(suggestions);
            }
        });

//======================================================================		
// FUNCION QUE VALIDA EL FORMULARIO Y LUEGO ENVIA LOS DATOS A GRABACION
//======================================================================
	function enviar()
	{
		
		if( (document.getElementById('numero').value !='') & 
				(document.getElementById('fecha').value !='') &
				(document.getElementById('importe').value !='') )
		{
		document.getElementById('form1').submit();
		}
		else
		{
			 document.getElementById('popup').style.display="block";	
		}
		
	}	

function cerrar(){
		
			document.getElementById('popup').style.display="none" ;
			document.getElementById('popup2').style.display="none"			
		
	}	
	
function procesa(input){
		//-----------------------------------------------------------------
		// funcion para hacer saltos entre campos con ENTER
		//-----------------------------------------------------------------		
	switch (event.keyCode) 
  		{
	
			case 13 :
/*			 if ( document.getElementById('numero').name=='numero' ){				 
				 document.getElementById('fecha').focus();
				}
			 else
				{*/
				document.getElementById('numero').focus();	
				// }		
		
		}	
}	
	
function format(input)
	{
		//----------------------------------------------------------------
		// FORMATEA UN CAMPO NMERICO TIPO INPUT CON PUNTOS DE MIL
		//----------------------------------------------------------------		
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
</script>
		
		
</html>


<?php
if(isset($_POST['importe']) )
{  
	$numero = $_POST["numero"] ;
	$fecha = $_POST["fecha"] ;
	$importe = $_POST["importe"] ;
	$tipofactura = $_POST["tipofactura"] ;
	$cliente = trim($_POST["arti"]) ;
	$refe = $_POST["refe"] ;
	
	//--------------------------------------------------------
	// busca el ID del cliente
	//--------------------------------------------------------
	$query1 = "select id from cliente where razon ='".$cliente."'" ; 	
	$resultado = mysql_query($query1);
	$idcliente = mysql_fetch_array($resultado) ; 	
	//--------------------------------------------------------
	
	//--------------------------------------------------------
	// busca el duplicado de numero de factura
	//--------------------------------------------------------
	$consulta1 = "select numero from facturas where numero = '".$numero."'" ; 
	$goal = mysql_query($consulta1);
	$v_numero = mysql_fetch_array($goal) ;
	
		if ($v_numero[0] !="" ){
			echo "<script> document.getElementById('popup2').style.display='block';</script>";
			
		}else{

			//----------------------------------------------------------
			// 	graba los datos a la tabla	
			//----------------------------------------------------------
				$query2="insert into facturas (numero,fecha,tipo,importe,dsc_cliente,idcliente,referencia) values('".$numero."','".$fecha."','".$tipofactura."',".$importe.",'".$cliente."',".$idcliente[0].",'".$refe."')";
			//--------------------------------------------------------
				//echo $query2 ; 
				$resultado = mysql_query($query2);
				mysql_close($con);	
				
				// echo "<script>var xx = setTimeout(function(){ window.location.assign('factura.php')},500) ;</script>"			
				
		}
		
		$v_numero = "" ; 
	//--------------------------------------------------------

}

?>
