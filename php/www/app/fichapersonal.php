<?php 
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");
$apellidos='';
$nombre='';
$tipo_documento='';
$num_documento='';
$direccion='';
$num_casa='';
$barrio='';
$ciudad='';
$referencia_casa='';
$celular='';
$telefono='';
$fecha_ingreso=date('d-m-Y');
$fecha_egreso='';
$motivo_egreso='';
$cargo='';
$nom_cont1='';
$cel_cont1='';
$baja_cont1='';
$parentesco_cont1='';
$nom_cont2='';
$cel_cont2='';
$baja_cont2='';
$parentesco_cont2='';
$supervisor='';
$sueldo_banco='';
$aporta_ips='';
$num_aseg='';
$jornal_hora='';
$jornal_min='';
$modo_pago='';
$sexo='';
$estado_civil='';
$fecha_nac=date('d-m-Y');
$nacionalidad='';
$fecha_hijo='';
$cantidad_hijos='';
$profesion='';
$situacion_hijo='';
$salario_ips='';
$opc='';
$id='';
$tipotraba='';
$fechaemision=date('d-m-Y');
$fechaincio=date('d-m-Y');
$fechafin=date('d-m-Y');
$salarioreal='';
if(!empty($_GET['opc']))
{
	$opc=$_GET['opc'];
}
if(!empty($_GET['id']))
{
	
   $id = explode("--",$_GET['id']);	
   	$query2="select * from personal where id='".$id[0]."' " ;
    $id = $_GET['id'];
	$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$apellidos= $query4['apellidos'];
							$nombre= $query4['nombres'];
							$tipo_documento= $query4['tipo_docum'];
							
							try {
    
	if(!empty($query4['fechainicio']))
	{
							$xx = explode("-",$query4['fechainicio']);
							$fechaincio=$xx[2]."-".$xx[1]."-".$xx[0];
							$xx = explode("-",$query4['fechafin']);
							$fechafin=$xx[2]."-".$xx[1]."-".$xx[0];
							$xx = explode("-",$query4['fechaemision']);
							$fechaemision=$xx[2]."-".$xx[1]."-".$xx[0];
	}
							} catch (Exception $e) {
								echo $e;
    
}

							
							$num_documento= $query4['nro_docum'];
							$direccion= $query4['direccion'];
							$num_casa= $query4['n_casa'];
							$barrio= $query4['barrio'];
							$ciudad= $query4['ciudad'];
							$referencia_casa= $query4['referenciacasa'];
							$celular= $query4['telMovil'];
							$telefono= $query4['telefono'];
							$xx = explode("-",$query4['fecha_ingreso']);
							$fecha_ingreso= $xx[2]."-".$xx[1]."-".$xx[0];
							$fecha_egreso='';
							if($query4['fecha_salida']!=='2099-12-31')
							{
							$xx = explode("-",$query4['fecha_salida']);							
							$fecha_egreso= $xx[2]."-".$xx[1]."-".$xx[0];
							}
							$motivo_egreso= $query4['motivo_salida'];
							$cargo= $query4['cargos_id'];
							$nom_cont1= $query4['c1_nombre'];
							$cel_cont1= $query4['c1_movil'];
							$baja_cont1= $query4['c1_linbaja'];
							$parentesco_cont1= $query4['c1_parentesco'];
							$nom_cont2=$query4['c2_nombre'];
							$cel_cont2= $query4['c2_movil'];
							$baja_cont2= $query4['c2_linbaja'];
							$parentesco_cont2=$query4['c2_parentesco'];
							$supervisor=$query4['idsupervisor'];
							$sueldo_banco='';
							if($query4['banco_sueldo_id']!=='0'){
							$sueldo_banco=$query4['banco_sueldo_id'];
							}
							$aporta_ips=$query4['aporta_ips'];

							$num_aseg=$query4['nro_asegurado'];
							$jornal_hora=$query4['jornalxhora'];
							$jornal_min=$query4['jornalxmin'];
							$modo_pago=$query4['modopago'];
							$sexo=$query4['sexo'];
							$estado_civil=$query4['estadocivil'];
							$xx = explode("-",$query4['fechanacim']);							
							$fecha_nac=$xx[2]."-".$xx[1]."-".$xx[0];
							$nacionalidad=$query4['nacionalidad'];
							$xx = explode("-",$query4['fenacim_menor']);							
							$fecha_hijo=$xx[2]."-".$xx[1]."-".$xx[0];
							$cantidad_hijos=$query4['cant_hijos'];
							$profesion=$query4['profesion'];
							$situacion_hijo=$query4['situ_menor'];
							$salario_ips=$query4['importeIPS'];
							$salarioreal=$query4['sueldoreal'];
							$tipotraba=$query4['tipotraba'];
						}
						//******* BANCO ID *******************
				$query2="select razon from banco_sueldo where id='".$sueldo_banco."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$sueldo_banco = $query4['razon'];
						}
