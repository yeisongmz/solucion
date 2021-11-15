<?php include ("conexion/conectar.php");
 include ("funct_restar_horas.php");
$q='';
$id_sucursal='';
$desde='';
$hasta='';
$ano='';
$mes='';
$x=0;
 $matr =array();
if (isset($_GET['q']))
{
	 $q=explode("," , $_GET['q']);
}
if (isset($_GET['id_sucursal']))
{
	 $id_sucursal=explode("--" , $_GET['id_sucursal']);
}
if (isset($_GET['desde']))
{
	 $desde=$_GET['desde'];
}
if (isset($_GET['hasta']))
{
	 $hasta= $_GET['hasta'];
}
if (isset($_GET['ano']))
{
	 $ano= $_GET['ano'];
}
if (isset($_GET['mes']))
{
	 $mes= $_GET['mes'];
}

if ($q<>'')
{
	$id='';

 

 	$sql="select id from personal where nombres ='".$q[0]."' and apellidos='".$q[1]."' and estado = 1 ";
 	$res=mysql_query($sql,$con);
 	if(mysql_num_rows($res)>0)
	{
		 while($fila=mysql_fetch_array($res))
		 {
			 $id=$fila['id'];
		 }
 	}
	$sql="select desde_hora,hasta_hora,dias from sucursales_personal where personal_id ='".$id."'  and estado_registro = 'VIGENTE' and sucursales_id=".$id_sucursal[0]." and desde_hora='".$desde."' and hasta_hora='".$hasta."' and dias is not null";
//echo $sql;
//$aux=explode(":",$desde);
//$thrs_p1=$aux[0];
//$tmin_p1=$aux[1];
//$aux=explode(":",$hasta);
//$thrs_p2=$aux[0];
//$tmin_p2=$aux[1];
//$hora1 = date("G:i",mktime($thrs_p1,$tmin_p1,0));
//$hora2 = date("G:i",mktime($thrs_p2,$tmin_p2,0));
//$hora_final = date("G:i",$hora2 - $hora1); 
//echo "<br>".$hora1;
//echo "<br>".$hora2;
//echo "<br>".$hora_final;
$hora_final= restar_horas ($desde,$hasta);
$horas=0;
$minutos=0;
$aux=explode(":",$hora_final);
$horas=intval($aux[0]);
$minutos=intval($aux[1]);
//echo $horas.'<br>';
//echo $minutos.'<br>';
if($minutos>0)
{
	$minutos=$minutos/60;	
}
//echo $minutos.'<br>';
$hora_final=$horas+$minutos;
//echo $hora_final.'<br>';
 	$res=mysql_query($sql,$con);
 	if(mysql_num_rows($res)>0)
	{
		$x=0;
		 while($fila=mysql_fetch_array($res))
		 {
			  	if(!empty($fila['dias']) and $fila['dias']!=='')
				{
			  	$matr[$x][0]=$fila['dias'];
				
			  	$x=$x+1;				  		  			  			  
				}
		 }
		
 	}
 }
$entre_semana=0;
$fin_semana=0;
$dias_asignados=explode(",",$matr[0][0]);
//for($ii=0;$ii<count($dias_asignados);$ii++)
//{
//	//echo $dias_asignados[$ii]."<br>";
//}
for($i=1;$i<=getUltimoDiaMes($ano, $mes);$i++)
{
	//echo "hola";
	$dia=jddayofweek ( cal_to_jd(CAL_GREGORIAN, $mes,$i, $ano) , 0 );
	if($dia<6 and $dia>0)
	{
		for($ii=0;$ii<count($dias_asignados);$ii++)
		{	
				if($dia==1 and $dias_asignados[$ii]=='Lun')
				{
					$entre_semana=$entre_semana+$hora_final;
				}
				if($dia==2 and $dias_asignados[$ii]=='Mar')
				{
					$entre_semana=$entre_semana+$hora_final;
				}
				if($dia==3 and $dias_asignados[$ii]=='Mie')
				{
					$entre_semana=$entre_semana+$hora_final;
				}
				if($dia==4 and $dias_asignados[$ii]=='Jue')
				{
					$entre_semana=$entre_semana+$hora_final;
				}
				if($dia==5 and $dias_asignados[$ii]=='Vie')
				{
					$entre_semana=$entre_semana+$hora_final;
				}
		}
		//$entre_semana=$entre_semana+1;
	}
	if($dia==6 )
	{
		for($ii=0;$ii<count($dias_asignados);$ii++)
		{
			if($dia==6 and $dias_asignados[$ii]=='Sab')
				{
					$fin_semana=$fin_semana+$hora_final;
				}
		}
	}
	
}
//echo $entre_semana."<br>";
//echo $fin_semana."<br>";
echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield2").value="'.$entre_semana.'";</script>';
echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield3").value="'.$fin_semana.'";</script>';
function getUltimoDiaMes($elAnio,$elMes) {
  return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
}
//$total_entre_semana=intval($horas_semanas/$entre_semana);
//$total_fin_semana=0;
//if($horas_sabados>0)
//{
//	$total_fin_semana=intval($horas_sabados/$fin_semana);
//}





 
