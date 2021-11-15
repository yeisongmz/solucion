
<?php 
function hora($valor)
{
    $a=explode('.',$valor);
	if(intval($a[1])>0)
		{
			if(intval($a[1])<25 )
			{
				$a[1]='00';
			}
			
			if(intval($a[1])>=46 and intval($a[1])<=59)
			{
				$a[1]='00';
				$a[0]=intval($a[0])+1;
			}
			if(intval($a[1])>24 and intval($a[1])<48)
			{
				$a[1]='30';
			}
			
			
		}
		$valor_devuelto=$a[0].'.'.$a[1];
    return $valor_devuelto;
}