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

function configureConnectionByName($params)
{
    // Just get access to the config. 
    $config = App::make('config');

    // Will contain the array of connections that appear in our database config file.
    $connections = $config->get('database.connections');

    // This line pulls out the default connection by key (by default it's `mysql`)
    $defaultConnection = $connections[$config->get('database.default')];

    // Now we simply copy the default connection information to our new connection.
    $newConnection = $defaultConnection;
    // Override the database name.
    // Loop through our default array and update options if we have non-defaults
	foreach($newConnection as $item => $value)
	{
		$newConnection[$item] = isset($options[$item]) ? $options[$item] : $defaultConnection[$item];
	}
    $newConnection['database'] = $params['database'];

    // This will add our new connection to the run-time configuration for the duration of the request.
    App::make('config')->set('database.connections.'.$params['database'], $newConnection);

}