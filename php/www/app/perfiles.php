<?php include ("conexion/conectar.php");?>
<?php 
					

$opc = $_GET['opc'];
$id='';
if(isset($_GET['id']))
{
$id = $_GET['id'];
}
$perfil ='';
//-------------- ----------------------------------------------------------------";


				if ($opc=="M")
				{
				
					$buscado= explode('--',$id);
					$query2=mysql_query("select * from perfil where id = '".$buscado[0]."' " );


						while($query4=mysql_fetch_array($query2))
						{
							
							$perfil = $query4['perfil'];						
						}

										
				
				}

 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<script type="text/javascript">
function preparar()
{
	var cadena ='';
	var a = document.getElementsByName("CG1"); 

	var p=0;
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}

	a = document.getElementsByName("CG2"); 

	
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}
	a = document.getElementsByName("CG3"); 


	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}

	a = document.getElementsByName("checkbox4"); 
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}

	a = document.getElementsByName("CG4"); 
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}

	a = document.getElementsByName("CG5"); 
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}
	a = document.getElementsByName("CG6"); 
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}

	
	
	//a = document.getElementsByName("checkbox6"); 
//	for(i=0;i<a.length;i++){
//		if(a[i].checked){
//			cadena = cadena+a[i].value+'--';
//			p+=1;
//		}
//	}
	a = document.getElementsByName("checkbox7"); 
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			cadena = cadena+a[i].value+'--';
			p+=1;
		}
	}

	if(p==0||document.getElementById("textfield").value=='')
	{
		alert('Debe SELECCIONAR al menos UNA OPCION y UN NOMBRE de PERFIL para poder guardar el registro')	
	}
	else
	{
		document.getElementById("textfield4").value=cadena;	
		document.getElementById("form1").submit();
	}


}
	function verificar(id)
	
	{
		switch (id) {
			case 'checkbox' :
						if(document.form1.checkbox.checked)
								{
									
									document.getElementById('CG1_0').checked=true;	
									document.getElementById('CG1_1').checked=true;	
									document.getElementById('CG1_2').checked=true;	
									document.getElementById('CG1_3').checked=true;	
									document.getElementById('CG1_4').checked=true;	
									document.getElementById('CG1_5').checked=true;	
									document.getElementById('CG1_6').checked=true;	
									document.getElementById('CG1_7').checked=true;	
									document.getElementById('CG1_8').checked=true;	
									document.getElementById('CG1_9').checked=true;				
									
								}
								else
								{
									document.getElementById('CG1_0').checked=false;	
									document.getElementById('CG1_1').checked=false;	
									document.getElementById('CG1_2').checked=false;	
									document.getElementById('CG1_3').checked=false;	
									document.getElementById('CG1_4').checked=false;	
									document.getElementById('CG1_5').checked=false;	
									document.getElementById('CG1_6').checked=false;	
									document.getElementById('CG1_7').checked=false;	
									document.getElementById('CG1_8').checked=false;	
									document.getElementById('CG1_9').checked=false;			
								}
						break;	
					case 'checkbox2' :
					
					if(document.form1.checkbox2.checked)
					{
						
						document.getElementById('CG2_0').checked=true;	
						document.getElementById('CG2_1').checked=true;	
						document.getElementById('CG2_2').checked=true;	
						document.getElementById('CG2_3').checked=true;	
						document.getElementById('CG2_4').checked=true;	
						document.getElementById('CG2_5').checked=true;	
						document.getElementById('CG2_6').checked=true;
						document.getElementById('CG2_7').checked=true;	
						document.getElementById('CG2_8').checked=true;	
						document.getElementById('CG2_9').checked=true;	
						document.getElementById('CG2_10').checked=true;	
						document.getElementById('CG2_11').checked=true;	
						document.getElementById('CG2_12').checked=true;	
						document.getElementById('CG2_13').checked=true;
						document.getElementById('CG2_14').checked=true;	
						document.getElementById('CG2_15').checked=true;	
						document.getElementById('CG2_16').checked=true;	
						document.getElementById('CG2_17').checked=true;	
						document.getElementById('CG2_18').checked=true;	
						document.getElementById('CG2_19').checked=true;	
						document.getElementById('CG2_20').checked=true;
						document.getElementById('CG2_21').checked=true;	
						document.getElementById('CG2_22').checked=true;	
						document.getElementById('CG2_23').checked=true;	
						document.getElementById('CG2_24').checked=true;
						document.getElementById('CG2_25').checked=true;	
						document.getElementById('CG2_26').checked=true;							
					}
					else
					{
						document.getElementById('CG2_0').checked=false;	
						document.getElementById('CG2_1').checked=false;	
						document.getElementById('CG2_2').checked=false;	
						document.getElementById('CG2_3').checked=false;	
						document.getElementById('CG2_4').checked=false;	
						document.getElementById('CG2_5').checked=false;	
						document.getElementById('CG2_6').checked=false;	
						document.getElementById('CG2_7').checked=false;	
						document.getElementById('CG2_8').checked=false;	
						document.getElementById('CG2_9').checked=false;	
						document.getElementById('CG2_10').checked=false;	
						document.getElementById('CG2_11').checked=false;	
						document.getElementById('CG2_12').checked=false;	
						document.getElementById('CG2_13').checked=false;	
						document.getElementById('CG2_14').checked=false;	
						document.getElementById('CG2_15').checked=false;	
						document.getElementById('CG2_16').checked=false;	
						document.getElementById('CG2_17').checked=false;	
						document.getElementById('CG2_18').checked=false;	
						document.getElementById('CG2_19').checked=false;	
						document.getElementById('CG2_20').checked=false;	
						document.getElementById('CG2_21').checked=false;	
						document.getElementById('CG2_22').checked=false;	
						document.getElementById('CG2_23').checked=false;	
						document.getElementById('CG2_24').checked=false;
						document.getElementById('CG2_25').checked=false;
						document.getElementById('CG2_26').checked=false;													
					}
					break;
				case 'checkbox3' :
					if(document.form1.checkbox3.checked)
					{
						
						document.getElementById('CG3_0').checked=true;	
						document.getElementById('CG3_1').checked=true;	
						document.getElementById('CG3_2').checked=true;	
						document.getElementById('CG3_3').checked=true;	
						document.getElementById('CG3_4').checked=true;	
						document.getElementById('CG3_5').checked=true;	
						document.getElementById('CG3_6').checked=true;	
						document.getElementById('CG3_7').checked=true;	
						document.getElementById('CG3_8').checked=true;	
						document.getElementById('CG3_9').checked=true;	
						document.getElementById('CG3_10').checked=true;	
						document.getElementById('CG3_11').checked=true;										
						document.getElementById('CG3_12').checked=true;																
						
					}
					else
					{
						document.getElementById('CG3_0').checked=false;	
						document.getElementById('CG3_1').checked=false;	
						document.getElementById('CG3_2').checked=false;	
						document.getElementById('CG3_3').checked=false;	
						document.getElementById('CG3_4').checked=false;	
						document.getElementById('CG3_5').checked=false;	
						document.getElementById('CG3_6').checked=false;	
						document.getElementById('CG3_7').checked=false;	
						document.getElementById('CG3_8').checked=false;	
						document.getElementById('CG3_9').checked=false;	
						document.getElementById('CG3_10').checked=false;	
						document.getElementById('CG3_11').checked=false;
						document.getElementById('CG3_12').checked=false;															
					}
				
				break;	
				
					case 'checkbox5' :
					if(document.form1.checkbox5.checked)
					{
						
						document.getElementById('CG4_0').checked=true;	
						document.getElementById('CG4_1').checked=true;	
						document.getElementById('CG4_2').checked=true;	
						document.getElementById('CG4_3').checked=true;	
						document.getElementById('CG4_4').checked=true;	
						document.getElementById('CG4_5').checked=true;	
	
					}
					else
					{
						document.getElementById('CG4_0').checked=false;	
						document.getElementById('CG4_1').checked=false;	
						document.getElementById('CG4_2').checked=false;	
						document.getElementById('CG4_3').checked=false;	
						document.getElementById('CG4_4').checked=false;	
						document.getElementById('CG4_5').checked=false;	

					}
					break;	
				case 'checkbox6' :	
					if(document.form1.checkbox6.checked)
					{
						
						document.getElementById('CG5_0').checked=true;	
						document.getElementById('CG5_1').checked=true;	
						document.getElementById('CG5_2').checked=true;	
						
					}
					else
					{
						document.getElementById('CG5_0').checked=false;	
						document.getElementById('CG5_1').checked=false;
						document.getElementById('CG5_2').checked=false;							
						
					}
				break;		
				
				case 'checkbox8' :	
					if(document.form1.checkbox8.checked)
					{
						
						document.getElementById('CG6_0').checked=true;	
						document.getElementById('CG6_1').checked=true;	

						
					}
					else
					{
						document.getElementById('CG6_0').checked=false;	
						document.getElementById('CG6_1').checked=false;
						
						
					}
				break;			
						
			}
			
		
		
		
		
		
		
	}
	
	
	
	
	
	
	function verificar2(id)
	{
		var x = id;
		var s = document.getElementById(x).checked.toString();
		var padre = x.substring(0,3);
		
		if(s='true')
		{
			if(padre=='CG1')
			{
				document.form1.checkbox.checked=false;
				return;
			}
			if(padre=='CG2')
			{
				document.form1.checkbox2.checked=false;
				return;
			}
			if(padre=='CG3')
			{
				document.form1.checkbox3.checked=false;
				return;
			}
			if(padre=='CG4')
			{
				document.form1.checkbox5.checked=false;
				return;
			}
			if(padre=='CG5')
			{
				document.form1.checkbox6.checked=false;
				return
			}
			if(padre=='CG6')
			{
				document.form1.checkbox8.checked=false;
				return
			}
		}
		
	}
