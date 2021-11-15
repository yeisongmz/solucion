<?php session_start();
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/funciones.js"></script>
 <script>
 
  $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=PROVEEDOR",
		autoFocus:true
	});
  });
  </script>
  <script type="text/javascript">
  	function enviar(valor)
	{
		
		document.getElementById('skills2').value=valor;
	}
	function cerrar()
	{
		document.getElementById('cierre').click();
		enviarADJUNTO()
	}
  function enviarADJUNTO()
  {
	  
	  if (document.getElementById("textfield").value!='' || document.getElementById("textfield11").value!='')
	  {

	 	
	  	document.getElementById("form1").submit();
		
	  }
	  else
	  {
		alert('Escriba el nombre del equipo para guardar');  
	  }
  }
  function guardar()
  {
	  if(document.getElementById("textfield").value=='' || document.getElementById("textfield8").value=='' || document.getElementById("number").value=='' || document.getElementById("skills2").value=='' || document.getElementById("select").value==0)
	  {
		  alert("Complete los campos Obligattorios");
	  }
	  else
	  {
	  document.getElementById("form1").submit();
	  }
  }
 
  
function showhide()
     {
           var div = document.getElementById("openModal");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
  </script>
  <?php 
  
  				$descrip = '';
				$tipo = '';
				$marca = '';
				$modelo = '';
				$proveedor = '';
				$otrosdatos = '';
				$fechacompra =date('d-m-Y');
				$fechacompra2 = date('d-m-Y');
				$nrocomprob = '';
				$estado = '';
				$garantia = '';
				$costo = '';
				$equivalente = '';
				$stockmin = '';
				$origen = '';
				$peso = '';
				$unidad_medida='';
				$utilizar='';
  if(isset($_GET['id']))
  {
	$query2="select * from equipos where id='".$_GET['id']."'";
	$res=mysql_query($query2,$con);

 if(mysql_num_rows($res)>0){
		 while($fila=mysql_fetch_array($res))
		 {
				$descrip = $fila['descrip'];
				$tipo = $fila['tipo'];
				$marca = $fila['marca'];
				$modelo = $fila['modelo'];
				$proveedor = $fila['proveedor'];
				$otrosdatos = $fila['otrosdatos'];
				$fechacompra =explode("-",($fila['fechacompra']));
				if(count($fechacompra)>1)
				{
				$fechacompra2 = $fechacompra[2]."-".$fechacompra[1]."-".$fechacompra[0];  
				}
				else
				{
					$fechacompra2='';
				}
				$nrocomprob = $fila['nrocomprob'];
				$estado = $fila['estado'];
				$garantia = $fila['garantia'];
				$costo = $fila['costo'];
				$equivalente = $fila['equivalente'];
				$stockmin = $fila['stockmin'];
				$origen = $fila['origen'];
				$peso = $fila['peso'];
				$unidad_medida =$fila['unidadMedida'];
				$utilizar=$fila['utilizar'];
		 }


														

 }

  }
  ?>
</head>

<body onLoad="document.getElementById('cierre').click();" >
<form id="form1" name="form1" enctype='multipart/form-data'  method="post" action="guarda_equipos.php">
<div class="polaroid5">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr  class="fondo_encabezado" >
        <td height="40" colspan="3" align="center"><span class="titulo2">Equipos</span></td>
      </tr>
      <tr>
        <td width="23%" height="44" class="eiquetas">Nombre del Equipo*</td>
        <td width="62%"><input name="textfield" type="text" autofocus id="textfield" onKeyUp="return teclaGRAL(this, event,'select')" size="50" maxlength="60" value="<?php echo $descrip ;?>" autocomplete="off"></td>
        <td width="15%">&nbsp;</td>
      </tr>
      <tr>
      	<td height="37" class="eiquetas">Tipo*&nbsp;</td>
       	<td><select name="select" id="select" onChange="document.getElementById('textfield2').focus();">
 		  <option value="0" selected>Seleccione una Opción</option>
       	  <option value="1">Insumo</option>
       	  <option value="2">Herramienta</option>
       	  <option value="3">Maquinaria</option>
       	  <option value="4">Útiles</option>
       	  <option value="5">Otros</option>
     	  </select></td>
      	<td><input name="textfield13" type="text" id="textfield13" value="<?php echo $_GET['opc']; ?>" size="2" readonly style="visibility:hidden" ></td>                
      </tr>
       <tr>
      	<td height="36" class="eiquetas">Marca&nbsp;</td>
       	<td><input name="textfield2" type="text" id="textfield2" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textfield3')" value="<?php echo $marca ;?>" autocomplete="off"></td>
      	<td><input name="textfield14" type="text" id="textfield14" value="<?php echo $_GET['id']; ?>" size="2" readonly style="visibility:hidden"></td>                
      </tr>
       <tr>
      	<td height="36" class="eiquetas">Modelo&nbsp;</td>
       	<td><input name="textfield3" type="text" id="textfield3" maxlength="30" onKeyUp="return teclaGRAL(this, event,'bt1')" value="<?php echo $modelo ;?>" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td class="eiquetas">Fecha Compra&nbsp;</td>
       	<td><input type="text" name="textfield4" id="textfield4" readonly onChange="document.getElementById('skills2').focus();" value="<?php echo $fechacompra2 ;?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield4,'dd-mm-yyyy',this)" id="bt1"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td height="50" class="eiquetas">Proveedor*&nbsp;</td>
       	<td>&nbsp;<div class="ui-widget">
  			<input id="skills2" placeholder="Ingrese Proveedor a buscar..." size="37" name="skills2" autocomplete="off" value="<?php echo $proveedor ;?>"  onKeyUp="return teclaGRAL(this, event,'textfield5')" >
      	</div></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td height="29" class="eiquetas">Nº Comprobante&nbsp;</td>
       	<td><input name="textfield5" type="text" id="textfield5" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield6')" value="<?php echo $nrocomprob ;?>" maxlength="15"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td height="32" class="eiquetas">Estado&nbsp;</td>
       	<td><input name="textfield6" type="text" id="textfield6" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield7')" value="<?php echo $estado ;?>" maxlength="20"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td height="32" class="eiquetas">Garant&iacute;a&nbsp;</td>
       	<td><input name="textfield7" type="text" id="textfield7" maxlength="60" value="<?php echo $garantia ;?>" onKeyUp="return teclaGRAL(this, event,'textfield8')" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td height="32" class="eiquetas">Costo&nbsp;Gs*.</td>
       	<td><input name="textfield8" type="text" id="textfield8" value="<?php echo $costo ;?>" maxlength="10" onKeyUp="format(this);return teclaGRAL(this, event,'textfield9')" onChange="format(this);" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td height="32" class="eiquetas">Equivalente&nbsp;</td>
       	<td><input name="textfield9" type="text" id="textfield9" value="<?php echo $equivalente ;?>" maxlength="60" onKeyUp="return teclaGRAL(this, event,'number')" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
      <tr>
      	<td height="32" class="eiquetas">Stock M&iacute;nimo*&nbsp;</td>
       	<td><input name="number" type="number" id="number" maxlength="60" value="<?php echo $stockmin ;?>" onKeyUp="return teclaGRAL(this, event,'textfield10')" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
      <tr>
      	<td height="32" class="eiquetas">Or&iacute;gen&nbsp;</td>
       	<td><input name="textfield10" type="text" id="textfield10" value="<?php echo $origen ;?>" maxlength="20" onKeyUp="return teclaGRAL(this, event,'textfield12')" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
      <tr>
      	<td height="32" class="eiquetas">Peso&nbsp;</td>
       	<td><input name="textfield12" type="text" id="textfield12" maxlength="10" value="<?php echo $peso ;?>" onKeyUp="return teclaGRAL(this, event,'textfield122')" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
      <tr>
      	<td height="32" class="eiquetas">Unidad de Medida&nbsp;</td>
       	<td><input name="textfield122" type="text" id="textfield122" maxlength="5" value="<?php echo $unidad_medida ;?>" onKeyUp="return teclaGRAL(this, event,'textarea')" autocomplete="off"></td>
      	<td>&nbsp;</td>                
      </tr>
       <tr>
      	<td class="eiquetas">Observac&oacute;n&nbsp;</td>
       	<td><textarea name="textarea" cols="30" rows="6" maxlength="250" id="textarea"><?php echo $otrosdatos ;?></textarea></td>
      	<td>&nbsp;</td>                
      </tr>
      <tr>
        <td height="36" class="eiquetas"> <label for="utilizar">No utilizar los costos del equipo/articulo para el reporte PLANTILLA/REMISIONES </label></td>
        <td><input type="checkbox" name="utilizar" id="utilizar" <?php if($utilizar!==""){ echo "checked";}; ?>  >
         </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input type="button" name="button" id="button" value="Guardar" class="boton3" onClick="guardar()"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="52" colspan="2" align="center" class="fondo_encabezado">Documentos Adjuntos</td>
        <td height="52" align="center" class="fondo_encabezado" id="boton_adjuntos"><a href="#openModal" id="abridor">
<img border="0"   src="images/agregar.ico" width="0" height="0" id="documentos" style="visibility:hidden"></a></td>
        </tr>
      <tr>
        <td height="21"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       
      
      <tr>
        <td colspan="3"><iframe src="" name=""  scrolling="yes"   frameborder="0" class="eiquetas" id="detalle" style="margin:0px;padding:0px;width:100%;border-width:0px;"    ></iframe></td>
        </tr>
    </tbody>
  </table>
  </div>

  <div id="openModal" class="modalDialog">
	<div >
		<a href="#close" title="Cerrar" id="cierre" class="close">X</a>
		<div class="modal-header">
      
      <h2>Adjuntar Documentos</h2>
    </div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1"  >
    <tbody>
    <tr>
        <td height="56" class="eiquetas">&nbsp;Fecha Documento</td>
        <td style="color:#EB1115"><input type="text" name="textfield7052" id="textfield7052" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7052,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="33%" height="36" class="eiquetas">&nbsp;Vigente Desde
        <div id="testDIV">
    <div class="container">
        <div class="hero-unit"></div>
    </div>
</div>
        </td>
        <td width="64%" style="color:#EB1115"><input name="textfield7050" type="text" id="textfield7050" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield7050,'dd-mm-yyyy',this)">
        
        </td>
       <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="56" class="eiquetas">&nbsp;Vigente Hasta</td>
        <td style="color:#EB1115"><input type="text" name="textfield7051" id="textfield7051" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7051,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="40" class="eiquetas">Ref</td>
        <td><input name="textfield11" type="text" id="textfield11" size="40"></td>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td height="40" colspan="3">&nbsp;
