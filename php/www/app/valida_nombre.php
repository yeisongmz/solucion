<?php include ("conexion/conectar.php");


$query2="select numero from remision where numero='".trim($_GET['nombre'])."'  " ;

				$res=mysql_query($query2,$con);
					$ban=0;
						while($query4 = mysql_fetch_array($res) )
						{
							$ban=1;
						}
			if($ban==0)
			{
				echo "<script type='text/javascript'>parent.document.getElementById('form1').submit(); </script>";		
			}
			else
			{
			echo "<script type='text/javascript'>alert('Este nro. de remision ya esta registrado'); </script>";	
			}
						
mysql_close($con);						
?>