</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_elimina_perfiles.php">
<br>
<div class="polaroid_mjt_100">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr class="fondo_encabezado" >
      <td height="65" colspan="3"><span class="titulo2">&nbsp;Nombre del Perfil</span>        <input name="textfield" type="text" autofocus id="textfield" size="40" value="<?php echo $perfil; ?>" autocomplete="off">
        <input name="textfield2" type="text" id="textfield2" size="10" readonly value="<?php echo $_GET['opc'] ?>" style="visibility:hidden" >
        <input name="textfield3" type="text" id="textfield3" size="10" readonly value="<?php echo $_GET['id'] ?>" style="visibility:hidden">
        <input name="textfield4" type="text" id="textfield4" size="50" style="visibility:hidden" ></td>
      </tr>
    <tr  class="fondo_encabezado" >
      <td width="40%" height="19">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      
    </tr>
    <tr>
      <td><p>&nbsp;</p></td>
      <td colspan="2">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      </tr>
    <tr>
      <td class="eiquetas"><input type="checkbox" name="checkbox" id="checkbox" onChange="verificar(this.id)">
        Administración</td>
      <td colspan="2"><span class="eiquetas">
        <input type="checkbox" name="checkbox2" id="checkbox2" onChange="verificar(this.id)">
Informes y Listados</span></td>
     
    </tr>
    <tr>
      <td height="294" valign="top" class="eiquetas">
        <label>
          &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="conceptos" id="CG1_0" onChange="verificar2(this.id)">
          Conceptos</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="asignacion" id="CG1_1" onChange="verificar2(this.id)">
          Asignacion de Personal</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="adjuntos" id="CG1_2" onChange="verificar2(this.id)">
          Documentos Adjuntos Solucion</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="planilla_banco" id="CG1_3" onChange="verificar2(this.id)">
          Planilla Banco</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="empleados_mjt" id="CG1_4" onChange="verificar2(this.id)">
          Planilla MJT (Empleados y Obreros)</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="sueldos_mjt" id="CG1_5" onChange="verificar2(this.id)">
          Planilla MJT (Sueldos y Jornales)</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="resumen_mjt" id="CG1_6" onChange="verificar2(this.id)">
          Planilla MJT (Resumen)</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="planilla_ips " id="CG1_7" onChange="verificar2(this.id)">
          Planilla IPS</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="bancos" id="CG1_8" onChange="verificar2(this.id)">
          Bancos</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG1" value="parametros" id="CG1_9" onChange="verificar2(this.id)">
          Parámetros</label>
        <br>
      </p></td>
      <td width="31%" valign="top"><label>&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="CG2" value="Listado_de_proveedores" id="CG2_0" onChange="verificar2(this.id)">
        Listado de proveedores</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Listado_de_depositos" id="CG2_1" onChange="verificar2(this.id)">
          Listado de depositos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Clientes_y_sucursales" id="CG2_2" onChange="verificar2(this.id)">
          Clientes y sucursales</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="listado_de_Equipos" id="CG2_3" onChange="verificar2(this.id)">
          Listado de Equipos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Personales_activos" id="CG2_4" onChange="verificar2(this.id)">
          Personales activos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="CG2" value="Personales_inactivos" id="CG2_5" onChange="verificar2(this.id)">
          Personales inactivos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Adelantos_por_personal" id="CG2_6" onChange="verificar2(this.id)">
          Adelantos por personal</label>
		<br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Listado_de_cargos" id="CG2_7" onChange="verificar2(this.id)">
          Listado de cargos</label>
