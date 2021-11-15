<?php session_start();
include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$personal=explode("," , $_POST['skills2']);

$destino=explode("--" , $_POST['textfield11']);
$destinos_id='';
$desdefecha=explode("--" , $_POST['textfield12']);
$desde_hora=explode("--" , $_POST['textfield13']);
$hasta_hora=explode("--" , $_POST['textfield14']);
$cant_horas=explode("--" , $_POST['textfield15']);
$dias_elegidos=explode("--" , $_POST['textfield17']);
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d G:i:s');	
$apellidos=$personal[1];
$nombres=$personal[0];
$personal_id='';
$mat=array();
$fila=0;
$ban=0;
$fecha ='';
$query2="select id from personal where apellidos='".$apellidos."' and nombres='".$nombres."' and estado = 1" ;
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)==0)
			{
			$ban=1;	
			}
		while($query4 = mysql_fetch_array($res) )
			{
				$personal_id = $query4['id'];
			}
		
		for ($x = 0; $x <= count($destino); $x++) 
		{
			if(!empty($destino[$x]))
			{
			$query2="select id from sucursales where razon_sucursal='".$destino[$x]."' " ;
			if(mysql_num_rows($res)==0)
			{
			$ban=1;	
			}
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$destinos_id[$fila] = $query4['id'];
					$fila=$fila+1;
				}
			}
		}
		$ban=0;
			
		if($ban==0)
		{
				
				for ($x = 0; $x < count($destinos_id); $x++)
				{
			 			$query2="SELECT id FROM sucursales_personal where sucursales_id='".$destinos_id[$x]."' and personal_id='".$personal_id."' and  desde_hora='".$desde_hora[$x]."' and hasta_hora='".$hasta_hora[$x]."' and dias='".$dias_elegidos[$x]."' ";
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
							
							$ban=1;	
						}
						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$destinos_id[$x]."' and personal_id='".$personal_id."' and  desde_hora>='".$desde_hora[$x]."' and hasta_hora<='".$hasta_hora[$x]."' and dias='".$dias_elegidos[$x]."' ";
						
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
						
							$ban=1;	
						}
						
						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$destinos_id[$x]."' and personal_id='".$personal_id."' and  desde_hora<='".$desde_hora[$x]."' and hasta_hora>='".$hasta_hora[$x]."' and dias='".$dias_elegidos[$x]."' ";
						
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
						
							$ban=1;	
						}
						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$destinos_id[$x]."' and personal_id='".$personal_id."' and  desde_hora<'".$desde_hora[$x]."' and hasta_hora<'".$hasta_hora[$x]."'  and hasta_hora>'".$desde_hora[$x]."' and dias='".$dias_elegidos[$x]."' ";
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
						
							$ban=1;	
						}
						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$destinos_id[$x]."' and personal_id='".$personal_id."' and  desde_hora>'".$desde_hora[$x]."' and hasta_hora>'".$hasta_hora[$x]."'  and desde_hora<'".$hasta_hora[$x]."' and dias='".$dias_elegidos[$x]."' ";
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
						
							$ban=1;	
						}
				
				}
		}
				//*************************************************************
				if($ban==1)
				{
					echo "Ya existe una asignacion de ".$apellidos.", ".$nombres." en ese horario, no es posible asiganar 2 veces el mismo personal al mismo lugar en el mismo turno ";
				}
				if($ban==0)
				{
					
					if(!empty($destinos_id) and !empty($desdefecha[0]))
					{
						$fecha	= explode("-" , $desdefecha[0]);
						$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
						$horas =str_replace(":",".", $cant_horas[0]);
						$horas2 = floatval($horas);
						$query2="INSERT INTO sucursales_personal(sucursales_id,personal_id,desdefecha,fe_ultmodi,canthoras,creador,desde_hora,hasta_hora,estado_registro,dias)  VALUES('".$destinos_id[0]."','".$personal_id."','".$fecha2."','".$fe_ultmodi."','".$horas2."','".$creador."','".$desde_hora[0]."','".$hasta_hora[0]."','VIGENTE','".$dias_elegidos[0]."')";
						
						$resultado = mysql_query($query2);
						}
					
				}
				
if ($ban==0)
				{
		for ($x = 1; $x <= count($destinos_id); $x++)
		{
			
			
			for ($x2 = $x+1; $x2 < count($destinos_id); $x2++)
			{
			 			$query2="SELECT id FROM sucursales_personal where  personal_id='".$personal_id."' and  desde_hora='".$desde_hora[$x2]."' and hasta_hora='".$hasta_hora[$x2]."' and dias='".$dias_elegidos[$x2]."'";
						//echo $query2."<br>";
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
							//echo $query2."<br>";
							$ban=1;	
						}
						$query2="SELECT id FROM sucursales_personal where personal_id='".$personal_id."' and  desde_hora>='".$desde_hora[$x2]."' and hasta_hora<='".$hasta_hora[$x2]."' and dias='".$dias_elegidos[$x2]."'";
						
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
							//echo $query2."<br>";
							$ban=1;	
						}
						
						$query2="SELECT id FROM sucursales_personal where  personal_id='".$personal_id."' and  desde_hora<='".$desde_hora[$x2]."' and hasta_hora>='".$hasta_hora[$x2]."' and dias='".$dias_elegidos[$x2]."'";
						
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
							//echo $query2."<br>";
							$ban=1;	
						}
						$query2="SELECT id FROM sucursales_personal where personal_id='".$personal_id."' and  desde_hora<'".$desde_hora[$x2]."' and hasta_hora<'".$hasta_hora[$x2]."'  and hasta_hora>'".$desde_hora[$x2]."' and dias='".$dias_elegidos[$x2]."' ";
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
						//echo $query2."<br>";
							$ban=1;	
						}
						$query2="SELECT id FROM sucursales_personal where  personal_id='".$personal_id."' and  desde_hora>'".$desde_hora[$x2]."' and hasta_hora>'".$hasta_hora[$x2]."'  and desde_hora<'".$hasta_hora[$x2]."' and dias='".$dias_elegidos[$x2]."'";
						$resultado = mysql_query($query2);
						if(mysql_num_rows($resultado)>0)
						{
							//echo $query2."<br>";
							$ban=1;	
						}
				}
			
			
			
			
				if($ban==1)
				{
					echo "Ya existe una asignacion de ".$apellidos.", ".$nombres." en ese horario, no es posible asiganar 2 veces el mismo personal al mismo lugar en el mismo turno.";
				}
				
				

			if($ban==0)
			{
				
					if(!empty($destinos_id) and !empty($desdefecha[$x]))
					{

						$fecha	= explode("-" , $desdefecha[$x]);
						$fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
						$horas =str_replace(":",".", $cant_horas[$x]);
						$horas2 = floatval($horas);
						$query2="INSERT INTO sucursales_personal(sucursales_id,personal_id,desdefecha,fe_ultmodi,canthoras,creador,desde_hora,hasta_hora,estado_registro,dias)  VALUES('".$destinos_id[$x]."','".$personal_id."','".$fecha2."','".$fe_ultmodi."','".$horas2."','".$creador."','".$desde_hora[$x]."','".$hasta_hora[$x]."','VIGENTE','".$dias_elegidos[$x]."')";
						
						$resultado = mysql_query($query2);
						}
				}
				
				
			}
			
			
			
			
		}
		
		mysql_close($con);	
		if($ban==0)
		{
echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>'; 
		}









?>