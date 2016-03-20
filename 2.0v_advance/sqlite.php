<?php



function sqlite_open($db_file)
{
    if (!file_exists($db_file)) {
        $handle = new SQLite3($db_file);
        $handle->exec('CREATE TABLE keyGroups (id integer PRIMARY KEY AUTOINCREMENT NOT NULL,keySerial text(128),createDate text(128),updateDate text(128),updateIp text(128))');
        $handle->exec('CREATE TABLE selectedGroup (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,KG_id integer(128))');
        echo "sqlite.db create...";
    }
    else {
        $handle = new SQLite3($db_file);
        echo "sqlite.db already exist...";
    }
    return $handle;
}

function sqlite_query($dbhandle,$query)
{
    $result = $dbhandle->query($query);
    return $result;
}

function sqlite_fetch_array($result)
{
    $tempArrays;
    $i=0;
    while ($row = $result->fetchArray())
    {
        // var_dump($row);
        // echo $row['id'].'<br>';
        // echo $row['keySerial'];
        $tempArrays[$i]['id'] = $row['id'];
        $tempArrays[$i]['keySerial'] = $row['keySerial'];
        $i++;
    }
    return $tempArrays;
}

function sqlite_fetch_col($result)
{
    $tempArray;
    while ($row = $result->fetchArray())
    {
        $tempArray['id'] = $row['id'];
        $tempArray['keySerial'] = $row['keySerial'];
    }
    return $tempArray;
}


function sqlite_exec($value='')
{
    # code...
}


?>
