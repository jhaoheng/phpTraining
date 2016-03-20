<?php
include 'sqlite.php';
include 'tool.php';

$db = sqlite_open('sqlite.db');

/*
    取得目前所選擇的 group
*/
function getSelectedGroup($db)
{
    // $db = sqlite_open('sqlite.db');
    $query = 'select f1.id,f1.keySerial from keyGroups f1, selectedGroup f2 where f1.id = f2.KG_id';
    $result = sqlite_query($db,$query);
    return sqlite_fetch_col($result);
}

/*
    取得目前所有的 group list
*/
function getAllGroupList($db)
{
    $query = 'select * from keyGroups';
    $result = sqlite_query($db,$query);
    return sqlite_fetch_array($result);
}



/*
    更新 指定 group
*/
function updateIdGroup($db,$id,$keySerial)
{
    $updateDate = dateFormat();
    $updateIp = implode(",", getUserIp());

    $query_1 = 'update keyGroups';
    $query_2 = 'SET keySerial="'.$keySerial.'",updateDate="'.$updateDate.'",updateIp="'.$updateIp.'"';
    $query_3 = 'where id='.$id;
    $query = $query_1.' '.$query_2.' '.$query_3;
    $result = sqlite_query($db,$query);
}


/*
    新增
*/
function newIdGrouptest($db,$keySerial)
{
    $createDate = dateFormat();
    $updateDate = dateFormat();
    $updateIp = implode(",", getUserIp());
    $query_1 = 'insert into keyGroups';
    $query_2 = '(keySerial, createDate, updateDate, updateIp)';
    $query_3 = 'VALUES ("'.$keySerial.'", "'.$createDate.'", "'.$updateDate.'", "'.$updateIp.'")';
    $query = $query_1.' '.$query_2.' '.$query_3;
    $result = sqlite_query($db,$query);
}


/*
    刪除 指定 group
*/
function deleteIdGroup($db,$id)
{
    $query_1 = 'delete from keyGroups';
    $query_2 = 'where id='.$id;
    $query = $query_1.' '.$query_2;
    $result = sqlite_query($db,$query);
}

?>
