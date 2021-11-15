<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=solucion', 'soluadmin', '123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = $_POST['keyword'].'%';

if($_POST['keyword']!=='')
{
	if(strlen($_POST['keyword'])>0)
		{
			
			$sql = "SELECT * FROM personal WHERE apellido LIKE (:keyword) group by apellido ORDER BY apellido LIMIT 0, 10";
			$query = $pdo->prepare($sql);
			$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
			$query->execute();
			$list = $query->fetchAll();
			 //style="visibility:hidden"
			echo "<table width='30%' border='0' cellspacing='1' cellpadding='0' id='datos' align='left'  >";
			
			//set_item(item)
			$fila=0;
			foreach ($list as $rs) 
			{
				// put in bold the written text
				$country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['apellido']);
				$fila=$fila+1;
				echo "<tr id='$fila' onMouseOver='uno(this.id)'  onMouseOut='dos(this.id)'>";
				//echo '<td  onclick="document.getElementById(50).value=\''.$rs['apellido'].'\';javascript:limpiar();"  aling="left"  >'.$country_name.'</td>';
				//echo '<td  onclick="set_item($country_name)"  aling="left"  >'.$country_name.'</td>';
				echo '<td  onclick="javascript:limpiar(\''.$rs['apellido'].'\');"  aling="left"  >'.$country_name.'</td>';
			echo  "</tr>";	
				
			}
			echo "</table>"; 
		}
}
?>