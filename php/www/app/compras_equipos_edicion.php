<?php include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
$id=0;$fila=0;
$proveedor=0;
if(isset($_GET['id']))
{
	$aux=explode("--",$_GET['id']);
	$aux2=explode(",",$aux[0]);
	$id	=$aux2[0];
	$proveedor=$aux2[1];
}


$query2=mysql_query("SELECT * FROM mov_equipo where com_nrofact='".$id."' and proveedor_id='".$proveedor."'");
	//echo "SELECT * FROM mov_equipo where com_nrofact='".$id."' and proveedor_id='".$proveedor."'";					
						$numero='';
						$proveedor=0;
						$destino=0;
						$fecha=0;
						$obs="";
						$total=0;
						while($query4=mysql_fetch_array($query2))
						{
							$numero = $query4['com_nrofact'];
							$proveedor=$query4['proveedor_id'];
							$destino=$query4['idubic_destino'];
							$total=$total+$query4['com_importe'];
							$aux=explode("-",$query4['fecha']);
							$fecha=$aux[2].'-'.$aux[1].'-'.$aux[0];
							$obs=$query4['obs'];
												
						}
$query2=mysql_query("SELECT nombre FROM proveedor where id='".$proveedor."'");
while($query4=mysql_fetch_array($query2))
	{
		$proveedor=$query4['nombre'];
	}
$query2=mysql_query("SELECT ubicacion FROM ubicacion_dep where id='".$destino."'");
while($query4=mysql_fetch_array($query2))
	{
		$destino=$query4['ubicacion'];
	}	
$query2=mysql_query("SELECT mov_equipo.*,equipos.`descrip` FROM mov_equipo,equipos WHERE mov_equipo.com_nrofact='".$id."' AND mov_equipo.`equipos_id`=equipos.`id`");
 				
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" lang="es">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/dhtmlgoodies_calendar.css">

<style type="text/css">
body {
	mitabla.style.border = "1px solid #000";
	
	
}
</style>

<script src="js/dhtmlgoodies_calendar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>

<script>

function buscar(field, event)
{
	
	
	 switch (event.keyCode) 
  		{
	
			case 13 :
				var strUser = document.getElementById("textfield18").value;
				document.getElementById('buscador').src='busca_pedidos.php?numero='+strUser;
		}
}

  $(function() {
    $( "#skills4" ).autocomplete({
		source:"search_general.php?v=PROVEEDOR",
		autoFocus:true
	});
  });
  
  $(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:false
	});
  });
  $(function() {
    $( "#skills2" ).autocomplete({
		source:"search_general.php?v=EQUIPOS",
		autoFocus:false
	});
  });
	
	function bajar3()
  {
	  
		var precio=document.getElementById('number3').value,producto=document.getElementById('skills2').value,cantidad=document.getElementById('number').value;
				
				if(precio==''||producto==''||cantidad=='')
				{
				}
				else
				{
					
				Creadora(cantidad,producto,precio);	  
				}	
	 
  
}

	function enviar(valor)
	{
		if(document.activeElement.name=='skills2')
		{
	document.getElementById("deta").src="buscador_gral.php?origen=compras&dato="+document.getElementById("skills2").value;
	document.getElementById("number").focus();
		}
	}
	function enviar2()
	{
		if(document.getElementById('skills4').value == ''  || document.getElementById('skills3').value == ''  || document.getElementById('number2').value == ''  )
		{
			alert('Complete los campos obligatorios');
		}
		else
		{
		 document.getElementById("form1").submit();	
		}
	}
function busca_tipo(field, event)
{
	switch (event.keyCode) {
			case 13 :
			
	document.getElementById("deta").src="buscador_gral.php?origen=compras&dato="+document.getElementById("skills2").value;
	document.getElementById("number").focus();
	}
}

function buscador_equipo()
{
	if(document.getElementById("skills4").value!=='' && document.getElementById("skills3").value!==''  && document.getElementById("skills2").value!=='' && document.getElementById("number2").value!=='')
	{
		
		document.getElementById("detalle3").src='crea_equipo_rapido.php?equipo='+document.getElementById("skills2").value+'&fecha='+document.getElementById("textfield").value;			
	}

}
			

	
  </script>
  
</head>

<body>


