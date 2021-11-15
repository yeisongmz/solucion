<?php include ("conexion/conectar.php");
$query2="select nropatronal_mt from parametros ";
$res=mysql_query($query2,$con);
$patronal='';
$id='';
$ano=explode("-", $_POST['textfield2']);
$obs= $_POST['textarea'];
$mat=array();
$mat2=array();
$fila2=0;
 if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$patronal=$fila['nropatronal_mt'];
		 }
 }
 
$query2="select id,nro_docum,modopago,jornalxhora,importeIPS,jornalxmin  from personal ";
$res=mysql_query($query2,$con);
if(mysql_num_rows($res)>0)
 {
	 while($fila=mysql_fetch_array($res))
		 {
			$mat[$fila2][0]=$fila['id'];
			$mat[$fila2][1]=$fila['nro_docum'];	
			$mat[$fila2][2]='M';//$fila['modopago'];	
			$mat[$fila2][3]=$fila['jornalxhora'];
			$mat[$fila2][4]=$fila['jornalxmin'];	
			$mat[$fila2][8]=$fila['importeIPS'];
			$mat[$fila2][9]='M';
			
			$mat[$fila2][5]=intval($mat[$fila2][8]/30);
														
			$fila2=$fila2+1;
		 }
 }
 for($i=0;$i<count($mat);$i++)
 {
		 $query2=" SELECT mes,ano, SUM(hs_cantidad) AS total 
FROM asistencia WHERE personal_id='".$mat[$i][0]."' AND YEAR(FECHA)='".$ano[2]."'
GROUP BY ano,mes";
		$res=mysql_query($query2,$con);
		$mat[$i][6]=$fila['mes'];
		$mat[$i][7]=$fila['ano'];
		$mat[$i][10]='0';
		$mat[$i][11]='0';	
		$mat[$i][12]='0';
		$mat[$i][13]='0';	
		$mat[$i][14]='0';
		$mat[$i][15]='0';	
		$mat[$i][16]='0';
		$mat[$i][17]='0';	
		$mat[$i][18]='0';
		$mat[$i][19]='0';	
		$mat[$i][20]='0';
		$mat[$i][21]='0';	
		$mat[$i][22]='0';
		$mat[$i][23]='0';	
		$mat[$i][24]='0';
		$mat[$i][25]='0';	
		$mat[$i][26]='0';
		$mat[$i][27]='0';	
		$mat[$i][28]='0';
		$mat[$i][29]='0';	
		$mat[$i][30]='0';
		$mat[$i][31]='0';	
		$mat[$i][32]='0';
		$mat[$i][33]='0';
		$mat[$i][34]='0';	
		$mat[$i][35]='0';
		$mat[$i][36]='0';
		$mat[$i][37]='0';
		$mat[$i][38]='0';	
		$mat[$i][39]='0';
		$mat[$i][40]='0';
		$mat[$i][41]='0';	
		$mat[$i][42]='0';
		$mat[$i][43]='0';				
		if(mysql_num_rows($res)>0)
		 {
			
			 while($fila=mysql_fetch_array($res))
				 {
					 
						
						if($fila['mes']==1)
						{
							$mat[$i][10]=$fila['total'];
							$mat[$i][11]=intval(($mat[$i][5]/8)*$mat[$i][10]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][11]);
						}
						if($fila['mes']==2)
						{
							$mat[$i][12]=$fila['total'];
							$mat[$i][13]=intval(($mat[$i][5]/8)*$mat[$i][12]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][13]);
						}
						if($fila['mes']==3)
						{
							$mat[$i][14]=$fila['total'];
							$mat[$i][15]=intval(($mat[$i][5]/8)*$mat[$i][14]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][15]);
						}
						if($fila['mes']==4)
						{
							$mat[$i][16]=$fila['total'];
							$mat[$i][17]=intval(($mat[$i][5]/8)*$mat[$i][16]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][17]);
						}
						if($fila['mes']==5)
						{
							$mat[$i][18]=$fila['total'];
							$mat[$i][19]=intval(($mat[$i][5]/8)*$mat[$i][18]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][19]);	
						}
						if($fila['mes']==6)
						{
							$mat[$i][20]=$fila['total'];
							$mat[$i][21]=intval(($mat[$i][5]/8)*$mat[$i][20]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][21]);	
						}
						if($fila['mes']==7)
						{
							$mat[$i][22]=$fila['total'];
							$mat[$i][23]=intval(($mat[$i][5]/8)*$mat[$i][22]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][23]);
							
						}
						if($fila['mes']==8)
						{
							$mat[$i][24]=$fila['total'];
							$mat[$i][25]=intval(($mat[$i][5]/8)*$mat[$i][24]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][25]);
						}
						if($fila['mes']==9)
						{
							$mat[$i][26]=$fila['total'];
							$mat[$i][27]=intval(($mat[$i][5]/8)*$mat[$i][26]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][27]);
						}
						if($fila['mes']==10)
						{
							$mat[$i][28]=$fila['total'];
							$mat[$i][29]=intval(($mat[$i][5]/8)*$mat[$i][28]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][29]);
						}
						if($fila['mes']==11)
						{
							$mat[$i][30]=$fila['total'];
							$mat[$i][31]=intval(($mat[$i][5]/8)*$mat[$i][30]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][31]);
						}
						if($fila['mes']==12)
						{
							$mat[$i][32]=$fila['total'];
							$mat[$i][33]=intval(($mat[$i][5]/8)*$mat[$i][32]);
							$mat[$i][43]=intval($mat[$i][43]+$mat[$i][33]);
						}
						
					 
				 }
		}
 }
 //***************************************************************************
 ///                    		HORAS EXTRAS
 //***************************************************************************
 
 for($i=0;$i<count($mat);$i++)
 {
		 $query2=" SELECT  SUM(IMPORTE) AS total,personal_id,SUM(obs) AS cantidad  
FROM BONIFICACION WHERE personal_id='".$mat[$i][0]."' AND concepto LIKE'%EXTRA%' AND YEAR(FECHA)='".$ano[2]."'
GROUP BY personal_id"  ;
		$res=mysql_query($query2,$con);
		
		if(mysql_num_rows($res)>0)
		 {
			
			 while($fila=mysql_fetch_array($res))
				 {
					 	    $mat[$i][34]=$fila['total'];
							$mat[$i][35]=$fila['cantidad'];
							$mat[$i][36]=intval($mat[$i][35]/2);//horas extras al 50%
							$mat[$i][37]=intval($mat[$i][34]/2);//importe horas extras al 50%							
						
						
					 
				 }
		}
 }
 //***************************************************************************
 //***************************************************************************
 
 //***************************************************************************
 ///                    		AGUINALDO
 //***************************************************************************
 
 for($i=0;$i<count($mat);$i++)
 {
		 $query2=" SELECT  IMPORTE  
FROM BONIFICACION WHERE personal_id='".$mat[$i][0]."' AND concepto LIKE'%AGUINALDO%' AND YEAR(fecha)='".$ano[2]."'"  ;
		$res=mysql_query($query2,$con);
		
		if(mysql_num_rows($res)>0)
		 {
			
			 while($fila=mysql_fetch_array($res))
				 {
					 	    $mat[$i][38]=$fila['IMPORTE'];
														
						
						
					 
				 }
		}
 }
 //***************************************************************************
 //***************************************************************************
 
 //***************************************************************************
 ///                    		BENEFICIOS
 //***************************************************************************
 
 for($i=0;$i<count($mat);$i++)
 {
		 $query2=" SELECT  SUM(IMPORTE) AS total FROM BONIFICACION WHERE personal_id='".$mat[$i][0]."' AND YEAR(FECHA)='".$ano[2]."' 
GROUP BY personal_id"  ;
		$res=mysql_query($query2,$con);
		
		if(mysql_num_rows($res)>0)
		 {
			
			 while($fila=mysql_fetch_array($res))
				 {
					 	    $mat[$i][40]=$fila['total'];
						
						
					 
				 }
		}
 }
 //***************************************************************************
 //***************************************************************************
 
 //***************************************************************************
 ///                    		VACACIONES
 //***************************************************************************
 
 for($i=0;$i<count($mat);$i++)
 {
		 $query2=" SELECT  SUM(IMPORTE) AS total FROM BONIFICACION WHERE personal_id='".$mat[$i][0]."' AND YEAR(FECHA)='".$ano[2]."' AND CONCEPTO LIKE'%VACACION%' 
GROUP BY personal_id"  ;
		$res=mysql_query($query2,$con);
		
		if(mysql_num_rows($res)>0)
		 {
			
			 while($fila=mysql_fetch_array($res))
				 {
					 	    $mat[$i][41]=$fila['total'];
						
						
					 
				 }
		}
 }
 //***************************************************************************
 //***************************************************************************
 
  //***************************************************************************
 ///                    		VACACIONES
 //***************************************************************************
 
 for($i=0;$i<count($mat);$i++)
 {
		 $query2=" SELECT  SUM(hs_cantidad) AS total FROM asistencia WHERE personal_id='".$mat[$i][0]."' AND YEAR(FECHA)='".$ano[2]."'  
GROUP BY personal_id"  ;
		$res=mysql_query($query2,$con);
		
		if(mysql_num_rows($res)>0)
		 {
			
			 while($fila=mysql_fetch_array($res))
				 {
					 	    $mat[$i][42]=intval($fila['total']);
						
						
					 
				 }
		}
 }
 //***************************************************************************
 //***************************************************************************
 						$creador = $_SESSION["user"];	
						$fe_ultmodi = date('Y-m-d');	
						$x=explode("-",$fe_ultmodi);
						$query2="insert into planillamt(periodo,REFERENCIA,mes,creador,fe_ultmodi,obs)values('".$ano[2]."','SUELDOS','".$ano[1]."','".$creador."','".$fe_ultmodi."','".$obs."')" ;
						$res=mysql_query($query2,$con);
						
						$query2="select id from planillamt where periodo='".$ano[2]."' and REFERENCIA='SUELDOS' and mes='".$ano[1]."' " ;
						$res=mysql_query($query2,$con);
						 while($fila=mysql_fetch_array($res))
				 {
					 $id=$fila['id'];
				 }
				 for($i=0;$i<count($mat);$i++)
 					{
				 		$query="insert into sueldojornales(personal_id,planillaMT_id,nropatronal,nrodocumento,formapago,importeUnitario,hs_enero,sueldo_enero,hs_febrero,sueldo_feb,hs_marzo,sueldo_mar,hs_abril,sueldo_abr,hs_mayo,sueldo_may,hs_junio,sueldo_jun,hs_julio,sueldo_jul,hs_agosto,sueldo_ago,hs_set,sueldo_set,hs_oct,sueldo_oct,hs_nov,sueldo_nov,hs_dic,sueldo_dic,hs50,sueldo50,hs100,sueldo100,aguinaldo,beneficio,bonificacion,vacaciones,total_hs,total_sueldo,total_gral,creador,fe_ultmodi) values('".$mat[$i][0]."','".$id."','".$patronal."','".$mat[$i][1]."','".$mat[$i][9]."','".$mat[$i][5]."','".intval($mat[$i][10])."','".intval($mat[$i][11])."','".intval($mat[$i][12])."','".intval($mat[$i][13])."','".intval($mat[$i][14])."','".intval($mat[$i][15])."','".intval($mat[$i][16])."','".intval($mat[$i][17])."','".intval($mat[$i][18])."','".intval($mat[$i][19])."','".intval($mat[$i][20])."','".intval($mat[$i][21])."','".intval($mat[$i][22])."','".intval($mat[$i][23])."','".intval($mat[$i][24])."','".intval($mat[$i][25])."','".intval($mat[$i][26])."','".intval($mat[$i][27])."','".intval($mat[$i][28])."','".intval($mat[$i][29])."','".intval($mat[$i][30])."','".intval($mat[$i][31])."','".intval($mat[$i][32])."','".intval($mat[$i][33])."','".intval($mat[$i][36])."','".intval($mat[$i][37])."','".intval($mat[$i][35])."','".intval($mat[$i][34])."','".intval($mat[$i][38])."','".intval($mat[$i][39])."','".intval($mat[$i][40])."','".intval($mat[$i][41])."','".intval($mat[$i][42])."','".intval($mat[$i][43])."','".intval($mat[$i][43]+$mat[$i][38]+$mat[$i][39]+$mat[$i][40]+$mat[$i][41])."','".$creador."','".$fe_ultmodi."')";
						echo $query;
				 		$res=mysql_query($query,$con);
					}
mysql_close($con);
echo '<script type="text/javascript" language="javascript">window.location.replace("generador_planilla_suledos_mjt.php");</script>'; 
?>