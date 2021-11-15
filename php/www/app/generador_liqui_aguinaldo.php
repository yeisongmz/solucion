 <?php if(session_id()=='') session_start();
 include ("conexion/conectar.php");

 $funcionario='';
 $salario='';
 $gratificaciones=0;
 $acumulado='';
 $id_personal=0;
 $total_gral=0;
 $sub_total1=0;
 $sub_total2=0;
 $sub_total3=0;
 $sub_total4=0;
 $id_liquidacion=0;
 $ano=$_POST['textfield6'];
 
 $creador = $_SESSION["user"];	
 $fe_ultmodi=date($ano.'-m-d');
  $fe_ultmodi2=date('Y-m-d');
 $total_a_cobrar=str_replace('.','',$_POST['textfield12']);
 $total_salarios=str_replace('.','',$_POST['textfield4']);
 $total_adelantos=str_replace('.','',$_POST['textfield9']);
 $personal=explode(',',$_POST['personal']);
	$sql="select id,sueldoreal from personal where nombres='".trim($personal[1])."' and apellidos='".trim($personal[0])."'   and estado = 1 " ;
	
	$res=mysql_query($sql,$con)or die('Tabla personal : '.$query2 . mysql_error());;
 while($fila=mysql_fetch_array($res))
		{
		  $id_personal=$fila['id'];
		  $salario=$fila['sueldoreal'];
		}

 ////**************************************************  REGISTRO EN TABLA LIQUIREGULAR  *********************************************************
 $query2="INSERT INTO liquiregular(personal_id,fecha,desde,hasta,totalPagar,canhorastraba,creador,fe_ultmodi)  VALUES('".$id_personal."','".$fe_ultmodi."','".$fe_ultmodi."','".$fe_ultmodi."','".$total_salarios."','0','".$creador."','".$fe_ultmodi2."')";
$resultado = mysql_query($query2)or die('Tabla liquiregular : '.$query2 . mysql_error());;
$sql="select id from liquiregular where personal_id='".$id_personal."' and fecha='".$fe_ultmodi."'  ";	
 $res=mysql_query($sql,$con)or die('Tabla liquiregular : '.$sql . mysql_error());;
 while($fila=mysql_fetch_array($res)){
	 $id_liquidacion=$fila['id'];
 }

					
					$query2="insert into liquidetalle(Conceptos_id,Liquiregular_id,importe,tipo,concepto,creador,fe_ultmodi) values('0','".$id_liquidacion."','".str_replace('.','',$total_adelantos)."','Egreso','ADELANTOS','".$creador."','".$fe_ultmodi."')";
					$res2=mysql_query($query2,$con)or die('Tabla liquidetalle : '.$query2 . mysql_error());;
					
					$sql="update adelantos set liquiregular_id='".$id_liquidacion."' where personal_id='".$id_personal."' and year(date(fecha))='".$ano."'   and (liquiregular_id is null or liquiregular_id=0)";
				
					$res2=mysql_query($sql,$con)or die('Tabla adelantos : '.$sql . mysql_error());;
					
	

	
		mysql_close($con);									
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_liquidaciones_aguinaldo.php");</script>'; 									
?>