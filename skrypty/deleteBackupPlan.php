<?php

include(config.php);
$filename = 'config.json'; //�cie�ka do pliku configuracyjnego

$file = fopen($filename,"r");
$json = fread($file,filesize($filename));
fclose($file);
$config = Config::fromJson($json);

require('planBackupu.php'); //�cie�ka do pliku z danymi planu //mo�na zmieni� nazw�

$crontab = shell_exec('crontab -l');
file_put_contents("$script_dir/crontabToDelete.txt", $crontab;

$plik = file("$script_dir/crontabToDelete.txt");
//tu by�o wcze�niej
$plik = array_map('usuwanie',$plik);
file_put_contents("$script_dir/crontabToDelete.txt", implode('',$plik));

function usuwanie($plik){
	if(stristr($plik, "$id"))
		return "";
	return $plik;
}
?>