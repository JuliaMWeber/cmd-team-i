<?php

function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key)
    {
        if(!mb_detect_encoding($item, 'utf-8', true))
        {
            $item = utf8_encode($item);
        }
    });

    return $array;
}

$ini = utf8_converter(ini_get_all());
echo json_encode($ini);
