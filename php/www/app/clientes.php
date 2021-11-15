<?php date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");
$nombre='';
$ruc='';
$dire='';
$telefono='';
$celular='';
$rubro='';
$pagina='';
$correo='';
$contacto1='';
$contacto2='';
$total_cobro='';
$id='';
if (isset($_GET['id']))
{
	$id = $_GET['id'];
	
	$query2="select * from cliente where id='".$id."'";
	$res=mysql_query($query2,$con);

 if(mysql_num_rows($res)>0)
 {
		 while($fila=mysql_fetch_array($res))
		 {
		    $nombre = $fila['razon'];
			$ruc = $fila['ruc'];
			$dire = $fila['direccion'];
			$telefono = $fila['telefono'];
			$celular = $fila['telMovil'];
			$rubro = $fila['rubro'];
			$pagina = $fila['website'];
			$correo = $fila['email'];
			$contacto1 = $fila['contacto1'];
			$contacto2 = $fila['contacto2'];
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
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript">
	function enviar()
	{if (document.getElementById("textfield").value!='' && document.getElementById("textfield2").value!='' && document.getElementById("textfield3").value!='' && document.getElementById("number").value!='')
	  {
		document.getElementById('form1').submit();	
	  }
	  else
	  {
		alert('Complete los campos obligatorios para guardar el registro')  
	  }
	}
	function enviarADJUNTO()
  {
	  if (document.getElementById("textfield6").value!='' && document.getElementById("textfield").value!='')
	  {
	 	document.getElementById('cierre').click();
	  	document.getElementById("form1").submit();
	  }
	  else
	  {
		alert('Escriba el nombre del archivo y el nombre del equipo para guardar');  
	  }
  }
  function cargar2(valor,sucursal)
		{
			
			document.getElementById('textfield7').value= valor+'--';
			document.getElementById('textfield8').value= sucursal+'--';
			//limpiarText20(valor,sucursal);
		}
function eliminar()
	{
			if(document.getElementById('textfield7').value!='')
			{
				var retVal = confirm("Esta seguro de querer eliminar el Registro ?");
               if( retVal == true ){
					location = 'guarda_elimina_sucursales2.php?opc2=E&id='+document.getElementById('textfield7').value+'&opc=M&id_cliente='+document.getElementById('textfield6').value+'&deposito='+document.getElementById('textfield8').value;
                  //return true;
               }
			}
	}		
</script>

</head>

<body>
<form id="form1" name="form1" enctype='multipart/form-data'  method="post" action="guarda_clientes2.php">
<div class="polaroid5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1" >
    <tbody>
      <tr>
        <td height="44" colspan="3" align="center" class="fondo_encabezado" ><span class="titulo2" >Creación de Clientes</span></td>
      </tr>
      <tr>
        <td width="27%" height="37" class="eiquetas">Nombre o Razón Social*</td>
        <td colspan="2" class="eiquetas"><input name="textfield" type="text" autofocus id="textfield" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield2')" value="<?php echo $nombre;?>" size="50" maxlength="100"></td>
        </tr>
      <tr>
        <td height="35" class="eiquetas">Ruc*</td>
        <td width="41%" class="eiquetas"><input name="textfield2" type="text" id="textfield2" maxlength="20" onKeyUp="return teclaGRAL(this, event,'textfield3')" value="<?php echo $ruc;?>" autocomplete="off"></td>
        <td width="32%"><input name="textfield6" type="text" id="textfield6" style="visibility:hidden" value="<?php echo $id;?>" size="2" readonly>
          <span class="eiquetas">
          <input name="textfield5" type="text" id="textfield5" style="visibility:hidden" value="<?php echo $_GET['opc'];?>" size="2" readonly>
          </span></td>
      </tr>
      <tr>
        <td height="31" class="eiquetas">Dirección*</td>
        <td colspan="2" class="eiquetas"><input name="textfield3" type="text" id="textfield3" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'number')" value="<?php echo $dire;?>" size="50" maxlength="80"></td>
        </tr>
      <tr>
        <td height="33" class="eiquetas">Tel&eacute;fono*</td>
        <td class="eiquetas"><input name="number" type="text" id="number" maxlength="20" onKeyUp="return teclaGRAL(this, event,'number2')" value="<?php echo $telefono;?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33" class="eiquetas">Tel&eacute;fono Movil</td>
        <td class="eiquetas"><input name="number2" type="text" id="number2" maxlength="20" onKeyUp="return teclaGRAL(this, event,'number3')" value="<?php echo $celular ;?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="33" class="eiquetas">Rubro</td>
        <td class="eiquetas"><input name="number3" type="text" id="number3" maxlength="20" onKeyUp="return teclaGRAL(this, event,'number4')" value="<?php echo $rubro;?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="33" class="eiquetas">Web Site (Pagina Web)</td>
        <td class="eiquetas"><input name="number4" type="text" id="number4" maxlength="50" onKeyUp="return teclaGRAL(this, event,'number5')" value="<?php echo $pagina;?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td height="33" class="eiquetas">Email</td>
        <td colspan="2" class="eiquetas"><input name="number5" type="text" id="number5" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'number6')" value="<?php echo $correo;?>" size="50" maxlength="80"></td>
        </tr>
      <tr>
        <td height="33" class="eiquetas">Contacto 1</td>
        <td class="eiquetas"><input name="number6" type="text" id="number6" maxlength="30" onKeyUp="return teclaGRAL(this, event,'textfield4')" value="<?php echo $contacto1;?>" autocomplete="off"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31" class="eiquetas">Contacto 2</td>
        <td class="eiquetas"><input name="textfield4" type="text" id="textfield4" maxlength="30" value="<?php echo $contacto2;?>" autocomplete="off" onKeyUp="return teclaGRAL(this, event,'textfield9')"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31" class="eiquetas"><p>Total a facturar al cliente*</p></td>
        <td class="eiquetas">
          <input type="text" name="textfield9" id="textfield9" value="<?php echo $total_cobro;?>" onKeyUp="format(this);" autocomplete="off" onChange="format(this);"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="35" class="eiquetas">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" valign="bottom"><input type="button" name="button" id="button" value="Guardar" class="boton3" onClick="enviar();" ></td>
      </tr>
      <tr>
        <td height="15" class="eiquetas"></td>
        <td></td>
        <td align="right" valign="bottom"></td>
      </tr>
       <tr  >
        <td height="42" colspan="3" align="center" class="fondo_encabezado" >Sucursales</td>
        </tr>
       <tr>
        <td height="34" colspan="3" align="right" class="eiquetas"><input name="textfield7" type="text" id="textfield7" style="visibility:hidden" size="4" readonly  >
          <input name="textfield8" type="text" id="textfield8" style="visibility:hidden" size="4" >
          <input name="button3" type="button" class="boton3" id="button3" value="Agregar Sucursal" onClick="location = 'sucursal_cliente.php?opc=A&cli='+document.getElementById('textfield').value+'&id='+document.getElementById('textfield6').value " style="visibility:hidden" >
          <input name="button5" type="button" class="boton3" id="button5" value="Editar Sucursal" style="visibility:hidden" onClick="location = 'sucursal_cliente.php?opc=M&cli='+document.getElementById('textfield').value+'&id='+document.getElementById('textfield6').value+'&id_sucursal='+document.getElementById('textfield7').value ">
          <input name="button4" type="button" class="boton3" id="button4" value="Eliminar Sucursal" style="visibility:hidden" onClick="eliminar()" >&nbsp;</td>
        </tr>
       <tr>
        <td height="180" colspan="3" valign="top" class="eiquetas"><iframe width="100%" height="100%"  id="detalle2" style="border:none" src="" name="detalle2" ></iframe>&nbsp;</td>
        </tr>
     
      <tr >
        <td height="52" colspan="2" align="right" class="fondo_encabezado" >Documentos Adjuntos</td>
        <td height="52" align="right" class="fondo_encabezado"><a href="#openModal">
<img border="0"   src="images/agregar.ico" width="0" height="0" id="agregador" style="visibility:hidden"></a></td>
        </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
         <td colspan="3"><iframe height="200px" width="100%" src="" id="detalle" style="border:none" ></iframe></td>
       </tr>
       <tr height="70">
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td align="right">&nbsp;</td>
       </tr>
    </tbody>
  </table>
  </div>
  <div id="openModal" class="modalDialog">
	<div >
		<a href="#close"  title="Cerrar" id="cierre" class="close">X</a>
		<div class="modal-header">
      
      <h2>Adjuntar Documentos</h2>
    </div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1"  >
    <tbody>
    <tr>
        <td height="56" class="eiquetas">&nbsp;Fecha Documento</td>
        <td style="color:#EB1115"><input type="text" name="textfield7052" id="textfield7052" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7052,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="33%" height="36" class="eiquetas">&nbsp;Vigente Desde
        <div id="testDIV">
    <div class="container">
        <div class="hero-unit"></div>
    </div>
</div>
        </td>
        <td width="64%" style="color:#EB1115"><input name="textfield7050" type="text" id="textfield7050" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield7050,'dd-mm-yyyy',this)">
        
        </td>
       <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="56" class="eiquetas">&nbsp;Vigente Hasta</td>
        <td style="color:#EB1115"><input type="text" name="textfield7051" id="textfield7051" size="10" readonly value="<?php echo date("d-m-Y"); ?>"><input type="button" class="boton_calendario"  onclick="displayCalendar(document.forms[0].textfield7051,'dd-mm-yyyy',this)"></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="40" class="eiquetas">Ref</td>
        <td><input name="textfield20" type="text" id="textfield20" size="40"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
      	<td height="40" class="eiquetas">&nbsp;</td>
		<td><label for="textfield20">:</label></td>
      	<td>&nbsp;</td>        
      </tr>
      <tr>
        <td height="40" colspan="3">&nbsp;
          <p>
            <input name='uploadedfile' type='file' class="" value="" title="LOla" />
          </p>
          <p>*Longitud max. de nombre de archivo: 25 caracteres            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="3%">&nbsp;</td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="button2" type="button" class="boton3" id="button2" value="Adjuntar" onclick="enviarADJUNTO()"></td>
        <td>&nbsp;</td>
        
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>&nbsp;</td>
        
      </tr>
    </tbody>
  </table>
  </div>
  </div>
  <script type="text/javascript">
  	if(document.getElementById("textfield5").value=="M")
	{
		 document.getElementById("agregador").width="30";
		document.getElementById("agregador").height="30";
						 
		document.getElementById("agregador").style.visibility="visible";
		document.getElementById("button3").style.visibility="visible";		
		document.getElementById("button4").style.visibility="visible";				
		document.getElementById("button5").style.visibility="visible";
		document.getElementById('detalle').src = 'documentos_clientes_iframe.php?id=' + document.getElementById("textfield6").value;
		document.getElementById("detalle2").src='sucursales_iframe.php?q=' + document.getElementById("textfield6").value;

		
	}
  </script>
