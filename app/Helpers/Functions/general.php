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





    function HTTP_path($path)
    {
        return base_path().'/app/Http'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }






    function is_logged()
    {
        return SessionsHelper::isLogged();
    }
    




    function getControllerAndActionName()
    {
        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);

        list($controller, $action) = explode('@', $controller);

        return ['action' => $action, 'controller' => $controller];
    }





    function getActionName()
    {
        return getControllerAndActionName()['action'];
    }






    function getControllerName()
    {
        return getControllerAndActionName()['controller'];
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







    function getInput($attributes)
    {
        $input = array();

        foreach($attributes as $attr)
        {
            $input[(string)$attr] = Input::get( (string)$attr );
        }

        return $input;
    }







    function RedirectToRoute($route, $params = array())
    {
        return Redirect::route($route)->with($params);
    }




    function flash_lang($type, $lang, $params = null, $default = null)
    {
        flash($type, Lang::has($lang) ? Lang::get($lang, $params ? $params : []) : ($default ? $default : 'The default message was not set') );
    }








    function IdAndNameSymArray($models)
    {
        $ids   = '' ; 
        $names = '' ; 

        foreach($models->all() as $model)
        {
            $ids[]   =  $model->id;
            $names[] =  $model->name;
        }

        $selectArray = array();
        $i           = 0;

        foreach($ids as $modelid)
        {
            $selectArray[ (string)$modelid ] = $names[$i];
            $i++;
        }

        return $selectArray;

    }









    function isCurrentSchoolSet()
    {
        if(CurrentUserSchoolId() == -1)
        {
            return false;
        }

        return true;
    }

    function selectArray($models)
    {
        $ids   = '' ; 
        $names = '' ; 

        foreach($models as $model)
        {
            $ids[]   =  $model->id;
            $names[] =  $model->name;
        }

        $selectArray = array();
        $i           = 0;

        foreach($ids as $modelid)
        {
            $selectArray[ (string)$modelid ] = $names[$i];
            $i++;
        }

        return $selectArray;

    }





    function getSchoolsArray()
    {
        $schools = DB::table('schools')->get();
        return selectArray($schools);
    }



    function isThisMyAction($myAction)
    {
         if(!(getActionName() == $myAction))
        {
            return false;
        }

        return true;
    }



    function ActionIsCreateTeachersFromFiles()
    {
        return isThisMyAction('getCreateTeachersFromFiles');
    }



    function ActionIsCreateStudentsFromFiles()
    {
        return isThisMyAction('getCreateStudentsFromFiles');
    }



    function ActionIsCreateClassesFromFiles()
    {
        return isThisMyAction('getCreateClassesFromFiles');
    }

