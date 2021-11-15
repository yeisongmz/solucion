<?php include ("conexion/conectar.php");
$id='';
$opc='';
$sql='';
$q='';
$personal_id='';
$aux=explode(",",$_GET['personal']);
	$sql="SELECT * FROM personal WHERE nombres='".trim($aux[0])."' and apellidos='".trim($aux[1])."'";
	$res2=mysql_query($sql,$con);
	while($fila=mysql_fetch_array($res2))
		{
			$personal_id=$fila['id'];		
		}
	
	
		
		$sql="delete FROM descuentos WHERE personal_id='".$personal_id."' and month(fecha)='".$_GET['mes']."' and year(fecha)='".$_GET['ano']."'";
	    $res2=mysql_query($sql,$con);
		

	
	
	

		
		
		
		$sql="delete FROM bonificacion WHERE personal_id='".$personal_id."' and month(fecha)='".$_GET['mes']."' and year(fecha)='".$_GET['ano']."'";
	    $res2=mysql_query($sql,$con);
		
		
	
	
	
	
	
	
	
		
		$sql="delete FROM ausencias WHERE  personal_id='".$personal_id."' and month(fecha)='".$_GET['mes']."' and year(fecha)='".$_GET['ano']."'";
	    $res2=mysql_query($sql,$con);
		
		

	
	
	
	
		$sql="delete FROM adelantos WHERE  personal_id='".$personal_id."' and month(fecha)='".$_GET['mes']."' and year(fecha)='".$_GET['ano']."'";
	    $res2=mysql_query($sql,$con);
	
	
	
				
				$query2="delete  from asistencia where personal_id='".$personal_id."' and year(fecha_asistencia)='".$_GET['ano']."' and month(fecha_asistencia)='".$_GET['mes']."' ";
				//echo $query2;
				$resultado = mysql_query($query2);
				
		
	
	
	
	 	mysql_close($con);
		echo '<script type="text/javascript" language="javascript">window.location.replace("busca_ajustes.php");</script>'; 
	







?>