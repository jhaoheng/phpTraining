<?php

/*
 寫入 log
 - $ip : 放入ip的陣列
 - $main : 放入 post/ get 取得的陣列內容
*/

function writeLog($method,$ip,$main)
{
    $folderName = date("Y-m-d");
    if (!file_exists('Temp-'.$folderName)) {
        mkdir('Temp-'.$folderName , 0777, true);
    }

    $fileNmae = date("H:i:s");
    $fp = fopen('Temp-'.$folderName.'/'.$fileNmae.'.txt', 'w');

    $unix_t=time();
    fwrite($fp, '[Method] : '.$method);
    fwrite($fp, PHP_EOL.'[UNIX_TIME] : '.time());
    fwrite($fp, PHP_EOL.'[Date] : '.$folderName.'-'.$fileNmae);
    fwrite($fp, PHP_EOL.'[ip] : '.var_export($ip, true));
    fwrite($fp, PHP_EOL.'[main] : '.var_export($main, true));
    fclose($fp);

    echo "<br><hr><br>";
    echo "Date : " . $folderName .'     '. $fileNmae;
}

function userIp()
{
    /*
    1. HTTP_CLIENT_IP
    2. HTTP_X_FORWARDED_FOR
    3. HTTP_X_FORWARDED
    4. HTTP_X_CLUSTER_CLIENT_IP
    5. HTTP_FORWARDED_FOR
    6. HTTP_FORWARDED
    7. REMOTE_ADDR
    8. HTTP_VIA
    */
    $HTTP_CLIENT_IP = $_SERVER["HTTP_CLIENT_IP"];
    $HTTP_X_FORWARDED_FOR = $_SERVER["HTTP_X_FORWARDED_FOR"];
    $HTTP_X_FORWARDED = $_SERVER["HTTP_X_FORWARDED"];
    $HTTP_X_CLUSTER_CLIENT_IP = $_SERVER["HTTP_X_CLUSTER_CLIENT_IP"];
    $HTTP_FORWARDED_FOR = $_SERVER["HTTP_FORWARDED_FOR"];
    $HTTP_FORWARDED = $_SERVER["HTTP_FORWARDED"];
    $REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
    $HTTP_VIA = $_SERVER["HTTP_VIA"];

    $arrayIp = array(
        '1. HTTP_CLIENT_IP' => $HTTP_CLIENT_IP,
        '2. HTTP_X_FORWARDED_FOR' => $HTTP_X_FORWARDED_FOR,
        '3. HTTP_X_FORWARDED' => $HTTP_X_FORWARDED,
        '4. HTTP_X_CLUSTER_CLIENT_IP' => $HTTP_X_CLUSTER_CLIENT_IP,
        '5. HTTP_FORWARDED_FOR' => $HTTP_FORWARDED_FOR,
        '6. HTTP_FORWARDED' => $HTTP_FORWARDED,
        '7. REMOTE_ADDR' => $REMOTE_ADDR,
        '8. HTTP_VIA' => $HTTP_VIA
    );

    echo "USER IP : <br>";
    foreach ($arrayIp as $key => $value) {
        echo $key."=>".$value."<br>";
    }
    echo "<br><br><br>";

    return $arrayIp;
}

?>