<br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Inventario_de_prestamos_activos" id="CG2_8" onChange="verificar2(this.id)">
          Inventario de prestamos activos</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Inventario_de_prestamos_cancelados" id="CG2_9" onChange="verificar2(this.id)">
         Inventario de prestamos cancelados</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Ausencias_por_personal" id="CG2_10" onChange="verificar2(this.id)">
          Ausencias por personal</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Asistencias_por_personal" id="CG2_11" onChange="verificar2(this.id)">
         Asistencias por personal</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Personal_por_sucursal" id="CG2_12" onChange="verificar2(this.id)">
          Personal por sucursal</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Sucursal_por_personal" id="CG2_13" onChange="verificar2(this.id)">
          Sucursal por personal</label>
         </td>
      <td width="28%" valign="top">&nbsp;<label>&nbsp;&nbsp;
        <input type="checkbox" name="CG2" value="Listado_vacaciones" id="CG2_14" onChange="verificar2(this.id)">
        Vacaciones</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG2" value="Descuentos_por_personal" id="CG2_15" onChange="verificar2(this.id)">
          Descuentos por personal</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Bonificacion_por_personal" id="CG2_16" onChange="verificar2(this.id)">
          Bonificacion por personal</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Usuarios_con_perfiles" id="CG2_17" onChange="verificar2(this.id)">
          Usuarios con perfiles</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Listado_de_conceptos" id="CG2_18" onChange="verificar2(this.id)">
          Conceptos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="CG2" value="Traslados_por_personal" id="CG2_19" onChange="verificar2(this.id)">
          Traslados por personal</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Traslados_todos_por_rango_de_fecha" id="CG2_20" onChange="verificar2(this.id)">
         Traslados todos por rango de fecha</label>
		<br>
        <label> &nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="CG2" value="Doc.requeridos" id="CG2_21" onChange="verificar2(this.id)">
          Doc.requeridos</label>