<form id="form1" name="form1" method="post" action="guarda_compra_equipos_edicion.php">
<div class="polaroid7">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla1">
    <tbody>
      <tr>
        <td height="45" colspan="5" align="center" class="fondo_encabezado"><span class="titulo2">Compra de Equipos e Insumos (edici&oacute;n)</span></td>
      </tr>
       <tr  bgcolor="#A8A4A4">
        <td width="18%" height="30" class="eiquetas">&nbsp;Proveedor*</td>
        <td width="26%"><div class="ui-widget">
  			<input autofocus id="skills4" placeholder="Ingrese Proveedor" size="30" name="skills4"  onKeyUp="return teclaGRAL(this, event,'skills3')"  value="<?php echo $proveedor;?>"  >
      	</div></td>
        <td width="23%" align="right"><span class="eiquetas">Destino*&nbsp;</span></td>
        <td colspan="2" align="right"><span class="ui-widget">
          <input autofocus id="skills3" placeholder="Ingrese Destino" size="28" style="width:200px; font-size:18px" name="skills3" onKeyUp="return teclaGRAL(this, event,'number2')" value="<?php Echo $destino;?>"></span>&nbsp;</td>
        
       </tr>
       <tr  bgcolor="#A8A4A4">
         <td height="28" valign="top" class="eiquetas">&nbsp;Fecha*</td>
         <td valign="top"><span class="ui-widget">
           <input name="textfield" type="text" id="textfield"  onChange="document.getElementById('number2').focus();" size="10" readonly value="<?php echo $fecha;?>" >
           <input type="button" class="boton_calendario" onclick="displayCalendar(document.forms[0].textfield,'dd-mm-yyyy',this)" style="background-color:#A8A4A4; border:none" name="button1" id="button1">
         </span></td>
         <td rowspan="2" align="right"><span class="eiquetas">Obs.&nbsp;</span></td>
         <td colspan="2" rowspan="2" align="right"><textarea name="textarea" cols="36" rows="3" maxlength="250" id="textarea" style="width:200px; font-size:18px"><?php echo $obs; ?></textarea></td>
       </tr>
       <tr  bgcolor="#A8A4A4">
         <td height="20" valign="top" class="eiquetas">&nbsp;Nº Factura*</td>
         <td valign="top"><span class="ui-widget">
           <input type="text"  name="number2" id="number2" onKeyUp="return teclaGRAL(this, event,'textfield18');format(this)" autocomplete="off" value="<?php echo $numero;?>">
         </span></td>
       </tr>
       <tr bgcolor="#A8A4A4">
         <td height="41" class="eiquetas">&nbsp;</td>
         <td>
          <input type="text" name="textfield19" id="textfield19" value="<?php echo $id;?>" ></td>
         <td align="right">Total de Factura&nbsp;</td>
         <td colspan="2" align="right"><span class="ui-widget">&nbsp;&nbsp;<input name="textfield7" type="text" id="textfield7" onFocus="format(this);" onBlur="format(this);" onChange="format(this);" value="<?php echo number_format($total,'0','','.');?>" size="18" style="text-align:right"    readonly></span>&nbsp;</td>
       </tr>
       <tr bgcolor="#A8A4A4" class="eiquetas">
       <td>&nbsp;</td>
       <td><strong style=" color:rgba(184,33,35,1.00); font-size:18px">Secci&oacute;n de Detalle</strong></td>
        <td colspan="3">&nbsp;</td>
        </tr>
         <tr bgcolor="#B8B4B4">
        <td height="26" class="eiquetas">&nbsp;Cargar Pedido Nª</td>
        <td colspan="4">
          <input type="text" name="textfield18" id="textfield18" autocomplete="off" onKeyUp="buscar(this,event);return teclaGRAL(this, event,'skills2')"></td>
       
      </tr>
       <tr bgcolor="#B8B4B4">
        <td height="26" class="eiquetas">&nbsp;Equipo*</td>
        <td colspan="4"><div class="ui-widget">
  			<input autofocus id="skills2" placeholder="Ingrese Equipo" size="30" name="skills2"  onKeyUp="return busca_tipo(this, event);return teclaGRAL(this, event,'number');"   >
      	    
        </div></td>
       
      </tr>
       <tr  bgcolor="#B8B4B4">
         <td height="27" class="eiquetas">&nbsp;Cantidad*</td>
         <td colspan="2"><span class="ui-widget">
           <input type="text" name="number" id="number"  onchange="format(this)"  onKeyUp="format(this);return teclaGRAL(this, event,'number3');" autocomplete="off" onFocus="buscador_equipo();"  >
          </span></td>
         <td width="5%"><span class="eiquetas">Tipo*</span></td>
         <td width="28%"><input name="textfield16" type="text" class="eiquetas" id="textfield16" readonly></td>
       </tr>
      <tr  bgcolor="#B8B4B4">
        <td height="30" class="eiquetas">&nbsp;Monto Total Gs.*</td>
        <td colspan="2"><span class="ui-widget">
<input type="text" name="number3" id="number3" size="10" onChange="format(this);" onKeyUp="format(this);bajar(this,event);" autocomplete="off">
        </span><td>
        <td><input name="textfield17" type="text" id="textfield17" readonly style="visibility:hidden" >        </tr>
         
      
      <tr>

        <td colspan="5" align="right">
        <table width="100%" border="0" class="tabla1" cellspacing="0" cellpadding="0" id="tabla">
  <tbody>
    <tr class="eiquetas" bgcolor="#A9D4F0">

      <td width="7%">Cant.</td>
      <td width="39%">Descripci&oacute;n</td>
      <td width="13%" align="right" >Unitario&nbsp;</td>
      <td width="20%" align="right">Total</td>
      <td width="12%" align="right">Tipo</td>
	  <td width="9%" align="right">&nbsp;</td>      
    </tr>
    
  </tbody>
