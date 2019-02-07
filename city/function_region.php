<?php
$region = 'no_select';
if($_GET['region']) $region = htmlspecialchars($_GET['region']);
header('Content-Type: text/html; charset=utf-8');

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_GET['q']){
    $base = @file($region."_spisoc.txt");
    for($i=0; $i<count($base); $i++)
	{ 
		$row_base = explode(":", $base[$i]); 
		$res = mb_strpos(mb_strtolower($row_base[1],"UTF-8"), mb_strtolower($_GET['q'],"UTF-8")); 
		if($res!==false&&$res==0) 
			{ print $row_base[1]."\n"; } ;
	}
  }
}
// $row_base[3] = trim($row_base[3]);
?>