//*******CARGO ID *******************
				$query2="select cargo from cargos where id='".$cargo."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$cargo = $query4['cargo'];
						}	
//*******SUPERVISOR ID *******************
				$query2="select apellidos,nombres from personal where id='".$supervisor."' " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$supervisor = $query4['apellidos'].", ".$query4['nombres'];
						}
						
}

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
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=CARGOS",
		autoFocus:true
	});
  });
   $(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=PERSONAL",
		autoFocus:true
	});
  });
   $(function() {
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=BANCOS",
		autoFocus:true
	});
  });
   function guardar()
  {
	  if(document.getElementById("textfield2").value=='' || document.getElementById("textfield90").value=='' || document.getElementById("number4").value=='' || document.getElementById("textfield4").value=='' || document.getElementById("textfield5").value=='' || document.getElementById("textfield6").value=='' || document.getElementById("textfield7").value=='' || document.getElementById("select").value == 0 || document.getElementById("number").value=='' || document.getElementById("number2").value=='' || document.getElementById("skills2").value=='' || document.getElementById("textfield10").value=='' )
	  {
		alert("Complete los campos obligatorios ");  
	  }
	  else
	  {
		if(document.getElementById("RG1_1").checked ==true &&  document.getElementById("number10").value=='')
		{
			alert('Al aportar al IPS, debe completar el número de asegurado');
		}
		else
		{
			if(document.getElementById("RG2_0").checked ==true &&  document.getElementById("skills4").value=='')
		{
			alert('Al cobrar por BANCO, debe completar el nombre del banco,previamnte cargado en la ficha de BANCOS');
		}
			else
		{
	  		document.getElementById("form1").submit();
		}
		}
	  }
  }
  function enviarADJUNTO()
  {
	  
	 	document.getElementById('cierre').click();
	  	document.getElementById("form1").submit();
	 
  }
  function calcular60()
   {

  	var someDate = document.getElementById("textfield13").value;
	var res1=someDate.split("-");
  	var someDate2=new Date(res1[2]+"-"+res1[1]+"-"+res1[0]);
	someDate2.setDate(someDate2.getDate() + 60); 
	var dateFormated = someDate2.toISOString().substr(0,10);
	var res = dateFormated.split("-");
	document.getElementById("textfield14").value=res[2]+"-"+res[1]+"-"+res[0];
}
  </script>
</head>

<body>


<form  id="form1" name="form1" enctype='multipart/form-data'  method="post" action="guarda_ficha_personal.php">


  
<div class="polaroid3" >


  

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1"  >
    <tbody>
      <tr class="fondo_encabezado">
        <td height="42" colspan="3" align="center" ><strong class="titulo2"> &nbsp;Datos del Personal</strong></td>
      </tr>
      <tr >
        <td height="42" colspan="3" align="right" ><input type="button" name="button7" id="button7" value="Guardar" class="boton3" onClick="guardar();"></td>


      </tr>
      <tr>
        <td width="149" height="31" class="eiquetas">&nbsp;Apellidos*</td>
        <td width="333">&nbsp;<input name="textfield90" type="text" autofocus id="textfield90" size="50" maxlength="40"  onKeyUp="return teclaGRAL(this, event,'textfield2');"  value="<?php echo $apellidos; ?>" autocomplete="off" ></td>
        <td width="72" align="right" >
        <a href="#" class="tooltip" >
<img border="0"  src="images/help.ico" width="25" height="25">

    
        <!--<a href="#" class="tooltip">-->
	 
	<span > 
    <b></b>
    <?php 
	echo"<br>";
	echo"<br>";
	echo"Documentos Requeridos <br><br><br>"; 

	$query2="select * from docrequeridos " ;

					$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							echo $query4['documentos']."<br>";
						}	
	?>
		
		
	</span>
