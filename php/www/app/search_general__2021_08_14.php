<?php

$dbHost = 'localhost';
$dbUsername = 'admin';
$dbPassword = 'V4lurq123!';
$dbName = 'solucion';

$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

$tabla=$_GET['v'];
$searchTerm = $_GET['term'];



if($tabla=='PLANTILLA')
		{
		$query = $db->query("SELECT * FROM plantillas WHERE nombre LIKE '".$searchTerm."%'  ORDER BY nombre ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['nombre'];
		}
}
if($tabla=='PERFIL')
		{
		$query = $db->query("SELECT * FROM perfil WHERE perfil LIKE '".$searchTerm."%'  ORDER BY perfil ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['perfil'];
		}
}
if($tabla=='USUARIOS')
		{
		$query = $db->query("SELECT * FROM usuarios WHERE username LIKE '".$searchTerm."%'  ORDER BY apellido ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['username'];
		}
}
if($tabla=='PROVEEDOR')
		{
			
		$query = $db->query("SELECT nombre FROM proveedor WHERE nombre LIKE '".$searchTerm."%'  ORDER BY nombre ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['nombre'];
		}
}
if($tabla=='EQUIPOS')
		{
			
		$query = $db->query("SELECT descrip FROM equipos WHERE descrip LIKE '".$searchTerm."%'  ORDER BY descrip ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = utf8_encode($row['descrip']);
		}
}
if($tabla=='UBICACIONES')
		{
			
		$query = $db->query("SELECT ubicacion FROM ubicacion_dep WHERE ubicacion LIKE '".$searchTerm."%'  ORDER BY ubicacion ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] =  utf8_encode($row['ubicacion']);
		}
}
if($tabla=='BANCOS')
		{
			
		$query = $db->query("SELECT razon FROM banco_sueldo WHERE razon LIKE '".$searchTerm."%'  ORDER BY razon ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['razon'];
		}
}
if($tabla=='PERSONAL')
		{
		$query = $db->query("SELECT apellidos,nombres FROM personal   WHERE nombres LIKE '%".$searchTerm."%'   and estado = '1' ORDER BY apellidos ASC ");
		while ($row = $query->fetch_assoc()) {
			
			$data[] =utf8_encode($row['nombres']).",".utf8_encode($row['apellidos']);
		}
}
if($tabla=='CARGOS')
		{
			
		$query = $db->query("SELECT cargo FROM cargos WHERE cargo LIKE '".$searchTerm."%'  ORDER BY cargo ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['cargo'];
		}
}
if($tabla=='CLIENTES')
		{
			
		$query = $db->query("SELECT razon FROM cliente WHERE razon LIKE '".$searchTerm."%'  ORDER BY razon ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['razon'];
		}
}
if($tabla=='CONCEPTOSB')
		{
			
		$query = $db->query("SELECT concepto FROM conceptos WHERE concepto LIKE '".$searchTerm."%' and tipo ='Bonif'  ORDER BY concepto ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['concepto'];
		}
}
if($tabla=='CONCEPTOSC')
		{
			
		$query = $db->query("SELECT concepto FROM conceptos WHERE concepto LIKE '".$searchTerm."%' and tipo ='Desc'  ORDER BY concepto ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['concepto'];
		}
}
if($tabla=='SUCURSALES')
		{
			
		$query = $db->query("SELECT razon_sucursal FROM sucursales WHERE razon_sucursal LIKE '".$searchTerm."%'  ORDER BY razon_sucursal ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['razon_sucursal'];
		}
}
if($tabla=='SUCURSALES_PERSONAL')
		{
					
			$id='';

		
		$query2="SELECT id FROM personal WHERE nombres = '".$_GET["nombre"]."' and apellidos ='" ;
			
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$id = $query4['id'];
					
				}
		
			
		$query = $db->query("SELECT sucursales.razon_sucursal FROM sucursales,sucursales_personal WHERE sucursales_personal.sucursales_id =sucursales.id  AND sucursales.razon_sucursal LIKE '".$searchTerm."%' AND sucursales_personal.personal_id='".$id."' GROUP BY sucursales.razon_sucursal ORDER BY  sucursales.razon_sucursal ASC ");
		
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['razon_sucursal'];
		}
		
}
if($tabla=='REQUERIDOS')
		{
			
		$query = $db->query("SELECT documentos FROM docrequeridos WHERE documentos LIKE '".$searchTerm."%'  ORDER BY documentos ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = utf8_encode($row['documentos']);
		}
}
if($tabla=='ADJUNTOS')
		{
			
		$query = $db->query("SELECT nom_archivo,referencia FROM adjuntos WHERE relacion='EMPRESA' and  referencia LIKE '".$searchTerm."%'  ORDER BY referencia ASC ");
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['referencia'];
		}
}

if($tabla=='SUCURSALES2')
		{
//			$id_cliente= echo "<script type='text/javascript'> document.getElementById('textfield4').value ; <script>";
		
		$cadena="SELECT razon_sucursal FROM sucursales WHERE cliente_id=".$_GET['id']." and razon_sucursal LIKE '%".$searchTerm."%'     ORDER BY razon_sucursal ASC ";
		$query = $db->query($cadena);
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['razon_sucursal'];
		}
}
echo json_encode($data);
?>
