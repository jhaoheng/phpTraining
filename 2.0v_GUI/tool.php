<?php

function dateFormat()
{
    return date("Y-m-d").' '.date("H:i:s");
}

function getUserIp()
{
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
    return $arrayIp;
}

?>
