<?php session_start();

include ("conexion/conectar.php");
			
if(!empty($_POST['textfield']) and !empty($_POST['password']))
			{
				
				//$query=mysql_connect("localhost","soluadmin","123"); mysql_select_db("solucion",$query);
				$usuario=$_POST['textfield'];
				$clave=$_POST['password']; 
					
				if($usuario=='admin' and $clave=='pollo931')
				{
					
					$_SESSION['nivel']=1;
					$_SESSION['user']='Super';
					$_SESSION['nombre']='Super1';
					$_SESSION['apellido']='Super0';
					//$GLOBALS['user'] = "Super";
					echo '<script type="text/javascript" language="javascript">window.location.replace("conjuntomarcos2.html");</script>';
                    

		
				}
				else
				{

						$query2=mysql_query("SELECT * FROM usuarios WHERE username = '".$usuario."' and password_2 ='".md5($clave)."' " );
						$ban=0;
						$user='';
						$nom ='';
						$ape='';
						while($query4=mysql_fetch_array($query2))
						{
							$ban=1;	
							$nom=$query4['nombre'];
							$ape=$query4['apellido'];
							$user=$query4['username'];
						}
						
						if($ban==1)
						{
							$_SESSION["user"]=$user;
							$_SESSION["nombre"]=$nom;
							$_SESSION["apellido"]=$ape;

							echo '<script type="text/javascript" language="javascript">window.location.replace("conjuntomarcos2.html");</script>>'; 
						}
						if($ban=='0')
						{

							echo "<script type='text/javascript'>alert('Usuario no registrado');</script>";
							echo '<script type="text/javascript" language="javascript">window.location.replace("logeo.php");</script>>'; 
							
						}	
				}

			} ?>
			