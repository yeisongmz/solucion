<?php 

include ("conexion/conectar.php");?>
<?php 
// ***********         grabacion/ modificacion
if (isset($_GET['id'])) 
{
$x=explode("--", $_GET['id'])	;
$id_luiquidacion =$x[0];
$total_pagado_cuotas=0;
$personal_id=0;
$total_adelanto	=0;								
									
				
				
				$query2=mysql_query("SELECT * FROM liquiregular where id='".$id_luiquidacion."'  ");
				while($query4=mysql_fetch_array($query2))
						{
				
					$personal_id=$query4['personal_id'];	
				}
				
				$query2=mysql_query("SELECT * FROM liquidetalle where LiquiRegular_id='".$id_luiquidacion."'  ");
				while($query4=mysql_fetch_array($query2))
						{
					
					$query3="update adelantos set idliquidacion='0' where LiquiRegular_id='".$id_luiquidacion."' ";
					$resultado = mysql_query($query3);
				}
			
		
			$query2="delete  from liquiregular where id='".$id_luiquidacion."' ";
			//echo $query2;
			$resultado = mysql_query($query2);
			
			$query2="delete  from liquidetalle where liquiregular_id='".$id_luiquidacion."' ";
			//echo $query2;									
			$resultado = mysql_query($query2);									
			
			mysql_close($con);	
			echo '<script type="text/javascript" language="javascript">window.location.replace("busca_liquidaciones_aguinaldo.php");</script>'; 
								
				
									
				
				
//****************   ELIMINACION         **********************
				
				
	}

?>