</a>&nbsp;</td>
      </tr>
      <tr>
        <td height="32" class="eiquetas">&nbsp;Nombres*</td>
        <td>&nbsp;<input name="textfield2" type="text" id="textfield2" size="50" maxlength="40" onKeyUp="return teclaGRAL(this, event,'select');" value="<?php echo $nombre; ?>" autocomplete="off"></td>
        <td><input name="textfield11" type="text" id="textfield11" size="10" value="<?php echo $opc; ?>" style="visibility:hidden" ></td>
      </tr>
      <tr>
        <td height="32" class="eiquetas">Tipo de Documento*</td>
        <td>&nbsp;<select name="select" class="eiquetas" id="select"  onChange="document.getElementById('number4').focus();" onKeyUp="return teclaGRAL(this, event,'number4');" >
          <option value="0">Seleccionar</option>
          <option value="1">C:I.</option>
          <option value="2">D.N.I.</option>
          <option value="3">PASAPORTE</option>
          <option value="4">OTRO</option>
        </select></td>
        <td><input name="textfield12" type="text" id="textfield12" size="10" value="<?php echo $id; ?>" style="visibility:hidden"></td>
      </tr>
      <tr>
        <td height="32" class="eiquetas">Nº Documento*</td>
        <td>&nbsp;<input name="number4" type="text" id="number4" onKeyUp="return teclaGRAL(this, event,'textfield4');" maxlength="12" value="<?php echo $num_documento; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Dirección*</td>
        <td>&nbsp;<input name="textfield4" type="text" id="textfield4" size="50" maxlength="80" onKeyUp="return teclaGRAL(this, event,'textfield5');" value="<?php echo $direccion; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31" class="eiquetas">&nbsp;Nº de Casa*</td>
        <td>&nbsp;<input name="textfield5" type="text" id="textfield5" onKeyUp="format(this);return teclaGRAL(this, event,'textfield6');" size="50" maxlength="5" value="<?php echo $num_casa; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29" class="eiquetas">&nbsp;Barrio*</td>
        <td>&nbsp;<input name="textfield6" type="text" id="textfield6" size="50" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textfield7');" value="<?php echo $barrio; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Ciudad*</td>
        <td>&nbsp;<input name="textfield7" type="text" id="textfield7" size="50" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textarea');" value="<?php echo $ciudad; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="89" class="eiquetas">&nbsp;Referencia de Casa</td>
        <td>&nbsp;<textarea name="textarea" cols="50" rows="4" maxlength="100" id="textarea"><?php echo $referencia_casa; ?></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31" class="eiquetas">&nbsp;Nº de Celular*</td>
        <td>&nbsp;<input name="number" type="text" id="number"  maxlength="20" onKeyUp="return teclaGRAL(this, event,'number9');" value="<?php echo $celular; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="eiquetas">&nbsp;Nº de Linea Baja</td>
        <td>&nbsp;<input name="number9" type="text" id="number9"   maxlength="20" onKeyUp="return teclaGRAL(this, event,'button3');" value="<?php echo $telefono; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Fecha Ingreso*</td>
        <td valign="bottom">&nbsp;<input name="number2" type="text" id="number2"  readonly onChange="document.getElementById('skills2').focus();" value="<?php echo $fecha_ingreso; ?>"><input type="button" name="button3" id="button3"   style="background-image:url(images/001_44.png); background-repeat:no-repeat; background-position:center; background-color:#FDFBFB; width:30px; height:30px; border-color:#FDFBFB; border-bottom-color:#FDFBFB; border-bottom:none; border-right:none" onclick="displayCalendar(document.forms[0].number2,'dd-mm-yyyy',this)" onMouseOver="this.style.cursor='pointer'"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Fecha Egreso</td>
        <td valign="middle">&nbsp;<input name="number3" type="text" id="number3"  onChange="document.getElementById('skills2').focus();"   readonly value="<?php echo $fecha_egreso; ?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr  >
        <td height="83" align="left" class="eiquetas">&nbsp;Motivo de Egreso</td>
        <td >&nbsp;<textarea name="textarea2" cols="50" rows="4" readonly id="textarea2"><?php echo $motivo_egreso; ?></textarea></td>
        <td align="center" >&nbsp;</td>
      </tr>
      <tr align="center" >
        <td height="31" align="left" class="eiquetas">&nbsp;Cargo*</td>
                <td align="left" >&nbsp;<input id="skills2" placeholder="Ingrese Cargo..." size="37" name="skills2" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield8');" value="<?php echo $cargo;?>" >      	</td>
                        <td align="center" >&nbsp;</td>
      </tr>
       <tr align="center" >
        <td height="31" align="left" class="eiquetas">&nbsp;Tipo de Trabajo</td>
                <td align="left" ><p>
                  <label>
                    <input name="RG5" type="radio" id="RG5_0" value="J" checked="checked">
                    Jornalero</label>
                  <br>
                  <label>
                    <input type="radio" name="RG5" value="M" id="RG5_1">
                    Mensualero</label>
                  <br>
                </p></td>
                        <td align="center" >&nbsp;</td>
      </tr>
      <tr align="center" class="fondo_encabezado2" >
        <td height="42" colspan="3" class="fondo_encabezado"><p><strong class="titulo2">En caso de emergencia contactar con</strong>
        <strong class="titulo2">Contacto Nº 1</strong></td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Nombre y apellido</td>
        <td>&nbsp;<input name="textfield8" type="text" id="textfield8" size="50" maxlength="60" onKeyUp="return teclaGRAL(this, event,'textfield9');" value="<?php echo $nom_cont1; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Nº de Celular</td>
        <td>&nbsp;<input name="textfield9" type="text" id="textfield9" size="50" maxlength="15" onKeyUp="return teclaGRAL(this, event,'number5');" value="<?php echo $cel_cont1; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="46" class="eiquetas">&nbsp;Nº de linea baja</td>
        <td>&nbsp;<input name="number5" type="text" id="number5"  maxlength="15" onKeyUp="return teclaGRAL(this, event,'textfield3');" value="<?php echo $baja_cont1; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="eiquetas">&nbsp;Parentesco</td>
        <td>&nbsp;<input name="textfield3" type="text" id="textfield3" size="50" maxlength="20" onKeyUp="return teclaGRAL(this, event,'textfield82');" value="<?php echo $parentesco_cont1; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr align="center" class="fondo_encabezado2">
        <td height="42" colspan="3" class="fondo_encabezado"><p><strong class="titulo2">En caso de emergencia contactar con</strong>
        <strong class="titulo2">Contacto Nº 2</strong></td>
      </tr>
      <tr>
        <td height="30" class="eiquetas">&nbsp;Nombre y apellido</td>
        <td>&nbsp;<input name="textfield82" type="text" id="textfield82" size="50" maxlength="60" onKeyUp="return teclaGRAL(this, event,'textfield92');" value="<?php echo $nom_cont2; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29" class="eiquetas">&nbsp;Nº de Celular</td>
        <td>&nbsp;<input name="textfield92" type="text" id="textfield92" size="50" maxlength="15" onKeyUp="return teclaGRAL(this, event,'number52');" value="<?php echo $cel_cont2; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="36" class="eiquetas">&nbsp;Nº de linea baja</td>
        <td>&nbsp;<input name="number52" type="text" id="number52"  maxlength="15" onKeyUp="return teclaGRAL(this, event,'textfield32');" value="<?php echo $baja_cont2; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="43" class="eiquetas">&nbsp;Parentesco</td>
        <td>&nbsp;<input name="textfield32" type="text" id="textfield32" size="50" maxlength="20" onKeyUp="return teclaGRAL(this, event,'skills4');" value="<?php echo $parentesco_cont2; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      
      <td height="42" colspan="3" align="center" class="fondo_encabezado" ><p><strong class="titulo2">Datos Administrativos</strong></p></td>
      </tr>
      <tr style="visibility:hidden">
        <td height="27" class="eiquetas">&nbsp;Nombre Supervisor</td>
        <td>&nbsp;<input id="skills3" placeholder="Ingrese Apellido..." size="37" name="skills3" autocomplete="off"  onKeyUp="return teclaGRAL(this, event,'number10');" value="<?php echo $supervisor;?>" >      	</td>
        <td>&nbsp;</td>
      </tr>
     
      
      
      <tr>
        <td height="27" class="eiquetas">&nbsp;Banco</td>
        <td><div class="ui-widget" align="left"><input id="skills4" placeholder="Ingrese Banco..." size="37" name="skills4" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'number10');" value="<?php echo $sueldo_banco;?>" ></div>      	</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="27" class="eiquetas">&nbsp;Aporta Ips</td>
        <td class="eiquetas"><p>
          <label>
            <input name="RG1" type="radio" id="RG1_0" value="2" checked="checked">
            NO</label>
          <br>
          <label>
            <input type="radio" name="RG1" value="1" id="RG1_1">
            SI</label>
         
        </p></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="27" class="eiquetas">&nbsp;Nº Asegurado</td>
        <td>&nbsp;<input type="text" name="number10" id="number10" onKeyUp="return teclaGRAL(this, event,'number11');" value="<?php echo $num_aseg; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      
       <tr>
        <td height="27" class="eiquetas">&nbsp;Jornal Hora*</td>
        <td>&nbsp;<input type="text" name="number11" id="number11" onKeyUp="format(this);return teclaGRAL(this, event,'number12');" value="<?php echo $jornal_hora; ?>" autocomplete="off">
        (Mayor a 0 )</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Jornal Min*.</td>
        <td>&nbsp;<input type="text" name="number12" id="number12" onKeyUp="format(this);return teclaGRAL(this, event,'button5');" value="<?php echo $jornal_min; ?>" autocomplete="off">
        (Mayor a 0)</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Modo Pago</td>
        <td><p class="eiquetas">
          <label>
            <input name="rg2" type="radio" id="RG2_0" value="1" checked>
            BANCO</label>
          <br>
          <label>
            <input type="radio" name="rg2" value="2" id="RG2_1">
            EFECTIVO</label>
          <br>
          <label>
            <input type="radio" name="rg2" value="3" id="RG2_2">
            CHEQUE</label>
          <br>
          <label>
            <input type="radio" name="rg2" value="4" id="RG2_3">
            OTRO</label>
          <br>
        </p></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Sexo</td>
        <td><p class="eiquetas">
          <label>
            <input name="RG3" type="radio" id="RG3_0" value="1" checked>
            MASCULINO</label>
          <br>
          <label>
            <input type="radio" name="RG3" value="2" id="RG3_1">
            FEMENINO</label>
          <br>
        </p></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Estado Civil</td>
        <td class="eiquetas"><p>
          <label>
            <input name="RG4" type="radio" id="RG4_0" value="1" checked>
            SOLTERO/A</label>
          <br>
          <label>
            <input type="radio" name="RG4" value="2" id="RG4_1">
            CASADO/A</label>
          <br>
          <label>
            <input type="radio" name="RG4" value="3" id="RG4_2">
            DIVORCIADO</label>
          <br>
          <label>
            <input type="radio" name="RG4" value="4" id="RG4_3">
            OTRO</label>
          <br>
        </p></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Fecha Nac.*</td>
        <td>&nbsp;<input name="textfield10" type="text" id="textfield10" readonly onChange="document.getElementById('textfield15').focus();" value="<?php echo $fecha_nac; ?>">
         <input type="button" name="button5" id="button5"   style="background-image:url(images/001_44.png); background-repeat:no-repeat; background-position:bottom; background-color:#FDFBFB; width:30px; height:30px; border-color:#FDFBFB; border-bottom-color:#FDFBFB; border-bottom:none; border-right:none" onclick="displayCalendar(document.forms[0].textfield10,'dd-mm-yyyy',this)" onMouseOver="this.style.cursor='pointer'"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Nacionalidad*</td>
        <td>&nbsp;<input name="textfield15" type="text" id="textfield15" maxlength="15" onKeyUp="return teclaGRAL(this, event,'button6');" value="<?php echo $nacionalidad; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Fecha Nac. Hijo Menor</td>
        <td>&nbsp;<input name="textfield16" type="text" id="textfield16" readonly onChange="document.getElementById('number13').focus();" value="<?php echo $fecha_hijo; ?>">
         <input type="button" name="button6" id="button6"   style="background-image:url(images/001_44.png); background-repeat:no-repeat; background-position:bottom; background-color:#FDFBFB; width:30px; height:30px; border-color:#FDFBFB; border-bottom-color:#FDFBFB; border-bottom:none; border-right:none" onclick="displayCalendar(document.forms[0].textfield16,'dd-mm-yyyy',this)" onMouseOver="this.style.cursor='pointer'"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Cantidad de Hijos</td>
        <td>&nbsp;<input name="number13" type="text" id="number13" onKeyUp="format(this);return teclaGRAL(this, event,'textfield17');" maxlength="2" value="<?php echo $cantidad_hijos; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Profesión</td>
        <td>&nbsp;<input name="textfield17" type="text" id="textfield17" maxlength="40" onKeyUp="return teclaGRAL(this, event,'textfield18');" value="<?php echo $profesion; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="27" class="eiquetas">&nbsp;Situaci&oacute;n Hijo Menor</td>
        <td>&nbsp;<input name="textfield18" type="text" id="textfield18" maxlength="40" onKeyUp="return teclaGRAL(this, event,'number7');" value="<?php echo $situacion_hijo; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="27" class="eiquetas">&nbsp;Salario (IPS)<strong>*</strong></td>
        <td>&nbsp;<input type="text" name="number7" id="number7" onKeyUp="format(this);return teclaGRAL(this, event,'sala');" value="<?php echo $salario_ips; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
        <tr>
        <td height="60" class="eiquetas">&nbsp;Salario (REAL)<strong>*</strong></td>
        <td>&nbsp;<input type="text" name="sala" id="sala" onKeyUp="format(this);" value="<?php echo $salarioreal; ?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr class="fondo_encabezado" >
        <td height="60">&nbsp;</td>
        <td align="center">Periodo de Prueba</td>
        <td align="right"><a href="constancia_periodo_prueba_pdf.php?id=<?php echo $id;?>&fecha=<?php echo $fechaemision; ?>&inicio=<?php echo $fechaincio; ?>&fin=<?php echo $fechafin; ?>&docu=<?php echo $num_documento;?>"><img border="0"   src="images/text_plain.ico" width="30" height="30" id="periodo" style="visibility:hidden"></a></td>
        <td>&nbsp;</td>
        
      </tr>
       <tr>
        <td>&nbsp;Fecha inicio</td>
        <td>
         <input name="textfield13" type="text" id="textfield13" readonly value="<?php echo $fechaincio;?>" onChange="calcular60();">
         <input type="button" name="button4" id="button4" value="" style="background-image:url(images/001_44.png); background-repeat:no-repeat; background-position:bottom; background-color:#FDFBFB; width:30px; height:30px; border-color:#FDFBFB; border-bottom-color:#FDFBFB; border-bottom:none; border-right:none"  onclick="displayCalendar(document.forms[0].textfield13,'dd-mm-yyyy',this);" onMouseOver="this.style.cursor='pointer'"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="36">&nbsp;Fecha Fin</td>
        <td>
         <input name="textfield14" type="text" id="textfield14" readonly value="<?php echo $fechafin;?>"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td>&nbsp;Fecha emisi&oacute;n</td>
        <td>
         <input name="textfield19" type="text" id="textfield19" readonly value="<?php echo $fechaemision;?>">
         <input type="button" name="button8" id="button8" value="" style="background-image:url(images/001_44.png); background-repeat:no-repeat; background-position:bottom; background-color:#FDFBFB; width:30px; height:30px; border-color:#FDFBFB; border-bottom-color:#FDFBFB; border-bottom:none; border-right:none"  onclick="displayCalendar(document.forms[0].textfield19,'dd-mm-yyyy',this)" onMouseOver="this.style.cursor='pointer'" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="47">&nbsp;</td>
        <td></td>
 <td align="right"><input type="button" name="button" id="button" value="Guardar" class="boton3" onClick="guardar();"></td>
       
      </tr>
      <tr class="fondo_encabezado">
              <td height="39" >Adjuntos</td>
              <td>&nbsp;</td>
              <td align="right"><a href="#openModal">