<br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Compras_por_proveedor" id="CG2_22" onChange="verificar2(this.id)">
         Compras por proveedor</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Compras_en_un_rango_de_fecha_todos" id="CG2_23" onChange="verificar2(this.id)">
          Compras en un rango de fecha-todos</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Responsable_de_equipos_por_personal" id="CG2_24" onChange="verificar2(this.id)">
          Responsable de equipos por personal</label>
          <br>
        <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Responsable_de_equipos_por_equipo" id="CG2_25" onChange="verificar2(this.id)">
          Stock por deposito</label>
          <br>
       <label> &nbsp;&nbsp;&nbsp;
         <input type="checkbox" name="CG2" value="Adelantos_solicitados" id="CG2_26" onChange="verificar2(this.id)">
          Adelantos solicitados</label>
          <br>
      
    </tr>
    <tr>
      <td class="eiquetas">&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
    
    </tr>
    <tr>
      <td class="eiquetas"><p><br>
      </p></td>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td class="eiquetas"><input type="checkbox" name="checkbox3" id="checkbox3" onChange="verificar(this.id)">
        Personal</td>
      <td colspan="2" align="left"><span class="eiquetas">
        <input type="checkbox" name="checkbox5" id="checkbox5" onChange="verificar(this.id)">
Equipos y Herramientas</span></td>
    </tr>
    <tr>
      <td valign="top" class="eiquetas">
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_cargo" id="CG3_0" onChange="verificar2(this.id)">
          Cargo</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_ficha" id="CG3_1" onChange="verificar2(this.id)">
          Ficha</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_asistencias" id="CG3_2" onChange="verificar2(this.id)">
          Asistencias</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_ausencias" id="CG3_3" onChange="verificar2(this.id)">
          Ausencias</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_adelantos" id="CG3_4" onChange="verificar2(this.id)">
          Adelantos</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_bonif" id="CG3_5" onChange="verificar2(this.id)">
          Bonificaciones</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_prestamos" id="CG3_6" onChange="verificar2(this.id)">
          Préstamos</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_translados" id="CG3_7" onChange="verificar2(this.id)">
          Translados</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_vacaciones" id="CG3_8" onChange="verificar2(this.id)">
          Vacaciones</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_descuentos" id="CG3_9" onChange="verificar2(this.id)">
          Descuentos</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_regular" id="CG3_10" onChange="verificar2(this.id)">
          Liquidación Regular</label>
        <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="personal_salida" id="CG3_11" onChange="verificar2(this.id)">
          Liquidación Retiro</label>
         <br>
        <label>
           &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG3" value="Documentos_requeridos" id="CG3_12" onChange="verificar2(this.id)">
          Documentos requeridos</label> 
        <br>
      </p></td>
      <td colspan="2" align="left" valign="top"><label>&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="CG4" value="equipos" id="CG4_0" onChange="verificar2(this.id)">
        Equipos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG4" value="proveedor" id="CG4_1" onChange="verificar2(this.id)">
          Proveedor</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG4" value="compra" id="CG4_2" onChange="verificar2(this.id)">
          Compra de Equipos</label>
        <br>
       
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG4" value="asignacion_equipos" id="CG4_3" onChange="verificar2(this.id)">
          Asignación de Equipos</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG4" value="depositos" id="CG4_4" onChange="verificar2(this.id)">
          Despositos -Ubicaciones</label>
        <br>
        <label> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="CG4" value="movimientos" id="CG4_5" onChange="verificar2(this.id)">
          Mov. de Equipos</label></td>
    </tr>
    <tr>
      <td class="eiquetas"><input type="checkbox" name="checkbox4" id="checkbox4" value="clientes">
        <label for="checkbox4">Clientes y Sucursales</label></td>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    
    <tr>
      <td class="eiquetas"><input type="checkbox" name="checkbox6" id="checkbox6" onChange="verificar(this.id)">
        <label for="checkbox6">Seguridad </label></td>
      <td colspan="2" align="left"><input type="checkbox" name="checkbox8" id="checkbox8" onChange="verificar(this.id)">
        <label for="checkbox8">Varios </label></td>
    </tr>
    <tr>
      <td valign="top" class="eiquetas">
        <label>
          &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG5" value="usuarios" id="CG5_0" onChange="verificar2(this.id)">
          Usuarios del Sistema</label>
        <br>
        <label>
          &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG5" value="perfiles" id="CG5_1" onChange="verificar2(this.id)">
          Perfiles de Usuarios</label>
