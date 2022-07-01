<?php

/**
 * @param $data
 * @return void
 */
function dumpvar($data){
    echo '<pre>';
    var_export($data);
    echo '</pre>';
}

/**
 * @param mixed $x
 * @return void
 */
function onTrue(mixed $x):bool
{
    if ($x === true){
        return true;
    }
}

/**
 * @param string $string
 * @return string
 */
function quote(string $string):string
{
    return trim("'".$string."'");
}
