<?php
/*
    [Max HU]
*/

include 'config.php';
include 'tool.php';

$arrayMain = array();
for ($i=0; $i < count($configKey); $i++) {
    $_key = $configKey[$i];
    $value = $_POST[$_key];
    $arrayMain[$_key] = $value;
    echo $_key.' => '.$value.PHP_EOL;
}

writeLog('POST',userIp(),$arrayMain);

?>
