﻿<?php session_start();
include ("conexion/conectar.php");?>
<?php
$perfil='';
		$query2=mysql_query("SELECT perfil_id FROM usuarios WHERE username = '".$_SESSION['user']."' " );
		while($query4=mysql_fetch_array($query2))
		{
			$perfil = $query4['perfil_id'];
		}

		$query3=mysql_query("SELECT * FROM opciones WHERE perfil_id = '".$perfil."' " );

		$fila=0;
		while($query4=mysql_fetch_array($query3))
		{
			$opcion[$fila][0] = $query4['nombremenu'];
			$opcion[$fila][1] = $query4['acceso'];
			//echo $opcion[$fila][0]."  ".$opcion[$fila][1]."<br>";
			$fila=$fila+1;
		}

			//echo $opcion[$i][0]."  ".$opcion[$i][1]."<br>";

?>
<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
  <meta name="author" content="Jake Rocheleau">

  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Merienda:400,700">
  <style type="text/css">
  a:link {
	color: #E40A0D;
}
  </style>

  </style>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" charset="utf-8" src="nav.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
  <div id="w" align="left">


    <nav align="left">
      <ul id="nav">

        <li><a href="#">Administración</a>
          <ul>
          <?php
		  $ruta='http://tomcat:8080';
//$ruta='http://localhost';
		  if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' ){
		  	for($i=0;$i<$fila;$i++)
			{
		  		if($opcion[$i][0] == "conceptos" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_conceptos.php" target="marcoprincipal">Conceptos</a></li>';
				}
				if($opcion[$i][0] == "asignacion" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="sucursales_personal.php" target="marcoprincipal">Asignaci&oacute;n de Personal a Clientes</a></li>';
					echo '<li><a href="sucursales_personal_edicion.php" target="marcoprincipal">Editar Asignaci&oacute;n de Personal</a></li>';
				}
				if($opcion[$i][0] == "adjuntos" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_adjuntos_solucion.php" target="marcoprincipal">Documentos  Soluci&oacute;n</a></li>';
				}
				if($opcion[$i][0] == "planilla_banco" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="generador_planilla_banco.php" target="marcoprincipal">Planilla banco</a></li>';
				}
				if($opcion[$i][0] == "empleados_mjt" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="generador_planilla_general_mjt.php" target="marcoprincipal">MJT-emp. y obreros</a></li>';
				}
				if($opcion[$i][0] == "sueldos_mjt" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="generador_planilla_suledos_mjt.php" target="marcoprincipal">MJT-sueldos y jornales</a></li>';
				}
				if($opcion[$i][0] == "resumen_mjt" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="generador_planilla_resumen_mjt.php" target="marcoprincipal">MJT-resumen</a></li>';
				}
				if($opcion[$i][0] == "planilla_ips" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_planilla_ips.php" target="marcoprincipal">Planilla IPS</a></li>';
				}
				if($opcion[$i][0] == "bancos" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_bancos.php" target="marcoprincipal">Banco para sueldos</a></li>';
				}
				if($opcion[$i][0] == "parametros" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="parametros.php" target="marcoprincipal">Parámetros del Sistema</a></li>';
				}
			}
		  }
		  else
		  {
//********    USUARIO MASTER
			echo '<li><a href="busca_conceptos.php" target="marcoprincipal">Conceptos</a></li>';
			echo '<li><a href="sucursales_personal.php" target="marcoprincipal">Asignaci&oacute;n de Personal a Clientes</a></li>';
			echo '<li><a href="sucursales_personal_edicion.php" target="marcoprincipal">Editar Asignaci&oacute;n de Personal</a></li>';
			echo '<li><a href="busca_adjuntos_solucion.php" target="marcoprincipal">Documentos Soluci&oacute;n</a></li>';
			echo '<li><a href="generador_planilla_banco.php" target="marcoprincipal">Planilla banco</a></li>';
			echo '<li><a href="generador_planilla_general_mjt.php" target="marcoprincipal">MJT-emp. y obreros</a></li>';
			echo '<li><a href="generador_planilla_suledos_mjt.php" target="marcoprincipal">MJT-sueldos y jornales</a></li>';
			echo '<li><a href="generador_planilla_resumen_mjt.php" target="marcoprincipal">MJT-resumen</a></li>';
			echo '<li><a href="busca_planilla_ips.php" target="marcoprincipal">Planilla IPS</a></li>';
			echo '<li><a href="busca_bancos.php" target="marcoprincipal">Banco para sueldos</a></li>';
			echo '<li><a href="parametros.php" target="marcoprincipal">Parámetros del Sistema</a></li>';

		  }
		  ?>
          </ul>
        </li>
         <li><a href="#">Informes y Listados</a>
          <ul>
          	 <?php
