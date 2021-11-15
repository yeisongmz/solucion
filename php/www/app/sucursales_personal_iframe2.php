<?php include ("conexion/conectar.php");
?>
<style type="text/css">
body {
	background-color: #FDFBFB;
}
</style>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<?php
$q='';
$x=0;
$sucursal='';
 $matr =array();
if (isset($_GET['q']))
{
	 $q=explode("," , $_GET['q']);
}
if (isset($_GET['sucursal']))
{
	 $sucursal= $_GET['sucursal'];
}


try 
{
if ($q<>'')
{
	$id='';

 

 if(count($q)>1)
 {
 	$sql="select id from personal where nombres ='".$q[0]."' and apellidos='".$q[1]."' and estado = 1 ";
	
 	$res=mysql_query($sql,$con);
 	if(mysql_num_rows($res)>0)
	{
		 while($fila=mysql_fetch_array($res))
		 {
			 $id=$fila['id'];
		 }
 	}
	$sql="select * from sucursales_personal where personal_id ='".$id."'  and estado_registro = 'VIGENTE' and sucursales_id='".$sucursal."' ";

 	$res=mysql_query($sql,$con);
 	if(mysql_num_rows($res)>0)
	{
		$x=0;
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox").checked=false;</script>';
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox2").checked=false;</script>';
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox3").checked=false;</script>';
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox4").checked=false;</script>';
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox5").checked=false;</script>';
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox6").checked=false;</script>';
		echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox7").checked=false;</script>';
		 while($fila=mysql_fetch_array($res))
		 {
			  	
				$aux=explode("-",$fila['desdefecha']);
			  	$matr[$x][1]=$aux[2]."-".$aux[1]."-".$aux[0];
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("number2").value="'.$aux[2].'";parent.document.getElementById("number3").value="'.$aux[1].'";parent.document.getElementById("number4").value="'.$aux[0].'"</script>';
				
				
				$aux=explode(":",$fila['desde_hora']);
			  	//$matr[$x][2]=$aux[2]."-".$aux[1]."-".$aux[0];
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield2").value="'.$aux[0].'";parent.document.getElementById("textfield3").value="'.$aux[1].'"</script>';
				
				$aux=explode(":",$fila['hasta_hora']);
			  	//$matr[$x][3]=$aux[2]."-".$aux[1]."-".$aux[0];
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield4").value="'.$aux[0].'";parent.document.getElementById("textfield5").value="'.$aux[1].'"</script>';
				
				
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield").value="'.$matr[$x][1].'";</script>';
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield8").value="'.$fila['dias'].'";</script>';
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("number").value="'.$fila['canthoras'].'";</script>';
				echo '<script type="text/javascript" language="javascript">parent.document.getElementById("textfield6").value="'.$fila['canthoras'].'";</script>';
				$aux=explode(",",$fila['dias']);
			  	for($i=0;$i<count($aux);$i++)
				{
					if($aux[$i]=='Lun')
					{
						
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox").checked=true;</script>';
					}
					if($aux[$i]=='Mar')
					{
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox2").checked=true;</script>';
					}
					if($aux[$i]=='Mie')
					{
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox3").checked=true;</script>';
					}
					if($aux[$i]=='Jue')
					{
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox4").checked=true;</script>';
					}
					if($aux[$i]=='Vie')
					{
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox5").checked=true;</script>';
					}
					if($aux[$i]=='Sab')
					{
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox6").checked=true;</script>';
					}
					if($aux[$i]=='Dom')
					{
						echo '<script type="text/javascript" language="javascript">parent.document.getElementById("checkbox7").checked=true;</script>';
					}
				}
				$x=$x+1;	
							  		  			  			  
		 }
		
 	}
 }
}


}
 catch(Exception $e) 
 {
   echo 'Message: ' .$e->getMessage();
 }

 