<?php session_start(); 
include ("conexion/conectar.php");
$query2="select nropatronal_mt  from parametros ";
$res=mysql_query($query2,$con);
$mat=array();
$fila2=0;
$ano=explode("-", $_POST['textfield2']);
$obs= $_POST['textarea'];
$id='';
$patronal='';
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$mat[$fila2][0]=$fila['nropatronal_mt'];
			$patronal=$fila['nropatronal_mt'];
			$fila2=$fila2+1;									
		 }
 }
 for($i=0;$i<5;$i++)
 {
	for($ii=1;$ii<10;$ii++)
 	{
	 	$mat[$i][$ii]=0;
 	}	 
 }
$mat[0][10]=1;
$mat[1][10]=2;
$mat[2][10]=3;
$mat[3][10]=4;
$mat[4][10]=5;

  $mat[0][1]=$ano[2];
 //***********             VARONES JEFES
 //
	$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado` FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo` LIKE('%sup%') OR cargos.`cargo` LIKE('%jef%') OR cargos.`cargo` LIKE('%dir%') OR cargos.`cargo` LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%'))";

$res=mysql_query($query2,$con);
if(mysql_num_rows($res)>0)
 {
	$mat[0][2]=mysql_num_rows($res);
	
 //
			
		 
 }
 //***********              MUJERES JEFES
	 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado` FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo` LIKE('%sup%') OR cargos.`cargo` LIKE('%jef%') OR cargos.`cargo` LIKE('%dir%') OR cargos.`cargo` LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%'))";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
			$mat[0][3]=mysql_num_rows($res);
			
		 }
		 
 //***********             EMPLEADOS VARONES
	 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado` FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%'))";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
			$mat[0][4]=mysql_num_rows($res);
			
		 }		 
//***********             EMPLEADOS MUJERES
	 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado` FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%'))";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
			$mat[0][5]=mysql_num_rows($res);
			
		 }	
		
		
		 
//***********************  HORAS JEFES VARONES


 $query2="SELECT personal.sexo,personal.id,asistencia.`hs_cantidad`,asistencia.`personal_id`,cargos.`cargo`, SUM(asistencia.`hs_cantidad`) AS total_horas FROM personal,asistencia,cargos WHERE personal.id = asistencia.`personal_id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND personal.`cargos_id`=cargos.`id`  AND(cargos.`cargo` LIKE('%sup%') OR cargos.`cargo` LIKE('%jef%') OR cargos.`cargo` LIKE('%dir%') OR cargos.`cargo` LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%'))    GROUP BY personal.`id`	";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
			  while($fila=mysql_fetch_array($res))
		 {

			$mat[1][2]=$fila['total_horas'];
		 }
			
			
		 }	
	//***********************  HORAS JEFES MUJERES

 $query2="SELECT personal.sexo,personal.id,asistencia.`hs_cantidad`,asistencia.`personal_id`,cargos.`cargo`, SUM(asistencia.`hs_cantidad`) AS total_horas FROM personal,asistencia,cargos WHERE personal.id = asistencia.`personal_id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND personal.`cargos_id`=cargos.`id`  AND(cargos.`cargo` LIKE('%sup%') OR cargos.`cargo` LIKE('%jef%') OR cargos.`cargo` LIKE('%dir%') OR cargos.`cargo` LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%'))   GROUP BY personal.`id`	";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[1][3]=$fila['total_horas'];
		 		}
			
		 }		 
	//***********************  HORAS VARONES	
	//		 		 
	
	$query2="SELECT personal.sexo,personal.id,asistencia.`hs_cantidad`,asistencia.`personal_id`,cargos.`cargo`, SUM(asistencia.`hs_cantidad`) AS total_horas FROM personal,asistencia,cargos WHERE personal.id = asistencia.`personal_id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND personal.`cargos_id`=cargos.`id`  AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%'))   GROUP BY personal.`id`";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[1][4]=$fila['total_horas'];
		 		}
			
		 }		
//***********************  HORAS MUJERES	
	//	
	
	$query2="SELECT personal.sexo,personal.id,asistencia.`hs_cantidad`,asistencia.`personal_id`,cargos.`cargo`, SUM(asistencia.`hs_cantidad`) AS total_horas FROM personal,asistencia,cargos WHERE personal.id = asistencia.`personal_id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND personal.`cargos_id`=cargos.`id`  AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%'))   GROUP BY personal.`id`";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[1][5]=$fila['total_horas'];
		 		}
			
		 }	
//**************  SALARIO JEFES VARONES

//
		 	$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,SUM(importeIPS) as total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo` LIKE('%sup%') OR cargos.`cargo` LIKE('%jef%') OR cargos.`cargo` LIKE('%dir%') OR cargos.`cargo` LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%')) GROUP BY personal.sexo";

		$res=mysql_query($query2,$con);
		  while($fila=mysql_fetch_array($res))
		 		{
					$mat[2][2]=$fila['total'];
		 		}
			
		

//**************  SALARIO JEFES MUJERES

//
		 	$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,SUM(importeIPS) as total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo` LIKE('%sup%') OR cargos.`cargo` LIKE('%jef%') OR cargos.`cargo` LIKE('%dir%') OR cargos.`cargo` LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%')) GROUP BY personal.sexo";

		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[2][3]=$fila['total'];
		 		}
			
		 }	