if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' ){
		  	for($i=0;$i<$fila;$i++)
			{
		  		if($opcion[$i][0] == "Listado_de_proveedores" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/preview?__report=proveedores.rptdesign" target="marcoprincipal">Listado de proveedor</a></li>';
				}
				if($opcion[$i][0] == "Listado_de_depositos" and $opcion[$i][1]=="SI")
				{
				// echo '<li><a href="http://192.168.0.17:8080/birt2/frameset?__report=depositos.rptdesign" target="marcoprincipal">Listado de depositos</a></li>';

				 echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=depositos.rptdesign" target="marcoprincipal">Listado de depositos</a></li>';
				}
				if($opcion[$i][0] == "Clientes_y_sucursales" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=clientes.rptdesign" target="marcoprincipal">Clientes y sucursales</a></li>';
				}
				if($opcion[$i][0] == "listado_de_Equipos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=equipos.rptdesign" target="marcoprincipal">Equipos</a></li>';
				}
				if($opcion[$i][0] == "Personales_activos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a  href="'.$ruta.'/birt2/frameset?__report=per_activo.rptdesign" target="marcoprincipal">Personales activos</a></li>';
				}
				if($opcion[$i][0] == "Personales_inactivos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=per_inactivo.rptdesign" target="marcoprincipal">Personales inactivos</a></li>';
				}
				if($opcion[$i][0] == "Adelantos_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=adelantos.rptdesign" target="marcoprincipal">Adelantos por personal</a></li>';
				}
				if($opcion[$i][0] == "Listado_de_cargos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=cargos.rptdesign" target="marcoprincipal">Listado de cargos</a></li>';
				}
				if($opcion[$i][0] == "Inventario_de_prestamos_activos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=ppactivos.rptdesign"  target="marcoprincipal">Inventario de prestamos activos</a></li>';
				}
				if($opcion[$i][0] == "Inventario_de_prestamos_cancelados" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=ppinactivos.rptdesign" target="marcoprincipal">Inventario de prestamos cancelados</a></li>';
				}
				if($opcion[$i][0] == "Ausencias_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=ausencias.rptdesign" target="marcoprincipal">Ausencias por personal</a></li>';
				}
				if($opcion[$i][0] == "Asistencias_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=asistencias.rptdesign"  target="marcoprincipal">Asistencias por personal</a></li>';
				}
				if($opcion[$i][0] == "Personal_por_sucursal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=personalxsucur.rptdesign" target="marcoprincipal">Personal por sucursal</a></li>';
				}
				if($opcion[$i][0] == "Sucursal_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=sucurxpersonal.rptdesign"  target="marcoprincipal">Sucursal por personal</a></li>';
				}
				if($opcion[$i][0] == "Listado_vacaciones" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=vacaciones.rptdesign" target="marcoprincipal">Vacaciones</a></li>';
				}
				if($opcion[$i][0] == "Descuentos_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=des_personal.rptdesign" target="marcoprincipal">Descuentos por personal</a></li>';
				}
				if($opcion[$i][0] == "Bonificacion_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=bonixpersonal.rptdesign" target="marcoprincipal">Bonificacion por personal</a></li>';
				}
				if($opcion[$i][0] == "Usuarios_con_perfiles" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=usuario.rptdesign" target="marcoprincipal">Usuarios con perfiles</a></li>';
				}
				if($opcion[$i][0] == "Listado_de_conceptos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=conceptos.rptdesign" target="marcoprincipal">Conceptos</a></li>';
				}
				if($opcion[$i][0] == "Traslados_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=traslados.rptdesign" target="marcoprincipal">Traslados por personal</a></li>';
				}
				if($opcion[$i][0] == "Traslados_todos_por_rango_de_fecha" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=xfechatraslados.rptdesign" target="marcoprincipal">Traslados todos por rango de fecha</a></li>';
				}
				if($opcion[$i][0] == "Doc.requeridos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a  href="	'.$ruta.'/birt2/frameset?__report=docrequeridos.rptdesign" target="marcoprincipal">Doc.requeridos</a></li>';
				}
				if($opcion[$i][0] == "Compras_por_proveedor" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=comprasxprovee.rptdesign" target="marcoprincipal">Compras por proveedor</a></li>';
				}
				if($opcion[$i][0] == "Compras_en_un_rango_de_fecha_todos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=comprasxfecha.rptdesign" target="marcoprincipal">Compras en un rango de fecha-todos</a></li>';
				}
				if($opcion[$i][0] == "Responsable_de_equipos_por_personal" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=equipoxrespons.rptdesign" target="marcoprincipal">Responsable de equipos por personal</a></li>';
				}
				if($opcion[$i][0] == "Responsable_de_equipos_por_equipo" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=stock.rptdesign" target="marcoprincipal">Stock por deposito</a></li>';
				}
				if($opcion[$i][0] == "Adelantos_solicitados" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=adelantosfecha.rptdesign" target="marcoprincipal">Adelantos solicitados</a></li>';
				}


			}
}
else
{
//******  USUARIO MASTER
				echo '<li><a href="'.$ruta.'/birt2/preview?__report=proveedores.rptdesign" target="marcoprincipal">Listado de proveedor</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=depositos.rptdesign" target="marcoprincipal">Listado de depositos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=clientes.rptdesign" target="marcoprincipal">Clientes y sucursales</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=equipos.rptdesign" target="marcoprincipal">Equipos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=per_activo.rptdesign" target="marcoprincipal">Personales activos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=per_inactivo.rptdesign" target="marcoprincipal">Personales inactivos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=adelantos.rptdesign" target="marcoprincipal">Adelantos por personal</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=cargos.rptdesign" target="marcoprincipal">Listado de cargos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=ppactivos.rptdesign" target="marcoprincipal">Inventario de prestamos activos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=ppinactivos.rptdesign" target="marcoprincipal">Inventario de prestamos cancelados</a></li>';

				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=ausencias.rptdesign" target="marcoprincipal">Ausencias por personal</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=asistencias.rptdesign" target="marcoprincipal">Asistencias por personal</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=personalxsucur.rptdesign" target="marcoprincipal">Personal por sucursal</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=sucurxpersonal.rptdesign" target="marcoprincipal">Sucursal por personal</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=vacaciones.rptdesign" target="marcoprincipal">Vacaciones</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=des_personal.rptdesign" target="marcoprincipal">Descuentos por personal</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=bonixpersonal.rptdesign" target="marcoprincipal">Bonificacion por personal</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=usuario.rptdesign" target="marcoprincipal">Usuarios con perfiles</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=conceptos.rptdesign" target="marcoprincipal">Conceptos</a></li>';
				echo '<li><a href="'.$ruta.'/birt2/frameset?__report=traslados.rptdesign" target="marcoprincipal">Traslados por personal</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=xfechatraslados.rptdesign" target="marcoprincipal">Traslados todos por rango de fecha</a></li>';
			echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=docrequeridos.rptdesign" target="marcoprincipal">Doc.requeridos</a></li>';
			echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=comprasxprovee.rptdesign" target="marcoprincipal">Compras por proveedor</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=comprasxfecha.rptdesign" target="marcoprincipal">Compras en un rango de fecha-todos</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=equipoxrespons.rptdesign" target="marcoprincipal">Responsable de equipos por personal</a></li>';


				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=stock.rptdesign" target="marcoprincipal">Stock por deposito</a></li>';
				echo '<li><a href="	'.$ruta.'/birt2/frameset?__report=adelantosfecha.rptdesign" target="marcoprincipal">Adelantos solicitados</a></li>';

}
			?>

           </ul>
         </li>

        <li><a href="#">Personal</a>
          <ul>
           <?php
