<?php session_start();
include ("conexion/conectar.php");
$opc='';
if(isset($_GET['opc']))
{
$opc = $_GET['opc'];
}
$id='';

if(isset($_GET['id']))
{
	$id = $_GET['id'];	
}
$cliente = '';
if(isset($_GET['cli']))
{

 $cliente =  $_GET['cli'];
}
 $razon='';
 $direccion='';
 $telefono='';
 $correo='';
 $celular='';
 $correo2='';
 $pago='';
 $tipo='';
 $id_sucursal='';
 $total_cobro= '';
 $total_cobro1= '';
if($opc=='M')
{
	$id_sucursal =explode("--", $_GET['id_sucursal']);
	
	$query2="select * from sucursales where id='".$id_sucursal[0]."'";

	$res=mysql_query($query2,$con);

 if(mysql_num_rows($res)>0)
 {
		 while($fila=mysql_fetch_array($res))
		 {
			 $razon=$fila['razon_sucursal'];
			 $direccion=$fila['direccion'];
			 $telefono=$fila['telefono'];
			 $correo=$fila['email'];
			 $celular=$fila['telMovil'];
			 $correo2=$fila['email_2'];
			 $pago=$fila['pagomaximo'];
			 $tipo=$fila['tipolocal'];
		     $total_cobro= $fila['TotalCobro'];
			
		 }
 }
	
	
	
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script src="js/funciones.js"></script>
<script type="text/javascript">
function enviar()
	{
		if (document.getElementById("textfield3").value=='' || document.getElementById("textfield9").value=='')
		{
			alert('Complete los Campos Obligatorios');	
		}
		else
		{
			document.getElementById('form1').submit();	
		}
	}
</script>
</head>

<body>
<form name="form1" method="post" id="form1" action="sucursal_cliente.php">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr class="fondo_encabezado">
        <td height="46" colspan="3" align="center"><span class="titulo2">Sucursales de Clientes</span></td>
      </tr>
      <tr class="eiquetas">
        <td height="42" colspan="3" align="center"><input name="textfield" type="text" id="textfield" size="50" value="<?php echo $cliente;?>" readonly style="color:#0A0664; background-color:#B8B4B4; font-size:20px; text-align:center; border:none"></td>
      </tr>
      <tr class="eiquetas" style="visibility:hidden">
        <td height="42" colspan="3" align="left">&nbsp;Cod.Sucursal:
          <input name="textfield13" type="text" id="textfield13" style="color:rgba(228,10,13,1.00); font-size:15; font-weight:bold; background-color:rgba(184,180,180,1.00)" size="8" readonly value="<?php echo $id; ?>">
          <input name="textfield12" type="text" id="textfield12" size="1" value="<?php echo $id;?>" readonly style="visibility:hidden">
          <input name="textfield11" type="text" id="textfield11" size="1" value="<?php echo $opc;?>" readonly   style="visibility:hidden" >
          <input name="textfield2" type="text" id="textfield2" size="1" readonly value="<?php echo $id_sucursal[0];?>" style="visibility:hidden"></td>
      </tr>
      
      <tr class="eiquetas">
        <td height="37">&nbsp;Raz&oacute;n Sucursal*</td>
        <td colspan="2" align="left"><input name="textfield3" type="text" autofocus id="textfield3" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield4')" value="<?php echo $razon;?>" size="50"  maxlength="100"></td>
        </tr>
      <tr class="eiquetas">
        <td height="38">&nbsp;Direcci&oacute;n</td>
        <td colspan="2" align="left"><input name="textfield4" type="text" id="textfield4" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield5')" value="<?php echo $direccion;?>" size="50" maxlength="80" ></td>
        </tr>
      <tr class="eiquetas">
        <td height="40">&nbsp;Tel&eacute;fono</td>
        <td align="left"><input name="textfield5" type="text" id="textfield5" maxlength="20" onKeyUp="return teclaGRAL(this, event,'textfield6')" value="<?php echo $telefono; ?>" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="38">&nbsp;Email</td>
        <td align="left"><input name="textfield6" type="text" id="textfield6" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield7')" value="<?php echo $correo;?>" size="30" maxlength="30" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="42">&nbsp;Celular</td>
        <td align="left"><input name="textfield7" type="text" id="textfield7" maxlength="20" onKeyUp="return teclaGRAL(this, event,'textfield8')" value="<?php echo $celular; ?>" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="41">&nbsp;Email 2</td>
        <td align="left"><input name="textfield8" type="text" id="textfield8" maxlength="40" onKeyUp="return teclaGRAL(this, event,'textfield9')" value="<?php echo $correo2; ?>" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="46">&nbsp;Pago M&aacute;ximo*</td>
        <td align="left"><input name="textfield9" type="text" id="textfield9" maxlength="10" onchange="format(this)"  onKeyUp="format(this);return teclaGRAL(this, event,'textfield10')" value="<?php echo $pago; ?>" autocomplete="off" ></td>
        <td>&nbsp;</td>
      </tr>
      
        
      <tr class="eiquetas">
        <td>Tipo Local</td>
        <td align="left"><input type="text" name="textfield10" id="textfield10" value="<?php echo $tipo; ?>" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield14')"></td>
        <td>&nbsp;</td>
      </tr>
      <tr class="eiquetas">
        <td height="39">Total a facturar al cliente</td>
        <td align="left">
          <input type="text" name="textfield14" id="textfield14" autocomplete="off"  onKeyUp="format(this);" onChange="format(this);" value="<?php echo $total_cobro; ?>"></td>
        <td>
          <input type="text" name="textfield15" id="textfield15" value="<?php echo $total_cobro; ?>" style="visibility:hidden"></td>
      </tr>
      <tr class="eiquetas">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input name="button" type="button" class="boton3" id="button"  value="Guardar" onClick="enviar();" ></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </div>

</form>
</body>

</html>
<?php 

if(isset($_POST['textfield11'])=='A' and isset($_POST['textfield3']) and isset($_POST['textfield9']))
{
	if($_POST['textfield11']=='A') 
	{
	
	include ("conexion/conectar.php");
	
	date_default_timezone_set('America/Bahia');
	$cliente = explode("--", $_POST['textfield12']);
 	$razon=$_POST['textfield3'];
 	$direccion=$_POST['textfield4'];
 	$telefono=$_POST['textfield5'];
 	$correo=$_POST['textfield6'];
 	$celular=$_POST['textfield7'];
 	$correo2=$_POST['textfield8'];
	$pago=0;
	if(!empty($_POST['textfield9']))
	{
 	$pago=str_replace(".","",$_POST['textfield9']);
	}
 	$tipo=$_POST['textfield10'];
	$creador = $_SESSION["user"];	
	$fe_ultmodi = date('Y-m-d G:i:s');	
	$total_cobro=0;
	if(!empty($_POST['textfield14']))
	{
		$total_cobro= str_replace(".","",$_POST['textfield14']);
	}
	$total_cobro1=$_POST['textfield15'];
$query3="insert into sucursales(cliente_id,razon_sucursal,direccion,telefono,email,telMovil,email_2,pagomaximo,creador,fe_ultmodi,tipolocal,TotalCobro)   values('".$cliente[0]."','".strtoupper($razon)."','".$direccion."','".$telefono."','".$correo."','".$celular."','".$correo2."','".$pago."','".$creador."','".$fe_ultmodi."','".$tipo."','".$total_cobro."')";
if($razon!=='')
{
									$resultado = mysql_query($query3);
}
$query3="insert into ubicacion_dep(ubicacion,creador,fe_ultmodi) values('".strtoupper($razon)."','".$creador."','".$fe_ultmodi."')";
if($razon!=='')
{
									$resultado = mysql_query($query3);
}
									$aux=0;
				$query2=mysql_query("SELECT SUM(TotalCobro) AS acumulado FROM sucursales where cliente_id='".$cliente[0]."' ");
				
				while($query4=mysql_fetch_array($query2))
				{
					$aux = $query4['acumulado'];
				}
					$query3="update cliente set TotalCobro=".$aux." where id='".$cliente[0]."'";	
					$resultado = mysql_query($query3);
				echo '<script type="text/javascript" language="javascript">window.location.replace("clientes.php?opc=M&id='.$_POST['textfield12'].'")</script>';
	}
}
if(isset($_POST['textfield11'])=='M' and isset($_POST['textfield3']) and isset($_POST['textfield9']))
{
	include ("conexion/conectar.php");
	
	date_default_timezone_set('America/Bahia');
	$cliente = explode("--", $_POST['textfield12']);
 	$razon=$_POST['textfield3'];
 	$direccion=$_POST['textfield4'];
 	$telefono=$_POST['textfield5'];
 	$correo=$_POST['textfield6'];
 	$celular=$_POST['textfield7'];
 	$correo2=$_POST['textfield8'];
 	$pago=0;
	if(!empty($_POST['textfield9']))
	{
 	$pago=str_replace(".","",$_POST['textfield9']);
	}
 	$tipo=$_POST['textfield10'];
	$creador = $_SESSION["user"];	
	$fe_ultmodi = date('Y-m-d G:i:s');	
	$id_sucursal = $_POST['textfield2'];
	$total_cobro=0;
	if(!empty($_POST['textfield14']))
	{
		$total_cobro= str_replace(".","",$_POST['textfield14']);
	}
	$nombre='';	
	$total_cobro1=$_POST['textfield15'];
							
						
						
	
$query3="update sucursales  set cliente_id='".$cliente[0]."',razon_sucursal='".$razon."',direccion='".$direccion."',telefono='".$telefono."',email='".$correo."',telMovil='".$celular."',email_2='".$correo2."',pagomaximo='".$pago."',creador='".$creador."',fe_ultmodi='".$fe_ultmodi."',tipolocal='".$tipo."',TotalCobro='".$total_cobro."' where id ='".$id_sucursal."' ";


$query2=mysql_query("select razon_sucursal from sucursales where id='".$id_sucursal."' ");
						while($query4=mysql_fetch_array($query2))
						{
							$nombre = $query4['razon_sucursal'];
						}
						$query2="UPDATE ubicacion_dep set ubicacion ='".strtoupper($razon)."' where ubicacion='".$nombre."' ";
									
					if($razon!=='')
{			
					$resultado = mysql_query($query2);
					$resultado = mysql_query($query3);
			
}
			$aux=0;
				$query2=mysql_query("SELECT SUM(TotalCobro) AS acumulado FROM sucursales where cliente_id='".$cliente[0]."' ");
				
				while($query4=mysql_fetch_array($query2))
				{
					$aux = $query4['acumulado'];
				}
					$query3="update cliente set TotalCobro=".$aux." where id='".$cliente[0]."'";
if($razon!=='')
{									
					$resultado = mysql_query($query3);
}
					echo '<script type="text/javascript" language="javascript">window.location.replace("clientes.php?opc=M&id='.$_POST['textfield12'].'")</script>'; 
}
?>