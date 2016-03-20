<?php

function sqlite_open($location)
{
    $handle = new SQLite3($location);
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
