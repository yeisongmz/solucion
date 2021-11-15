<?php 
if( !empty($_POST["skills3"])  and !empty($_POST["textfield2"]) and !empty($_POST["textfield3"]) and !empty($_POST["textfield4"]) and !empty($_POST["textfield5"]) )
{
include ("conexion/conectar.php");
$personal= explode(",", $_POST["skills3"]);
$apellidos=$personal[1];
$nombres=$personal[0];
$cliente= explode("--", $_POST["textfield7"]);
$entrada=$_POST["textfield2"].":".$_POST["textfield3"];
$salida=$_POST["textfield4"].":".$_POST["textfield5"];
$horas=$_POST["textfield6"];
$x=explode("-",$_POST["textfield"]);
$fecha=$x[2]."-".$x[1]."-".$x[0];
$personal_id='';
$cliente_id=$_POST["textfield7"];
$sucursal_id=$_POST["textfield7"];
$dias=$_POST["textfield8"];
$ban=0;
$creador = $_SESSION["user"];				
$fe_ultmodi = date('Y-m-d ');	
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
//$query2="select cliente_id from sucursales where id='".$cliente[0]."' " ;
//
//					$res=mysql_query($query2,$con);
//						if(mysql_num_rows($res)==0)
//					{
//						echo "";
//						$ban=1;	
//					}
//					while($query4 = mysql_fetch_array($res) )
//						{
//							$cliente_id = $query4['cliente_id'];
//						}	
										
//************* VALIDACION *************************
				
						//$query2="SELECT id FROM sucursales_personal where sucursales_id='".$cliente_id."' and personal_id='".$personal_id."' and  desde_hora='".$entrada."' and hasta_hora='".$salida."' ";
//						$resultado = mysql_query($query2);
//						if(mysql_num_rows($resultado)>0)
//						{
//							
//							$ban=1;	
//						}
//						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$cliente_id."' and personal_id='".$personal_id."' and  desde_hora>='".$entrada."' and hasta_hora<='".$salida."' ";
//						
//						$resultado = mysql_query($query2);
//						if(mysql_num_rows($resultado)>0)
//						{
//						
//							$ban=1;	
//						}
//						
//						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$cliente_id."' and personal_id='".$personal_id."' and  desde_hora<='".$entrada."' and hasta_hora>='".$salida."' ";
//						
//						$resultado = mysql_query($query2);
//						if(mysql_num_rows($resultado)>0)
//						{
//						
//							$ban=1;	
//						}
//						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$cliente_id."' and personal_id='".$personal_id."' and  desde_hora<'".$entrada."' and hasta_hora<'".$salida."'  and hasta_hora>'".$entrada."' ";
//						$resultado = mysql_query($query2);
//						if(mysql_num_rows($resultado)>0)
//						{
//						
//							$ban=1;	
//						}
//						$query2="SELECT id FROM sucursales_personal where sucursales_id='".$cliente_id."' and personal_id='".$personal_id."' and  desde_hora>'".$entrada."' and hasta_hora>'".$salida."'  and desde_hora<'".$salida."' ";
//						$resultado = mysql_query($query2);
//						if(mysql_num_rows($resultado)>0)
//						{
//						
//							$ban=1;	
//						}

					//$res=mysql_query($query2,$con);
					//
						
						if($ban==1)
						{
						echo "<table width='100%'  border='1'  cellspacing='0' cellpadding='0' style='border-width:1px'  >";
						echo "<tbody>";
						echo "<tr  id='3000' style='border-width:1px'  >";
						echo "<td width='250' style='border-width:1px'>&nbsp;La asignacion de ".$apellidos.", ".$nombres."&nbsp;</td>"; 
						echo "<td width='250' bgcolor='#E40A0D'>&nbsp; en esa fecha, horario y cliente ya fue registrada  </td>";
										
						echo "</tr>";
						echo "</tbody>";
						echo "</table>";
						}
//***************************************************
//***************************************************

		if($ban==0)
		{				
$query3="update sucursales_personal set desdefecha='".$fecha."',fe_ultmodi='".$fe_ultmodi."',desde_hora='".$entrada."',hasta_hora='".$salida."',canthoras='".$horas."',dias='".$dias."' where personal_id='".$personal_id."' and sucursales_id='".$cliente[0]."' and estado_registro='VIGENTE'";
//echo $query3;
		$resultado = mysql_query($query3);
		echo '<script type="text/javascript" language="javascript">window.location.replace("fondo_logo.html");</script>';
		}
		
		mysql_close($con);

}
?>