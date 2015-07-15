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
	return SessionsHelper::isLogged();
}

function current_user()
{
    return SessionsHelper::getAuthUser();
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

function getControllerAndActionName()
{
    $action = app('request')->route()->getAction();

    $controller = class_basename($action['controller']);

    list($controller, $action) = explode('@', $controller);

    return ['action' => $action, 'controller' => $controller];
}

function flash($type, $content)
{
    $type_html_class = '';

        Session::flash('flash_message', $content);

        switch($type)
        {
            case "success" : $type_html_class = 'alert-success';
            break;
            
            case "notice" : $type_html_class = 'alert-info';
            break;

            case "danger" : $type_html_class = 'alert-danger';
            break;

            case "warning" : $type_html_class = 'alert-warning';
            break;

            case "primary" : $type_html_class = 'alert-primary';
            break;

            default:
                $type_html_class = "text-info";
                break;
        }

        Session::flash("flash_type", $type_html_class);

}