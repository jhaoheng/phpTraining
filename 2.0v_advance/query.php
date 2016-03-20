<?php
include 'sqlite.php';

/*
    取得目前所選擇的 group
*/
function getSelectedGroup($value='')
{
    $db = sqlite_open('sqlite.db');
    $query = 'select f1.id,f1.keySerial from keyGroups f1, selectedGroup f2 where f1.id = f2.KG_id';
    $result = sqlite_query($db,$query);
    return sqlite_fetch_array($result);
}

/*
    取得目前所有的 group list
*/
function getAllGroupList($value='')
{
    # code...
}

/*
    更新 指定 group
*/
function updateIdGroup($value='')
{
    # code...
}

/*
    刪除 指定 group
*/
function deleteIdGroup($value='')
{
    # code...
}

/*
    新增 指定 group
*/
function newIdGroup($value='')
{
    # code...
}
?>