if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' ){
		  	for($i=0;$i<$fila;$i++)
			{
		  		if($opcion[$i][0] == "personal_cargo" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_cargos.php" target="marcoprincipal">Cargo</a></li>';
				}
				if($opcion[$i][0] == "personal_ficha" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_personal.php" target="marcoprincipal">Ficha</a></li>';
				}
				if($opcion[$i][0] == "personal_asistencias" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="asistencia.php" target="marcoprincipal">Asistencias</a></li>';
					echo '<li><a href="asistencia_masiva.php" target="marcoprincipal">Asistencias (masiva)</a></li>';
					echo '<li><a href="asistencia_comodines.php" target="marcoprincipal">Asistencias (comodines)</a></li>';
					echo '<li><a href="asistencia_diaria.php" target="marcoprincipal">Asistencias (planilla)</a></li>';
					echo '<li><a href="asistencias_edicion.php" target="marcoprincipal">Edicion Asistencias</a></li>';
				}
				if($opcion[$i][0] == "personal_ausencias" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="ausencias.php" target="marcoprincipal">Ausencias</a></li>';
				}
				if($opcion[$i][0] == "personal_adelantos" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="adelantos.php" target="marcoprincipal">Adelantos</a></li>';
				}
				if($opcion[$i][0] == "personal_bonif" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="bonificaciones.php" target="marcoprincipal">Bonificaciones</a></li>';
				}
				if($opcion[$i][0] == "personal_prestamos" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_prestamos.php" target="marcoprincipal">Prestamos</a></li>';
				}
				if($opcion[$i][0] == "personal_translados" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="traslados.php" target="marcoprincipal">Translados</a></li>';
				}
				if($opcion[$i][0] == "personal_vacaciones" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="vacaciones.php" target="marcoprincipal">Vacaciones</a></li>';
				}
				if($opcion[$i][0] == "personal_descuentos" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="descuentos.php" target="marcoprincipal">Descuentos</a></li>';
				}
				if($opcion[$i][0] == "personal_regular" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_liquidaciones_regulares.php" target="marcoprincipal">Liquidación Regular</a></li>';
					echo '<li><a href="busca_liquidaciones_aguinaldo.php" target="marcoprincipal">Liquidaci&oacute;n aguinaldo</a></li>';
				}
				if($opcion[$i][0] == "personal_salida" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_liquidaciones_salida.php" target="marcoprincipal">Liquidación por retiro</a></li>';
				}
				if($opcion[$i][0] == "Documentos_requeridos" and $opcion[$i][1]=="SI")
				{
				echo '<li><a href="busca_documentos_requeridos.php" target="marcoprincipal">Documentos requeridos</a></li>';
				}


			}

}
else
{
//*****************       usuario master
					echo '<li><a href="busca_cargos.php" target="marcoprincipal">Cargo</a></li>';
					echo '<li><a href="busca_personal.php" target="marcoprincipal">Ficha</a></li>';
					echo '<li><a href="asistencia.php" target="marcoprincipal">Asistencias</a></li>';
					echo '<li><a href="asistencia_masiva.php" target="marcoprincipal">Asistencias (masiva)</a></li>';
					echo '<li><a href="asistencia_comodines.php" target="marcoprincipal">Asistencias (comodines)</a></li>';
					echo '<li><a href="asistencia_diaria.php" target="marcoprincipal">Asistencias (planilla)</a></li>';
					echo '<li><a href="asistencias_edicion.php" target="marcoprincipal">Edicion Asistencias</a></li>';
					echo '<li><a href="ausencias.php" target="marcoprincipal">Ausencias</a></li>';
					echo '<li><a href="adelantos.php" target="marcoprincipal">Adelantos</a></li>';
					echo '<li><a href="bonificaciones.php" target="marcoprincipal">Bonificaciones</a></li>';
					echo '<li><a href="busca_prestamos.php" target="marcoprincipal">Prestamos</a></li>';
					echo '<li><a href="traslados.php" target="marcoprincipal">Translados</a></li>';
					echo '<li><a href="vacaciones.php" target="marcoprincipal">Vacaciones</a></li>';
					echo '<li><a href="descuentos.php" target="marcoprincipal">Descuentos</a></li>';
					echo '<li><a href="busca_liquidaciones_regulares.php" target="marcoprincipal">Liquidación Regular</a></li>';
					echo '<li><a href="busca_liquidaciones_aguinaldo.php" target="marcoprincipal">Liquidaci&oacute;n aguinaldo</a></li>';
					echo '<li><a href="busca_liquidaciones_salida.php" target="marcoprincipal">Liquidaci&oacute;n por retiro</a></li>';
					echo '<li><a href="busca_documentos_requeridos.php" target="marcoprincipal">Documentos requeridos</a></li>';
}
			?>
           </ul>
        </li>
        <li><a href="#">Clientes/Sucursales</a>
          <ul>
          <?php
		  if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' ){
		  	for($i=0;$i<$fila;$i++)
			{
		  		if($opcion[$i][0] == "clientes" and $opcion[$i][1]=="SI")
				{
					echo '<li><a href="busca_clientes.php" target="marcoprincipal">Clientes</a></li>';
				}
			}
		  }
		  else
		  {
//******************  USUARIO MASTER
			 echo '<li><a href="busca_clientes.php" target="marcoprincipal">Clientes</a></li>';
		  }
			?>

          </ul>
        </li>
        <li><a href="#">Equipos y Herramientas</a>
          <ul>
            <?php

			if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' ){

					for($i=0;$i<$fila;$i++)
					{
						if($opcion[$i][0] == "equipos" and $opcion[$i][1]=="SI")
							{
							echo '<li><a href="busca_herramientas.php" target="marcoprincipal">Equipos</a></li>';
							echo '<li><a href="ajustes_stock.php" target="marcoprincipal">Ajuste de stock</a></li>';
							echo '<li><a href="panel_plantillas.php" target="marcoprincipal">Plantillas</a></li>';
							echo '<li><a href="panel_plantillas2.php" target="marcoprincipal">Plantillas (sin frec.)</a></li>';
							echo '<li><a href="plantillas_pdf.php" target="marcoprincipal">Vista Plantillas</a></li>';
							echo '<li><a href="pedidos.php" target="marcoprincipal">Pedidos</a></li>';
							echo '<li><a href="remision_simple2.php" target="marcoprincipal">Remisi&oacute;n simple</a></li>';
							echo '<li><a href="remision_timbrada.php" target="marcoprincipal">Remisi&oacute;n con timbrado</a></li>';
							echo '<li><a href="remision_simple3.php" target="marcoprincipal">Remisi&oacute;n sin frecuencia</a></li>';
							}
						if($opcion[$i][0] == "proveedor" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="busca_proveedor.php" target="marcoprincipal">Proveedores</a></li>';
						}
						if($opcion[$i][0] == "compra" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="busca_compras.php" target="marcoprincipal">Compras</a></li>';
						}
						if($opcion[$i][0] == "asignacion_equipos" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="asiganacion_equipos.php" target="marcoprincipal">Asignar responsable</a></li>';
						}
						if($opcion[$i][0] == "depositos" and $opcion[$i][1]=="SI")
						{
							echo ' <li><a href="busca_depositos.php" target="marcoprincipal">Depósitos</a></li>';
						}
						if($opcion[$i][0] == "movimientos" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="movimiento_equipos.php" target="marcoprincipal">Movimientos</a></li>';
							echo '<li><a href="panel_movimientos_equipos.php" target="marcoprincipal">Panel Movimientos</a></li>';
							echo '<li><a href="panel_equipos_x_cliente.php" target="marcoprincipal">Panel Stock</a></li>';
						}
					}
			}
			else
			{
//*******************  USUARIO MASTER **************************
			echo '<li><a href="busca_herramientas.php" target="marcoprincipal">Equipos</a></li>';
			echo '<li><a href="ajustes_stock.php" target="marcoprincipal">Ajuste de stock</a></li>';
			echo '<li><a href="panel_plantillas.php" target="marcoprincipal">Plantillas</a></li>';
			echo '<li><a href="panel_plantillas2.php" target="marcoprincipal">Plantillas (sin frec.)</a></li>';
			echo '<li><a href="pedidos.php" target="marcoprincipal">Pedidos</a></li>';
			echo '<li><a href="remision_simple2.php" target="marcoprincipal">Remisi&oacute;n simple</a></li>';
			echo '<li><a href="remision_timbrada.php" target="marcoprincipal">Remisi&oacute;n con timbrado</a></li>';
			echo '<li><a href="remision_simple3.php" target="marcoprincipal">Remisi&oacute;n sin frecuencia</a></li>';
			echo '<li><a href="plantillas_pdf.php" target="marcoprincipal">Vista Plantillas</a></li>';
			echo '<li><a href="busca_proveedor.php" target="marcoprincipal">Proveedores</a></li>';
			echo '<li><a href="busca_compras.php" target="marcoprincipal">Compras</a></li>';
			echo '<li><a href="asiganacion_equipos.php" target="marcoprincipal">Asignar responsable</a></li>';
			echo ' <li><a href="busca_depositos.php" target="marcoprincipal">Depósitos</a></li>';
			echo '<li><a href="movimiento_equipos.php" target="marcoprincipal">Movimientos</a></li>';
			echo '<li><a href="panel_movimientos_equipos.php" target="marcoprincipal">Panel Movimientos</a></li>';
			echo '<li><a href="panel_equipos_x_cliente.php" target="marcoprincipal">Panel Stock</a></li>';
			}
			?>
          </ul>
        </li>
        <li><a href="#">Seguridad</a>
          <ul>
           <?php
		   if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' )
		   {
					for($i=0;$i<$fila;$i++)
					{
						if($opcion[$i][0] == "usuarios" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="busca_usuarios.php" target="marcoprincipal">Usuarios</a></li>';
						}
						if($opcion[$i][0] == "perfiles" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="busca_perfiles.php" target="marcoprincipal">Perfiles</a></li>';
						}
						if($opcion[$i][0] == "ajustes" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="busca_ajustes.php" target="marcoprincipal">Ajustes</a></li>';
							echo '<li><a href="ajusta_salarios.php" target="marcoprincipal">Ajusta SALARIOS</a></li>';
							echo '<li><a href="ajusta_ips.php" target="marcoprincipal">Ajusta IPS</a></li>';
						}
					}
		   }
		   else
		   {
//*******************  USUARIO
				echo '<li><a href="busca_usuarios.php" target="marcoprincipal">Usuarios</a></li>';
				echo '<li><a href="busca_perfiles.php" target="marcoprincipal">Perfiles</a></li>';
				echo '<li><a href="busca_ajustes.php" target="marcoprincipal">Ajustes</a></li>';

		   }
			?>
          </ul>
        </li>

         <li><a href="#">Otros reportes</a>
          <ul>
           <?php

		   $ruta2 ='http://server/appweb' ;

		     if($_SESSION['user']!='Super' and $_SESSION['nombre']!='Super1' and $_SESSION['apellido']!='Super0' )
		   {
					for($i=0;$i<$fila;$i++)
					{
						if($opcion[$i][0] == "otros" and $opcion[$i][1]=="SI")
						{
							echo '<li><a href="'.$ruta2.'/adicional.html" target="marcoprincipal">Opciones</a></li>';
						}
					}
			 }
		   else
		   {

		   echo '<li><a href="'.$ruta2.'/adicional.html" target="marcoprincipal">Opciones</a></li>';
		   }
			?>


          </ul>
        </li>

      </ul>
    </nav>
  </div>
</body>
</html>
