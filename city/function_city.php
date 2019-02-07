<?php
// Файл выводит Города для фильтра на главной Биржи труда
$region = 'no_select';
if($_REQUEST['id']) $region = htmlspecialchars($_REQUEST['id']);
header('Content-Type: text/html; charset=utf-8');
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
	{
		$base = @file($region."_spisoc.txt");
		$row_base = array(); $ar_rez = array ();
		for($i=0; $i<count($base); $i++)
		{ 
			$row_base = explode(":", $base[$i]); 
			$ar_rez[] = $row_base[1];
		}
	//	file_put_contents('a.ddd', $ar_rez);
		$rez = '';
		if (isset ($_REQUEST['id']) && is_array ($ar_rez))
		{
			foreach ($ar_rez as $id => $value)
			{	$rez .= '<option value="' . $value . '">' . $value . '</option>'; }
			echo $rez;
		}
	} 
else 
	{
	echo 'Неверный запрос!';
	exit;
	}
	