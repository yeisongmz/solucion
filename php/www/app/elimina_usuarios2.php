<?php include ("conexion/conectar.php");?>
<?php header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 ?>
 <?php
//   *********   ELIMINACION    **************
			
			if(!empty($_POST['textfield']) )
			{
				
				$valor=$_POST['textfield'];
				
				$query2="delete  FROM usuarios where usuario='".$valor."'";
				$resultado = mysql_query($query2);
				echo '<script type="text/javascript"> window.location.href = "elimina_usuarios.php";</script>';			
			} ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>