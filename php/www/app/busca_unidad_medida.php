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
 		$sql="select unidadMedida from equipos where descrip = '".$q."' ";
		echo $sql;
		$res=mysql_query($sql,$con);
		 while($fila=mysql_fetch_array($res))// *** equipo       
		 { 
			$id=$fila['unidadMedida'];
		 }

		 
if (mysql_num_rows($res)>0)
{
	echo $id;
		 echo "<script type='text/javascript'> parent.document.getElementById('textfield7').value = '".utf8_encode($id)."'; </script>";}
		 else
		 {
			 
			 echo "<script type='text/javascript'> parent.document.getElementById('textfield7').value =''; </script>";
			 } 
		 }