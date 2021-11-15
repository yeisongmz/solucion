<?php session_start();
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
// ***********         grabacion/ modificacion
if (isset($_POST['textfield'])) 
{
	if(!empty($_POST['textfield']) )
			{
				
				$ban=0;
				$opc = $_POST['textfield2'];
				$perfil = strtoupper(trim($_POST['textfield']));
				$timestamp = date('Y-m-d G:i:s');
				$user = $_SESSION["user"];
				$opciones = explode("--",$_POST['textfield4']);
				
				
				$patron="conceptos--asignacion--adjuntos--planilla_banco--empleados_mjt--sueldos_mjt--resumen_mjt--planilla_ips --bancos--parametros--Listado_de_proveedores--Listado_de_depositos--Clientes_y_sucursales--listado_de_Equipos--Personales_activos--Personales_inactivos--Adelantos_por_personal--Listado_de_cargos--Inventario_de_prestamos_activos--Inventario_de_prestamos_cancelados--Ausencias_por_personal--Asistencias_por_personal--Personal_por_sucursal--Sucursal_por_personal--Listado_vacaciones--Descuentos_por_personal--Bonificacion_por_personal--Usuarios_con_perfiles--Listado_de_conceptos--Traslados_por_personal--Traslados_todos_por_rango_de_fecha--Doc.requeridos--Compras_por_proveedor--Compras_en_un_rango_de_fecha_todos--Responsable_de_equipos_por_personal--Responsable_de_equipos_por_equipo--Adelantos_solicitados--personal_cargo--personal_ficha--personal_asistencias--personal_ausencias--personal_adelantos--personal_bonif--personal_prestamos--personal_translados--personal_vacaciones--personal_descuentos--personal_regular--personal_salida--Documentos_requeridos--clientes--equipos--proveedor--compra--asignacion_equipos--depositos--movimientos--usuarios--perfiles--ajustes--Pedidos--Remisiones--otros--";
				$array = explode("--",$patron);
				
				if ($opc=="A")
				{
					
					
				
					$query2="INSERT INTO perfil(perfil,creador,fe_ultmodi)  VALUES('".$perfil."','".$user."','".$timestamp."')";
					
					$resultado = mysql_query($query2);
					
					$query2="select * from perfil where perfil='".$perfil."' " ;

					$res=mysql_query($query2,$con);
					$idperfil='';
					while($query4 = mysql_fetch_array($res) )
						{
							$idperfil = $query4['id'];
						}
					for ($i = 0; $i < count($array)-1; $i++)
					 {
    					$ban=0;	
						for ($ii = 0; $ii < count($opciones)-1; $ii++) 
						{		
						if ($array[$i]==$opciones[$ii])
							{
								$ban=1;
								break;
							}
						}
						
						if( $ban == 1 )
							{
								$query4="INSERT INTO opciones(perfil_id,nombremenu,acceso)  VALUES('".$idperfil."','".$array[$i]."','SI')";
								$resultado = mysql_query($query4);	
								
							}
							else
													{
								$query5="INSERT INTO opciones(perfil_id,nombremenu,acceso)  VALUES('".$idperfil."','".$array[$i]."','NO')";
								$resultado = mysql_query($query5);	
								
													
							}
								
						
					
					} 
								mysql_close($con);		
								echo '<script type="text/javascript" language="javascript">window.location.replace("busca_perfiles.php");</script>'; 
				
									
				}
				if ($opc=="M")
				{
						
				
					
					
					$query2="select * from perfil where perfil='".$perfil."' " ;

					$res=mysql_query($query2,$con);
					$idperfil='';
					while($query4 = mysql_fetch_array($res) )
						{
							$idperfil = $query4['id'];
						}
						//**********  eliminacion antes de actulizar
						$query4="delete from opciones where perfil_id='".$idperfil."' ";
						$resultado = mysql_query($query4);
						
						//********************************
					for ($i = 0; $i < count($array)-1; $i++)
					 {
    					$ban=0;	
						for ($ii = 0; $ii < count($opciones)-1; $ii++) 
						{		
						if ($array[$i]==$opciones[$ii])
							{
								$ban=1;
								break;
							}
						}
						
						if( $ban == 1 )
							{
								$query4="INSERT INTO opciones(perfil_id,nombremenu,acceso)  VALUES('".$idperfil."','".$array[$i]."','SI')";
								$resultado = mysql_query($query4);	
								
							}
							else
							{
								$query5="INSERT INTO opciones(perfil_id,nombremenu,acceso)  VALUES('".$idperfil."','".$array[$i]."','NO')";
								$resultado = mysql_query($query5);	
								
													
							}
					 } 
								mysql_close($con);		
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_perfiles.php");</script>'; 
				
				}

			}
		}
?>