//**************  SALARIO VARONES


		 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,SUM(personal.importeIPS) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%')) GROUP BY personal.sexo";

		$res=mysql_query($query2,$con);
	   while($fila=mysql_fetch_array($res))
		{
			$mat[2][4]=$fila['total'];
		}
		 
//**************  SALARIO MUJERES


		 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,SUM(personal.importeIPS) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%')) GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[2][5]=$fila['total'];
		 		}
					 	 
//*************  INGRESO JEFES VARONES

$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo`  LIKE('%sup%') OR cargos.`cargo`  LIKE('%jef%') OR cargos.`cargo`  LIKE('%dir%') OR cargos.`cargo`  LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%')) AND YEAR(personal.`fecha_ingreso`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[3][2]=$fila['total'];
		 		}
			
		 }
// ************  INGRESO JEFES MUJERES

$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo`  LIKE('%sup%') OR cargos.`cargo`  LIKE('%jef%') OR cargos.`cargo`  LIKE('%dir%') OR cargos.`cargo`  LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%')) AND YEAR(personal.`fecha_ingreso`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[3][3]=$fila['total'];
		 		}
			
		 }	
//  INGRESO EMPLEADOS VARONES
//

		 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%')) AND YEAR(personal.`fecha_ingreso`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[3][4]=$fila['total'];
		 		}
			
		 }		 			
//  INGRESO EMPLEADOS MUJERES

$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%')) AND YEAR(personal.`fecha_ingreso`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[3][5]=$fila['total'];
		 		}
			
		 }	

//*************  EGRESO JEFES VARONES

$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M' AND(cargos.`cargo`  LIKE('%sup%') OR cargos.`cargo`  LIKE('%jef%') OR cargos.`cargo`  LIKE('%dir%') OR cargos.`cargo`  LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%')) AND YEAR(personal.`fecha_salida`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[4][2]=$fila['total'];
		 		}
			
		 }
// ************  INGRESO JEFES MUJERES

$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo`  LIKE('%sup%') OR cargos.`cargo`  LIKE('%jef%') OR cargos.`cargo`  LIKE('%dir%') OR cargos.`cargo`  LIKE('%gere%') OR cargos.`cargo` LIKE('%adm%') OR cargos.`cargo` LIKE('%gte%')) AND YEAR(personal.`fecha_salida`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[4][3]=$fila['total'];
		 		}
			
		 }	
//  egreso EMPLEADOS VARONES
//

		 $query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='M'AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%')) AND YEAR(personal.`fecha_salida`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[4][4]=$fila['total'];
		 		}
			
		 }		 			
//  EGRESO EMPLEADOS MUJERES

$query2="SELECT personal.sexo,personal.`cargos_id`,cargos.id,personal.`estado`,personal.`id` AS personal,COUNT(personal.id) AS total FROM personal,cargos WHERE personal.`cargos_id`=cargos.`id` AND personal.`estado`=1 AND  personal.`sexo`='F' AND(cargos.`cargo` NOT LIKE('%sup%') AND cargos.`cargo` NOT LIKE('%jef%') AND cargos.`cargo` NOT LIKE('%dir%') AND cargos.`cargo` NOT LIKE('%gere%') AND cargos.`cargo` NOT LIKE('%adm%')) AND YEAR(personal.`fecha_salida`)='' GROUP BY personal.sexo";
		$res=mysql_query($query2,$con);
		if(mysql_num_rows($res)>0)
		 {
		 	  while($fila=mysql_fetch_array($res))
		 		{
					$mat[4][5]=$fila['total'];
		 		}
			
		 }	
		 
//***************************************************************************
 //***************************************************************************
 						$creador = $_SESSION["user"];	
						$fe_ultmodi = date('Y-m-d');	
						$x=explode("-",$fe_ultmodi);
						$query2="insert into planillamt(periodo,REFERENCIA,mes,creador,fe_ultmodi,obs)values('".$ano[2]."','RESUMEN','".$ano[1]."','".$creador."','".$fe_ultmodi."','".$obs."')" ;
						$res=mysql_query($query2,$con);
						
						$query2="select id from planillamt where periodo='".$ano[2]."' and REFERENCIA='RESUMEN' and mes='".$ano[1]."' " ;
						$res=mysql_query($query2,$con);
						 while($fila=mysql_fetch_array($res))
				 {
					 $id=$fila['id'];
				 }
				 for($i=0;$i<5;$i++)
 					{
				 		$query="insert into resumengeneral(personal_id,PlanillaMT_id,ano_periodo,orden,nropatronal,jefesvarones,jefesmujeres,empl_varones,empl_mujeres,obrero_varones,obrero_mujeres,menor_varon,menor_mujer,creador,fe_ultmodi) values('0','".$id."','".$ano[2]."','".$mat[$i][10]."','".$patronal."','".$mat[$i][2]."','".$mat[$i][3]."','".intval($mat[$i][4])."','".intval($mat[$i][5])."','0','0','0','0','".$creador."','".$fe_ultmodi."')";
						//echo $query."<br>";
				 		$res=mysql_query($query,$con);
					}
mysql_close($con);
echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_resumen_mjt.php");</script>'; 
?>		 
		 