</table>
        <table width="100%" border="1" class="tabla1" cellspacing="0" cellpadding="0" id="mitabla" style=" border-collapse: separate">
  <tbody>
  <?php
  	$id2=100;
   while($query4=mysql_fetch_array($query2))
	{?>
      <tr  id="3000" class="eiquetas"  >
          <td width="7%"  height="1px">
            <input name="textfield20" type="text" id="<?php echo $id2;?>" value="<?php echo str_replace(".","",$query4['cantidad']);?>" readonly style="width:100%; height:20px;"></td>    
          <td width="39%" height="1px">
            <input name="textfield21" type="text" id="<?php echo $id2+100;?>" style="width:100%; height:20px;"  value="<?php echo $query4['descrip'];?>" readonly></td>
          <td width="18%" align="right" height="1px"> <input name="textfield22" type="text" id="<?php echo $id2+200;?>" style="width:100%; text-align:right; height:20px;"  value="<?php echo number_format($query4['com_importe']/$query4['cantidad'],'0','','.');?>" readonly></td>
          <td width="15%" align="right" >
            <input name="textfield23" type="text" id="<?php echo $id2+300;?>" style="width:100%; text-align:right; height:20px;"  value="<?php echo number_format($query4['com_importe'],'0','','.');?>" readonly></td>
		  <td width="12%" align="right" height="1px">
            <input name="textfield24" type="text" id="<?php echo $id2+600;?>" style="width:100%; text-align:right; height:20px;" value="<?php echo $query4['tipo'];?>" readonly></td>          
          <td width="9%" align="right" height="1px"><input type="checkbox" style="height:18px; width:100%" id="<?php echo $id2+400;?>" onClick="leer(this,this.id);"></td>
    </tr>
    <?php
		$fila=$fila+1;
		$id2=$id2+1;
	 }?>
  </tbody>
</table>
      <tr>
        <td  height="42" class="eiquetas">&nbsp;</td>
        <td colspan="4" align="right">
          <input type="text" name="textfield22" id="textfield22"  value="<?php echo $fila; ?>" style="visibility:hidden">
          <input name="button" type="button" class="boton3" id="button" value="Guardar" onClick="preparacion();enviar2();">
      </td>
          
      </tr>
    </tbody>
  </table>
  </div>
  <iframe id="deta"   style="visibility:hidden"></iframe>
  <iframe  id="buscador" style="visibility:hidden"></iframe>
  <iframe id="detalle3" height="1" width="1" style="visibility:hidden"></iframe>
  <input name="textfield2" type="text" id="textfield2" value="99"   readonly style="visibility:hidden">
  <input name="textfield3" type="text"  id="textfield3" value="199" readonly style="visibility:hidden">
  <input name="textfield4" type="text" id="textfield4" value="299" readonly style="visibility:hidden">
  <input name="textfield5" type="text" id="textfield5" value="399"  readonly style="visibility:hidden">
  <input name="textfield6" type="text" id="textfield6" value="499" readonly style="visibility:hidden">
  <input name="textfield8" type="text" id="textfield8" value="599"  style="visibility:hidden">
 <input name="textfield9" type="text" id="textfield9" value="699"  readonly style="visibility:hidden">
  <input name="textfield10" type="text" id="textfield10"   readonly style="visibility:hidden">
  <input type="text" name="textfield11" id="textfield11"   readonly style="visibility:hidden">
  <input type="text" name="textfield12" id="textfield12"   readonly style="visibility:hidden">
  <input type="text" name="textfield13" id="textfield13"   readonly style="visibility:hidden">
  <input type="text" name="textfield14" id="textfield14"   readonly style="visibility:hidden">

  <input name="textfield15" type="text" id="textfield15"  value="0" readonly style="visibility:hidden">
</form>
<script type="text/javascript">
$(function() {
    $( "#skills3" ).autocomplete({
		source:"search_general.php?v=UBICACIONES",
		autoFocus:false
	});
  });
  var limite=document.getElementById('textfield22').value;
 
  for (a=0;a<limite;a++)
  {
	
	document.getElementById("textfield2").value = parseInt(document.getElementById("textfield2").value) + 1;
	document.getElementById("textfield3").value = parseInt(document.getElementById("textfield3").value) + 1;
	document.getElementById("textfield4").value = parseInt(document.getElementById("textfield4").value) + 1;
	document.getElementById("textfield5").value = parseInt(document.getElementById("textfield5").value) + 1;		
	document.getElementById("textfield6").value = parseInt(document.getElementById("textfield6").value) + 1;
	document.getElementById("textfield8").value = parseInt(document.getElementById("textfield8").value) + 1;
	document.getElementById("textfield9").value = parseInt(document.getElementById("textfield9").value) + 1;	
	document.getElementById("textfield15").value = parseInt(document.getElementById("textfield15").value) + 1;	  
  }
</script>
</body>
</html>