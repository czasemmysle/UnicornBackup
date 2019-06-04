<?php

include(config.php);
$filename = 'config.json'; //œcie¿ka do pliku configuracyjnego

$file = fopen($filename,"r");
$json = fread($file,filesize($filename));
fclose($file);
$config = Config::fromJson($json);

require('planBackupu.php'); //œcie¿ka do pliku z danymi planu //mo¿na zmieniæ nazwê

switch ($flag)
{
case 1: //bez powtórzeñ
	$cron ="$minuta $godzina $dzien $miesiac * tsp php $script_dir/$id.php\n";
	
	break;

case 2: //powtarzaj codziennie
	$cron ="$minuta $godzina * * * tsp php $script_dir/$id.php\n";
	
	break;

case 3: //powtarzaj co days i interwal
	switch ($interwal)
	{
		case 1:
			$cron ="$minuta $godzina * * *";
			break;
		case 2:
			$cron ="$minuta $godzina * * *";
			break;
		case 3:
			$cron ="$minuta $godzina * $miesiac *";
			break;
		default:
			$cron = "0 0 1 1 *";
			break;
	}
	break;

default:
	$cron = "0 0 1 1 *";
	break;
}
$crontab = shell_exec('crontab -l');
file_put_contents("$script_dir/crontabToModify.txt", $crontab);

$plik = file("$script_dir/crontabToModify.txt");
//tu by³o wczeœniej
$plik = array_map('zamiana',$plik);
file_put_contents("$script_dir/crontabToModify.txt", implode('',$plik));

function zamiana($plik){
	if(stristr($plik, "$id"))
		return "$cron\n";
	return $plik;
}
?>