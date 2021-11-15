<?php include ("conexion/conectar.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel facturas</title>
	<style type="text/css">
		body{ 
		font-family: ARIAL;
		 }
		table tr:nth-child(even) {background-color: #E4E4E4;}
		table th {text-align:left;}
		tbody tr:hover{	background-color: #4B90F7; text-align: left;}
		.tam{
			width: 200px;
			text-align: left;
			/*border-width: 1px*/
		}
		select.tam{
			width: 215px;
		}
		
		.bot-tabla1{
			background-image: url('images/cancel.png');
			background-size: 100% 100%;
			background-repeat: no-repeat;
			width: 20px;
			height: 100%;
			border-color: #e1e1e1;
			background-color: #FFFFFF;
		}
		
	</style>
</head>
<body>

<!-- ================================================================= -->
<!-- Zona de busqueda -->
<!-- ================================================================= -->
	<div id="buscador" style="width: 100%;background-color: #25A7ED;padding: 5px 10px 5px 15px">
		<form method="POST">
			<label>Cliente: </label>
			<input type="text" name="buscar" class="tam">
			<input type="submit" name="enviar" value="Buscar">
			
			<!-- RECARGAR-->
			<input type="button" value="Recargar" style="position:absolute;right: 15px" onclick="window.location='panel_facturas.php'">
		</form>
	</div>
<!-- ================================================================= -->	
	
	<table border="0" style="width: 100%">
	<!-- TITULO DE GRILLA =============================== -->
		<thead style="background-color: lightgrey;">
			<tr>
				<th >Fecha</th>
				<th >Numero</th>
				<th >Cliente</th>
				<th >Tipo</th>
				<th >Importe</th>
				<th >Referencia</th>
				<th >id</th>				
				<th ></th>
			</tr>
		</thead>
		<!-- FIN TTULOS DE GRILLA ======================== -->
		
		<tbody >
			<?php
				@$buscar=trim($_POST['buscar']);
				if(isset($buscar) &&($buscar!="")){
					//-- DATOS CON UN PARAMETRO DE BUSQUEDA.----
					$sql="SELECT FECHA, NUMERO, DSC_CLIENTE, TIPO, IMPORTE, REFERENCIA, ID FROM FACTURAS WHERE DSC_CLIENTE LIKE '%".$buscar."%'";
				}else{
					// --- datos sin buscador - TODOS
					$sql="SELECT FECHA, NUMERO, DSC_CLIENTE, TIPO, IMPORTE, REFERENCIA, ID FROM FACTURAS order by id desc";
				}				
				
				$res=mysql_query($sql,$con);
				if(@mysql_num_rows($res)!=0){
					while(@$fila=mysql_fetch_array($res)){
						// -------------------------------------------------------------
						// -- DATOS que se muestra en la grilla, traidos de un select
						// -------------------------------------------------------------
						echo '<tr" >';
						echo '<td>'.$fila['0'].'</td>'; //FECHA
						echo '<td>'.$fila['1'].'</td>'; //NUMERO
						echo '<td>'.$fila['2'].'</td>'; //DSC_CLIENTE
						echo '<td>'.$fila['3'].'</td>'; // TIPO
						echo '<td>'.$fila['4'].'</td>'; // IMPORTE
						echo '<td>'.$fila['5'].'</td>'; // REFERENCIA
						echo '<td>'.$fila['6'].'</td>'; // ID
												
						echo "<td><input class='bot-tabla1' type=button onclick='eliminar(".$fila['6'].")'></td>";
						
						echo "</tr>";
					}
				}
			?>
		</tbody>
	</table>
	
	<form method='POST' ID='formEliminador'>
	<input type='hidden' name='id' id='id'>
	</form>
	
</body>
<script type="text/javascript">
// -----------------------------------------------------------------------
// accion del boton ELIMINAR QUE SE MUESTRA EN LA GRILLA, EN CADA LINEA
// -----------------------------------------------------------------------
	function eliminar(id){
		document.getElementById('id').value=id;
		document.getElementById('formEliminador').submit();
	}
	
</script>
<?php
    
	$id=$_POST['id'];
	
	if(isset($id)) {
		$sql="delete FROM FACTURAS where id = ".$id ;
		$res=mysql_query($sql);
		echo "<script>window.location.assign('panel_facturas.php')</script>";
	}
?>

</html>