<img border="0"   src="images/agregar.ico" width="30" height="30" id="adjuntador" style="visibility:hidden"></a></td>
              <td width="6">&nbsp;</td>
      </tr>
       <tr>
         <td colspan="3" >
           <iframe id="documentos" src="" width="100%" height="300px" style="border:none" ></iframe></td>
              <td>&nbsp;</td>
      </tr>
      <tr>
         <td >&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
      </tr>
      <tr>
         <td >&nbsp;</td>
              <td>&nbsp;<a href="#"></a></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
      </tr>
      <tr>
         <td >&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
        <td style="color:#EB1115"><input type="text" name="textfield7052" id="textfield7052" value="<?php echo date("d-m-Y"); ?>" size="10" readonly><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7052,'dd-mm-yyyy',this)"></td>
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
        <td width="64%" style="color:#EB1115"><input name="textfield7050" value="<?php echo date("d-m-Y"); ?>" type="text" id="textfield7050" size="10" readonly><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield7050,'dd-mm-yyyy',this)">
        
        </td>
       <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="56" class="eiquetas">&nbsp;Vigente Hasta</td>
        <td style="color:#EB1115"><input type="text" name="textfield7051" value="<?php echo date("d-m-Y"); ?>" id="textfield7051" size="10" readonly><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7051,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="40" class="eiquetas">Ref</td>
        <td><input name="textfield" type="text" id="textfield" size="40"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="40" colspan="3">&nbsp;<input name="file" type="file" class="" value="" />          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="3%">&nbsp;</td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Adjuntar" onclick="enviarADJUNTO();"></td>
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
  
  <p>&nbsp;</p>
  <?php 
  
  
  switch ($tipo_documento) {
								 case "C:I.":
										echo "<script type='text/javascript'>document.getElementById('select').options[1].selected=true;</script>";
									 break;
								 case "D.N.I.":
										echo "<script type='text/javascript'>document.getElementById('select').options[2].selected=true;</script>";
									 break;
								 case "PASAPORTE":
									 	echo "<script type='text/javascript'>document.getElementById('select').options[3].selected=true;</script>";
									 break;
								 case "OTRO":
									 echo "<script type='text/javascript'>document.getElementById('select').options[4].selected=true;</script>";
									 break;									 

								 default:

 } 
 
 switch ($aporta_ips) {
								 case "N":
										echo "<script type='text/javascript'>document.getElementById('RG1_0').checked = true;</script>";
									 break;
								 case "S":
										echo "<script type='text/javascript'>document.getElementById('RG1_1').checked = true;</script>";
									 break;
								 default:

 } 
 
			
 switch ($modo_pago) {
								 case "BANCO":
										echo "<script type='text/javascript'>document.getElementById('RG2_0').checked = true;</script>";
									 break;
								 case "EFECTIVO":
										echo "<script type='text/javascript'>document.getElementById('RG2_1').checked = true;</script>";
									 break;
								 case "CHEQUE":
									 	echo "<script type='text/javascript'>document.getElementById('RG2_2').checked = true;</script>";
									 break;
								 case "OTRO":
									 echo "<script type='text/javascript'>document.getElementById('RG2_3').checked = true;</script>";
									 break;									 

								 default:

 }
 
 
 switch ($sexo) {
								 case "M":
										echo "<script type='text/javascript'>document.getElementById('RG3_0').checked = true;</script>";
									 break;
								 case "F":
										echo "<script type='text/javascript'>document.getElementById('RG3_1').checked = true;</script>";
									 break;
								 default:

 }  
 
			
  switch ($estado_civil) {
								 case "S":
										echo "<script type='text/javascript'>document.getElementById('RG4_0').checked = true;</script>";
									 break;
								 case "C":
										echo "<script type='text/javascript'>document.getElementById('RG4_1').checked = true;</script>";
									 break;
 								case "D":
										echo "<script type='text/javascript'>document.getElementById('RG4_2').checked = true;</script>";
									 break;	
								case "O":
										echo "<script type='text/javascript'>document.getElementById('RG4_3').checked = true;</script>";
									 break;										 								 
								 default:

 } 
 switch ($tipotraba) {
								 case "J":
										echo "<script type='text/javascript'>document.getElementById('RG5_0').checked = true;</script>";
									 break;
								 case "M":
										echo "<script type='text/javascript'>document.getElementById('RG5_1').checked = true;</script>";
									 break;
								 default:

 }  
 if($opc=='M')
 {
	 echo "<script type='text/javascript'>document.getElementById('adjuntador').style.visibility= 'visible';</script>";
	 echo "<script type='text/javascript'>document.getElementById('periodo').style.visibility= 'visible';</script>";
 }
  ?>
</form>
</body>
</html>
<?php 
echo "<script type='text/javascript'>document.getElementById('documentos').src='documentos_personal_iframe.php?id='+document.getElementById('textfield12').value;</script>";


?>