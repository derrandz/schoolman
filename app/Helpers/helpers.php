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

function is_logged()
{
	return Auth::check();
}

function current_user()
{
    return ( Auth::check()) ? Auth::user() : null;
}

function current_database()
{
    if( !empty(DatabaseConnection::$instances) )
    {
        return end(DatabaseConnection::$instances)->getConnection()->getDatabaseName();
    }

    return DB::connection()->getDatabaseName();
}


function connect_to_database($params)
{
    $connection = new DatabaseConnection($params);

    return $connection['database'];
}


function databases()
{
    $list = array();

    $databases= DB::connection('mysql')->table('database_instances')->get();

    foreach($databases as $db)
    {
        $list[] = $db->name;
    }


    return $list;
}