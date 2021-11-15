<?php include ("conexion/conectar.php");include ("ajuste_horas.php");
$hora=hora('20.32');
//echo $hora;
$personal='';
$mes='';
$ano='';
$aux=array();
$aux[0]='';
$aux[1]='';
if(isset($_GET['personal']) and !empty($_GET['personal']))
{
	$aux=explode(',',$_GET['personal']);
	//$personal=$_GET['personal'];
}

if(isset($_GET['mes']) and !empty($_GET['mes']))
{
	$mes=$_GET['mes'];
}

if(isset($_GET['ano']) and !empty($_GET['ano']))
{
	$ano=$_GET['ano'];
}

try {
   $query2=mysql_query("SELECT id FROM personal where nombres='".trim($aux[0])."' and apellidos='".trim($aux[1])."' ");
while($query4=mysql_fetch_array($query2))
						{
							$personal=$query4['id'];
						}
} catch (Exception $e) {
    echo 'Seleccione personal,mes y año...';
}


$fila=0;
$fila1000=1000;
$fila2000=2000;
$fila3000=3000;
$fila4000=4000;
$fila5000=5000;
$fila6000=6000;
$query2=mysql_query("SELECT * FROM asistencia where personal_id='".$personal."' and mes='".$mes."' and ano='".$ano."' order by fecha_asistencia asc ");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<script type="text/javascript">
	function guardar()
	{
		var entrada='';	
		var salida='';
		var cantidad='';
		var diurnas='';
		var nocturnas='';
		var fechas='';
		var id='';
		for(i=1000;i<1500;i++)
		
		{
			try {
					entrada=entrada+document.getElementById(i).value+'&';
					salida=salida+document.getElementById(i+1000).value+'&';
					cantidad=cantidad+document.getElementById(i+2000).value+'&';
					diurnas=diurnas+document.getElementById(i+3000).value+'&';
					fechas=fechas+document.getElementById(i+4000).value+'&';
					id=id+document.getElementById(i+5000).value+'&';
					
					
				}
			catch(err) {
				//alert(err);
					//document.getElementById("demo").innerHTML = err.message;
				}
			
		}
		for(i=0;i<200;i++)
		{
			try {
					nocturnas=nocturnas+document.getElementById(i).value+'&';
					
				}
			catch(err) {
				
				//alert(err);
					//document.getElementById("demo").innerHTML = err.message;
				}
			
		}
	
		document.getElementById('textarea').value=entrada;
		document.getElementById('textarea2').value=salida;
		document.getElementById('textarea3').value=cantidad;
		document.getElementById('textarea4').value=diurnas;
		document.getElementById('textarea5').value=nocturnas;
		document.getElementById('textarea6').value=fechas;
		document.getElementById('textarea7').value=id;
		
		if(document.getElementById('textarea').value!=='' )
		{
			document.getElementById('form1').submit();
		}
		
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="guarda_asistencia_edicion.php">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
    <tr>
      <td align="left" class="fondo_encabezado2">Las horas diurnas se calculan automaticamente restandole las horas nocturnas a las horas trabajadas.</td>
      <td align="right"><input type="button" class="boton3" value="Guardar" onClick="guardar();"></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellpadding="0" class="tabla1">
  <tbody>
    <tr bgcolor="#C1AC7F">
     <td>&nbsp;</td>
      <td style="visibility:hidden"></td>
      <td>Entrada</td>
      <td>Salida</td>
      <td>Total Horas TRABAJADAS</td>
      <td>Hs.diurnas</td>
      <td>Hs.nocturnas</td>
    </tr>
    <?php while($query4=mysql_fetch_array($query2))
	{
		
		$query2b=mysql_query("SELECT  razon FROM cliente where id='".$query4['id_cliente']."' ");
		
		$a=null;$b=null;
		 while($query4b=mysql_fetch_array($query2b))
		 {
			 $a=$query4b['razon'];//$b=$query4b['razon_sucursal'];
		 }
		 $query2b=mysql_query("SELECT  razon_sucursal FROM sucursales where id='".$query4['id_sucursal']."' and cliente_id='".$query4['id_cliente']."' ");
		//echo "SELECT  razon_sucursal FROM sucursales where id='".$query4['id_sucursal']."' and cliente_id='$a' ";
		 while($query4b=mysql_fetch_array($query2b))
		 {
			 $b=$query4b['razon_sucursal'];
		 }
	?>
    <tr>
    <td><input type="text" id="<?php echo $fila6000;?>" style="visibility:hidden" autocomplete="off" value="<?php echo $query4['id'];?>" size="1" readonly></td>
      <td><input type="text"  id="<?php echo $fila5000;?>" style="border:none; visibility:hidden"  value="<?php 
	  $aux=explode('-',$query4['fecha_asistencia']);
	  echo $aux[2].'-'.$aux[1].'-'.$aux[0];?>" size="1" readonly ><input type="text" value="<?php echo $b.', '.$a;?>" readonly style="border:none"></td>
      <td><input type="text" id="<?php echo $fila1000;?>" autocomplete="off" value="<?php echo $query4['hs_entrada'];?>" readonly></td>
      <td><input type="text" id="<?php echo $fila2000;?>" autocomplete="off" value="<?php echo $query4['hs_salida'];?>" readonly></td>
      <td><input type="text" id="<?php echo $fila3000;?>" value="<?php 
	 $aux2=0;
	 //$aux=explode(".",$query4['horas_nocturnas']);
	 
	   		$aux2= $query4['horas_nocturnas'];
	  {
			//echo $aux[0];  
	  }
	 // $aux=explode(".",$query4['hs_cantidad']);
//	  if($aux[1]!=="00")
//	  {
	   		 echo $query4['hs_cantidad'];
	 // }
//	  else
//	  {
//			echo $aux[0];  
//	  }
	 
	  
	  ?>" autocomplete="off"></td>
      <td><input type="text" id="<?php echo $fila4000;?>" autocomplete="off" value="<?php 
	  $aux=number_format($query4['hs_cantidad']-$query4['horas_nocturnas'],'2','.','');
	  $aux2=explode(".",$aux);
	  if($aux2[1]!=='00')
	  {
	  	echo $aux;//$query4['hs_cantidad']-$query4['horas_nocturnas'];
	  }
	  else
	  {
		  echo $query4['hs_cantidad']-$query4['horas_nocturnas'];
	  }
	  
	  
	  ?>" readonly style="border:none"></td>
      <td align="center"><input type="text" id="<?php echo $fila;?>" value="<?php
	  
	  $aux=explode(".",$query4['horas_nocturnas']);
	  if($aux[1]!=="00")
	  {
	   		echo $query4['horas_nocturnas'];
	  }
	  else
	  {
			echo $aux[0];  
	  }
	   
	   ?>" size="4" maxlength="5" onKeyUp="return teclaGRAL(this, event,'<?php echo $fila+1;?>');" autocomplete="off" ></td>
    </tr>
    <?php 
	
	$fila=$fila+1;
	$fila1000=$fila1000+1;
	$fila2000=$fila2000+1;
	$fila3000=$fila3000+1;
	$fila4000=$fila4000+1;
	$fila5000=$fila5000+1;
	$fila6000=$fila6000+1;
	}?>
  </tbody>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
  <tbody>
    <tr>
      <td align="right"><input type="button" class="boton3" value="Guardar" onClick="guardar();"></td>
    </tr>
  </tbody>
</table>

<textarea name="textarea" id="textarea" style="visibility:hidden"></textarea>

<textarea name="textarea2" id="textarea2" style="visibility:hidden"></textarea>

<textarea name="textarea3" id="textarea3" style="visibility:hidden"></textarea>

<textarea name="textarea4" id="textarea4" style="visibility:hidden"></textarea>

<textarea name="textarea5" id="textarea5" style="visibility:hidden"></textarea>

<textarea name="textarea6" id="textarea6" style="visibility:hidden"></textarea>


<input type="text" name="textfield" id="textfield" value="<?php echo intval($personal);?>" style="visibility:hidden">

<input type="text" name="textfield2" id="textfield2"  value="<?php echo intval($mes);?>" style="visibility:hidden">

<input type="text" name="textfield3" id="textfield3"  value="<?php echo intval($ano);?>" style="visibility:hidden">

<textarea name="textarea7" id="textarea7"  style="visibility:hidden"></textarea>
</form>
</body>
</html>