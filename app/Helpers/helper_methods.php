<?php


use Illuminate\Support\Str;
use Illuminate\Container\Container;


function vendor_path($path)
{
    return base_path().'/vendor'.($path ? DIRECTORY_SEPARATOR.$path : $path);
}

function resources_path($path)
{
    return base_path().'/resources'.($path ? DIRECTORY_SEPARATOR.$path : $path);
}
