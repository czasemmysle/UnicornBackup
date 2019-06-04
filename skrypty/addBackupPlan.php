<?php

include ('./config.php');
$filename = 'config.json'; //cieka do pliku configuracyjnego

$file = fopen($filename,"r");
$json = fread($file,filesize($filename));
fclose($file);
$config = Config::fromJson($json);

require('planBackupu.php'); //cieka do pliku z danymi planu //mona zmieni nazw

//tworz crona
//yyyy-mm-dd HH:MM:SS
$date=$data_start;
$date=strtotime($date);
$minuta = date('i', $date);
$godzina = date('H', $date);
$dzien = date('d', $date);
$miesiac = date('n', $date);

switch ($number)
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
//ostatnia gwiazdka powinna byæ $days <- do przerobienia
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

//update crontaba
$crontab = shell_exec('crontab -l');
file_put_contents("$script_dir/crontabToAdd.txt", $crontab.$cron);
echo exec("crontab $script_dir/crontabToAdd.txt");

//tworzê skrypt
$command_header = '$today=';
$command1 = $command_header."date('Y-m-d H:i:s');\n";  //czy œredniki s¹ dobrze?
$command_header = '$date_start=';
$command2 = $command_header."$data_start;\n"; //czy œredniki s¹ dobrze?

$header = "<?php\n";
$tail = "?>\n";

$script_contents = <<<'EOT'

if($date_start < $today)
tsp php runBackup.php ;

EOT;

file_put_contents("$script_dir/$id.php","$header.$command1.$command2.$script_contents.$tail");
$command ="chmod -x $script_dir/$id.php";
shell_exec($command);
?>
