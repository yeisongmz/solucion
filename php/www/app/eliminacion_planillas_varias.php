<?php include ("conexion/conectar.php");

$opcion=$_GET['opc'];
$id=explode("--",$_GET['id']);

if($opcion=='BANCO')
{
									$query2="DELETE FROM planilla_banco  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									
$query2="DELETE FROM detalleplanilla  WHERE planilla_banco_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_banco.php");</script>';
}
									
	if($opcion=='GENERAL')
{
									$query2="DELETE FROM planillamt  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									
$query2="DELETE FROM empleadosobreros  WHERE PlanillaMT_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_general_mjt.php");</script>';
}
									
if($opcion=='IPS')
{									
									$query2="DELETE FROM planillasueldoips  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									
$query2="DELETE FROM personal_planillasueldoips  WHERE PlanillaSueldoIPS_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_planilla_ips.php");</script>';
}
									
if($opcion=='RESUMEN')
{										
									$query2="DELETE FROM planillamt  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									$query2="DELETE FROM resumengeneral  WHERE PlanillaMT_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_resumen_mjt.php");</script>';
}
									
								
	if($opcion=='JORNALES')
{								
									$query2="DELETE FROM planillamt  WHERE ID='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									
$query2="DELETE FROM sueldojornales  WHERE PlanillaMT_id='".$id[0]."' ";
									$resultado = mysql_query($query2) ;
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_suledos_mjt.php");</script>';
									 
}


?>