<br>
        <label>
          &nbsp;&nbsp;&nbsp;<input type="checkbox" name="CG5" value="ajustes" id="CG5_2" onChange="verificar2(this.id)">
          Ajustes</label>          
        <br>
      </p></td>
      <td colspan="2" align="left" valign="top">&nbsp;
        <label>
          <input type="checkbox" name="CG6" value="Pedidos" id="CG6_0" onChange="verificar2(this.id)">
          Pedidos</label>
  <br>
  <label>&nbsp;
    <input type="checkbox" name="CG6" value="Remisiones" id="CG6_1" onChange="verificar2(this.id)">
    Pedido, plantillas y remisiones</label>  <br>
</td>
    </tr>
    <tr>
      <td class="eiquetas"><input type="checkbox" name="checkbox7" id="checkbox7" value="otros">
        <label for="checkbox7">Otros reportes</label></td>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right"><input type="button" name="button" id="button" value="Guardar" class="boton3" onClick="preparar()"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
  </tbody>
</table>

</div>
<br>
<br>
<br>
  
</form>
</body>
</html>
<?php 
				if ($opc=="M")
				{
					$fila=0;
						$query2=mysql_query("select * from opciones where perfil_id = '".$buscado[0]."' " );

						while($query4=mysql_fetch_array($query2))
						{
							$arreglo[$fila][0]=$query4['acceso'];
							$arreglo[$fila][1]=$query4['nombremenu'];
							
							$fila=$fila+1;
						}
//*******************************************************************************						
						for($i=0;$i<$fila;$i++)
						{
							//echo $arreglo[$i][0]."  ".$arreglo[$i][1]."<br>";
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="conceptos" ) 
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_0').checked=true;</script>";
							 	
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="asignacion" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_1').checked=true;</script>";
														
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="adjuntos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_2').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="planilla_banco" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_3').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="empleados_mjt" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_4').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="sueldos_mjt" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_5').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="resumen_mjt" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_6').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="planilla_ips" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_7').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="bancos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_8').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="parametros" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG1_9').checked=true;</script>";
							
							}
							
							
							
			
							
							
							
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Listado_de_proveedores" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_0').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Listado_de_depositos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_1').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Clientes_y_sucursales" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_2').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="listado_de_Equipos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_3').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Personales_activos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_4').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Personales_inactivos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_5').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Adelantos_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_6').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Listado_de_cargos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_7').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Inventario_de_prestamos_activos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_8').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Inventario_de_prestamos_cancelados" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_9').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Ausencias_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_10').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Asistencias_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_11').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Personal_por_sucursal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_12').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Sucursal_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_13').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Listado_vacaciones" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_14').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Descuentos_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_15').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Bonificacion_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_16').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Usuarios_con_perfiles" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_17').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Listado_de_conceptos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_18').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Traslados_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_19').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Traslados_todos_por_rango_de_fecha" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_20').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Doc.requeridos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_21').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Compras_por_proveedor" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_22').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Compras_en_un_rango_de_fecha_todos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_23').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Responsable_de_equipos_por_personal" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_24').checked=true;</script>";
								
							}
