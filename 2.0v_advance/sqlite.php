<?php

function sqlite_open($location)
{
    $handle = new SQLite3($location);
    return $handle;
}

function sqlite_query($dbhandle,$query)
{
    $array['dbhandle'] = $dbhandle;
    $array['query'] = $query;
    $result = $dbhandle->query($query);
    return $result;
}

function sqlite_fetch_array($result)
{
    $tempArray;
    while ($row = $result->fetchArray())
    {
        // var_dump($row);
        echo $row['id'].'<br>';
        echo $row['keySerial'];
        $tempArray['id'] = $row['id'];
        $tempArray['keySerial'] = $row['keySerial'];
    }
    return $tempArray;
}



?>
