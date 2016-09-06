<?php

function env($key, $default = null)
{
    $value = getenv($key);
    if($value === false)
    {
        return $default;
    }

}