</form>
</body>
<script type="text/javascript">
</script>
</html>
<?php

 //include ("conexion/conectar.php");?>
<?php 
//
//date_default_timezone_set('America/Bahia');
//if (isset($_POST['textfield5']))
//{
//				$opcion = $_POST['textfield5'];
//				$razon =trim($_POST['textfield']);
//				$direccion = trim($_POST['textfield3']);
//				$telefono = trim($_POST['number']);
//				$telmovil =  trim($_POST['number2']);
//				$website = trim($_POST['number4']);
//				$email = trim($_POST['number5']);
//				$contacto1 =trim($_POST['number6']);
//				$contacto2 =trim($_POST['textfield4']);
//				$ruc = trim($_POST['textfield2']);
//				$creador = $_SESSION["user"];	
//				$rubro = trim($_POST['number3']);			
//				$fe_ultmodi = date('Y-m-d G:i:s');	
//					/// *********  grabacion del registro
//if ($opcion=="A")
//{									
//$query3="insert into cliente(razon,direccion,telefono,telmovil,website,email,contacto1,contacto2,ruc,creador,rubro,fe_ultmodi)   values('".strtoupper($razon)."','".$direccion."','".$telefono."','".$telmovil."','".$website."','".$email."','".$contacto1."','".$contacto2."','".$ruc."','".$creador."','".$rubro."','".$fe_ultmodi."')";
//
//									$resultado = mysql_query($query3);
//									
//									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_clientes.php");<script>'; 
//}
//if ($opcion=="M")
//{
//	if ($_POST['textfield20']==''   and empty ($_FILES['uploadedfile']['name']))
//{
//	$id = explode("--",$_POST['textfield6']);  
//	
//	$query3="update cliente set razon='".strtoupper($razon)."',direccion='".$direccion."',telefono='".$telefono."',telmovil='".$telmovil."',website='".$website."',email='".$email."',contacto1='".$contacto1."',contacto2='".$contacto2."',ruc='".$ruc."',creador='".$creador."',rubro='".$rubro."',fe_ultmodi='".$fe_ultmodi."'  where id ='".$id[0]."'";
//
//									$resultado = mysql_query($query3);
//									//echo $query3;
//									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_clientes.php");<script>'; 
//}
//
////              **************** ADJUNTOS   *****************
//if (isset($_POST['textfield20']) and !empty($_FILES['uploadedfile']['name']))
//{
//	
//			date_default_timezone_set('America/Bahia');
//			$a =  explode(".",$_FILES['uploadedfile']['name']);
//			$nombre_archivo = "documentos/".$a[0].str_replace(":","",date('YmdGis')).".".$a[1];
//			if(strlen($nombre_archivo)<50)
//			{
//				 if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],$nombre_archivo) )
//				{ 
//					
//					$cliente = explode("--",$_POST['textfield6']);
//					$cliente_id = $cliente[0];
//					$referencia = $_POST['textfield20'];
//					$relacion = "CLIENTE";
//					$fecha_doc = explode("-",$_POST['textfield7052']);
//					$fecha =  explode("-",$_POST['textfield7050']);
//					$fecha_vto = explode("-",$_POST['textfield7051']);
//					$fecha_doc2 = $fecha_doc[2]."-".$fecha_doc[1]."-".$fecha_doc[0];
//					$fecha2 =  $fecha[2]."-".$fecha[1]."-".$fecha[0];
//					$fecha_vto2 = $fecha_vto[2]."-".$fecha_vto[1]."-".$fecha_vto[0];
//					$nom_archivo =$a[0].str_replace(":","",date('YmdGis')).".".$a[1];
//					$ruta =$nombre_archivo;
//					$creador=$_SESSION["user"];
//					$fe_ultmodi=date('Y-m-d G:i:s');
//					$query2="INSERT INTO adjuntos(equipos_id,personal_id,cliente_id,referencia,relacion,fecha_vto,fecha,fecha_doc,nom_archivo,path_archivo,creador,fe_ultmodi)  VALUES('0','0','".$cliente_id."','".$referencia."','".$relacion."','".$fecha_vto2."','".$fecha2."','".$fecha_doc2."','".$nom_archivo."','".$ruta."','".$creador."','".$fe_ultmodi."')";
//					//echo $query2;
//									$resultado = mysql_query($query2);
////									
//					echo "<span style='color:green;'>El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido</span><br>";
//					
//				}
//				else
//				{
//					echo "Ha ocurrido un error, trate de nuevo!";
//				} 
//				
//			}
//			else
//			{
//					echo "<span style='color:red;'>El archivo ". basename( $_FILES['uploadedfile']['name']). " NO ha sido subido, la longitud del nombre debe ser menor</span><br>";					
//			}
//			
//	}
//}	
//}
?>