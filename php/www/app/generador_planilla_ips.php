<?php session_start();
include ("conexion/conectar.php");
$razon='';
$direccion='';
$ruc='';
$total_trabajadores=0;
$total_salario=0;
$mat=array();
$filas=0;
$razon='';
$dir='';
$ruc='';
$patronal='';
$x=explode("-",$_GET['fecha']);
$fecha=$x[2]."-".$x[1]."-".$x[0];
$x=explode("-",$_GET['hasta']);
$hasta=$x[2]."-".$x[1]."-".$x[0];
$ano=$x[2];
$mes=$x[1];
$fe_ultmodi=date('Y-m-d');
$referencia=$_GET['referencia'];
$creador=$_SESSION["user"];
$id='';
			$query2="select * from parametros" ;
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$razon=$query4['cliente'];
					$dir=$query4['direccion'];
					$ruc=$query4['RUC'];
					$patronal=$query4['nropatronal_ips'];
				}
$query2="select id,nombres,apellidos,nro_docum,nro_asegurado,importeIPS,sueldoreal,tipotraba from personal where estado = 1 and aporta_ips='S' order by apellidos" ;

					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							$mat[$filas][0] = $query4['id'];
							$mat[$filas][1] = $query4['apellidos'];
							$mat[$filas][2] = $query4['nombres'];
							$mat[$filas][3] = $query4['nro_docum'];
							$mat[$filas][4] = $query4['nro_asegurado'];	
							$mat[$filas][5] = $query4['importeIPS'];
							$mat[$filas][6] = $query4['sueldoreal'];
							$mat[$filas][7] = '0';
							if($query4['tipotraba']=='J')
							{
								$mat[$filas][8] = '18';
							}
							else
							{
								$mat[$filas][8] = '30';	
							}
							$total_salario=$total_salario+$query4['importeIPS'];
							$filas=$filas+1;
						}
$total_trabajadores=$filas;						
for($i=0;$i<count($mat);$i++)
{
$query2="SELECT COUNT(*) AS dias,fecha FROM ausencias WHERE personal_id=".$mat[$i][0]." AND fecha>='".$fecha."' AND fecha<='".$hasta."'  GROUP BY DAY(fecha)";

$res=mysql_query($query2,$con);
		
			$mat[$i][7]=mysql_num_rows($res);//dias NO trabajados
		
}
$query2="insert into planillasueldoips(mes,ano,creado,fe_ultmodi,Referencia) values('".$mes."','".$ano."','".$creador."','".$fe_ultmodi."','".$referencia."')";

$res=mysql_query($query2,$con);

$query2="select id from planillasueldoips where  ano='".$ano."' and mes='".$mes."'" ;

					$res=mysql_query($query2,$con);
					while($query4 = mysql_fetch_array($res) )
						{
							$id=$query4['id'];
						}
$fila=0;					
for($i=0;$i<count($mat);$i++)
{
	$fila=$i+1;
	if($mat[$i][6]=='')
	{
		$mat[$i][6]=0;	
	}
$query2="insert into personal_planillasueldoips(personal_id,PlanillaSueldoIPS_id,orden,nrodocumento,nroasegurado,nombre,apellido,diastrabajados,sal_imponible,sal_real,mesAA,creador,fe_ultmodi,tipotraba) values('".$mat[$i][0]."','".$id."','".$fila."','".$mat[$i][3]."','".$mat[$i][4]."','".$mat[$i][2]."','".$mat[$i][1]."','".$mat[$i][7]."','".$mat[$i][5]."','".$mat[$i][6]."','".$mes."','".$creador."','".$fe_ultmodi."','".$mat[$i][8]."')";
$res=mysql_query($query2,$con);

	
	
}						
						
mysql_close($con);
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_planilla_ips.php");</script>>'; 
?>