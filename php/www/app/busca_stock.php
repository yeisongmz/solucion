<?php include ("conexion/conectar.php");
$q='';
$q2='';
$id ='';
$id2='';
$cant='';

if (isset($_GET['q']))
{
	 $q=$_GET['q'];
	 $q2=$_GET['q2'];
}
if ($q<>'')
{
 	

 	$q=$_GET['q'];
 		$sql="select id from equipos where descrip = '".$q."' ";
		$res=mysql_query($sql,$con);
		 while($fila=mysql_fetch_array($res))// *** equipo       
		 { 
			$id=$fila['id'];
		 }

		 $sql="select id from ubicacion_dep where ubicacion = '".$q2."' ";
		 $res=mysql_query($sql,$con);

		 while($fila=mysql_fetch_array($res))// *** deposito       
		 { 
			$id2=$fila['id'];
		 }
		 
		 $sql="select cantidad from stock where ubicacion_dep_id = '".$id2."' and equipos_id='".$id."' ";
		 $res=mysql_query($sql,$con);

		 while($fila=mysql_fetch_array($res))// *** stok       
		 { 
			$cant=$fila['cantidad'];
		 }
if (mysql_num_rows($res)>0)
{
		 echo "<script type='text/javascript'> parent.document.getElementById('textfield2').value = ".$cant."; </script>";}
		 else
		 {
			 
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield2').value =''; </script>";
			 } 
		 }
//parent.document.getElementById("textfield2").value =;


 









?>