<?php
include 'sqlite.php';

/*
    取得目前所選擇的 group
*/

$db = sqlite_open('sqlite.db');

function getSelectedGroup($db)
{
    // $db = sqlite_open('sqlite.db');
    $query = 'select f1.id,f1.keySerial from keyGroups f1, selectedGroup f2 where f1.id = f2.KG_id';
    $result = sqlite_query($db,$query);
    return sqlite_fetch_array($result);
}

/*
    取得目前所有的 group list
*/
function getAllGroupList($db)
{
    $query = 'select * from keyGroups';
    $result = sqlite_query($db,$query);
    // return sqlite_fetch_array($result);
}

/*
    更新 指定 group
*/
function updateIdGroup($db,$id,$keySerial)
{
    $updateDate = dateFormat();
    $updateIp = getUserIp();

    $query_1 = 'update keyGroups';
    $query_2 = 'SET keySerial='.$keySerial.',updateDate='.$updateDate.',updateIp='.$updateIp;
    $query_3 = 'where id='.$id;
    $query = $query_1.' '.$query_2.' '.$query_3;
    $result = sqlite_query($db,$query);
}

/*
    刪除 指定 group
*/
function deleteIdGroup($id)
{
    $query_1 = 'delete from keyGroups';
    $query_2 = 'where id='.$id;
    $query = $query_1.' '.$query_2;
    $result = sqlite_query($db,$query);
}

/*
    新增 指定 group
*/
function newIdGroup($keySerial)
{
    $createDate = dateFormat();
    $updateDate = dateFormat();
    $updateIp = getUserIp();
    $query_1 = 'insery into keyGroups';
    $query_2 = '(keySerial, createDate, updateDate, updateIp)';
    $query_3 = 'VALUES ($keySerial, $createDate, $updateDate, $updateIp)';
    $query = $query_1.' '.$query_2.' '.$query_3;
    $result = sqlite_query($db,$query);
}


/*
    通用
*/
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
