<?php
/*
    [Max HU]
*/

include 'config.php';
include 'tool.php';

$arrayMain = array();
for ($i=0; $i < count($configKey); $i++) {
    $_key = $configKey[$i];
    $value = $_GET[$_key];
    $arrayMain[$_key] = $value;
    echo $_key.' => '.$value.PHP_EOL;
}

writeLog('GET',userIp(),$arrayMain);

?>