<input name='uploadedfile' type='file'><br>
                
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Longitud max. de nombre de archivo: 25 caracteres</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="3%">&nbsp;</td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Adjuntar" onclick="enviarADJUNTO()"></td>
        <td>&nbsp;</td>
        
      </tr>
      
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        
      </tr>
    </tbody>
  </table>
  </div>
  </div>
  <?php
   if(isset($_GET['id']))
  {
	 
	  
  	 if($tipo=='Insumo'){
							 ?>
                        <script type="text/javascript">
							 document.getElementById("documentos").width="30";
						 document.getElementById("documentos").height="30";
							document.getElementById("documentos").style.visibility='visible';
							document.getElementById("select").options[1].selected= true;
						</script>
						<?php	
						}
	 	if($tipo=='Herramienta')
						{
						?>
                        <script type="text/javascript">

						 document.getElementById("documentos").width="30";
						 document.getElementById("documentos").height="30";
							document.getElementById("documentos").style.visibility='visible';						
							document.getElementById("select").options[2].selected= true;
						</script>
                        <?php	
						}
 		if($tipo=='Maquinaria'){
							 ?>
                        <script type="text/javascript">
						 document.getElementById("documentos").width="30";
						 document.getElementById("documentos").height="30";
							document.getElementById("documentos").style.visibility='visible';	
							document.getElementById("boton_adjuntos").style.visibility='visible';
							//#openModal	
//							document.getElementById("abridor").href="#openModal";
							document.getElementById("select").options[3].selected= true;
						</script>
						<?php	
						}
	 	if($tipo=='Útiles')
						{
						?>
                        <script type="text/javascript">
						 document.getElementById("documentos").width="30";
						 document.getElementById("documentos").height="30";
							document.getElementById("documentos").style.visibility='visible';						
							document.getElementById("select").options[4].selected= true;
						</script>
                        <?php	
						}	
		if($tipo=='Otros')
						{
						?>
                        <script type="text/javascript">
						 document.getElementById("documentos").width="30";
						 document.getElementById("documentos").height="30";
							document.getElementById("documentos").style.visibility='visible';						
							document.getElementById("select").options[5].selected= true;
						</script>
                        <?php	
						}
  }
  ?>
</form>
</body>
<script type="text/javascript">
	document.getElementById('detalle').src = 'documentos_equipos_iframe.php?id=' + document.getElementById("textfield14").value;
						var aux2 = document.getElementById("textfield8").value.replace(/[.*+?^${}()|[\]\\]/g, "");
						var num = aux2;
						if(!isNaN(num)){
						num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
						num = num.split('').reverse().join('').replace(/^[\.]/,'');
						}

						document.getElementById("textfield8").value=num;

</script>
</html>
