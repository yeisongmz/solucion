<?php include ("conexion/conectar.php");
$id='';
$opc='';
$sql='';
$q='';
$personal_id='';
if (isset($_GET['id']) and isset($_GET['opc']))
{
	$x=explode("--",$_GET['id']);
	$id=$x[0];
	$opc=$_GET['opc'];
	
	
	if($opc==1)
	{
		$sql="SELECT liquiregular_id,personal_id FROM descuentos WHERE descuentos.`id`='".$id."'";
	
	    $res2=mysql_query($sql,$con);
 		if(mysql_num_rows($res2)>0)
		{
				$q=null;	
				$personal_id=null;
				while($fila=mysql_fetch_array($res2))
				{
					$q=$fila['liquiregular_id'];	
					$personal_id=$fila['personal_id'];	
				}
				
				$sql="SELECT id FROM liquiregular WHERE personal_id='".$personal_id."' and id='$q'";
	    		$res2=mysql_query($sql,$con);
 				if(mysql_num_rows($res2)>0)
				{
						while($fila=mysql_fetch_array($res2))
						{
							$q=$fila['id'];	
						}
						
						$query2="UPDATE cuotas set estado='Pendiente' where idliquidacion='".$q."' ";
						$resultado = mysql_query($query2);
						$query2="UPDATE adelantos set liquiregular_id='0' where liquiregular_id='".$q."' ";
						$resultado = mysql_query($query2);
						$query2="UPDATE descuentos set liquiregular_id='0' where liquiregular_id='".$q."' ";
						$resultado = mysql_query($query2);
									$query2="UPDATE bonificacion set liquiregular_id='0' where liquiregular_id='".$q."' ";
									$resultado = mysql_query($query2);
									$query2="delete  from liquiregular where id='".$q."' ";
									$resultado = mysql_query($query2);
				}
				
			
 		}
		$sql="delete FROM descuentos WHERE id='".$id."'";
	    $res2=mysql_query($sql,$con);
		
	}
	
	
	
	if($opc==2)
	{
		
		
		$sql="SELECT liquiregular_id,personal_id FROM bonificacion WHERE id='".$id."'";

	    $res2=mysql_query($sql,$con);
 		if(mysql_num_rows($res2)>0)
		{
			    $q=null;	
				$personal_id=null;
				while($fila=mysql_fetch_array($res2))
				{
					$q=$fila['liquiregular_id'];	
					$personal_id=$fila['personal_id'];	
				}
				
				$sql="SELECT id FROM liquiregular WHERE personal_id='".$personal_id."' and id='$q'";
	    		$res2=mysql_query($sql,$con);
 				if(mysql_num_rows($res2)>0)
				{
						while($fila=mysql_fetch_array($res2))
						{
							$q=$fila['id'];	
						}
						
						$query2="UPDATE cuotas set estado='Pendiente' where idliquidacion='".$q."' ";
						$resultado = mysql_query($query2);
						$query3="UPDATE bonificacion set liquiregular_id='0' where liquiregular_id='".$q."' and personal_id='".$personal_id."' ";
					
						$resultado = mysql_query($query3);
						$query4="UPDATE adelantos set liquiregular_id='0' where liquiregular_id='".$q."' ";
						$resultado = mysql_query($query4);
									$query2="UPDATE descuentos set liquiregular_id='0' where liquiregular_id='".$q."' ";
									$resultado = mysql_query($query4);
									$query2="delete  from liquiregular where id='".$q."' ";
									$resultado = mysql_query($query2);
				}
				
			
 		}
		$sql="delete FROM bonificacion WHERE id='".$id."'";
	    $res2=mysql_query($sql,$con);
		
		
	}
	
	
	
	
	
	if($opc==3)
	{
		
		$sql="delete FROM ausencias WHERE id='".$id."'";
	    $res2=mysql_query($sql,$con);
		
		
	}
	
	
	
	
	if($opc==4)
	{
		
		$sql="SELECT liquiregular_id,personal_id FROM adelantos WHERE id='".$id."'";
	    $res2=mysql_query($sql,$con);
 		if(mysql_num_rows($res2)>0)
		{
			    $q=null;	
				$personal_id=null;
				while($fila=mysql_fetch_array($res2))
				{
					$q=$fila['liquiregular_id'];	
					$personal_id=$fila['personal_id'];	
				}
				
				$sql="SELECT id FROM liquiregular WHERE personal_id='".$personal_id."' and id='$q'";
	    		$res2=mysql_query($sql,$con);
 				if(mysql_num_rows($res2)>0)
				{
						while($fila=mysql_fetch_array($res2))
						{
							$q=$fila['id'];	
						}
						
						$query2="UPDATE cuotas set estado='Pendiente' where idliquidacion='".$q."' ";
						$resultado = mysql_query($query2);
						$query2="UPDATE bonificacion set liquiregular_id='0' where liquiregular_id='".$q."' ";
						$resultado = mysql_query($query2);
						$query2="UPDATE adelantos set liquiregular_id='0' where liquiregular_id='".$q."' ";
						$resultado = mysql_query($query2);
									$query2="UPDATE descuentos set liquiregular_id='0' where liquiregular_id='".$q."' ";
									$resultado = mysql_query($query2);
									$query2="delete  from liquiregular where id='".$q."' ";
									$resultado = mysql_query($query2);
				}
				
			
 		}
		$sql="delete FROM adelantos WHERE id='".$id."'";
	    $res2=mysql_query($sql,$con);
	}
	if($opc==5)
	{
		
		$sql="SELECT fecha_asistencia,personal_id FROM asistencia WHERE id='".$id."'";
		$personal=0;
		$mes=0;
		$ano=0;
		
	    $res2=mysql_query($sql,$con);
 		if(mysql_num_rows($res2)>0)
		{
			    $q=null;	
				$personal_id=null;
				while($fila=mysql_fetch_array($res2))
				{
					$personal=$fila['personal_id'];
					$aux=explode("-",$fila['fecha_asistencia']);	
					$mes=$aux[1];
					$ano=$aux[0];
				}
				
				$query2="delete  from asistencia where personal_id='".$personal."' and year(fecha_asistencia)='".$ano."' and month(fecha_asistencia)='".$mes."' ";
				$resultado = mysql_query($query2);
				
			
 		}
		
	}
	 	mysql_close($con);
		echo '<script type="text/javascript" language="javascript">window.location.replace("busca_ajustes.php");</script>'; 
	
}






?>