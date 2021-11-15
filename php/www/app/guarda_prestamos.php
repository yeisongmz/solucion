<?php session_start(); 
	date_default_timezone_set('America/Bahia');
 	include ("conexion/conectar.php");

if(isset($_POST['textfield3']) and isset($_POST['skills2']) and isset($_POST['skills3']) and isset($_POST['number']) and isset($_POST['number2']) and isset($_POST['number3']) and isset($_POST['textarea'])  )
{

						$Date = $_POST['textfield3'];
						$cant_cuotas=$_POST['number2'];
						$primera_cuota = $_POST['textfield3'];
						$monto = str_replace(".","",$_POST['number']);
						$interes = $_POST['number3'];
						$cuota =0;
						$ban=0;
						if($interes=='' or $interes==0)
						{
							$cuota = $monto/$cant_cuotas;
						}
						else
						{
							$cuota = (($monto*$interes)/100);	
							$cuota = round(intval(($cuota+$monto)/$cant_cuotas));	
						}
						$buscado= explode(',',$_POST['skills2']);
						$query2=mysql_query("SELECT id FROM personal WHERE apellidos = '".$buscado[0]."' and nombres='".$buscado[1]."' and estado = 1" );
					
						$id_personal='';
						while($query4=mysql_fetch_array($query2))
						{
							$id_personal= $query4['id'];
							
						}
					
						$buscado= $_POST['skills3'];
						$query2=mysql_query("SELECT id FROM conceptos WHERE concepto = '".$buscado."'  " );
						$id_concepto='';
						while($query4=mysql_fetch_array($query2))
						{
							$id_concepto= $query4['id'];
							
						}
						$creador=$_SESSION["user"];
						$fe_ultmodi=date('Y-m-d G:i:s');
						$fe = explode("-", $_POST['textfield']);
						$fecha = $fe[2]."-".$fe[1]."-".$fe[0];						
						$motivo= $_POST['textarea'];
						$pri= explode("-", $_POST['textfield3']);
						$primera=  $pri[2]."-".$pri[1]."-".$pri[0];	
if($id_personal!=='' and $id_concepto!=='')
{						
						$query2="INSERT INTO prestamos(personal_id,fecha,monto,plazo,interes,idconcepto,motivo,fe_pricuota,creador,fe_ultmodi)  VALUES('".$id_personal."','".$fecha."','".$monto."','".$cant_cuotas."','".$interes."','".$id_concepto."','".$motivo."','".$primera."','".$creador."','".$fe_ultmodi."')";
						
						$resultado = mysql_query($query2);
						$query2=mysql_query("SELECT id FROM prestamos WHERE personal_id = '".$id_personal."' and plazo='".$cant_cuotas."' and monto='".$monto."' and motivo='".$motivo."' and fecha='".$fecha."' and fe_pricuota='".$primera."'   " );
						$id_prestamo='';
						while($query4=mysql_fetch_array($query2))
						{
							$id_prestamo= $query4['id'];
						}
						
						$query2="INSERT INTO cuotas(prestamos_id,numero,monto,estado,fevtocuota,creador,fe_ultmodi)  VALUES('".$id_prestamo."','1','".$cuota."','Pendiente','".$primera."','".$creador."','".$fe_ultmodi."')";
						
						$resultado = mysql_query($query2);
						$num=0;
						$venci='';
						$vencimiento='';
						for($a=1;$a<$cant_cuotas;$a++)
						{
							$vencimiento = date('Y-m-d', strtotime($Date. ' + '.$a.' months'));
							$num =$a+1;
							$query2="INSERT INTO cuotas(prestamos_id,numero,monto,estado,fevtocuota,creador,fe_ultmodi)  VALUES('".$id_prestamo."','".$num."','".$cuota."','Pendiente','".$vencimiento."','".$creador."','".$fe_ultmodi."')";
							$resultado = mysql_query($query2);
						}
}
						mysql_close($con);	

}
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_prestamos.php");</script>'; 