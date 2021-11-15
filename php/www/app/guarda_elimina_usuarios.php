<?php session_start();
date_default_timezone_set('America/Bahia');
include ("conexion/conectar.php");?>
<?php 
$opc='';
if(isset($_POST['textfield5']))
{
		$opc = $_POST['textfield5'];
}




if($opc=="A")
{
 				if (isset($_POST['textfield']) and isset($_POST['password']) and isset($_POST['password2']) and isset($_POST['textfield3']) and isset($_POST['select']))
 					{
						if(!empty($_POST['textfield']) and !empty($_POST['password']) and !empty($_POST['password2']) and !empty($_POST['textfield3']))
							{
									$nombre=$_POST['textfield'];
									$apellido=$_POST['textfield2'];
									$usuario=$_POST['textfield3'];
									$obs=$_POST['textarea'];
									$perfil=$_POST['select'];
									$encriptada2=md5($_POST['password']); 
					
									$timestamp = date('Y-m-d G:i:s');
									$user = $_SESSION["user"];
									$query2="select * from perfil where perfil='".$perfil."' " ;
										$res=mysql_query($query2,$con);
										$idperfil='';
										while($query4 = mysql_fetch_array($res) )
											{
												$idperfil = $query4['id'];
											
											}
					
					
									
									$query2="INSERT INTO USUARIOS(perfil_id,nombre,apellido,username,password_2,creador,fe_ultmodi,obs)  VALUES('".$idperfil."','".$nombre."','".$apellido."','".$usuario."','".$encriptada2."','".$user."','".$timestamp."','".$obs."')";
									//echo $query2;
									$resultado = mysql_query($query2);
									mysql_close($con);	
									echo '<script type="text/javascript" language="javascript">window.location.replace("busca_usuarios.php");<script>'; 
				
						}
				} 
}

if($opc=="M")
{
		 if (isset($_POST['textfield']) and isset($_POST['textfield2']) and  isset($_POST['textfield3']) )
		 {
				if(!empty($_POST['textfield']) and isset($_POST['textfield2']) and !empty($_POST['textfield3']))
					{
							$nombre=$_POST['textfield'];
							$apellido=$_POST['textfield2'];
							$usuario=$_POST['textfield3'];
							$obs=$_POST['textarea'];
							$id=explode("--",$_POST['textfield4']);
							$perfil=$_POST['select'];
							$encriptada2='';
							if($_POST['password']!=='')
							{
							$encriptada2=md5($_POST['password']); 
							}
				
							$timestamp = date('Y-m-d G:i:s');
							$user = $_SESSION["user"];
							$query2="select * from perfil where perfil='".$perfil."' " ;
							//echo $query2."<br>";
								$res=mysql_query($query2,$con);
								$idperfil='';
								while($query4 = mysql_fetch_array($res) )
									{
										$idperfil = $query4['id'];
										//echo $idperfil."<br>" ;
									
									}


						if($encriptada2 =='')
						{
							$query2="update USUARIOS set perfil_id='".$idperfil."',nombre='".$nombre."',apellido='".$apellido."',username='".$usuario."',creador='".$user."',fe_ultmodi='".$timestamp."',obs='".$obs."' where id='".$id[0]."'";
							$resultado = mysql_query($query2);
						}
					else
						{
					$query2="update USUARIOS set perfil_id='".$idperfil."',nombre='".$nombre."',apellido='".$apellido."',username='".$usuario."',creador='".$user."',fe_ultmodi='".$timestamp."',obs='".$obs."',password_2='".$encriptada2."' where id='".$id[0]."'";
					$resultado = mysql_query($query2);
						}
								
				mysql_close($con);	
				
				echo '<script type="text/javascript" language="javascript">window.location.replace("busca_usuarios.php");</script>'; 
				
			}
} 
}
?>