if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Responsable_de_equipos_por_equipo" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_25').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Adelantos_solicitados" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG2_26').checked=true;</script>";
								
							}
																																																																																																									
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_cargo" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_0').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_ficha" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_1').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_asistencias" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_2').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_ausencias" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_3').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_adelantos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_4').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_bonif" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_5').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_prestamos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_6').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_translados" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_7').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_vacaciones" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_8').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_descuentos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_9').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_regular" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_10').checked=true;</script>";
							
							}
							
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="personal_salida" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_11').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Documentos_requeridos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG3_12').checked=true;</script>";
								
							}
							
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="equipos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG4_0').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="proveedor" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG4_1').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="compra" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG4_2').checked=true;</script>";
								
							}
							
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="asignacion_equipos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG4_3').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="depositos" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG4_4').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="movimientos" )
							{
							echo "<script type='text/javascript'>document.getElementById('CG4_5').checked=true;</script>";	
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="usuarios" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG5_0').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="perfiles" )
							{
								echo "<script type='text/javascript'>document.getElementById('CG5_1').checked=true;</script>";
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="otros" )
							{
								 echo "<script type='text/javascript'>document.getElementById('checkbox7').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="clientes" )
							 echo "<script type='text/javascript'>document.getElementById('checkbox4').checked=true;</script>";
							{
								
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="ajustes" )
							{
								echo  "<script type='text/javascript'>document.getElementById('CG5_2').checked=true;</script>";
							
							}
							
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Pedidos" )
							{
								echo  "<script type='text/javascript'>document.getElementById('CG6_0').checked=true;</script>";
							
							}
							if($arreglo[$i][0]=="SI" and $arreglo[$i][1]=="Remisiones" )
							{
								echo  "<script type='text/javascript'>document.getElementById('CG6_1').checked=true;</script>";
							
							}
							
						}
				}
?>